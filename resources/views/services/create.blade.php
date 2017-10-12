@extends('layouts.app')

@section('content_title')
    <h1 class="panel-title">
        Создать услугу
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route'=>['services.store', $user->_id]]) !!}

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kind">Kind</label>
                        {!! Form::select('kind', $available_kinds, null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            {!! Form::submit('Создать', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop