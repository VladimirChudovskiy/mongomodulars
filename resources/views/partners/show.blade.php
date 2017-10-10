@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Редактировать пользователя</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('users.parts.tabs')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if($user->isPartner())
                <h1>yes</h1>
                <a href="{{ route('partner.disable', $user->_id) }}" class="btn btn-success">Исключить из партнерской програмы</a>
            @else
                <p>Пользователь не учавствует в партнерской программе. </p>
                <a href="{{ route('partner.enable', $user->_id) }}" class="btn btn-success">Сделать партнером</a>
            @endif

        </div>
    </div>

@stop