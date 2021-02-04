<div id="sendNotification" class="modal fade" role="dialog" style="left: 60px;top: 20px;">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                            <form method="post" id="sendNotificationForm" action="{{route('SendNotifications')}}">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Send Notifications</h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="col-md-12">
                                            <span id="alert_msg_notification" style="display: none;color: red">Please Select Atleast One</span>
                                        </div>

                                            {{csrf_field()}}
                                            <input type="hidden" name="selected_noti_users" id="selected_noti_users">
                                                <label>Select Predefined Text</label>
                                                   <select class="form-control" name="predefined_text" required="required">
                                                       <option value="{{NULL}}">Select</option>
                                                       @foreach($noti_list as $list)
                                                        <option value="{{$list->id}}">{{$list->title}}</option>
                                                       @endforeach
                                                   </select>
                                        
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" id="sendUsernotification" class="btn btn-primary">Send</button>
                                    <button type="button" class="btn btn-danger closeModal" data-dismiss="modal">Close</button>
                                  </div>
                                  </form>
                                </div>

                              </div>
                            </div>