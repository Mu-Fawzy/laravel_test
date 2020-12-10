@extends('layouts.admin.master')
@section('css')
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/admin/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
		<div class="my-auto">
			<div class="d-flex">
				<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Profile</span>
			</div>
		</div>
	</div>
	<!-- breadcrumb -->
@endsection

@section('content')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-lg-4">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="pl-0">
									<div class="main-profile-overview">
										<div class="main-img-user profile-user">
											<img alt="" src="{{URL::asset('assets/admin/img/faces/6.jpg')}}"><a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
										</div>
										<div class="d-flex justify-content-between mg-b-20">
											<div>
												<h5 class="main-profile-name">{{ $profile->admin->name }}</h5>
												<p class="main-profile-name-text">@if(auth()->guard('admin')->user()->name) {{ ucfirst ('admin') }} @endif</p>
											</div>
										</div>
										<hr class="mg-y-30">
										<label class="main-content-label tx-13 mg-b-20">Social</label>
										<div class="main-profile-social-list">
											<div class="media">
												<div class="media-icon bg-success-transparent text-success">
													<i class="icon ion-logo-twitter"></i>
												</div>
												<div class="media-body">
													<span>Twitter</span> <a href="{{ $profile->twitter }}">{{ $profile->twitter }}</a>
												</div>
											</div>
											<div class="media">
												<div class="media-icon bg-info-transparent text-info">
													<i class="icon ion-logo-facebook"></i>
												</div>
												<div class="media-body">
													<span>Facebook</span> <a href="{{ $profile->facebook }}">{{ $profile->facebook }}</a>
												</div>
											</div>
										</div>
									</div><!-- main-profile-overview -->
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="row row-sm">
							<div class="col-sm-12 col-xl-6 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-body">
										<div class="counter-status d-flex md-mb-0">
											<div class="counter-icon bg-primary-transparent">
												<i class="icon-book-open text-success"></i>
											</div>
											<div class="mr-auto">
												<h5 class="tx-13">Posts</h5>
												<h2 class="mb-0 tx-22 mb-1 mt-1">1,587</h2>
												<p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i>increase</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-xl-6 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-body">
										<div class="counter-status d-flex md-mb-0">
											<div class="counter-icon bg-primary-transparent">
												<i class="icon-pencil text-primary"></i>
											</div>
											<div class="mr-auto">
												<h5 class="tx-13">My Posts</h5>
												<h2 class="mb-0 tx-22 mb-1 mt-1">587</h2>
												<p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i>increase</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								@include('alerts.admin')
								<div class="tabs-menu ">
									<!-- Tabs -->
									<ul class="nav nav-tabs profile navtab-custom panel-tabs">
										<li class="active">
											<a href="#home" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="las la-user-circle tx-16 mr-1"></i></span> <span class="hidden-xs">ABOUT ME</span> </a>
										</li>
										<li class="">
											<a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-cog tx-16 mr-1"></i></span> <span class="hidden-xs">SETTINGS</span> </a>
										</li>
									</ul>
								</div>

								<div class="tab-content border-left border-bottom border-right border-top-0 p-4">
									<div class="tab-pane active" id="home">
										<h4 class="tx-15 text-uppercase mb-3">BIO</h4>
										{{ $profile->bio }}
									</div>
								
									<div class="tab-pane" id="settings">
										
										<div class="mb-4 main-content-label">Personal Information</div>
										<form class="form-horizontal" action="{{ route('user.profile.update',$profile->id) }}" method="POST">
											@csrf
											<div class="form-group ">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label">Gender<i>(required)</i></label>
													</div>
													<div class="col-md-9">
														<select name="gender" class="form-control select2 @error('gender') is-invalid @enderror">
															<option value="male" @if ($profile->gender == 'male') selected @endif>Male</option>
															<option value="female" @if ($profile->gender == 'female') selected @endif>Female</option>
														</select>
														@error('gender')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror
													</div>
												</div>
											</div>
											<div class="mb-4 main-content-label">Name</div>
											<div class="form-group ">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label">User Name<i>(required)</i></label>
													</div>
													<div class="col-md-9">
														<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="User Name" value="{{ $profile->admin->name }}">
														@error('name')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror

													</div>
												</div>
											</div>
											<div class="mb-4 main-content-label">Contact Info</div>
											<div class="form-group ">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label">Email<i>(required)</i></label>
													</div>
													<div class="col-md-9">
														<input type="email" class="form-control @error('email') is-invalid @enderror" name="email"  placeholder="Email" value="{{ $profile->admin->email }}">
														@error('email')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror
													</div>
												</div>
											</div>
											<div class="form-group ">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label">Phone<i>(required)</i></label>
													</div>
													<div class="col-md-9">
														<input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="phone number" value="{{ $profile->phone }}">
														@error('phone')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror
													</div>
												</div>
											</div>
											<div class="form-group ">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label">Address</label>
													</div>
													<div class="col-md-9">
														<textarea class="form-control" name="address" rows="2"  placeholder="Address">{{ $profile->address }}</textarea>
													</div>
												</div>
											</div>
											<div class="mb-4 main-content-label">Social Info</div>
											<div class="form-group ">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label">Twitter</label>
													</div>
													<div class="col-md-9">
														<input type="text" class="form-control" name="twitter" placeholder="twitter" value="{{ $profile->twitter }}">
													</div>
												</div>
											</div>
											<div class="form-group ">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label">Facebook</label>
													</div>
													<div class="col-md-9">
														<input type="text" class="form-control" name="facebook" placeholder="facebook" value="{{ $profile->facebook }}">
													</div>
												</div>
											</div>
											<div class="mb-4 main-content-label">About Yourself</div>
											<div class="form-group ">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label">Biographical Info</label>
													</div>
													<div class="col-md-9">
														<textarea class="form-control" name="bio" rows="4" placeholder="">{{ $profile->bio }}</textarea>
													</div>
												</div>
											</div>	
											<div class="mb-4 main-content-label text-left">
												<button type="submit" class="btn btn-primary waves-effect waves-light">Update Profile</button>
											</div>								
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/admin/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/admin/js/select2.js')}}"></script>
@endsection