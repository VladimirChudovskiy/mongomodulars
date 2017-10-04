@extends('core::layouts.app')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <h1>Создать услугу</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['route'=>['services.store', $user->_id]]) !!}

                <div class="form-group">
                    <label for="name">Name</label>
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label for="kind">Kind</label>
                    {!! Form::select('kind', $available_kinds, null, ['class' => 'form-control']) !!}
                </div>


                {!! Form::submit('Создать', ['class'=>'btn btn-primary']) !!}

                {!! Form::close() !!}
            </div>
        </div>
@stop