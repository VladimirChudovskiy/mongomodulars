@extends('layouts.app')

@section('content_title')
    <h3 class="panel-title">
        Языки
        <a href="{{ route('locales.create') }}" class="found btn btn-wm-btn-first btn-sm">
            <span class="fa fa-plus"></span>
            Добавить
        </a>
    </h3>
@endsection

@section('content')
        <div class="row">
            <div class="col-md-8">
                <h1>Фильтр</h1>
                @include('locales.parts.filter_search')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if(count($locales)>0)
                    <table class="table table-striped table-bordered table-hover table-condensed table-hover table-bordered">
                        <tr>
                            <th>Name</th>
                            <th>ABBR</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                        @foreach($locales as $item)
                        <tr>
                            <td>{{ $item->t('name') }}</td>
                            <td>{{ $item->t('abbr') }}</td>
                            <td>{{ $item->t('active') }}</td>
                            <td>
                                <a href="{{ route('locales.edit', $item->_id) }}" class="btn btn-info">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <a href="{{ route('locales.delete', $item->_id) }}" class="btn btn-danger">
                                    <span class="fa fa-close"></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $locales->links() }}
                @else
                    <h2>Пользователей не найдено</h2>
                @endif
            </div>
        </div>
@stop