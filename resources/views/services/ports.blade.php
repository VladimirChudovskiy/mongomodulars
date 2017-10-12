@extends('layouts.app')

@section('content_title')
    <h1 class="panel-title">
        Услуга {{ $service->t('name') }}
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('services.parts.tabs')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if($service->countPorts() > 0)
                <table class="table table-striped table-bordered table-hover table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>System name</th>
                        <th>Human name</th>
                        <th>Type</th>
                        <th>Connect to</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($service->getPorts() as $port)
                        <tr>
                            <td>{{ $port['system'] }}</td>
                            <td>{{ $port['name'] }}</td>
                            <td>{{ $port['type'] }}</td>
                            <td>
                                @if( ! $service->isFreePort($port))
                                    {{ \App\Modules\Service\Models\Ecb::getPortInfo($port['rel_id'], $port['rel_port']) }}
                                @endif
                            </td>
                            <td>
                                @if( ! $service->isFreePort($port))
                                    <a href="{{ route('services.ports.disconnect', [$service->_id, $port['system']]) }}" class="btn btn-info">Disconnect</a>
                                @else
                                    <a href="{{ route('services.ports.connect', [$service->_id, $port['system']]) }}" class="btn btn-primary">Connect</a>
                                @endif

                                <a href="#" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h2>Нет портов</h2>
            @endif


                {!! Form::open(['route'=>['services.ports.store', $service->_id]]) !!}

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
                    {!! Form::submit('Создать порт', ['class'=>'btn btn-success']) !!}
                </div>

                {!! Form::close() !!}

        </div>
    </div>
@stop