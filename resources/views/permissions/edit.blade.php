@extends('layouts.app')



@section('page_heading')
    <div class="row border-bottom white-bg page-heading">
        <div class="col-md-12">
            <h2>{{ t('cp__users__edit', 'Редактировать') }}</h2>
        </div>
    </div>
@endsection

@section('content')
    <div class="ibox">
        <div class="ibox-content">
            <div class="row">
                <div class="col-md-7 page-action text-right">
                    <a href="{{ route('permissions.index') }}"
                       class="btn btn-default btn-sm">
                        <i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>

            <div class="row">
                {!! Form::model($permission, ['method' => 'POST', 'route' => ['users.update',  $permission['id'] ] ]) !!}
                <div class="col-md-6">
                    @include('acl::permissions.parts._form-fields')
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