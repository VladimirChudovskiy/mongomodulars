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
                <div class="col-md-12 page-action text-right">
                    <a href="{{ route('roles.index') }}"
                       class="btn btn-default btn-sm">
                        <i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="{{ route('roles.edit', $role['id']) }}">
                                {{ t('cp__roles__edit', 'Редактировать') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('roles.permissions', $role['id']) }}">
                                {{ t('cp__roles__permissions', 'Разрешение') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                {!! Form::model($role, ['method' => 'POST', 'route' => ['roles.update',  $role['id'] ] ]) !!}
                <div class="col-md-6">
                    @include('acl::roles.parts._form-fields')
                </div>
                <div class="col-md-6">

                </div>
                <div class="col-md-12">
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-md-3 col-sm-offset-9">
                            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection