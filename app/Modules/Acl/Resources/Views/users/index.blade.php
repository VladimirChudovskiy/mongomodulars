@extends('core::layouts.app')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <h1>Пользователи</h1>
                <a href="{{ route('users.create') }}" class="btn btn-success">Добавить</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if(count($users)>0)
                    <table class="table table-hovered">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                        @foreach($users as $item)
                        <tr>
                            <td>{{ $item->t('name') }}</td>
                            <td>{{ $item->t('email') }}</td>
                            <td>{{ $item->t('phone') }}</td>
                            <td>
                                <a href="{{ route('users.edit', $item->_id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('users.delete', $item->_id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $users->links() }}
                @else
                    <h2>Пользователей не найдено</h2>
                @endif
            </div>
        </div>
@stop