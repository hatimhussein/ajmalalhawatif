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
                    @can('add_skudo_serial_numbers')
                        <a class="mt-4 btn btn-button-16 mr-2"
                           href="{{route('skudo.serial-numbers.create')}}">
                            إضافة رقم تسلسلي جديد
                        </a>
                    @endcan
                </div>
            </div>

            <div class="row" id="cancel-row">
                
                <!-- Display Success/Error Messages -->
                @if(session('success'))
                    <div class="col-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>نجح!</strong> {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="col-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>خطأ!</strong> {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row mt-5">
                                <div class="col-md-9">
                                    <form action="{{ route('skudo.serial-numbers.index') }}" id="search-form">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <input type="text" name="search" class="form-control mb-3"
                                                       placeholder="البحث في الأرقام التسلسلية..."
                                                       value="{{ request('search') }}">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="flaticon-search-1"></i> بحث
                                                </button>
                                            </div>
                                            <div class="col-md-2">
                                                @can('add_skudo_serial_numbers')
                                                    <a href="{{ route('skudo.serial-numbers.import') }}" class="btn btn-primary">
                                                        <i class="flaticon-upload"></i> استيراد
                                                    </a>
                                                @endcan
                                            </div>
                                            <div class="col-md-3">
                                                @can('show_skudo_serial_numbers')
                                                    <a href="{{ route('skudo.serial-numbers.export', ['search' => request('search')]) }}" 
                                                       class="btn btn-info" 
                                                       data-toggle="tooltip" 
                                                       data-placement="top" 
                                                       title="تصدير جميع الأرقام التسلسلية إلى CSV (يمكن فتحه في Excel)">
                                                        <i class="flaticon-download"></i> تصدير CSV
                                                    </a>
                                                @endcan
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
                                        <th>#</th>
                                        <th>رقم الصنف</th>
                                        <th>الباركود</th>
                                        <th>اسم الصنف (عربي)</th>
                                        <th>اسم الصنف (إنجليزي)</th>
                                        <th>الرقم التسلسلي</th>
                                        <th>تاريخ الإضافة</th>
                                        <th>رقم تسجيل الضمان وحالته</th>
                                        <th>حالة المطالبة</th>
                                        <th>قيمة التعويض - رقم الاعتماد</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($serialNumbers as $serialNumber)
                                        <tr class="text-center">
                                            <td>{{ ($serialNumbers->currentPage() - 1) * $serialNumbers->perPage() + $loop->iteration }}</td>
                                            <td>{{ $serialNumber->item_number ?? '-' }}</td>
                                            <td>{{ $serialNumber->barcode ?? '-' }}</td>
                                            <td>{{ $serialNumber->product_name_ar ?? '-' }}</td>
                                            <td>{{ $serialNumber->product_name_en ?? '-' }}</td>
                                            <td>{{ $serialNumber->product_serial ?? '-' }}</td>
                                            <td>{{ $serialNumber->formatted_created_at }}</td>
                                            <td>
                                                @if($serialNumber->insurance)
                                                    <div class="d-flex flex-column">
                                                        @can('update_skudo_insurance')
                                                        <a href="{{ route('skudo.insurance.edit', $serialNumber->insurance->id) }}" 
                                                           class="badge badge-primary mb-1 text-decoration-none">#{{ $serialNumber->insurance->id }}</a>
                                                        @endcan
                                                        <span class="badge 
                                                            @if($serialNumber->insurance->status == 0) badge-secondary
                                                            @elseif($serialNumber->insurance->status == 1) badge-success
                                                            @elseif($serialNumber->insurance->status == 2) badge-danger
                                                            @elseif($serialNumber->insurance->status == 3) badge-warning
                                                            @else badge-light @endif">
                                                            @if($serialNumber->insurance->status == 0) جديد
                                                            @elseif($serialNumber->insurance->status == 1) مفعل
                                                            @elseif($serialNumber->insurance->status == 2) مرفوض
                                                            @elseif($serialNumber->insurance->status == 3) قيد المراجعة
                                                            @else غير محدد @endif
                                                        </span>
                                                    </div>
                                                @else
                                                    <span class="text-muted">غير مستخدم</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($serialNumber->insurance && $serialNumber->insurance->warranties->count() > 0)
                                                    @php
                                                        $latestWarranty = $serialNumber->insurance->warranties->sortByDesc('created_at')->first();
                                                    @endphp
                                                    <div class="d-flex flex-column">
                                                        @can('update_skudo_warranty')
                                                        <a href="{{ route('skudo.warranty.edit', $latestWarranty->id) }}" 
                                                           class="badge badge-info mb-1 text-decoration-none">#{{ $latestWarranty->id }}</a>
                                                        @endcan
                                                        <span class="badge 
                                                            @if($latestWarranty->is_applicable == 1) badge-success
                                                            @elseif($latestWarranty->is_applicable == 2) badge-warning
                                                            @elseif($latestWarranty->is_applicable == null) badge-secondary
                                                            @else badge-danger @endif">
                                                            @if($latestWarranty->is_applicable == 1) يشمل الضمان
                                                            @elseif($latestWarranty->is_applicable == 2) معلق
                                                            @elseif($latestWarranty->is_applicable == null) جديد
                                                            @else لا يشمل الضمان @endif
                                                        </span>
                                                    </div>
                                                @elseif($serialNumber->insurance)
                                                    <span class="text-muted">لا توجد مطالبات</span>
                                                @else
                                                    <span class="text-muted">غير مستخدم</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($serialNumber->insurance && $serialNumber->insurance->warranties->count() > 0)
                                                    @php
                                                        $latestWarranty = $serialNumber->insurance->warranties->sortByDesc('created_at')->first();
                                                    @endphp
                                                    <div class="d-flex flex-column">
                                                        @if($latestWarranty->value && $latestWarranty->currency)
                                                            <span class="badge badge-success mb-1">
                                                                {{ number_format($latestWarranty->value, 2) }} {{ $latestWarranty->currency->code ?? '' }}
                                                            </span>
                                                        @else
                                                            <span class="text-muted small">لا توجد قيمة</span>
                                                        @endif
                                                        
                                                        @if($latestWarranty->application_number)
                                                            <span class="badge badge-info">
                                                                رقم الاعتماد: {{ $latestWarranty->application_number }}
                                                            </span>
                                                        @else
                                                            <span class="text-muted small">لا يوجد رقم اعتماد</span>
                                                        @endif
                                                    </div>
                                                @elseif($serialNumber->insurance)
                                                    <span class="text-muted">لا توجد مطالبات</span>
                                                @else
                                                    <span class="text-muted">غير مستخدم</span>
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="table-controls">
                                                    @can('show_skudo_serial_numbers')
                                                        <li>
                                                            <a href="{{ route('skudo.serial-numbers.show', $serialNumber->id) }}" 
                                                               class="btn btn-info p-0" data-toggle="tooltip" data-placement="top" title="عرض">
                                                                <i class="flaticon-view bg-info p-1 text-white br-6 mb-1"></i>
                                                            </a>
                                                        </li>
                                                    @endcan
                                                    @can('update_skudo_serial_numbers')
                                                        <li>
                                                            <a href="{{ route('skudo.serial-numbers.edit', $serialNumber->id) }}" 
                                                               class="btn btn-warning p-0" data-toggle="tooltip" data-placement="top" title="تعديل">
                                                                <i class="flaticon-edit bg-warning p-1 text-white br-6 mb-1"></i>
                                                            </a>
                                                        </li>
                                                    @endcan
                                                    @can('delete_skudo_serial_numbers')
                                                        @if(!$serialNumber->insurance)
                                                            <li>
                                                                <form class="inline" action="{{ route('skudo.serial-numbers.destroy', $serialNumber->id) }}" 
                                                                      method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا الرقم التسلسلي؟')">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger p-0" data-toggle="tooltip" data-placement="top" title="حذف">
                                                                        <i class="flaticon-delete bg-danger p-1 text-white br-6"></i>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <button class="btn btn-danger p-0" data-toggle="tooltip" data-placement="top" title="لا يمكن الحذف - مرتبط بضمان" disabled>
                                                                    <i class="flaticon-delete bg-danger p-1 text-white br-6"></i>
                                                                </button>
                                                            </li>
                                                        @endif
                                                    @endcan
                                                </ul>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11" class="text-center">لا توجد أرقام تسلسلية</td>
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