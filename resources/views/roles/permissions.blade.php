@extends('layouts.app')



@section('page_heading')
    <div class="row border-bottom white-bg page-heading">
        <div class="col-md-12">
            <h2>{{ t('cp__roles__page_edit_permissions', 'Страница редактирования разрешений') }}</h2>
        </div>
    </div>
@endsection


@section('content')
    <div class="ibox">
        <div class="ibox-content">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs">
                        <li>
                            <a href="{{ route('roles.edit', $role['id']) }}">
                                {{ t('cp__roles__edit', 'Редактировать') }}
                            </a>
                        </li>
                        <li class="active">
                            <a href="{{ route('roles.permissions', $role['id']) }}">
                                {{ t('cp__roles__permissions', 'Разрешение') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            {!! Form::model($role, ['method' => 'POST', 'route' => ['roles.allow_perms.update',  $role['id'] ] ]) !!}
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Allow</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <p>
                                Bootstrap Dual Listbox is a responsive dual listbox widget optimized for Twitter Bootstrap. It works on all modern browsers and on touch devices.
                            </p>

                            {{ Form::select('permissions[]', $permissions, array_keys($role_allow_permissions), [        'id' => 'permissions',
                                                                                 'multiple'  => true,
                                                                                 'class'     => 'form-control dual_select',
                                                                                 'size'      =>'10']) }}

                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-md-3 col-sm-offset-9">
                            <button class="btn btn-white" type="submit">Cancel</button>
                            {!! Form::button('Save changes', ['class'=>'btn btn-primary',
                                                                   'type'=>'submit']) !!}
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
            {!! Form::model($role, ['method' => 'POST', 'route' => ['roles.deny_perms.update',  $role['id'] ] ]) !!}
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Deny</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <p>
                                Bootstrap Dual Listbox is a responsive dual listbox widget optimized for Twitter Bootstrap. It works on all modern browsers and on touch devices.
                            </p>


                            {{ Form::select('permissions[]', $permissions, array_keys($role_deny_permissions), [        'id' => 'permissions',
                                                                                 'multiple'  => true,
                                                                                 'class'     => 'form-control dual_select',
                                                                                 'size'      =>'10']) }}

                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-md-3 col-sm-offset-9">
                            <button class="btn btn-white" type="submit">Cancel</button>
                            {!! Form::button('Save changes', ['class'=>'btn btn-primary',
                                                                   'type'=>'submit']) !!}
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <script type="text/javascript">

    </script>
@endsection