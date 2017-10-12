@extends('layouts.app')

@section('content_title')
    <h1 class="panel-title">
        Услуга {{ $service->t('name') }}
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('services.parts.tabs')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>hello</h2>
        </div>
    </div>
@stop