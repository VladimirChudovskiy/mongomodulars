@extends('layouts.app')

@section('content_title')
    <h1 class="panel-title">
        ECB
        <a href="{{ route('ecbs.create', [$user->_id]) }}" class="found btn btn-wm-btn-first btn-sm">
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
            @if(count($ecbs)>0)
                <table class="table table-striped table-bordered table-hover table-condensed table-hovered">
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach($ecbs as $item)
                        <tr>
                            <td>{{ $item->t('name') }}</td>
                            <td>
                                <a href="{{ route('ecbs.show', $item->_id) }}" class="btn btn-info">Show</a>
                                {{--<a href="{{ route('ecbs.edit', $item->_id) }}" class="btn btn-info">Edit</a>--}}
                                <a href="{{ route('ecbs.delete', $item->_id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $ecbs->links() }}
            @else
                <h2>ECB не найдено</h2>
            @endif
        </div>
    </div>
@stop