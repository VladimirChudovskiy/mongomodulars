@extends('layouts.app')

@section('content_title')
    <h1 class="panel-title">
        Услуги
        <a href="{{ route('services.create', [$user->_id]) }}" class="found btn btn-default btn-sm">
            <span class="fa fa-plus"></span>
            Добавить
        </a>
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
            @if(count($services)>0)
                <table class="table table-striped table-bordered table-hover table-condensed table-hovered">
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach($services as $item)
                        <tr>
                            <td>{{ $item->t('name') }}</td>
                            <td>
                                <a href="{{ route('services.show', $item->_id) }}" class="btn btn-info">Show</a>
                                {{--<a href="{{ route('services.edit', $item->_id) }}" class="btn btn-info">Edit</a>--}}
                                <a href="{{ route('services.delete', $item->_id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $services->links() }}
            @else
                <h2>Услуг не найдено</h2>
            @endif
        </div>
    </div>
@stop