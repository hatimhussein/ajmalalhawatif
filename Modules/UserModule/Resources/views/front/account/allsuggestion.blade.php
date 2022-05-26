@extends('fronthomemodule::layouts.master')

@section('title')
    {{__('usermodule::account.my_account')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets\front\plugins\chosen\chosen.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css" rel="stylesheet"/>
@endsection

@section('content')

    @include('fronthomemodule::content.breadCrumbs',['pages'=>[__('usermodule::account.my_account'),__('commonmodule::front.suggestion')]])

    <!-- main-container -->
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                @forelse($suggestion as $key)
                    <div class="col-md-4 col-sm-6">
                        <div class="suggest-card">
                            <div class="card-label">{{$key->type}}</div>
                            <h3 class="card-title"><a href="{{url('userReply/'.$key->id)}}">{{$key->subject}}</a></h3>
                            <p>
                                {{mb_substr($key->message,0,70)}}...
                            </p>
                        </div>
                    </div>
                @empty
                    <h3 class="text-center">
                        <a class="btn btn-primary" href="{{ url('suggestions') }}">{{__('commonmodule::front.suggestion')}}</a>
                    </h3>
                @endforelse
            </div>
        </div>
    </div>
    <!--End main-container -->
@stop

@section('js')

    @include('usermodule::front.auth.scripts')
@endsection


