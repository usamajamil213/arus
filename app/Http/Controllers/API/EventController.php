<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\models\Event;
use App\models\EventRatting;
use App\models\EventServices;
use Auth;
use Validator;
use DB;
use Exception;
use Illuminate\Support\Facades\Input;
class EventController extends Controller
{ 
  public $successStatus = 200;
    public function get_events(Request $request){
        if(isset($request->search)){
            $search_term= $request->search;
       $events =Event::select('id','name','location','description','total_members')->with('event_checking')->where('name', 'like', '%'.$search_term.'%')->get();
       $data = [];
        $i = 0;
       foreach($events as $ev){
           $data[$i]['id'] = $ev->id;
           $data[$i]['name'] = $ev->name;
           $data[$i]['location'] = $ev->location;
           $data[$i]['description'] = $ev->description;
           $data[$i]['total_members'] = $ev->total_members;
           $data[$i]['checked_in'] = count($ev->event_checking);
           $data[$i]['event_ratting'] = $ev->event_ratting->avg('ratting');
           $i++;
       }

       return response()->json(['data' => $data], $this->successStatus);
        }
        else{
       $events =Event::select('id','name','location','description','total_members')->with('event_checking')->with('event_ratting')->get();            
        

       // $events_cheack_in=DB::table('user_event')->select('event_id','user_id')->groupBy('event_id')->count('user_id')->get();

       $data = [];
        $i = 0;
       foreach($events as $ev){
           $data[$i]['id'] = $ev->id;
           $data[$i]['name'] = $ev->name;
           $data[$i]['location'] = $ev->location;
           $data[$i]['description'] = $ev->description;
           $data[$i]['total_members'] = $ev->total_members;
           $data[$i]['checked_in'] = count($ev->event_checking);
           $data[$i]['event_ratting'] = $ev->event_ratting->avg('ratting');
           $i++;
       }

       return response()->json(['data' => $data], $this->successStatus);
        }
    }
    public function add_ratting(Request $request){
       $validator = Validator::make([
                    'user_id' => $request->user_id,
                    'event_id' => $request->event_id,
                    'ratting' => $request->ratting,
                    
                ],
                [
                    'user_id' => 'required',
                    'event_id' => 'required',
                    'ratting' => 'required',
                ]
            );
    
            if ($validator->fails())
            {

                    // $error = $validator->errors()->first('email');
                    $error = $validator->errors()->all();
            
                    $response = [
                        'success' => false,
                        'success_message' => $error,

                    ];
                    // return $validator->errors()->first('email');

                    return $response;          

            }
     

        $user_ratting=EventRatting::where('event_id',$request->event_id)->where('user_id',$request->user_id)->first();
        
        if(!empty($user_ratting)){
               $user_ratting->ratting=$request->ratting;
                $user_ratting->save();
                $message = trans('Ratting updated');
              }
              else{
         $ratting=new EventRatting();
        $ratting->user_id = $request->user_id;
        $ratting->event_id = $request->event_id;
        $ratting->ratting = $request->ratting;
        $ratting->save();
        $message = trans('Ratting inserted');
              }
        $response = [
            'success' => true,
            'success_message' => $message,
        ];
        //print_r($response);die();

        return $response;

    }
    
     public function event_services(Request $request){
    
            $validator = Validator::make([
                    'event_id' => $request->event_id,                    
                ],
                [
                    'event_id' => 'required',
                ]
            );
    
            if ($validator->fails())
            {

                    // $error = $validator->errors()->first('email');
                    $error = $validator->errors()->all();
            
                    $response = [
                        'success' => false,
                        'success_message' => $error,

                    ];
                    // return $validator->errors()->first('email');

                    return $response;          

            }
            $event_services=EventServices::with('services')->where('event_id',$request->event_id)->get();
            $message = trans('Event Services!');
            $response = [
            'success' => true,
            'success_message' => $message,
            'services'=> $event_services,
        ];
        //print_r($response);die();

        return $response;

    }
   public function search_event(Request $request){
       $validator = Validator::make([
                    'search_term' => $request->search_term,                    
                ],
                [
                    'search_term' => 'required',
                ]
            );
    
            if ($validator->fails())
            {

                    // $error = $validator->errors()->first('email');
                    $error = $validator->errors()->all();
            
                    $response = [
                        'success' => false,
                        'success_message' => $error,

                    ];
                    // return $validator->errors()->first('email');

                    return $response; 
                    }

               if($request->search_term=='<\(^)/>?'){
                $events=Event::get();
                // dd($events->event_place);
                $eventss =Event::select('id','name','location','description','total_members')->with('event_checking')->with('event_ratting')->where('status','Active')->where('approved','Yes')->get();
                  $dataa = [];
                  $i = 0;
                  foreach($eventss as $ev){
                  $dataa[$i]['id'] = $ev->id;
                  $dataa[$i]['name'] = $ev->name;
                //   $dataa[$i]['location'] = isset($ev->event_place)?$ev->event_place->name:'';
                  $dataa[$i]['description'] = $ev->description;
                  $dataa[$i]['total_members'] = $ev->total_members;
                  $dataa[$i]['checked_in'] = count($ev->event_checking);
                  $dataa[$i]['event_ratting'] = $ev->event_ratting->avg('ratting');
                  $i++;
                  }
                  $response = [
                        'success' => true,
                        'data' => $dataa,
                        // 'evant-place'=>$events,
                    ];
                  
       return $response;
               }
          else{
                $events=Event::where('name','like','%'.$request->search_term.'%')->where('approved','Yes')->where('status','Active')->with('event_checking')->with('event_ratting')->get();
                $data = [];
        $i = 0;
       foreach($events as $ev){
           $data[$i]['id'] = $ev->id;
           $data[$i]['name'] = $ev->name;
           $data[$i]['location'] = $ev->location;
           $data[$i]['description'] = $ev->description;
           $data[$i]['total_members'] = $ev->total_members;
           $data[$i]['checked_in'] = count($ev->event_checking);
           $data[$i]['event_ratting'] = $ev->event_ratting->avg('ratting');
           $i++;
       }
        return response()->json(['data' => $data], $this->successStatus);

             }
    
    }
    
    
}
