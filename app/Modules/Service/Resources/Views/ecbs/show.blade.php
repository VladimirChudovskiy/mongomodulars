@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>ECB: {{ $ecb->t('name') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('service::ecbs.parts.tabs')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>hello ecb</h2>
        </div>
    </div>
@stop