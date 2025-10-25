@extends('commonmodule::layouts.master')

@section('title')
    الأرقام التسلسلية
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/table/datatable/custom_dt_zero_config.css')}}"
          type="text/css">
@endsection

@section('content')

    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>الأرقام التسلسلية</h3>
                    <div class="crumbs">
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                            <li><a href="#">الأرقام التسلسلية</a></li>
                        </ul>
                    </div>
                </div>
                <div class="page-title" style="float:right">
                    <a class="mt-4 btn btn-button-16 mr-2"
                       href="{{route('skudo.serial-numbers.create')}}">
                        إضافة رقم تسلسلي جديد
                    </a>
                </div>
            </div>

            <div class="row" id="cancel-row">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <form action="{{ route('skudo.serial-numbers.index') }}">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <input type="text" name="search" class="form-control mb-3"
                                                       placeholder="البحث في الأرقام التسلسلية..."
                                                       value="{{ request('search') }}">
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="flaticon-search-1"></i> بحث
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4">
                                <table id="zero-config" class="table table-hover table-bordered" style="width:100%">
                                    <thead>
                                    <tr class="text-center">
                                        <th>رقم الصنف</th>
                                        <th>الباركود</th>
                                        <th>اسم الصنف (عربي)</th>
                                        <th>اسم الصنف (إنجليزي)</th>
                                        <th>الرقم التسلسلي</th>
                                        <th>تاريخ الإضافة</th>
                                        <th>حالة تسجيل الضمان</th>
                                        <th>حالة المطالبة</th>
                                        <th>حالة المطالبة</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($serialNumbers as $serialNumber)
                                        <tr class="text-center">
                                            <td>{{ $serialNumber->item_number ?? '-' }}</td>
                                            <td>{{ $serialNumber->barcode ?? '-' }}</td>
                                            <td>{{ $serialNumber->product_name_ar ?? '-' }}</td>
                                            <td>{{ $serialNumber->product_name_en ?? '-' }}</td>
                                            <td>{{ $serialNumber->product_serial ?? '-' }}</td>
                                            <td>{{ $serialNumber->formatted_created_at }}</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('skudo.serial-numbers.show', $serialNumber->id) }}" 
                                                       class="btn btn-info btn-sm" title="عرض">
                                                        <i class="flaticon-eye"></i>
                                                    </a>
                                                    <a href="{{ route('skudo.serial-numbers.edit', $serialNumber->id) }}" 
                                                       class="btn btn-warning btn-sm" title="تعديل">
                                                        <i class="flaticon-edit-1"></i>
                                                    </a>
                                                    <form action="{{ route('skudo.serial-numbers.destroy', $serialNumber->id) }}" 
                                                          method="POST" style="display: inline-block;" 
                                                          onsubmit="return confirm('هل أنت متأكد من حذف هذا الرقم التسلسلي؟')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" title="حذف">
                                                            <i class="flaticon-delete-1"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center">لا توجد أرقام تسلسلية</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            @if($serialNumbers->hasPages())
                                <div class="d-flex justify-content-center">
                                    {{ $serialNumbers->appends(request()->query())->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--  END CONTENT PART  -->

@endsection

@section('js')
    <script src="{{ asset('assets/admin/plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/table/datatable/custom_dt_zero_config.js') }}"></script>
@endsection