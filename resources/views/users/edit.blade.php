@extends('layouts.app')

@section('content_title')
    <h1 class="panel-title">
        Редактировать пользователя
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('users.parts.tabs')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! Form::model($user, ['route'=>['users.update', $user->id]]) !!}
            {{ method_field('PUT') }}

            <div class="form-group">
                <label for="name">Name</label>
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                {!! Form::text('phone', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                {!! Form::text('password', '', ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('Редактировать', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop