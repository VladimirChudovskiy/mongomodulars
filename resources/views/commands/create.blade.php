@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Создать команду</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route'=>['commands.store', $service->_id]]) !!}

            <div class="form-group">
                <label for="system">System name</label>
                {!! Form::text('system', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="name">Human name</label>
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="describe">Describe</label>
                {!! Form::textarea('describe', null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('Создать', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop