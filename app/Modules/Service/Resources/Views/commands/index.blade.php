@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Команды для {{ $service->t('name') }}</h1>
            <a href="{{ route('commands.create', [$service->_id]) }}" class="btn btn-success">Добавить</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('service::services.parts.tabs')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(count($commands) > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>System name</th>
                            <th>Human name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($commands as $item)
                        <tr>
                            <td>{{ $item->system }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="{{ route('commands.edit', [$service->_id, $item->_id]) }}" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h2>Команд не найдено</h2>
            @endif
        </div>
    </div>
@stop