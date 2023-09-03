@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"><a href="">قائمة الفواتير</a></h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تفاصيل الفاتورة</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row opened -->
    <div class="row">
        @if (session()->has('deleteFiles'))
			<script>
				window.onload = function()
				{
					notif({
						msg: "تم حذف المرفق بنجاح",
						type: "success"
					})

				}
			</script>		
		@endif
        @if (session()->has('addFile'))
			<script>
				window.onload = function()
				{
					notif({
						msg: "تم إضافة المرفق بنجاح",
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
            <!-- div -->
            <div class="card mg-b-20" id="tabs-style2">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab4" class="nav-link active" data-toggle="tab">معلومات
                                                    الفاتورة</a></li>
                                            <li><a href="#tab5" class="nav-link" data-toggle="tab">حالات الدفع</a>
                                            </li>
                                            <li><a href="#tab6" class="nav-link" data-toggle="tab">المرفقات</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">


                                        <div class="tab-pane active" id="tab4">
                                            <div class="table-responsive mt-15">

                                                <table class="table table-striped" style="text-align:center">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">رقم الفاتورة</th>
                                                            <td>{{ $invoices->invoice_number }}</td>
                                                            <th scope="row">تاريخ الاصدار</th>
                                                            <td>{{ $invoices->invoice_Date }}</td>
                                                            <th scope="row">تاريخ الاستحقاق</th>
                                                            <td>{{ $invoices->Due_date }}</td>
                                                            <th scope="row">القسم</th>
                                                            <td>{{ $invoices->Section_invoices->section_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">المنتج</th>
                                                            <td>{{ $invoices->product }}</td>
                                                            <th scope="row">مبلغ التحصيل</th>
                                                            <td>{{ $invoices->Amount_collection }}</td>
                                                            <th scope="row">مبلغ العمولة</th>
                                                            <td>{{ $invoices->Amount_Commission }}</td>
                                                            <th scope="row">الخصم</th>
                                                            <td>{{ $invoices->Discount }}</td>
                                                        </tr>


                                                        <tr>
                                                            <th scope="row">نسبة الضريبة</th>
                                                            <td>{{ $invoices->Rate_VAT }}</td>
                                                            <th scope="row">قيمة الضريبة</th>
                                                            <td>{{ $invoices->Value_VAT }}</td>
                                                            <th scope="row">الاجمالي مع الضريبة</th>
                                                            <td>{{ $invoices->Total }}</td>
                                                            <th scope="row">الحالة الحالية</th>

                                                            @if ($invoices->Value_Status == 1)
                                                                <td><span
                                                                        class="badge badge-pill badge-success">{{ $invoices->Status }}</span>
                                                                </td>
                                                            @elseif($invoices->Value_Status ==2)
                                                                <td><span
                                                                        class="badge badge-pill badge-danger">{{ $invoices->Status }}</span>
                                                                </td>
                                                            @else
                                                                <td><span
                                                                        class="badge badge-pill badge-warning">{{ $invoices->Status }}</span>
                                                                </td>
                                                            @endif
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">المستخدم</th>
                                                            <td>{{ $invoices->user }}</td>
                                                            <th>ملاحظات</th>
                                                            <td>{{ $invoices->note }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- حالات الدفع -->
                                        <div class="tab-pane" id="tab5">
                                            <div class="table-responsive mt-15">
                                                <table class="table center-aligned-table mb-0 table-hover"
                                                    style="text-align:center">
                                                    <thead>
                                                        <tr class="text-dark">
                                                            <th>#</th>
                                                            <th>رقم الفاتورة</th>
                                                            <th>نوع المنتج</th>
                                                            <th>القسم</th>
                                                            <th>حالة الدفع</th>
                                                            <th>تاريخ الدفع </th>
                                                            <th>تاريخ الاضافة </th>
                                                            <th>المستخدم</th>
                                                            <th>ملاحظات</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @foreach ($details as $detail)
                                                            <tr>
                                                                <td>{{ $i++ }}</td>
                                                                <td>{{ $detail->invoice_number }}</td>
                                                                <td>{{ $invoices->product }}</td>
                                                                <td>{{ $invoices->Section_invoices->section_name }}</td>
                                                                @if ($detail->Value_Status == 1)
                                                                    <td><span
                                                                            class="badge badge-pill badge-success">{{ $detail->Status }}</span>
                                                                    </td>
                                                                @elseif($detail->Value_Status ==2)
                                                                    <td><span
                                                                            class="badge badge-pill badge-danger">{{ $detail->Status }}</span>
                                                                    </td>
                                                                @else
                                                                    <td><span
                                                                            class="badge badge-pill badge-warning">{{ $detail->Status }}</span>
                                                                    </td>
                                                                @endif
                                                                <td>{{ $detail->Payment_Date }}</td>
                                                                <td>{{ $detail->created_at }}</td>
                                                                <td>{{ $detail->user }}</td>
                                                                <td>{{ $detail->note }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!--المرفقات-->
                                        <div class="tab-pane" id="tab6">
                                            <div class="card card-statistics">
                                                <div class="card-body">
                                                    <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                                                    <h5 class="card-title">اضافة مرفقات</h5>
                                                    <form method="post" action="{{ route('addAttachments') }}"
                                                        enctype="multipart/form-data">
                                                        {{ csrf_field() }}

                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="customFile"
                                                                name="file_name" required>
                                                            <input type="hidden" id="customFile" name="invoice_number"
                                                                value="{{ $invoices->invoice_number }}">
                                                            <input type="hidden" id="invoices_id" name="invoices_id"
                                                                value="{{ $invoices->id }}">
                                                            <label class="custom-file-label" for="customFile"></label>
                                                        </div><br><br>
                                                        <button type="submit" class="btn btn-primary btn-sm "
                                                        name="uploadedFile">تاكيد</button>
                                                    </form>
                                                </div>
                                                <br>
                                                <div class="table-responsive mt-15">
                                                    <table class="table center-aligned-table mb-0 table table-hover"
                                                        style="text-align:center">
                                                        <thead>
                                                            <tr class="text-dark">
                                                                <th scope="col">م</th>
                                                                <th scope="col">اسم الملف</th>
                                                                <th scope="col">قام بالاضافة</th>
                                                                <th scope="col">تاريخ الاضافة</th>
                                                                <th scope="col">العمليات</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 0; ?>
                                                            @foreach ($attachments as $attachment)
                                                                <?php $i++; ?>
                                                                <tr>
                                                                    <td>{{ $i }}</td>
                                                                    <td>{{ $attachment->file_name }}</td>
                                                                    <td>{{ $attachment->user }}</td>
                                                                    <td>{{ $attachment->created_at }}</td>
                                                                    <td colspan="2">

                                                                        <a class="btn btn-outline-success btn-sm"
                                                                            href="{{ url('viewFiles') }}/{{ $invoices->invoice_number }}/{{ $attachment->file_name }}"
                                                                            role="button"><i
                                                                                class="fas fa-eye"></i>&nbsp;
                                                                            عرض
                                                                        </a>

                                                                        <a class="btn btn-outline-info btn-sm"
                                                                            href="{{ url('downloadFiles') }}/{{ $invoices->invoice_number }}/{{ $attachment->file_name }}"
                                                                            role="button"><i
                                                                                class="fas fa-download"></i>&nbsp;
                                                                            تحميل
                                                                        </a>

                                                                        <a class="btn btn-outline-danger btn-sm"
                                                                            data-toggle="modal"
                                                                            data-target="#delete_file"><i
                                                                                class="fa fa-trash"></i>&nbsp;
                                                                            حذف
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <!-- delete modal -->
                                                                <div class="modal fade" id="delete_file" tabindex="-1"
                                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">حذف المرفق</h5>
                                                                            </div>
                                                                            <form action="{{route('deleteFiles')}}" method="post">
                                                                                {{ csrf_field() }}
                                                                                <div class="modal-body">
                                                                                    <p class="text-center">
                                                                                    <h6 style="color:red">هل انت متاكد من عملية الحذف ؟</h6>
                                                                                    </p>
                                                                                    <input type="hidden" name="id"
                                                                                        value="{{ $attachment->id }}">
                                                                                    <input type="hidden" name="invoice_number"
                                                                                     value="{{ $invoices->invoice_number }}">    
                                                                                    <input class="form-control"
                                                                                        name="file_name" id="file_name"
                                                                                        type="text"
                                                                                        value="{{ $attachment->file_name }}"
                                                                                        readonly>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-dismiss="modal">الغاء</button>
                                                                                    <button type="submit"
                                                                                        class="btn btn-danger">تاكيد</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{-- end delete modal --}}
                                                            @endforeach
                                                        </tbody>
                                                        </tbody>
                                                    </table>
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
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.mCustomScrollbar js-->
    <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Internal Input tags js-->
    <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
    <!--- Tabs JS-->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
    <!--Internal  Clipboard js-->
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>

    {{-- INTERnal notify --}}
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>

     {{-- Add the following code if you want the name of the file appear on select --}}
    <script>
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection
