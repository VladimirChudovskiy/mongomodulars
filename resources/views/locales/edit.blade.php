@extends('layouts.app')

@section('content_title')
    <h1 class="panel-title">
        Редактировать язык {{ $locale->t('name') }}
    </h1>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            {!! Form::model($locale, ['route'=>['locales.update', $locale->id]]) !!}
            {{ method_field('PUT') }}

            <div class="form-group">
                <label for="name">Name</label>
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="abbr">ABBR</label>
                {!! Form::text('abbr', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <div class="radio-inline">
                    <label for="active">
                        {!! Form::radio('active', true, null, ['class' => 'form-control']) !!}
                        Yes</label>
                </div>
                <div class="radio-inline">
                    <label for="active">
                        {!! Form::radio('active', false, null, ['class' => 'form-control']) !!}
                        No</label>
                </div>
            </div>

            {!! Form::submit('Редактировать', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@stop