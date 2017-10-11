@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1> {{ $service->t('name') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('services.parts.tabs')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(count($free_rel_ports) > 0)
                @foreach($free_rel_ports as $ecb)
                    <div class="row" style="border: 1px gray solid; padding: 10px; margin: 10px 0px;">
                        <div class="col-md-4">
                            <h2>{{ $ecb['ecb_name'] }}</h2>
                        </div>
                        <div class="col-md-8">
                            @foreach($ecb['ports'] as $port)
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="port-info">{{ $port['name'] }}</span>
                                        <a href="{{ route('services.ports.do_connect', [$service->_id, $current_port, $ecb['rel_id'], $port['system']]) }}" class="btn btn-primary">Connect</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @else
                <h2>Нет свободных портов у ваших ECB</h2>
            @endif
        </div>
    </div>
@stop