@extends('layouts.master')
@section('title')
قائمةالمنتجات
@endsection
@section('css')

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/قائمةالمنتجات</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
					<!--div-->
					@if (session()->has('add'))
					<script>
						window.onload = function() 
						{
							notif({
								msg: "تم اضافة المنتج بنجاح",
								type: "success"
							})
						}
					</script>
					</div>

				    @endif
			
			
				    @if (session()->has('edit'))
					<script>
						window.onload = function() {
							notif({
								msg: "تم تعديل المنتج بنجاح",
								type: "success"
							})
						}
					</script>
				    @endif
					@if (session()->has('delete'))
					<script>
						window.onload = function() {
							notif({
								msg: "تم حذف المنتج بنجاح",
								type: "success"
							})
						}
					</script>
				    @endif
					@if ($errors->any())
					   <div class="alert alert-danger alert-dismissible fade show"  role="alert">
						  <ul>
                              @foreach ($errors->all() as $error)
                              <li><strong>{{ $error }}</strong></li>
                              @endforeach
                          </ul>
						  <button type="button" class="close " data-dismiss="alert" aria-label="close">
							<span aria-hidden="true">&times;</span>
						   </button>
                       </div>

                    @endif
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<a class="modal-effect btn btn-primary " data-effect="effect-newspaper" data-toggle="modal" href="#modaldemo1">إضافة منتج</a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap key-buttons" id="example1" data-page-length="50">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">#</th>
										    	<th class="wd-10p border-bottom-0">اسم المنتج</th>
												<th class="wd-25p border-bottom-0">اسم القسم</th>
												<th class="wd-25p border-bottom-0">الوصف</th>
												<th class="wd-25p border-bottom-0">تمت الاضافة بواسطة</th>
												<th class="wd-25p border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody>
										<?php $i=1 ?>
										@foreach ($product_data as $product)
											<tr>
												<td>{{$i++}}</td>
												<td>{{$product->product_name}}</td>
												<td>{{$product->section->section_name}}</td>
												<td>{{$product->description}}</td>
												<td>{{$product->created_By}}</td>
												<td style="display: flex">
													<button class="modal-effect btn btn-sm btn-info"
													   data-name="{{$product->product_name}}"
													   data-pro_id="{{$product->id}}"
													   data-section_name="{{$product->section->section_name}}"
												       data-description="{{$product->description}}"
													   data-toggle="modal"
													   data-target="#edit"  title="تعديل">
													   <i class="las la-pen"></i>
													</button>
													<button class="modal-effect btn btn-sm btn-danger" 
													   data-pro_id="{{ $product->id }}"
													   data-product_name="{{ $product->product_name }}" 
													   data-toggle="modal"
													   data-target="#modaldemo9" title="حذف">
													   <i class="las la-trash"></i>
													</button>												</td>
											</tr>
										@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->
					<!-- add modal -->
					<div class="modal" id="modaldemo1">
						<div class="modal-dialog" role="document">
							<div class="modal-content modal-content-demo">
								<div class="modal-header">
									<h6 class="modal-title">إضافة منتج</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
								</div>
									 {{-- form --}}
									<form method="POST" action="{{url('product')}}"> 
										{{--'another way to write action action='{{route("product.store")}}' --}}
										@csrf
									    <div class="modal-body">
											<div class="form-group">
												<label for="exampleInputEmail1">اسم المنتج</label>
												<input type="text" name="product_name" class="form-control" id="product_name" aria-describedby="emailHelp" placeholder="من فضلك ادخل اسم المنتج">
											</div>
											<label class="my-1 mr-2" for="section_id">القسم</label>
											<select name="section_id" id="section_id" class="form-control" required>
												<option value="" selected disabled> --حدد القسم--</option>
												@foreach ($section_data as $data)
													<option value="{{ $data->id }}">{{ $data->section_name }}</option>
												@endforeach
											</select>
											<div class="form-group">
												<label for="exampleInputPassword1">الوصف</label>
												<textarea name="description" id="description" class="form-control"></textarea>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success" type="button">تأكيد الاضافة</button>
											<button class="btn btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
										</div>
									</form>	
					     			{{-- end form --}}
					    	</div>
						</div>
					</div>
				    <!-- End add modal -->	
					<!-- edit modal -->
					<div class="modal" id="edit">
						<div class="modal-dialog" role="document">
							<div class="modal-content modal-content-demo">
								<div class="modal-header">
									<h6 class="modal-title">تعديل المنتج</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
								</div>
									 {{-- form --}}
									<form method="POST" action='product/update'> 
										{{-- for small data we use {{ method_field('put') }} --}}
										{{ method_field('patch') }}
										@csrf
									    <div class="modal-body">
											<div class="form-group">
												<label for="exampleInputEmail1">اسم المنتج</label>
												<input type="text" name="product_name" class="form-control" id="product_name" aria-describedby="emailHelp" placeholder="من فضلك ادخل اسم المنتج">
												<input type="hidden" class="form-control" name="pro_id" id="pro_id" value="">
											</div>
											<label class="my-1 mr-2" for="section_id">القسم</label>
											{{-- class custom-select my-1 mr-sm-2 مهمة علشان يظهرلي القسم المختار--}}
											<select name="section_name" id="section_name" class="custom-select my-1 mr-sm-2" required>
												@foreach ($section_data as $data)
													<option>{{ $data->section_name }}</option>
												@endforeach
											</select>
											<div class="form-group">
												<label for="exampleInputPassword1">الوصف</label>
												<textarea name="description" id="description" class="form-control"></textarea>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success" type="button">تأكيد التعديل</button>
											<button class="btn btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
										</div>
									</form>	
					     			{{-- end form --}}
					    	</div>
						</div>
					</div>
				    <!-- End edit modal -->
				    <!-- delete modal -->
					<div class="modal fade" id="modaldemo9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
						aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">حذف المنتج</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form action="product/destroy" method="post">
									{{ method_field('delete') }}
									{{ csrf_field() }}
									<div class="modal-body">
										<p>هل انت متاكد من عملية الحذف ؟</p><br>
										<input type="hidden" name="pro_id" id="pro_id" value="">
										<input class="form-control" name="product_name" id="product_name" type="text" readonly>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
										<button type="submit" class="btn btn-danger">تاكيد</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					{{-- end delete modal --}}
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
{{-- modals action --}}
<script>
        $('#edit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var Product_name = button.data('name')
            var section_name = button.data('section_name')
            var pro_id = button.data('pro_id')
            var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #product_name').val(Product_name);
            modal.find('.modal-body #section_name').val(section_name);
            modal.find('.modal-body #description').val(description);
            modal.find('.modal-body #pro_id').val(pro_id);
        })
		$('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var pro_id = button.data('pro_id')
            var product_name = button.data('product_name')
            var modal = $(this)

            modal.find('.modal-body #pro_id').val(pro_id);
            modal.find('.modal-body #product_name').val(product_name);
        })
	</script>
	<!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection