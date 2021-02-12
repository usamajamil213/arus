@extends('admin.partials.default')



@section('content')

<div class="app-content content">

	<div class="content-wrapper">

		<div class="content-header row">

			<div class="content-header-left col-md-9 col-12 mb-2">

				<div class="row breadcrumbs-top">

					<div class="col-12">

						<h2 class="content-header-title float-left mb-0">User</h2>

						<div class="breadcrumb-wrapper col-12">

							<ol class="breadcrumb">

								<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a>

								</li>

								<li class="breadcrumb-item active">User

								</li>

							</ol>

						</div>

					</div>

				</div>

			</div>

		</div>

		<div class="content-body">

			<!-- Zero configuration table -->

			<section id="basic-datatable">

				<div class="row">

					<div class="col-12">

						<div class="card">

							<div class="card-content">

								<div class="card-body card-dashboard">

									<div class="content-header-right col-md-12 col-12 mb-2">
										<div class="row">

											<div class="col-12 text-right">
					
												<button type="button" class="btn btn-icon btn-primary btn waves-effect waves-light" data-toggle="modal" data-target="#add_user" title="Add">
													<i class="feather icon-plus"></i> Add User
												</button>
													<div class="modal fade text-left" id="add_user" data-backdrop="static">



														<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
						
						
						
															<div class="modal-content div mt-2 px-2 d-flex new-data-title justify-content-around">
						
						
						
																 <form class="form-group" action="{{route('admin.useradd')}}" method="POST" enctype="multipart/form-data" id="">
						
						
						
																	@csrf
						
						
						
																	<div class="modal-header">
						
						
						
																		<h4 class="modal-title">Add User</h4>
						
						
						
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						
						
						
																			<span aria-hidden="true">x</span>
						
						
						
																		</button>
						
						
						
																	</div>
						
						
						
																	<div class="modal-body">
						
						
						
																		<div class="data-items pb-3">
						
						
						
																			<div class="data-fields px-2 mt-12">
						
						
						
																				<div class="row col-12">
						
						
						
																					<div class="col-sm-6 data-field">
						
						
						
																						<label for="cat_name">First Name</label>
						
						
						
																						<input name="name" type="text" class="form-control" id="name" required>
						
						
						
																					</div>
																					<div class="col-sm-6 data-field">
						
						
						
																						<label for="name">Last Name</label>
						
						
						
																						<input name="L_name" type="text" class="form-control" id="name" required>
						
						
						
																					</div>
																					<div class="col-sm-6 data-field">
						
						
						
																						<label for="name">Email</label>
						
						
						
																						<input name="email" type="email" class="form-control" id="name" required>
						
						
						
																					</div>
																					<div class="col-sm-6 data-field">
						
						
						
																						<label for="name">Phone No</label>
						
						
						
																						<input name="phone" type="text" class="form-control" id="name" required>
						
						
						
																					</div>
																					<div class="col-sm-6 data-field">

																						<label for="platform_fee_percent">Address</label>
						
																						<textarea class="form-control" aria-label="With textarea" name="address"></textarea>
						
																					</div>
																					<div class="col-sm-6 data-field">
						
						
						
																						<label for="name">Password</label>
						
						
						
																						<input name="password" type="password" class="form-control" id="name" required>
						
						
						
																					</div>
	
						
						
																			 
						
						
						
																				</div>
						
						
						
																			</div>
						
						
						
																		</div>
						
						
						
																	</div>
						
						
						
																	<div class="modal-footer">
						
						
						
																		<button type="submit" class="btn btn-primary">Add</button>
						
						
						
																		<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
						
						
						
																	</div>
						
						
						
															   </form> 
						
						
						
															</div><!-- /.modal-content -->
						
						
						
														</div><!-- /.modal-dialog -->
						
					
	                               
					
											</div>
					
										</div>
					
										<div class="table-responsive">
											<table class="table zero-configuration">
												<thead>
													<tr>
														<th>Name</th> 
														<th>Email</th> 
														<th>Phone</th>                                
														<th>Action</th>
													</tr>
												</thead>
												<tbody> 
													@foreach($users as $user)
													<tr>
														<td>{{$user->name}}</td>
														<td>{{$user->email}}</td>
														<td>{{$user->phone}}</td>
														<td>

                                                            <!-- <button type="button" class="btn btn-icon btn-secondary btn-sm waves-effect waves-light" title="View">-->

                                                            <!--    <i class="feather icon-eye"></i>-->

                                                            <!--</button>-->

                                                            <button type="button" class="btn btn-icon btn-primary btn-sm waves-effect waves-light" title="Edit"data-toggle="modal" data-target="#edit_user">

                                                                <i class="feather icon-edit"></i>

                                                            </button>

                                                            <button type="button" class="btn btn-icon btn-danger btn-sm waves-effect waves-light" title="Delete" data-toggle="modal" data-target="#delete_user">

                                                                <i class="feather icon-trash"></i>

                                                            </button>

                                                             <div class="modal fade text-left" id="edit_user" data-backdrop="static">

                                                           <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">

                                    <div class="modal-content div mt-2 px-2 d-flex new-data-title justify-content-around">

                                        <form class="form-group" action="" method="POST" enctype="multipart/form-data">

                                            @csrf

                                            <div class="modal-header">

                                                <h4 class="modal-title">Update User</h4>

                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                    <span aria-hidden="true">x</span>

                                                </button>

                                            </div>

                                            <div class="modal-body">

                                                <div class="data-items pb-3">

                                                    <div class="data-fields px-2 mt-12">

                                                        <div class="row col-12">

                                                            <div class="col-sm-6 data-field">

                                                                <label for="cat_name">First Name</label>

                                                                <input name="name" type="text" class="form-control" id="name" value="{{$user->name}}" required>

															</div>
															<div class="col-sm-6 data-field">

                                                                <label for="cat_name">Last Name</label>

                                                                <input name="l_name" type="text" class="form-control" id="name" value="{{$user->l_name}}" required>

                                                            </div>

                                                            <!--<div class="col-sm-6 data-field">-->

                                                            <!--    <label for="platform_fee_percent">user Location</label>-->

                                                            <!--</div>-->

                                                            <div class="col-sm-6 data-field">

                                                                <label for="platform_fee_percent">Email</label>

																<input name="email" type="email" class="form-control" id="" value="{{$user->email}}" required>

                                                            </div>

                                                             <div class="col-sm-6 data-field">

                                                                <label for="platform_fee_percent">Phone</label>

                                                                <input class="form-control" type="text" id="rmail"  required name="phone" value=" ">

															</div>
															<div class="col-sm-6 data-field">

                                                                <label for="platform_fee_percent">Address</label>

                                                                <textarea class="form-control" aria-label="With textarea"></textarea>

															</div>
															<div class="col-sm-6 data-field">

                                                                <label for="platform_fee_percent">Password</label>

                                                                <input class="form-control" type="password"   required name="password" value=" ">

															</div>


                                                    

        

                                                        </div>

                                                        <input type="hidden" name="user_id" value=" ">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="modal-footer">

                                                <button type="submit" class="btn btn-primary">update</button>

                                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>

                                            </div>

                                       </form> 

                                   </div>

                              </div>

                              </div> 
                               <div class="modal fade text-left" id="delete_user" data-backdrop="static">
                                <div class="modal-dialog modal-dialog-centered modal-sm modal-dialog-scrollable modal-lg" role="document">
                                    <div class="modal-content div mt-2 px-2 d-flex new-data-title justify-content-around">
                                        <form class="form-group" action="" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                                <h4 class="modal-title">Delete: </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">x</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="data-items pb-3">
                                                        <div class="row">
                                                            <input type="hidden" name="id" value=" ">
                                                             <h4>Are You Sure?</h4>   
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Yes</button>
                                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>

                        

                                                        </td>

													</tr>

													@endforeach

												</tbody>

												<tfoot>
													<tr>
														<th>Name</th> 
														<th>Email</th> 
														<th>Phone</th>                                
														<th>Action</th>
													</tr>
												</tfoot>

											</table>

										</div>

									</div>

								</div>

							</div>

						</div>

					</div>

				</section>

				<!--/ Zero configuration table -->
			</div>
		</div>
	</div>

	@endsection