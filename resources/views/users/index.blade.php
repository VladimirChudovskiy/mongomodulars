@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-md-4">
                <h1>Пользователи</h1>
                <a href="{{ route('users.create') }}" class="found btn btn-primary">
                    <span class="fa fa-plus"></span>
                    Добавить
                </a>
            </div>
            <div class="col-md-8">
                <h1>Фильтр</h1>
                @include('users.parts.filter_search')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if(count($users)>0)
                    <table class="table table-striped table-bordered table-hover table-condensed table-hover table-bordered">
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
                                <a href="{{ route('users.edit', $item->_id) }}" class="btn btn-info">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <a href="{{ route('users.delete', $item->_id) }}" class="btn btn-danger">
                                    <span class="fa fa-close"></span>
                                </a>
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