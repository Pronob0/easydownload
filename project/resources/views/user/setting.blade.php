@extends('layouts.front')
@section('content')


@includeIf('includes.user.common')
			<!-- ========================== Dashboard Elements ============================= -->
			<section class="gray-light">
				<div class="container">

					<div class="row">
						<div class="col-lg-3 col-md-4 col-sm-12">
							<div class="nav flex-column nav-pills extra_jhysfr" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">{{ __('Edit profile') }}</a>
                                <a class="nav-link" id="v-pills-password-tab" data-toggle="pill" href="#v-pills-password" role="tab" aria-controls="v-pills-password" aria-selected="false">{{ __('Password Change') }}</a>
                                <a class="nav-link" id="v-pills-dashboard-tab" data-toggle="pill" href="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="false">{{ __('Dashboard Setting') }}</a>
								<a class="nav-link" id="v-pills-social-tab" data-toggle="pill" href="#v-pills-social" role="tab" aria-controls="v-pills-social" aria-selected="false">{{ __("Social Links") }}</a>


							</div>
						</div>

						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="tab-content" id="v-pills-tabContent">



                                <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

									<div class="extra_ijyu98">
										<div class="extra_ijyu98_head">
											<h4>{{ __('Edit Profile') }}</h4>
										</div>
										<div class="extra_ijyu98_body">
											<form class="geniusformdata" action="{{route('user.profile.update',$data->id)}}" enctype="multipart/form-data"  method="POST">
                                                @csrf
                                                @include('includes.admin.form-both')
												<div class="row">

													<div class="col-lg-6 col-md-6">
														<div class="form-group">
															<label> {{ __('Name') }}</label>
															<input type="text" value="{{ $data->name }}"class="form-control" name="name" >
														</div>
													</div>
                                                    <div class="col-lg-6 col-md-6">
														<div class="form-group">
															<label>{{ __('User Name') }}</label>
															<input type="text" value="{{ $data->username }}"class="form-control" name="username" >
														</div>
													</div>
													<div class="col-lg-6 col-md-6">
														<div class="form-group">
															<label> {{ __('Email') }}</label>
															<input type="email" class="form-control" name="email" Value="{{ $data->email }}" >
														</div>
													</div>
                                                    <div class="col-lg-6 col-md-6">
														<div class="form-group">
															<label> {{ __('Phone') }}</label>
															<input type="text" class="form-control" name="phone" value="{{ $data->phone }}" >
														</div>
													</div>
													<div class="col-lg-6 col-md-6">
														<div class="form-group">
															<label>{{ __('Address') }}</label>
															<input type="text" class="form-control" name="address"  value="{{ $data->address }}" >
														</div>
													</div>
                                                    <div class="col-lg-6 col-md-6">
														<div class="form-group">
															<label>{{ __('Country') }}</label>
															<input type="text" class="form-control" name="country"  value="{{ $data->country }}" >
														</div>
													</div>
                                                    <div class="col-lg-6 col-md-6">
														<div class="form-group">
															<label>{{ __('State') }}</label>
															<input type="text" class="form-control" name="state"  value="{{ $data->state }}" >
														</div>
													</div>
                                                    <div class="col-lg-6 col-md-6">
														<div class="form-group">
															<label>{{ __('City') }}</label>
															<input type="text" class="form-control" name="city"  value="{{ $data->city }}" >
														</div>
													</div>
                                                    <div class="col-lg-6 col-md-6">
														<div class="form-group">
															<label>{{ __('Fax') }}</label>
															<input type="text" class="form-control" name="fax"  value="{{ $data->fax }}" >
														</div>
													</div>
                                                    <div class="col-lg-6 col-md-6">
														<div class="form-group">
															<label>{{ __('Postal Code') }}</label>
															<input type="text" class="form-control" name="zip"  value="{{ $data->zip }}" >
														</div>
													</div>





												</div>

                                                <div class="form-group">
                                                    <label class="font-weight-bold">{{ __('Set Image') }} </label>
                                                    <div class="wrapper-image-preview">
                                                        <div class="box">
                                                            <div class="back-preview-image" style="background-image: url({{$data->photo ? asset('assets/images/'.$data->photo) : asset('assets/images/placeholder.jpg') }});"></div>
                                                            <div class="upload-options">
                                                                <label class="img-upload-label" for="img-upload"> <i class="fa fa-camera"></i> {{ __('Upload Picture') }} </label>
                                                                <input id="img-upload" type="file" class="image-upload" name="photo" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 offset-4 col-md-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn_update">{{ __('Save & Update') }}</button>
                                                    </div>
                                                </div>
											</form>
										</div>
									</div>
								</div>




                                <div class="tab-pane fade" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab">

									<div class="extra_ijyu98">
										<div class="extra_ijyu98_head">
											<h4>{{__('Password Change')}}</h4>
										</div>
										<div class="extra_ijyu98_body">
											<form class="geniusformdata" action="{{route('user.change.password')}}"  method="POST">
                                                @csrf
                                                @include('includes.admin.form-both')
												<div class="row">

													<div class="col-lg-6 col-md-6">
														<div class="form-group">
															<label> {{__('Current Password')}}</label>
															<input type="password" class="form-control" id="old_password" name="old_password" required>
														</div>
													</div>

													<div class="col-lg-6 col-md-6">
														<div class="form-group">
															<label> {{__('New Password')}}</label>
															<input type="password" class="form-control" id="password" name="password" required>
														</div>
													</div>
													<div class="col-lg-6 col-md-6">
														<div class="form-group">
															<label>{{__('Repeat password')}}</label>
															<input type="password" class="form-control" id="password_confirmation" name="password_confirmation"  required>
														</div>
													</div>

												</div>
                                                <div class="col-lg-12 offset-4 col-md-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn_update">{{__('Save & Update')}}</button>
                                                    </div>
                                                </div>
											</form>
										</div>
									</div>
								</div>




                                <div class="tab-pane fade" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">

									<div class="extra_ijyu98">
										<div class="extra_ijyu98_head">
											<h4>{{__('Edit Dashboard')}}</h4>
										</div>
										<div class="extra_ijyu98_body">
											<form class="geniusformdata" action="{{route('user.dashboard.update',$data->id)}}" enctype="multipart/form-data"  method="POST">
                                                @csrf
                                                @include('includes.admin.form-both')
												<div class="row">
													<div class="col-lg-12 col-md-12">
														<div class="form-group">
															<label> {{ __('Title') }}</label>
															<input type="text" value="{{ $data->dashboard_title }}"class="form-control" name="name" required>
														</div>
													</div>

                                                    <div class="col-lg-12 col-md-12">
														<div class="form-group">
                                                            <label for="details">{{ __('Description') }}</label>
                                                              <textarea class="form-control "  id="details" required name="dashboard_details" rows="3" placeholder="{{__('Description')}}">{{$data->dashboard_details}}</textarea>
                                                        </div>
													</div>

												</div>

                                                <div class="form-group">
                                                    <label class="font-weight-bold">{{ __('Dashboard Banner') }} </label>
                                                    <div class="wrapper-image-preview">
                                                        <div class="box">
                                                            <div class="back-preview-image" style=" background-image: url({{$data->dashboard_banner ? asset('assets/images/'.$data->dashboard_banner) : asset('assets/images/placeholder.jpg') }});"></div>
                                                            <div class="upload-options">
                                                                <label class="img-upload-label" for="img-upload1"> <i class="fa fa-camera"></i> {{ __('Upload Picture') }} </label>
                                                                <input id="img-upload1" type="file" class="image-upload1" name="dashboard_banner" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 offset-4 col-md-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn_update">{{__('Save & Update')}}</button>
                                                    </div>
                                                </div>
											</form>
										</div>
									</div>
								</div>





                               <div class="tab-pane fade" id="v-pills-social" role="tabpanel" aria-labelledby="v-pills-social-tab">
									<div class="extra_ijyu98">
										<div class="extra_ijyu98_head">
											<h4>{{__('Your Social Networks')}}</h4>
										</div>
										<div class="extra_ijyu98_body">
											<form class="geniusformdata" action="{{route('user.social',$data->id)}}"  method="POST">
                                                @csrf
                                                @include('includes.admin.form-both')
												<div class="row">

													<div class="col-lg-6 col-md-6">
														<div class="form-group">
															<label><i class="fa fa-facebook"></i> {{ __('Facebook User') }}</label>
															<input type="text" name="f_url" class="form-control" value="{{ $data->f_url }}">
														</div>
													</div>
													<div class="col-lg-6 col-md-6">
														<div class="form-group">
															<label><i class="fa fa-twitter"></i> {{ __("Twitter User") }}</label>
															<input type="text"  name="t_url" class="form-control" value="{{ $data->t_url }}">
														</div>
													</div>
													<div class="col-lg-6 col-md-6">
														<div class="form-group">
															<label><i class="fa fa-linkedin"></i> {{ __('LinkedIn User') }}</label>
															<input type="text" name="l_url" class="form-control" value="{{ $data->l_url }}">
														</div>
													</div>
													<div class="col-lg-6 col-md-6">
														<div class="form-group">
															<label><i class="fa fa-google"></i> {{ __('Google User') }}</label>
															<input type="text" name="g_url" class="form-control" value="{{ $data->g_url }}">
														</div>
													</div>

													<div class="col-lg-12 offset-4 col-md-12">
														<div class="form-group">
															<button type="submit" class="btn btn_update">{{ __('Save & Update') }}</button>
														</div>
													</div>
												</div>

											</form>
										</div>
									</div>
								</div>



                                <div class="tab-pane fade" id="v-pills-view-tab" role="tabpanel" aria-labelledby="v-pills-view-tab">
									<div class="extra_ijyu98">
										<div class="extra_ijyu98_head">
											<h4>{{__('Your Social Networks')}}</h4>
										</div>
										<div class="extra_ijyu98_body">
											<h4>pronob</h4>
										</div>
									</div>
								</div>

                                <!-- Modal -->



							</div>
						</div>
					</div>

				</div>
			</section>
			<!-- ========================== Dashboard Elements ============================= -->

			<!-- ============================ Call To Action Start ================================== -->
			@includeIf('partials.theme-newsletter')
			<!-- ============================ Call To Action End ================================== -->

@endsection

@section('scripts')

<script src="{{ asset("assets/user/js/custom.js") }}"></script>

<script>
   $(document).on('click','#change_pass',function(e){

     $('#v-pills-password-tab').tab('show');
   });
</script>


@endsection
