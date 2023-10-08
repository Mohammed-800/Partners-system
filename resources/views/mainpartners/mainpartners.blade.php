@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
     <!-- تضمين CSS الخاصة بالجدول والمكونات الأخرى -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@section('title')
    الشركاء
@stop

@endsection
@section('page-header')
<!-- breadcrumb -->
<!-- العنوان والتصفح -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                الشركاء</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- عرض الرسائل -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session()->has('Add'))
 <!-- عرض رسالة النجاح عند إضافة شيء جديد -->
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('Add') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session()->has('delete'))
 <!-- عرض رسالة الخطأ عند حدوث خطأ في الحذف -->
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('delete') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session()->has('edit'))
<!-- عرض رسالة النجاح عند تحديث بيانات شيء ما -->
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('edit') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<!-- عرض البيانات في الجدول -->
<!-- row -->
<div class="row">


    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                            data-toggle="modal" href="#modaldemo8">اضافة شريك</a>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">اسم الشريك</th>
                                <th class="border-bottom-0"> البريد الالكتروني</th>

                                <th class="border-bottom-0">الوصف</th>
                                <th class="border-bottom-0">رقم الهاتف</th>
                                <th class="border-bottom-0"> المنشاء</th>


                                <th class="border-bottom-0">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($mainpartners as $x)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $x->name }}</td>
                                    <td>{{ $x->email }}</td>
                                    <td>{{ $x->desc }}</td>
                                    <td>{{ $x->PhoneNumber }}</td>
                                    <td>{{ $x->Created_by }}</td>


                                    <td>
                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                data-id="{{ $x->id }}" data-name="{{ $x->name }}"
                                                data-desc="{{ $x->desc }}"
                                                data-email="{{ $x->email }}"
                                                data-phone="{{ $x->PhoneNumber }}"


												 data-toggle="modal"
                                                href="#exampleModal2" title="تعديل"><i class="las la-pen"></i></a>

                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-id="{{ $x->id }}" data-name="{{ $x->name }}"
                                                data-toggle="modal" href="#modaldemo9" title="حذف"><i
                                                    class="las la-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- إضافة شريك - نافذة مودال -->


    <div class="modal" id="modaldemo8">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">اضافة شريك</h6><button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('mainpartners.store') }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="exampleInputEmail1">اسم الشريك</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
						<div class="form-group">
                            <label for="exampleInputEmail2">البريد الالكتروني</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>

						<div class="form-group">
                            <label for="exampleInputEmail1"> رقم الهاتف</label>
                            <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">ملاحظات</label>
                            <textarea class="form-control" id="description" name="desc" rows="3"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">تاكيد</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Basic modal -->
        <!-- نهاية نافذة مودال لإضافة شريك -->

        <!-- تعديل شريك - نافذة مودال -->


    </div>
    <!-- تعديل شريك - نافذة مودال -->
    <!-- edit -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل الشريك</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="mainpartners/update" method="post" autocomplete="off">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="">
                            <label for="recipient-name" class="col-form-label">اسم الشريك:</label>
                            <input class="form-control" name="name" id="name" type="text">
                        </div>
						<div class="form-group">
                            <input type="hidden" name="id" id="id" value="">
                            <label for="recipient-name" class="col-form-label"> البريد الالكتروني:</label>
                            <input class="form-control" name="email" id="email" type="email">
                        </div>

						<div class="form-group">
                            <input type="hidden" name="id" id="id" value="">
                            <label for="recipient-name" class="col-form-label"> رقم الهاتف :</label>
                            <input class="form-control" name="phone" id="phone" type="text">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">ملاحظات:</label>
                            <textarea class="form-control" id="desc" name="desc"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">تاكيد</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                </div>
                </form>
            </div>
        </div>
    </div>
 <!-- نهاية نافذة مودال لتعديل شريك -->

    <!-- حذف شريك - نافذة مودال -->
    <!-- delete -->
    <div class="modal" id="modaldemo9">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف الشريك</h6><button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="mainpartners/destroy" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="name" id="name" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
            </div>
            </form>
        </div>
         <!-- نهاية نافذة مودال لحذف شريك -->
    </div>




    <!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<!-- تضمين مكتبات الجداول والمودالات -->
<!-- Internal Data tables -->
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<!-- السكريبت الخاص بإعدادات الجدول والمودال -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>

<script>
    // ملء البيانات في نافذة تعديل الشريك
    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var desc = button.data('desc')
        var email = button.data('email')
        var phone = button.data('phone')


        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #desc').val(desc);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #phone').val(phone);

    })

</script>

<script>
    // ملء البيانات في نافذة حذف الشريك
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var section_name = button.data('name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(section_name);
    })

</script>

@endsection