
@extends('layout::Layout')
@section('content')
    <style>
        sup{
            color:red;
            font-size: 12px;
            left: 2px;

        }
        font{
            width: 100px;
            height: 100px;
            color:green;
        }

    </style>

    <section id="content">
        <!--start container-->
        <div class="container">
            <!--card stats start-->

            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="card">

                        <div class="card-content">

                            @if($fun=='add')
                                <span class="card-title">{{'Add Custom Message'}}</span>
                            @else
                                <span class="card-title">{{'Edit Custom Message'}}</span>
                            @endif
                            <span style="position: absolute;float: right;right: 32px;top: 16px;"><a href="{{ URL::Route('admin/sms/view')}}" data-toggle="tooltip" title="{{ trans('localization::lang_view.back_to_view_sms_page')}}">{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i> </a></span>

                             @if($fun=='add')
                                <form action="{{route('admin/save/custom/sms')}}" method="post">
                            @else
                                <form action="{{route('admin/update/custom/sms')}}" method="post">
                                <input type="hidden" name="id" value="{{$sms->id}}">                                    
                            @endif
                            <input type="hidden" name="type" value="{{$url}}">
                                   {{csrf_field()}}     
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Message<sup style="color: red">*</sup></label>
                                                @if(isset($sms))
                                                    @php $value = $sms->message; @endphp
                                                @else
                                                    @php $value = ''; @endphp
                                                @endif
                                                <textarea style="border:1px solid #c7c7c7;width: 100%;height: 100px" id="msg" name="message"><?= $value; ?></textarea>
                                            </div>
                                        </div>
                                    </div>


                                <div class="row col s12 m12 l12">
                                    <button id="submit" type="submit" class="btn save-btn waves-effect waves-light right" >{{ trans('localization::lang_view.apply_changes')}}<i class="material-icons right">send</i></button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>


     //   demo.showNotification('top','center','danger','warning','hello demo');

        function smsHintValidate() {

            var data = $('#msg').val();

            //console.log(data);

            for (var i = 1; i <= $('.req_check').length; i++) {

                var req_value = $('#' + i).val();

                var key = $('#' + i).attr('data_key');

                if (req_value == "true") {

                    if (data.search(key) == -1) {

                        Materialize.toast(key + ' {{ trans('localization::errors.required')}}', 4000);
                        return false;

                        //demo.showNotification('top',key + '{{ trans('localization::errors.required')}}');



                    }
                }
            }
        }




   </script>

@endsection