@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Услуга {{ $service->t('name') }}</h1>
        </div>
    </div>
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