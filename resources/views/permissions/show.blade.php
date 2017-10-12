@extends('layouts.app')

@section('content_title')
    <h1 class="panel-title">
        Редактировать
    </h1>
@endsection

@section('content')
    <div class="ibox">
        <div class="ibox-content">
            <div class="row">
                <div class="col-md-7 page-action text-right">
                    <a href="{{ route('users.index') }}"
                       class="btn btn-default btn-sm">
                        <i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="{{ route('users.edit', $user['id']) }}">
                                {{ t('cp__users__edit', 'Редактировать') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('users.roles', $user['id']) }}">
                                {{ t('cp__users__roles', 'Роли') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('users.permissions', $user['id']) }}">
                                {{ t('cp__users__permissions', 'Разрешение') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                {{--{!! Form::model($user, ['method' => 'PUT', 'route' => ['users.update',  $user->id ] ]) !!}--}}
                {!! Form::open(['route' => ['users.store'] ]) !!}
                <div class="col-md-6">
                    @include('acl::users.parts._form-fields')
                </div>
                <div class="col-md-6">

                </div>
                <div class="col-md-12">
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-md-3 col-sm-offset-9">
                            {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection