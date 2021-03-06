@extends('layouts.app')

@section('content_title')
    <h1 class="panel-title">
        Партнеры
    </h1>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            @if(count($partners)>0)
                <table class="table table-striped table-bordered table-hover table-condensed table-hovered">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                    @foreach($partners as $item)
                    <tr>
                        <td>{{ $item->t('name') }}</td>
                        <td>{{ $item->t('email') }}</td>
                        <td>{{ $item->t('phone') }}</td>
                        <td>
                            <a href="{{ route('partner.show', $item->_id) }}" class="btn btn-success">
                                View
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                {{ $partners->links() }}
            @else
                <h2>Пользователей не найдено</h2>
            @endif
        </div>
    </div>
@stop