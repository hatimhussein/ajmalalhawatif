@extends('commonmodule::layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design-icons.css')}}" type="text/css">

    <style>
        .row [class*="col-"] .widget .widget-header h4 {
            color: #00d1c1;
        }
    </style>
@endsection

@section('title')
    استيراد الأرقام التسلسلية
@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="container">
            <div class="page-header">
                <div class="page-title">
                    <h3>استيراد الأرقام التسلسلية</h3>
                    <div class="crumbs">
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li><a href="{{url('/admin')}}"><i class="flaticon-home-fill"></i></a></li>
                            <li><a href="{{route('skudo.serial-numbers.index')}}">الأرقام التسلسلية</a></li>
                            <li><a href="#">استيراد البيانات</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                        <h4>استيراد الأرقام التسلسلية من ملف Excel</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="widget-content widget-content-area">
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                @if($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <ul class="mb-0">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-lg-8">
                                        <form action="{{ route('skudo.serial-numbers.import.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                            @csrf
                                            <div class="form-group">
                                                <label for="file">اختر ملف Excel</label>
                                                <input type="file" class="form-control @error('file') is-invalid @enderror" 
                                                       id="file" name="file" accept=".xlsx,.xls,.csv" required>
                                                @error('file')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <small class="form-text text-muted">
                                                    الحد الأقصى لحجم الملف: 10 ميجابايت
                                                </small>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="flaticon-upload"></i> استيراد البيانات
                                                </button>
                                                <a href="{{ route('skudo.serial-numbers.index') }}" class="btn btn-secondary">
                                                    <i class="flaticon-arrow-right"></i> العودة
                                                </a>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="alert alert-info">
                                            <h5>متطلبات ملف Excel:</h5>
                                            <ul class="mb-0">
                                                <li>يجب أن يحتوي الملف على العناوين التالية في الصف الأول:</li>
                                                <ul>
                                                    <li><strong>item_number</strong> - رقم الصنف</li>
                                                    <li><strong>barcode</strong> - الباركود</li>
                                                    <li><strong>product_name_ar</strong> - اسم المنتج بالعربية</li>
                                                    <li><strong>product_name_en</strong> - اسم المنتج بالإنجليزية</li>
                                                    <li><strong>product_serial</strong> - الرقم التسلسلي (مطلوب)</li>
                                                </ul>
                                                <li>الرقم التسلسلي يجب أن يكون فريداً</li>
                                                <li>يمكن ترك باقي الحقول فارغة</li>
                                            </ul>
                                        </div>

                                        <div class="alert alert-warning">
                                            <h5>ملاحظات مهمة:</h5>
                                            <ul class="mb-0">
                                                <li>الحد الأقصى لحجم الملف: 10 ميجابايت</li>
                                                <li>يتم معالجة البيانات على دفعات لتحسين الأداء</li>
                                                <li>في حالة وجود أخطاء، سيتم عرضها بعد الانتهاء</li>
                                                <li><strong>الترميز:</strong> يجب أن يكون الملف بترميز UTF-8</li>
                                                <li>إذا ظهرت النصوص العربية بشكل خاطئ، احفظ الملف بترميز UTF-8</li>
                                            </ul>
                                        </div>

                                        <div class="text-center">
                                            <a href="#" class="btn btn-outline-primary btn-sm" onclick="downloadTemplate()">
                                                <i class="flaticon-download"></i> تحميل نموذج Excel
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  END CONTENT PART  -->
@endsection

@section('js')
<script>
function downloadTemplate() {
    // إنشاء نموذج Excel فارغ مع ترميز UTF-8
    const data = [
        ['item_number', 'barcode', 'product_name_ar', 'product_name_en', 'product_serial'],
        ['', '', '', '', '']
    ];
    
    // إضافة BOM للترميز UTF-8
    let csvContent = '\uFEFF' + data.map(row => row.join(',')).join('\n');
    
    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement('a');
    const url = URL.createObjectURL(blob);
    link.setAttribute('href', url);
    link.setAttribute('download', 'serial_numbers_template.csv');
    link.style.visibility = 'hidden';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

// Bootstrap form validation
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>
@endsection
