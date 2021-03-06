@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Регионы</h1>
            <a href="{{ route('areas.create') }}" class="btn btn-success">Добавить</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(count($areas)>0)
                <table class="table table-hovered">
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach($areas as $item)
                        <tr>
                            <td>{{ $item->t('name') }}</td>
                            <td>
                                <a href="{{ route('areas.edit', $item->_id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('areas.delete', $item->_id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $areas->links() }}
            @else
                <h2>Регионов не найдено</h2>
            @endif
        </div>
    </div>
@stop