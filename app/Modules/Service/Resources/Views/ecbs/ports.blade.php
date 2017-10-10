@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Список портов контроллера {{ $ecb->t('name') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('service::ecbs.parts.tabs')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if($ecb->countPorts() > 0)
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>System name</th>
                        <th>Human name</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ecb->getPorts() as $port)
                        <tr>
                            <td>{{ $port['system'] }}</td>
                            <td>{{ $port['name'] }}</td>
                            <td>{{ $port['type'] }}</td>
                            <td>
                                <a href="#" class="btn btn-danger">Удалить</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h2>Нет портов</h2>
            @endif

                {!! Form::open(['route'=>['ecbs.ports.store', $ecb->_id]]) !!}

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="system">System name</label>
                        {!! Form::text('system', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="name">Human name</label>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="type">Type</label>
                        {!! Form::select('type', $available_port_types, null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="col-md-3">
                    {!! Form::submit('Создать порт', ['class'=>'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}
        </div>
    </div>
@stop