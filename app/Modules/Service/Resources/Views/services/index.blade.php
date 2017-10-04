@extends('core::layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Услуги</h1>
            <a href="{{ route('services.create', [$user->_id]) }}" class="btn btn-success">Добавить</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('acl::users.parts.tabs')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(count($services)>0)
                <table class="table table-hovered">
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