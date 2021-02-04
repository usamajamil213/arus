
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
    <?php

    $value= $result;

    if($value->lang){ $table = "sms_lang"; }else{ $table="sms"; }

    ?>

    <section id="content">
        <!--start container-->
        <div class="container">
            <!--card stats start-->

            <div class="row">
                <div class="col s12 m8 l8">
                    <div class="card">

                        <div class="card-content">


                            <span class="card-title">{{ trans('localization::lang_view.'.$value->title)}}</span>

                            <span style="position: absolute;float: right;right: 32px;top: 16px;"><a href="{{ URL::Route('admin/sms/view')}}" data-toggle="tooltip" title="{{ trans('localization::lang_view.back_to_view_sms_page')}}">{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i> </a></span>

                            <form action="{{ URL::Route('admin/sms/update',$value->id)}}" method="post" onsubmit="return smsHintValidate()" >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="lang" value="{{$request->lang}}">
                                <input type="hidden" name="table" value="{{$table}}">

                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">{{ trans('localization::lang_view.message')}}<sup style="color: red">*</sup></label>
                                            <textarea style="border:1px solid #c7c7c7;width: 100%;height: 100px" id="msg" name="message"><?= $value->message; ?></textarea>
                                        </div>
                                    </div>
                                </div><br>

                                <div class="col s6 m6 l6">
                                    <span class="btn revert-btn btn-primary left"> <a class="sweet-revert" style="color:white;"  href="{{  URL::Route('admin/sms/revert',[$value->id,$request->lang,$table]) }}"><i class="material-icons right">reply</i>{{ trans('localization::lang_view.revert')}}</a> </span>

                                </div>

                                <div class="col s6 m6 l6">
                                    <button id="submit" type="submit" class="btn save-btn waves-effect waves-light right" >{{ trans('localization::lang_view.apply_changes')}}<i class="material-icons right">send</i></button>
                                </div>
                                <div class="clearfix"></div>


                            </form>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4 l4">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">
                                <div id="tab" class="tap-target" data-activates="menu">
                                    <div class="tap-target-content">
                                        <h5>{{ trans('localization::lang_view.hint')}}</h5>
                                        <p>This is used to Listing the values to be added in your content </p>
                                    </div>
                                 </div>

                                 <a class="tooltipped" data-position="top" data-tooltip="{{ trans('localization::errors.click_me_help')}}" onclick="help('menu','tab')">{{ trans('localization::lang_view.hint')}}</a>
                            </span>
<br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <?php /*echo   serialize(
                                                    array(
                                                        '%number%'=>array('name'=>'otp','required'=>'true'),
                                                        '%first_name%'=>array('name'=>'first_name','required'=>'true'),
                                                        '%last_name%'=>array('name'=>'last_name','required'=>'false'),
                                                        '%user_name%'=>array('name'=>'user_name','required'=>'true')
                                                        )
                                            )*/
                                        /*echo   serialize(
                                                    array(
                                                        '%appName%'=>array('name'=>'application_name','required'=>'false'),
                                                        '%currencySymbol%'=>array('name'=>'currencySymbol','required'=>'true'),
                                                        '%userBonus%'=>array('name'=>'userBonus','required'=>'true'),
                                                        '%date%'=>array('name'=>'date','required'=>'false')
                                                        )
                                            );die();*/


                                        ?>
                                        <?php
                                        $array=unserialize($value->hint);
                                            $count=1;
                                        foreach($array as $key => $note){ ?>
                                        <p><?=$key;?>  -  {{ trans('localization::lang_view.'.$note['name'])}}<?php if($note['required']=="true"){echo "<sup>*</sup>";} ?> </p>
                                            <input data_key="<?=$key;?>" id="<?=$count;?>" class="req_check" type="hidden" value="<?=$note['required'];?>" >
                                       <?php $count++; }
                                        ?>
                                    </div>
                                </div>
                            </div>
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