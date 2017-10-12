@extends('layouts.app')

@section('content_title')
    <h1 class="panel-title">
        Создать ECB
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route'=>['ecbs.store', $user->_id]]) !!}

            <div class="form-group">
                <label for="name">Name</label>
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('Создать', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop