@extends('layouts.master')
@section('css')
<style>
	@media print {
		#print_Button {
			display: none;
		}
	}
</style>
@endsection
@section('title')
معاينة طباعة الفاتورة
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ معاينة طباعة الفاتورة</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-md-12 col-xl-12">
						<div class=" main-content-body-invoice" id="print">
							<div class="card card-invoice">
								<div class="card-body">
									<div class="invoice-header">
										<h1 class="invoice-title">فاتورة تحصيل</h1>
										<div class="billed-from">
											<h6>Al Esraa Soft</h6>
											<p>201 Something St., Something Town, YT 242, Country 6546<br>
											Tel No: 0238629599<br>
											Email: {{Auth()->user()->name}}</p>
										</div><!-- billed-from -->
									</div><!-- invoice-header -->
									<div class="row mg-t-20">
										<div class="col-md">
											<label class="tx-gray-600">موجه الى</label>
											<div class="billed-to">
												<h6>{{ $invoices->Section_invoices->section_name }}</h6>
												<p>4033 Patterson Road, Staten Island, NY 10301<br>
												Tel No: 324 445-4544<br>
												Email: youremail@companyname.com</p>
											</div>
										</div>
										<div class="col-md">
											<label class="tx-gray-600">معلومات الفاتورة</label>
                                            <p class="invoice-info-row"><span>القسم:</span> <span>{{$invoices->Section_invoices->section_name}}</span></p>
											<p class="invoice-info-row"><span>رقم الفاتورة</span> <span>{{$invoices->invoice_number}}</span></p>
											<p class="invoice-info-row"><span> تاريخ الاصدار</span> <span>{{$invoices->invoice_Date}}</span></p>
											<p class="invoice-info-row"><span> تاريخ الاستحقاق:</span> <span>{{$invoices->Due_date}} </span></p>
										</div>
									</div>
									<div class="table-responsive mg-t-40">
										<table class="table table-invoice border text-md-nowrap mb-0">
											<thead>
												<th class="wd-20p"></th>
												<th class="wd-40p">المنتج</th>
												<th class="tx-center">مبلغ التحصيل</th>
												<th class="tx-right">مبلغ العمولة</th>
											</tr>
											</thead>
											<tbody>
												<tr>
													<td></td>
													<td class="tx-12">{{ $invoices->product }}</td>
													<td class="tx-center">{{ number_format($invoices->Amount_collection, 2) }}</td>
													<td class="tx-right">{{ number_format($invoices->Amount_Commission, 2) }}</td>
												</tr>
												<tr>
													<td class="valign-middle" colspan="2" rowspan="4">
														<td class="tx-right">نسبة الضريبة ({{$invoices->Rate_VAT}})</td>
														<td class="tx-right" colspan="2">{{ number_format($invoices->Value_VAT,2) }}</td>												
												</tr>
												<tr>
													<td class="tx-right">الخصم</td>
													<td class="tx-right" colspan="2">{{ number_format($invoices->Discount ,2)}}</td>
												</tr>
												<tr>
													<td class="tx-right tx-uppercase tx-bold tx-inverse"> الإجمالي شامل الضريبة</td>
												<td class="tx-right" colspan="2">
														<h4 class="tx-primary tx-bold">{{number_format($invoices->Total, 2)}}</h4>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
									<hr class="mg-b-40">
									<button class="btn btn-danger float-left mt-3 mr-2" id="print_Button" onclick="printDiv()">
										<i class="mdi mdi-printer ml-1"></i>Print
									</button>
								</div>
							</div>
						</div>
					</div><!-- COL-END -->
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>

{{-- print --}}
<script type="text/javascript">
	function printDiv() {
		var printContents = document.getElementById('print').innerHTML;
		var originalContents = document.body.innerHTML;
		// هنخلي منطقة الطباعة هي المنطقة اللي انا محددها للفاتورة
		document.body.innerHTML = printContents;
		window.print();
		// بعد ذلك هرجع الصفحة تاني علشان كل الصفحة تظهر في المتصفح
		document.body.innerHTML = originalContents;
		location.reload();
	}
</script>

@endsection