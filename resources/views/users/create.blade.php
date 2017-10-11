@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Создать пользователя</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route'=>['users.store']]) !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label for="password">Пароль</label>
                        {!! Form::text('password', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>


            {!! Form::submit('Создать', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop