@extends('layouts.app')

@section('content_title')
    <h1 class="panel-title">
        Команды для {{ $service->t('name') }}
        <a href="{{ route('commands.create', [$service->_id]) }}" class="found btn btn-wm-btn-first btn-sm">
            <span class="fa fa-plus"></span>
            Добавить
        </a>
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
            @if(count($commands) > 0)
                <table class="table table-striped table-bordered table-hover table-condensed table-hover">
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