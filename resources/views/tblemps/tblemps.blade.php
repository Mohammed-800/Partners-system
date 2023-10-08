@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Owl Carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <!---Internal  Multislider css-->
    <link href="{{ URL::asset('assets/plugins/multislider/multislider.css') }}" rel="stylesheet">
    <!--- Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('title')
    الموظفات
@stop

@section('page-header')
 <!-- بداية عنوان الصفحة -->
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    الموظفات</span>
            </div>
        </div>
    </div>
      <!-- نهاية عنوان الصفحة -->
    <!-- breadcrumb -->
@endsection
@section('content')
 <!-- بداية عرض رسائل النجاح والخطأ -->

    @if (session()->has('Add'))
     <!-- عرض رسالة نجاح إضافة موظف -->
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    @if (session()->has('Edit'))
     <!-- عرض رسالة نجاح تعديل موظف -->
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    @if (session()->has('delete'))
    <!-- عرض رسالة نجاح حذف موظف -->
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('Error'))
     <!-- عرض رسالة خطأ عامة -->
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
 <!-- نهاية عرض رسائل النجاح والخطأ -->

    <!-- بداية عرض البيانات -->

    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                                data-toggle="modal" href="#exampleModal">اضافة موظف</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'>
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">اسم الموظف</th>
                                    <th class="border-bottom-0">اسم الشركة</th>
                                    <th class="border-bottom-0">البريد الكتروني</th>
                                    <th class="border-bottom-0">رقم الهاتف</th>


                                    <th class="border-bottom-0">ملاحظات</th>
                                    <th class="border-bottom-0">العمليات</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($tblemps as $emp)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $emp->emp_name }}</td>
                                        
                                        <?php 
                                         // استعراض اسم الشركة باستخدام الاستعلام من قاعدة البيانات
                                        $mainpartnername = DB::table('mainpartners')->where('id', '=',$emp->mainpartner_id)->first()
                                      ?>
                                                                  <td>{{ $mainpartnername->name}}</td>
                                        <td>{{ $emp->emp_email }}</td>
                                        <td>{{ $emp->emp_PhoneNumber}}</td>
                                      
                                        <td>{{ $emp->emp_desc}}</td>
                                        <td>

                                                <button class="btn btn-outline-success btn-sm"
                                                    data-name="{{ $emp->emp_name }}" data-id="{{ $emp->id }}"
                                                    data-emp_email="{{ $emp->emp_email }}"
                                                    data-phone="{{ $emp->emp_PhoneNumber}}"

                                                    data-section_name="{{ $mainpartnername->name}}"
                                                    data-emp_desc="{{ $emp->emp_desc}}" data-toggle="modal"
                                                    data-target="#edit_emp">تعديل</button>
                                           

                                            
                                                <button class="btn btn-outline-danger btn-sm " data-id="{{ $emp->id }}"
                                                    data-emp_name="{{ $emp->emp_name }}" data-toggle="modal"
                                                    data-target="#modaldemo9">حذف</button>


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

         <!-- بداية نافذة الإضافة -->
        <!-- add -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">اضافة موظف</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('tblemps.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">اسم الموظف</label>
                                <input type="text" class="form-control" id="emp_name" name="emp_name" required>
                            </div>
                            <div class="form-group">
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">الشركة</label>
                            <select name="mainpartner_id" id="mainpartner_id" class="form-control" required>
                                <option value="" selected disabled> --حدد الشركة--</option>
                                @foreach ($mainpartners as $mainpartner)
                                    <option value="{{ $mainpartner->id }}">{{ $mainpartner->name }}</option>
                                @endforeach
                            </select>
                            
                            </div>
                            
                                <div class="form-group">
                                <label for="exampleInputEmail1"> البريد الكتروني</label>
                                <input type="email" class="form-control" id="emp_email" name="emp_email" required> 
                            
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> رقم الهاتف </label>
                                <input type="text" class="form-control" id="emp_PhoneNumber" name="emp_PhoneNumber" required> 
                            
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">ملاحظات</label>
                                <textarea class="form-control" id="emp_desc" name="emp_desc" rows="3"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">تاكيد</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- نهاية نافذة الإضافة -->

        <!-- بداية نافذة التعديل -->

        <!-- edit -->
        <div class="modal fade" id="edit_emp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تعديل موظف</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  
                    <form action="tblemps/update" method="post">
                    {{ method_field('patch') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                            <input type="hidden" name="id" id="id" value="">
                                <label for="exampleInputEmail1">اسم الموظف</label>
                                <input type="text" class="form-control" id="emp_name" name="emp_name" required>
                            </div>
                            <div class="form-group">
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">الشركة</label>
                            <select name="mainpartner_id" id="mainpartner_id" class="form-control" required>
                                <option value="" selected disabled> --حدد الشركة--</option>
                                @foreach ($mainpartners as $mainpartner)
                                    <option value="{{ $mainpartner->id }}">{{ $mainpartner->name }}</option>
                                @endforeach
                            </select>
                            
                            </div>
                            
                                <div class="form-group">
                                <label for="exampleInputEmail1"> البريد الكتروني</label>
                                <input type="email" class="form-control" id="emp_email" name="emp_email" required> 
                            
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> رقم الهاتف </label>
                                <input type="text" class="form-control" id="emp_PhoneNumber" name="emp_PhoneNumber" required> 
                            
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">ملاحظات</label>
                                <textarea class="form-control" id="emp_desc" name="emp_desc" rows="3"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">تاكيد</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
         <!-- نهاية نافذة التعديل -->

        <!-- بداية نافذة الحذف -->

        <!-- delete -->
        <div class="modal fade" id="modaldemo9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">حذف الموظف</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="tblemps/destroy" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>هل انت متاكد من عملية الحذف ؟</p><br>
                            <input type="hidden" name="id" id="id" value="">
                            <input class="form-control" name="emp_name" id="emp_name" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-danger">تاكيد</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
         <!-- نهاية نافذة الحذف -->


    </div>
     <!-- نهاية عرض البيانات -->
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
 <!-- تضمين ملفات الجافا سكريبت اللازمة -->
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
    <!-- تضمين ملف الجافا سكريبت الخاص بجداول البيانات -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <!-- Internal Prism js-->
     <!-- تضمين ملف الجافا سكريبت الخاص بالتظليل -->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>
    <!-- تضمين ملف الجافا سكريبت الخاص بالتقويم -->
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
     <!-- تضمين ملف الجافا سكريبت الخاص ب Select2 -->
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
     <!-- تضمين ملف الجافا سكريبت الخاص بالنوافذ المنبثقة -->
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>


    <script>
        // التعامل مع نافذة التعديل
        $('#edit_emp').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var emp_name = button.data('name')
            var emp_PhoneNumber = button.data('phone')
            var emp_email = button.data('emp_email')

            var section_name = button.data('section_name')
            var id = button.data('id')
            var emp_desc = button.data('emp_desc')
            var modal = $(this)
            modal.find('.modal-body #emp_name').val(emp_name);
            modal.find('.modal-body #emp_email').val(emp_email);
            modal.find('.modal-body #emp_PhoneNumber').val(emp_PhoneNumber);


            modal.find('.modal-body #section_name').val(section_name);
            modal.find('.modal-body #emp_desc').val(emp_desc);
            modal.find('.modal-body #id').val(id);
            alert(emp_PhoneNumber);
        })


        $('#modaldemo9').on('show.bs.modal', function(event) {
            // التعامل مع نافذة الحذف
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var emp_name = button.data('emp_name')
            var modal = $(this)

            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #emp_name').val(emp_name);
        })

    </script>

@endsection