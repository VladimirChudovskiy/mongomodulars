@extends('layouts.app')

@section('content_title')
    <h1 class="panel-title">
        ECB: {{ $ecb->t('name') }}
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>ECB: {{ $ecb->t('name') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('ecbs.parts.tabs')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>hello ecb</h2>
        </div>
    </div>
@stop