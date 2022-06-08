<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <title> @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    @include('commonmodule::front.includes.css')

    <meta name="keywords" content="{!! LanguageHelper::nameTranslate($seo_info,'keys') !!}">
    <meta name="description" content="{!! LanguageHelper::nameTranslate($seo_info,'desc') !!}">
    <meta name="author" content="{{($seo_info!=null)?$seo_info->author:''}}">
    <meta name="robots" content="index,follow">
    <meta itemprop="name" content="{!! LanguageHelper::nameTranslate($seo_info,'name') !!}">
    <meta itemprop="description" content="{!! LanguageHelper::nameTranslate($seo_info,'desc') !!}">
    @yield('page_seo')
    @if(!isset($og_seos))
        <meta property="og:title" content="{!! LanguageHelper::seoTranslate($seo_info,'name') !!}">
        <meta property="og:url" content="{{($seo_info!=null)?$seo_info->url:'#'}}">
        <meta property="og:description" content="{!! LanguageHelper::seoTranslate($seo_info,'desc') !!}">
    @endif
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{$site_data->where('key','site_name')->first()->value_ar}} ">
    <link rel="canonical" href="{{($seo_info!=null)?$seo_info->url:'#'}}">
    @php($favicon=$site_data->where('key','favicon')->first()->photo)
    <link rel="icon" href="{{asset('images/img/'.$favicon)}}">
    {!! ($seo_info!=null)?$seo_info->script_header:'' !!}
    {!! $site_data->where('key','seo_script')->first()->value_ar !!}

</head>


<body>
<div class="page">
    <!-- Site header -->
    @include('commonmodule::front.includes.header')
    @include('fronthomemodule::layouts.nav')


    @yield('content')


    @include('commonmodule::front.includes.footer')

</div>

@include('commonmodule::front.includes.js')
<!-- heheboi  -->
{!! ($seo_info!=null)?$seo_info->script_footer:'' !!}
{!! $site_data->where('key','seo_script')->first()->value_en !!}

<script>
    $(document).on("keypress", 'input[type="tel"]', function(e){
        let charCode = !e.charCode ? e.which : e.charCode;

        if( !(charCode >= 48 && charCode <= 57) ){
            e.preventDefault();
        }
    });
</script>

</body>
</html>
