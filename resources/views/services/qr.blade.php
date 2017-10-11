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
        <div class="col-md-4 text-center">
            <h3>300x300</h3>
            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')
            ->size(300)
            ->generate($service->code.'-v-'.$service->version)) !!} " class="img-responsive">
        </div>
        <div class="col-md-4 text-center">
            <h3>600x600</h3>
            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')
            ->size(600)
            ->generate($service->code.'-v-'.$service->version)) !!} " class="img-responsive">
        </div>
        <div class="col-md-4 text-center">
            <h3>1200x1200</h3>
            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')
            ->size(1200)
            ->generate($service->code.'-v-'.$service->version)) !!} " class="img-responsive">
        </div>
    </div>
@stop