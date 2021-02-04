<style type="text/css">
  
              .footer{
                display: none;
              }
                                @php $tab_clr=''; @endphp
                                      @if($settings->count() > 0)                                     
                                        @foreach($settings as $set)
                                           @if($set->key_term=='personal_tab_color')
                                                @php $tab_clr=$set->value; @endphp
                                           @endif 
                                        @endforeach
                                       @else
                                                @php $tab_clr=''; @endphp
                                       @endif 


                                       @php $tab_text_clr=''; @endphp
                                      @if($settings->count() > 0)                                     
                                        @foreach($settings as $set)
                                           @if($set->key_term=='personal_tab_text_color')
                                                @php $tab_text_clr=$set->value; @endphp
                                           @endif 
                                        @endforeach
                                       @else
                                                @php $tab_text_clr=''; @endphp
                                       @endif                                  
                                            .bg_tab_personal{
                                          background-color: <?php echo $tab_clr ?>;
                                          color:<?php echo $tab_text_clr ?>;
                                        }


                                @php $wellness_tab_clr=''; @endphp
                                      @if($settings->count() > 0)                                     
                                        @foreach($settings as $set)
                                           @if($set->key_term=='wellness_tab_color')
                                                @php $wellness_tab_clr=$set->value; @endphp
                                           @endif 
                                        @endforeach
                                       @else
                                                @php $wellness_tab_clr=''; @endphp
                                       @endif 


                                       @php $wellness_tab_text_clr=''; @endphp
                                      @if($settings->count() > 0)                                     
                                        @foreach($settings as $set)
                                           @if($set->key_term=='wellness_tab_text_color')
                                                @php $wellness_tab_text_clr=$set->value; @endphp
                                           @endif 
                                        @endforeach
                                       @else
                                                @php $wellness_tab_text_clr=''; @endphp
                                       @endif                                  
                                            .bg_wellness_tab{
                                          background-color: <?php echo $wellness_tab_clr ?>;
                                          color:<?php echo $wellness_tab_text_clr ?>;
                                        }


                                  @php $physical_tab_color=''; @endphp
                                      @if($settings->count() > 0)                                     
                                        @foreach($settings as $set)
                                           @if($set->key_term=='physical_tab_color')
                                                @php $physical_tab_color=$set->value; @endphp
                                           @endif 
                                        @endforeach
                                       @else
                                                @php $physical_tab_color=''; @endphp
                                       @endif 


                                       @php $physical_tab_text_color=''; @endphp
                                      @if($settings->count() > 0)                                     
                                        @foreach($settings as $set)
                                           @if($set->key_term=='physical_tab_text_color')
                                                @php $physical_tab_text_color=$set->value; @endphp
                                           @endif 
                                        @endforeach
                                       @else
                                                @php $physical_tab_text_color=''; @endphp
                                       @endif                                  
                                            .bg_physical_tab{
                                          background-color: <?php echo $physical_tab_color ?>;
                                          color:<?php echo $physical_tab_text_color ?>;
                                        }




                                  @php $diet_tab_color=''; @endphp
                                      @if($settings->count() > 0)                                     
                                        @foreach($settings as $set)
                                           @if($set->key_term=='diet_tab_color')
                                                @php $diet_tab_color=$set->value; @endphp
                                           @endif 
                                        @endforeach
                                       @else
                                                @php $diet_tab_color=''; @endphp
                                       @endif 


                                       @php $diet_tab_text_color=''; @endphp
                                      @if($settings->count() > 0)                                     
                                        @foreach($settings as $set)
                                           @if($set->key_term=='diet_tab_text_color')
                                                @php $diet_tab_text_color=$set->value; @endphp
                                           @endif 
                                        @endforeach
                                       @else
                                                @php $diet_tab_text_color=''; @endphp
                                       @endif                                  
                                            .bg_diet_tab{
                                          background-color: <?php echo $diet_tab_color ?>;
                                          color:<?php echo $diet_tab_text_color ?>;
                                        }


                                  @php $stress_tab_color=''; @endphp
                                      @if($settings->count() > 0)                                     
                                        @foreach($settings as $set)
                                           @if($set->key_term=='stress_tab_color')
                                                @php $stress_tab_color=$set->value; @endphp
                                           @endif 
                                        @endforeach
                                       @else
                                                @php $stress_tab_color=''; @endphp
                                       @endif 


                                       @php $stress_tab_text_color=''; @endphp
                                      @if($settings->count() > 0)                                     
                                        @foreach($settings as $set)
                                           @if($set->key_term=='stress_tab_text_color')
                                                @php $stress_tab_text_color=$set->value; @endphp
                                           @endif 
                                        @endforeach
                                       @else
                                                @php $stress_tab_text_color=''; @endphp
                                       @endif                                  
                                            .bg_stress_tab{
                                          background-color: <?php echo $stress_tab_color ?>;
                                          color:<?php echo $stress_tab_text_color ?>;
                                        }

                                  @php $brain_marker_tab_color=''; @endphp
                                      @if($settings->count() > 0)                                     
                                        @foreach($settings as $set)
                                           @if($set->key_term=='brain_marker_tab_color')
                                                @php $brain_marker_tab_color=$set->value; @endphp
                                           @endif 
                                        @endforeach
                                       @else
                                                @php $brain_marker_tab_color=''; @endphp
                                       @endif 


                                       @php $brain_marker_tab_text_color=''; @endphp
                                      @if($settings->count() > 0)                                     
                                        @foreach($settings as $set)
                                           @if($set->key_term=='brain_marker_tab_text_color')
                                                @php $brain_marker_tab_text_color=$set->value; @endphp
                                           @endif 
                                        @endforeach
                                       @else
                                                @php $brain_marker_tab_text_color=''; @endphp
                                       @endif                                  
                                            .bg_brain_tab{
                                          background-color: <?php echo $brain_marker_tab_color ?>;
                                          color:<?php echo $brain_marker_tab_text_color ?>;
                                        }


                                  @php $cardio_vascular_tab_color=''; @endphp
                                      @if($settings->count() > 0)                                     
                                        @foreach($settings as $set)
                                           @if($set->key_term=='cardio_vascular_tab_color')
                                                @php $cardio_vascular_tab_color=$set->value; @endphp
                                           @endif 
                                        @endforeach
                                       @else
                                                @php $cardio_vascular_tab_color=''; @endphp
                                       @endif 


                                       @php $cardio_vascular_tab_text_color=''; @endphp
                                      @if($settings->count() > 0)                                     
                                        @foreach($settings as $set)
                                           @if($set->key_term=='cardio_vascular_tab_text_color')
                                                @php $cardio_vascular_tab_text_color=$set->value; @endphp
                                           @endif 
                                        @endforeach
                                       @else
                                                @php $cardio_vascular_tab_text_color=''; @endphp
                                       @endif                                  
                                            .bg_cardio_tab{
                                          background-color: <?php echo $cardio_vascular_tab_color ?>;
                                          color:<?php echo $cardio_vascular_tab_text_color ?>;
                                        }

      </style>