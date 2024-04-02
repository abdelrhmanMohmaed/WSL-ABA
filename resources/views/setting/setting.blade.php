@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="card card-primary card-outline">

          <div class="card-body">
            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">

            	{{-- main settings --}}
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-setting" role="tab" aria-controls="custom-content-below-home" aria-selected="true">الإعدادات الأساسيه</a>
              </li>

               {{-- about app --}}
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-about" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">عن التطبيق</a>
              </li>

               {{-- about app --}}
			   <li class="nav-item">
                <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-why_us" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">لماذا نحن</a>
              </li>

               {{-- policy --}}
			   {{--  <li class="nav-item">
                <a class="nav-link" id="custom-content-below-policy-tab" data-toggle="pill" href="#custom-content-below-policy" role="tab" aria-controls="custom-content-below-profile" aria-selected="false"> الشروط والأحكام </a>
              </li>  --}}

              {{-- email and sms --}}
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">الإيميل والرسائل</a>
              </li>

               {{-- notifications --}}
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-settings-tab" data-toggle="pill" href="#custom-content-below-settings" role="tab" aria-controls="custom-content-below-settings" aria-selected="false">الإشعارات</a>
			  </li>

			  {{-- social --}}
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-social-tab" data-toggle="pill" href="#custom-content-below-social" role="tab" aria-controls="custom-content-below-social" aria-selected="false">مواقع التواصل الإجتماعي</a>
			  </li>
			  


            </ul>
            <div class="tab-content" id="custom-content-below-tabContent">

            	{{-- main settings --}}
              <div class="tab-pane fade show active" id="custom-content-below-setting" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
				<div class="row" style="margin-top: 10px">
					<!-- main setting -->
					<div class="col-md-6" style="border-left: 1px solid #cdcdcd">
						<div class="panel-body">
							<div class="card card-primary card-outline">
								<div class="card-header">
				                	<h5 class="m-0">إعدادات التطبيق</h5>
				              	</div>
				              	<div class="card-body">
									<form action="{{route('updatemainsetting')}}" method="post">
										{{csrf_field()}}
										<div class="form-group row">
											<div class="col-lg-4">
												<label class="control-label">الاسم :</label>
											</div>
											<div class="col-lg-8">
							                    <input type="text" name="name" class="form-control" value="{{$setting->name}}" id="exampleInputName" required="">
											</div>
										</div>

										<div class="form-group row">
											<div class="col-lg-4">
												<label class="control-label">البريد الإلكتروني :</label>
											</div>
											<div class="col-lg-8">
							                    <input type="text" name="email" class="form-control" value="{{$setting->email}}" id="exampleInputEmail">
											</div>
										</div>

										<div class="form-group row">
											<div class="col-lg-4">
												<label class="control-label">رقم الجوال:</label>
											</div>
											<div class="col-lg-8">
							                    <input type="text" name="phone" class="form-control" value="{{$setting->phone}}" id="exampleInputPhone">
											</div>
										</div>

										<div class="form-group row">
											<div class="col-lg-4">
												<label class="control-label"> مسافة الاقرب  :</label>
											</div>
											<div class="col-lg-8">
							                    <input type="number" name="dist" class="form-control" value="{{$setting->dist}}" required>
											</div>
										</div>

										<div class="form-group row">
											<div class="col-lg-4">
												<label class="control-label">  zoom  :</label>
											</div>
											<div class="col-lg-8">
							                    <input type="number" name="zoom" class="form-control" value="{{$setting->zoom}}" required>
											</div>
										</div>

										<div class="form-group row">
											<div class="col-lg-4">
												<label class="control-label">  longitude  :</label>
											</div>
											<div class="col-lg-8">
							                    <input type="text" name="longitude" class="form-control" value="{{$setting->longitude}}" required>
											</div>
										</div>

										<div class="form-group row">
											<div class="col-lg-4">
												<label class="control-label">  latitude  :</label>
											</div>
											<div class="col-lg-8">
							                    <input type="text" name="latitude" class="form-control" value="{{$setting->latitude}}" required>
											</div>
										</div>

										<div class="form-group row">
											<div class="col-lg-4">
												<label class="control-label"> عمولة التطبيق :</label>
											</div>
											<div class="col-lg-8">
							                    <input type="number" name="app_rate" class="form-control" step="any" value="{{$setting->app_rate}}" required>
											</div>
										</div>

										<div class="form-group row">
											<div class="col-lg-4">
												<label class="control-label"> العنوان بالعربية :</label>
											</div>
											<div class="col-lg-8">
							                    <input type="text" name="address_ar" class="form-control" step="any" value="{{$setting->address_ar}}" maxlength="500">
											</div>
										</div>

										<div class="form-group row">
											<div class="col-lg-4">
												<label class="control-label"> العنوان بالإنجليزية :</label>
											</div>
											<div class="col-lg-8">
							                    <input type="text" name="address_en" class="form-control" step="any" value="{{$setting->address_en}}" maxlength="500">
											</div>
										</div>

										<button class="btn btn-outline-primary" type="submit" style="margin-top: 10px">{{ __('messages.update') }}</button>
									</form>
				              	</div>
				            </div>
						</div>
					</div>

					{{-- copyrigth --}}
					<div class="col-md-6">
						<div class="panel-body">

							<div class="card card-primary card-outline">
								<div class="card-header">
				                	<h5 class="m-0">الحقوق</h5>
				              	</div>
				              	<div class="card-body">
									<form action="{{route('updatecopyrigth')}}" method="post">
										{{csrf_field()}}
										<div class="form-group">
						                    <label for="exampleInputCopyright">الحقوق</label>
						                    <textarea class="form-control " rows="8" name="copyrigth" id="exampleInputCopyright">{{$setting->copyrigth}}</textarea>
						                </div>
					                	<button class="btn btn-outline-primary" type="submit" style="margin-top: 10px">{{ __('messages.update') }}</button>
									</form>
				              	</div>
				            </div>

						</div>
					</div>

				</div>
              </div>

              {{-- about app --}}
              <div class="tab-pane fade" id="custom-content-below-about" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
  					<div class="panel-body">

							<div class="card card-primary card-outline" style="margin-top: 10px">
								<div class="card-header">
				                	<h5 class="m-0">عن التطبيق</h5>
				              	</div>
				              	<div class="card-body">
									<form action="{{route('updateaboutapp')}}" method="post">
										{{csrf_field()}}
										<div class="row">

											<div class="col-sm-6">
												<div class="form-group">
								                    <label for="exampleInputCopyrightAr">عن التطبيق عربي</label>
								                    <textarea class="form-control " rows="8" name="about_ar" id="exampleInputCopyrightAr" required="">{{$setting->about_ar}}</textarea>
								                </div>
											</div>

											<div class="col-sm-6">
												<div class="form-group">
								                    <label for="exampleInputCopyrightEn">عن التطبيق انجليزي</label>
								                    <textarea class="form-control " rows="8" name="about_en" id="exampleInputCopyrightEn" required="">{{$setting->about_en}}</textarea>
								                </div>
											</div>

										</div>

						                <button class="btn btn-outline-primary" type="submit" style="margin-top: 10px">{{ __('messages.update') }}</button>
									</form>
				              	</div>
				            </div>

					</div>
              </div>

              {{-- why us--}}
              <div class="tab-pane fade" id="custom-content-below-why_us" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
				<div class="panel-body">

					  <div class="card card-primary card-outline" style="margin-top: 10px">
						  <div class="card-header">
							  <h5 class="m-0">لماذا حائل</h5>
							</div>
							<div class="card-body">
							  <form action="{{route('updatewhyus')}}" method="post">
								  {{csrf_field()}}
								  <div class="row">

									  <div class="col-sm-6">
										  <div class="form-group">
											  <label for="exampleInputCopyrightAr">لماذا حائل بالعربية</label>
											  <textarea class="form-control " rows="8" name="why_us_ar" id="exampleInputCopyrightAr" required="">{{$setting->why_us_ar}}</textarea>
										  </div>
									  </div>

									  <div class="col-sm-6">
										  <div class="form-group">
											  <label for="exampleInputCopyrightEn">لماذا حائل بالإنجليزية</label>
											  <textarea class="form-control " rows="8" name="why_us_en" id="exampleInputCopyrightEn" required="">{{$setting->why_us_en}}</textarea>
										  </div>
									  </div>

								  </div>

								  <button class="btn btn-outline-primary" type="submit" style="margin-top: 10px">{{ __('messages.update') }}</button>
							  </form>
							</div>
					  </div>

			  </div>
		</div>

              {{-- policy --}}
              <div class="tab-pane fade" id="custom-content-below-policy" role="tabpanel" aria-labelledby="custom-content-below-policy-tab">
				<div class="panel-body">

					  <div class="card card-primary card-outline" style="margin-top: 10px">
						  <div class="card-header">
							  <h5 class="m-0"> الشروط والأحكام </h5>
							</div>
							<div class="card-body">
							  <form action="{{route('updatepolicy')}}" method="post">
								  {{csrf_field()}}
								  <div class="row">

									  <div class="col-sm-6">
										  <div class="form-group">
											  <label for="exampleInputCopyrightAr">الشروط والأحكام عربي</label>
											  <textarea class="form-control " rows="8" name="policy_ar" id="exampleInputCopyrightAr" required="">{{$setting->policy_ar}}</textarea>
										  </div>
									  </div>

									  <div class="col-sm-6">
										  <div class="form-group">
											  <label for="exampleInputCopyrightEn">الشروط والأحكام انجليزي</label>
											  <textarea class="form-control " rows="8" name="policy_en" id="exampleInputCopyrightEn" required="">{{$setting->policy_en}}</textarea>
										  </div>
									  </div>

								  </div>

								  <button class="btn btn-outline-primary" type="submit" style="margin-top: 10px">{{ __('messages.update') }}</button>
							  </form>
							</div>
					  </div>

			  </div>
			</div>

              {{-- email and sms --}}
              <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
				<div class="row" style="margin-top: 10px">

					<!-- smtp -->
					<div class="col-md-6" style="border-left: 1px solid #cdcdcd">
						<div class="panel-body">
							<div class="card card-primary card-outline">
								<div class="card-header">
				                	<h5 class="m-0">إعدادات الإيميل</h5>
				              	</div>
				              	<div class="card-body">
									<form action="{{route('updatesmtp')}}" method="post">
										{{csrf_field()}}
										<div class="form-group row">
											<div class="col-lg-4">
												<label class="control-label">النوع :</label>
											</div>
											<div class="col-lg-8">
												<input type="text" name="smtp_type" value="{{$configration->smtp_type}}" placeholder="النوع" class="form-control">
											</div>
										</div>

										<div class="form-group row">
											<div class="col-lg-4">
												<label class="control-label">اسم المستخدم :</label>
											</div>
											<div class="col-lg-8">
												<input type="text" name="smtp_username" value="{{$configration->smtp_username}}" placeholder="اسم المستخدم" class="form-control">
											</div>
										</div>

										<div class="form-group row">
											<div class="col-lg-4">
												<label class="control-label">الرقم السرى :</label>
											</div>
											<div class="col-lg-8">
												<input type="text" name="smtp_password" value="{{$configration->smtp_password}}" placeholder="الرقم السرى" class="form-control">
											</div>
										</div>

										<div class="form-group row">
											<div class="col-lg-4">
												<label class="control-label">الايميل المرسل :</label>
											</div>
											<div class="col-lg-8">
												<input type="text" name="smtp_sender_email" value="{{$configration->smtp_sender_email}}" placeholder="الايميل المرسل" class="form-control">
											</div>
										</div>

										<div class="form-group row">
											<div class="col-lg-4">
												<label class=" control-label">الاسم المرسل :</label>
											</div>
											<div class="col-lg-8">
												<input type="text" name="smtp_sender_name" value="{{$configration->smtp_sender_name}}" placeholder="الاسم المرسل" class="form-control">
											</div>
										</div>

										<div class="form-group row">
											<div class="col-lg-4">
												<label class="control-label">البورت :</label>
											</div>
											<div class="col-lg-8">
												<input type="number" name="smtp_port" value="{{$configration->smtp_port}}" placeholder="البورت" class="form-control">
											</div>
										</div>

										<div class="form-group row">
											<div class="col-lg-4">
												<label class="control-label">الهوست :</label>
											</div>
											<div class="col-lg-8">
												<input type="text" name="smtp_host" value="{{$configration->smtp_host}}" placeholder="الهوست" class="form-control">
											</div>
										</div>

										<div class="form-group row">
											<div class="col-lg-4">
												<label class=" control-label">التشفير :</label>
											</div>
											<div class="col-lg-8">
												<input type="text" value="{{$configration->smtp_encryption}}" name="smtp_encryption" placeholder="التشفير" class="form-control">
											</div>
										</div>

										<button class="btn btn-outline-primary" type="submit" style="margin-top: 10px">{{ __('messages.update') }}</button>
									</form>
				              	</div>
							</div>
						</div>
					</div>

					{{-- sms --}}
					<div class="col-md-6">
						<div class="panel-body">

							<div class="card card-primary card-outline">
				              <div class="card-header">
				                <h5 class="m-0">إعدادات الرسائل</h5>
				              </div>
				              <div class="card-body">
								<form action="{{route('updatesms')}}" method="post">
									{{csrf_field()}}
									<div class="form-group row">
										<div class="col-lg-4">
											<label class="control-label">رقم الهاتف :</label>
										</div>
										<div class="col-lg-8">
											<input type="number" name="sms_number" value="{{$configration->sms_number}}" placeholder="رقم الهاتف" class="form-control">
										</div>
									</div>

									<div class="form-group row">
										<div class="col-lg-4">
											<label class="control-label">الرقم السرى :</label>
										</div>
										<div class="col-lg-8">
											<input type="text" name="sms_password" value="{{$configration->sms_password}}" placeholder="الرقم السرى" class="form-control">
										</div>
									</div>

									<div class="form-group row">
										<div class="col-lg-4">
											<label class=" control-label">اسم الراسل :</label>
										</div>
										<div class="col-lg-8">
											<input type="text" value="{{$configration->sms_sender_name}}" name="sms_sender_name" placeholder="اسم الراسل " class="form-control">
										</div>
									</div>

									<button class="btn btn-outline-primary" type="submit" style="margin-top: 10px">{{ __('messages.update') }}</button>
								</form>
				              </div>
				            </div>

						</div>
					</div>

				</div> 
              </div>
			  {{-- social --}}
		<div class="tab-pane fade" id="custom-content-below-social" role="tabpanel" aria-labelledby="custom-content-below-social-tab">
			<div class="row" style="margin-top: 10px">
				<!-- main setting -->
				<div class="col-md-12">
					<div class="panel-body">
						<div class="card card-primary card-outline">
							<div class="card-header">
							<h5 class="m-0" style="display: inline;"> قائمة  مواقع التواصل للدليل</h5>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-social" style="float: left;">
								إضافة موقع 
								<i class="fas fa-plus"></i>
							</button>
							</div>
							<div class="card-body">
							<table id="example1" class="table table-bordered table-hover table-striped">
								<thead>
								<tr>
								<th>#</th>
								<th>الصورة</th>
								<th>إسم الموقع</th>
								<th>التاريخ</th>
								<th>التحكم</th>
								</tr>
								</thead>
								<tbody>
								@foreach($social as $key => $value)
									<tr>
									<td>{{$key+1}}</td>
									<td><img src="{{$value->social_icon}}" style="width:50px"></td>
									<td>{{$value->social_name}}</td>
									<td> <span class="badge badge-success">{{Date::parse($value->created_at)->diffForHumans()}}</span></td>
									<td>
										<a href="" 
										class="btn btn-info btn-sm edit_media"
										data-toggle="modal"
										data-target="#modal-media"
										data-id    = "{{$value->id}}"
										data-name  = "{{$value->social_name}}"
										data-icon  = "{{$value->social_icon}}"
										>  تعديل <i class="fas fa-edit"></i></a>
										<form action="{{route('Deletesocial')}}" method="post" style="display: inline-block;">
											{{csrf_field()}}
											<input type="hidden" name="social_id" value="{{$value->id}}">
											<button class="btn btn-danger btn-sm delete" type="submit">  حذف <i class="fas fa-trash"></i></button>
										</form>
									</td>
									</tr>
								@endforeach
								</tfoot>
							</table>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			{{-- add social modal --}}
			<div class="modal fade" id="modal-social">
				<div class="modal-dialog">
				<div class="modal-content bg-primary">
					<div class="modal-header">
					<h4 class="modal-title">إضافة موقع  جديد</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
					<form action="{{route('Storesocial')}}" method="post">
							{{csrf_field()}}
							<label>إسم الموقع</label> <span class="text-danger">*</span>
							<input type="text" name="social_name" class="form-control" placeholder="إسم الموقع " required="" style="margin-bottom: 10px">
							<label>الصوره (url) </label> <span class="text-danger">*</span>
							<input type="text" name="social_icon" class="form-control" placeholder="url" required="" style="margin-bottom: 10px">
							<button type="submit" id="submit1" style="display: none;"></button>
					</form>
					</div>
					<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-outline-light social">حفظ</button>
					<button type="button" class="btn btn-outline-light" data-dismiss="modal">إغلاق</button>
					</div>
				</div>
				</div>
			</div>


			{{-- edit social modal --}}
			<div class="modal fade" id="modal-media">
				<div class="modal-dialog">
				<div class="modal-content bg-info">
					<div class="modal-header">
					<h4 class="modal-title">تعديل الموقع : <span class="item_name1"></span></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
					<form action="{{route('socialUpdate')}}" method="post">
							{{csrf_field()}}
							<input type="hidden" name="edit_social_id" value="">
							<label>إسم الموقع</label> <span class="text-danger">*</span>
							<input type="text" name="edit_social_name" class="form-control" required="" style="margin-bottom: 10px">
							<label>الصوره (url) </label> <span class="text-danger">*</span>
							<input type="text" name="edit_social_icon" class="form-control" placeholder="url" required="" style="margin-bottom: 10px">
							<button type="submit" id="update1" style="display: none;"></button>
					</form>
					</div>
					<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-outline-light media">{{ __('messages.update') }}</button>
					<button type="button" class="btn btn-outline-light" data-dismiss="modal">إغلاق</button>
					</div>
				</div>
				</div>
			</div>
		

              {{-- notifications --}}
              <div class="tab-pane fade" id="custom-content-below-settings" role="tabpanel" aria-labelledby="custom-content-below-settings-tab">
				<div class="row" style="margin-top: 10px">
					<!-- main setting -->
					<div class="col-md-6" style="border-left: 1px solid #cdcdcd">
						<div class="panel-body">
							<div class="card card-primary card-outline">
								<div class="card-header">
				                	<h5 class="m-0">one signal</h5>
				              	</div>
				              	<div class="card-body">
									<form action="{{route('updateonesignal')}}" method="post">
										{{csrf_field()}}
										<div class="form-group row">
											<div class="col-lg-4">
												<label class="control-label">application ID :</label>
											</div>
											<div class="col-lg-8">
												<input type="text" name="oneSignal_application_id" value="{{$configration->oneSignal_application_id}}" placeholder="application ID" class="form-control" >
											</div>
										</div>

										<div class="form-group row">
											<div class="col-lg-4">
												<label class="control-label">authorization :</label>
											</div>
											<div class="col-lg-8">
												<input type="text" name="oneSignal_authorization" value="{{$configration->oneSignal_authorization}}" placeholder="authorization" class="form-control" >
											</div>
										</div>

										<button class="btn btn-outline-primary" type="submit" style="margin-top: 10px">{{ __('messages.update') }}</button>
									</form>
				              	</div>
							</div>
						</div>
					</div>

				
					{{-- sms --}}
					<div class="col-md-6">
						<div class="panel-body">

							<div class="card card-primary card-outline">
				              <div class="card-header">
				                <h5 class="m-0">FCM</h5>
				              </div>
				              <div class="card-body">
								<form action="{{route('updatefcm')}}" method="post">
									{{csrf_field()}}
									<div class="form-group row">
										<div class="col-lg-4">
											<label class="control-label">server key :</label>
										</div>
										<div class="col-lg-8">
											<input type="text" name="fcm_server_key" value="{{$configration->fcm_server_key}}" placeholder=" server key" class="form-control">
										</div>
									</div>

									<div class="form-group row">
										<div class="col-lg-4">
											<label class="control-label">sender id :</label>
										</div>
										<div class="col-lg-8">
											<input type="text" name="fcm_sender_id" value="{{$configration->fcm_sender_id}}" placeholder="sender id" class="form-control">
										</div>
									</div>

									<button class="btn btn-outline-primary" type="submit" style="margin-top: 10px">{{ __('messages.update') }}</button>
								</form>
				              </div>
				            </div>

						</div>
					</div>

				</div> 
			  </div>

            
            </div>

          </div>
          <!-- /.card -->
		</div>

		
        {{-- add modal --}}
		<div class="modal fade" id="modal-primary">
			<div class="modal-dialog">
			  <div class="modal-content bg-primary">
				<div class="modal-header">
				  <h4 class="modal-title">إضافة قيمة جديدة</h4>
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
				  <form action="{{route('storedynamicsetting')}}" method="post">
						{{csrf_field()}}
						<div class="row">
							<div class="col-sm-6">
								<label>المفتاح</label> <span class="text-danger">*</span>
								<input type="text" name="key" class="form-control" placeholder="إسم المفتاح " required="" >
							</div>
							<div class="col-sm-6">
								<label> القيمة </label> <span class="text-danger">*</span>
								<input type="text" name="value" class="form-control" placeholder="القيمة" required="" >
							</div>
						</div>
						<button type="submit" id="submit" style="display: none;"></button>
				  </form>
				</div>
				<div class="modal-footer justify-content-between">
				  <button type="button" class="btn btn-outline-light save">حفظ</button>
				  <button type="button" class="btn btn-outline-light" data-dismiss="modal">إغلاق</button>
				</div>
			  </div>
			</div>
		  </div>
	
	
		
		  {{-- edit modal --}}
		<div class="modal fade" id="modal-update">
			<div class="modal-dialog">
				<div class="modal-content bg-info">
				<div class="modal-header">
					<h4 class="modal-title">تعديل قيمة : <span class="item_name"></span></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<form action="{{route('updatedynamicsetting')}}" method="post">
						{{csrf_field()}}
						<input type="hidden" type="text" name="edit_id" value="">
						<div class="row">
							<div class="col-sm-6">
								<label>المفتاح</label> <span class="text-danger">*</span>
								<input type="text" name="edit_key" class="form-control" placeholder="إسم المفتاح " required="" >
							</div>
							<div class="col-sm-6">
								<label> القيمة </label> <span class="text-danger">*</span>
								<input type="text" name="edit_value" class="form-control" placeholder="القيمة" required="" >
							</div>
						</div>
						<button type="submit" id="update" style="display: none;"></button>
					</form>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-outline-light update">{{ __('messages.update') }}</button>
					<button type="button" class="btn btn-outline-light" data-dismiss="modal">إغلاق</button>
				</div>
				</div>
			</div>
		</div>
	

</div>
@endsection

@section('script')
<script type="text/javascript">
    // add 
    $('.save').on('click',function(){
        $('#submit').click();
	})
	
    // update 
    $('.update').on('click',function(){
        $('#update').click();
    })

    //edit 
    $('.edit').on('click',function(){
        var id        = $(this).data('id')
        var key       = $(this).data('key')
        var value     = $(this).data('value')
        
        $('.item_name').text(key)
        $("input[name='edit_id']")    .val(id)
        $("input[name='edit_key']")   .val(key)
        $("input[name='edit_value']") .val(value)
    })

	// add social
	$('.social').on('click',function(){
        $('#submit1').click();
    })

    //edit social
    $('.edit_media').on('click',function(){
        var id         = $(this).data('id')
        var name       = $(this).data('name')
        var icon       = $(this).data('icon')
        
        $('.item_name1').text(name)
        $("input[name='edit_social_id']").val(id)
        $("input[name='edit_social_name']").val(name)
        $("input[name='edit_social_icon']").val(icon)
    })

    // update social
    $('.media').on('click',function(){
        $('#update1').click();
    })

</script>
@endsection