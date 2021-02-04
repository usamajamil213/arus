
@extends('layout::Layout')
@section('content')
<?php
$value=$result;

?>

<style>
    th{
        text-align: center;
    }
    td{
        text-align: center;
    }
    .pagination li.active {
        width: 30px;
    }


</style>
<section id="content">
    <!--start container-->
    <div class="container">
        <!--card stats start-->

        <div class="row">

            <div class="col s12 m12 l12">

                <div id="tab" class="tap-target" data-activates="menu">
                    <div class="tap-target-content">
                        <h5>Actions</h5>
                        <p>This is used to provide the actions for data</p>
                    </div>
                </div>

                <div id="bordered-table">
                    <h4 class="header">{{ trans('localization::lang_view.sms_settings')}}</h4>

                    <div class="row">
                        <div class="col s12 m12 l12">

                            <div class="row">
                                <div class="col s12">
                                    <ul class="tabs tab-demo z-depth-1">

                                        <?php
                                        $settings = $value;
                                        $tab=1;
                                        foreach($settings as $name => $items){  /*echo"<pre>";print_r($items[0]['icon']);die(); */ ?>

                                        <li class="tab"><a class="active" href="#test<?=$tab;?>"><?=trans('localization::lang_view.'.$name);?></a></li>

                                        <?php $tab++; } ?>

                                        <li class="indicator" style="right: 806px; left: 0px;"></li>
                                    </ul>

                                </div>
                                <div class="col s12">
                                    <?php $settings_count=count($settings);
                                    // for($i=1;$i<=$settings_count;$i++){
                                    $i=1;
                                    foreach($settings as $name => $items)
                                    {

                                    ?>
                                    <div id="test<?=$i;?>" class="offset-s2 col s8 <?php if($i==1){echo "active"; }?>" style="">

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <table id="table" class="bordered ">
                                            <thead class="text-black">
                                            <tr>
                                                <th>{{ trans('localization::lang_view.s.no')}}</th>
                                                <th>{{ trans('localization::lang_view.sms_title')}}</th>
                                                <th>{{ trans('localization::lang_view.active')}}</th>
                                                <th><a class="tooltipped" onclick="help('menu','tab')" data-position="top" data-delay="50" data-tooltip="{{trans('localization::errors.click_me_help')}}" >{{ trans('localization::lang_view.actions')}}</a></th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                                    <?php
                                                    $s_no=1;
                                                    foreach($items as $key => $val)
                                                    { //print_r($item_value);die();?>



                                            <tr>
                                                <td><?php echo $s_no+($request->input('page',1)==1?0:($request->input('page',1)-1)*App\Containers\Common\GetConfigs::getConfigs('paginate'));?></td>
                                                <td><?=trans('localization::lang_view.'.$val->title); ?></td>
                                                <td><?php if($val->is_active==1){echo "<span class='status-green'>".trans('localization::lang_view.active')."</span>";}elseif($val->is_active==0){echo "<span class='status-red'>".trans('localization::lang_view.inactive')."</span>";}?></td>
                                                <td>
                                                    <div class="container">

                                                        <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn gradient-45deg-light-blue-cyan gradient-shadow" data-activates="dropdown<?=$name.$s_no;?>" style="">
                                                            <i class="material-icons hide-on-med-and-up">settings</i>
                                                            <span class="hide-on-small-onl"> {{ trans('localization::lang_view.actions')}}</span>
                                                            <i class="material-icons right">arrow_drop_down</i>
                                                        </a>

                                                        <?php if($val->lang){ $table = "sms_lang"; }else{ $table="sms"; } ?>
                                                        <ul id="dropdown<?=$name.$s_no;?>" class="drop dropdown-content" style="white-space: nowrap; opacity: 1;width: 140px; top: 130px; display: none;">
                                                            <li><a class="grey-text text-darken-2" href="{{ URL::Route('admin/sms/edit',[$val->id,$name,$table]) }}">{{ trans('localization::lang_view.edit')}}</a></li>

                                                            <?php if ($val->is_active == 0) { ?>
                                                            <li><a onclick="" class="sweet-active grey-text text-darken-2" href="{{ URL::Route('admin/sms/active',[$val->id,$name,$table]) }}">{{ trans('localization::lang_view.active')}}</a></li>
                                                            <?php } else { ?>
                                                            <li><a class="sweet-inactive grey-text text-darken-2" href="{{ URL::Route('admin/sms/inactive',[$val->id,$name,$table]) }}">{{ trans('localization::lang_view.inactive')}} </a></li>

                                                            <?php } ?>
                                                        </ul>
                                                    </div>

                                                </td>
                                            </tr>


                                                <?php    $s_no++;}?>
                                            </tbody>
                                        </table>

                                    </div>

                                    <?php $i++; } ?>

                                </div>

                            </div>


                                </div>
                            </div>
                        </div>
                </div>
            </div>

        </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var window_size = $(window).width();

        $(window).resize(function() {

            window_size = $(window).width();

            WidthChange();

        });


        if($(window).width() <=360){

            var width = document.getElementById("table").offsetWidth;

            $("<style/>", {text: ".drop {left: "+(width-130)+"px !important;}"}).appendTo('head');

        }

    });

    function WidthChange(){

        if($(window).width() <=360){

            var width = document.getElementById("table").offsetWidth;

            $("<style/>", {text: ".drop {left: "+(width-130)+"px !important;}"}).appendTo('head');

        }

    }

</script>

@endsection
