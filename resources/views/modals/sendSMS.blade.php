<div id="sendSmsModal" class="modal fade" role="dialog" style="left: 60px;top: 5px;">
				              <div class="modal-dialog">

				                <!-- Modal content-->
				                <div class="modal-content" style="background-color: darkcyan">
				                  <div class="modal-header">
				                    <h4 class="modal-title">Send Sms</h4>
				                  </div>
				                  <div class="modal-body">
                                        <div class="col-md-12">
                                            <span id="alert_msg_sms" style="display: none;color: red">Please Select Atleast One</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12 col-sm-12">
                                                <form method="post" id="sendSmsForm" action="{{route('admin/SendSms')}}">
                                                    {{csrf_field()}}
                                                   <label>Enter Text</label>
                                                   <input type="hidden" name="selected_users" id="selected_users">
                                                   <input type="text" class="form-control" name="smsText" id="smsText">


                                                   <label>Select Predefined Text</label>
                                                   <select class="form-control" name="predefined_text">
                                                       <option value="{{NULL}}">Select</option>
                                                       @foreach($sms as $list)
                                                        <option value="{{$list->message}}">{{$list->message}}</option>
                                                       @endforeach
                                                   </select>
                                                </form>
                                            </div>
                                        </div>

				                  </div>
				                  <div class="modal-footer">
				                  	<button type="button" id="sendSMSbtn" class="btn btn-primary">Send</button>
				                    <button type="button" class="btn btn-default closeModal" data-dismiss="modal">Close</button>
				                  </div>
				                </div>

				              </div>
				            </div>