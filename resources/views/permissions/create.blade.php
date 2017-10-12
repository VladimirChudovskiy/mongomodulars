@extends('layouts.app')

@section('content_title')
    <h1 class="panel-title">
        Создать
    </h1>
@endsection

@section('content')
    <div class="ibox">
        <div class="ibox-content">
            <div class="row">
                {!! Form::open(['route' => ['permissions.store'] ]) !!}
                    <div class="col-md-6">
                        @include('acl::permissions.parts._form-fields')
                    </div>
                    <div class="col-md-12">
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">

                            <div class="col-md-3 col-sm-offset-9 text-center">
                                <a href="{{ route('permissions.index') }}" class="btn btn-default btn-sm m-r">
                                    <i class="fa fa-arrow-left m-r-xs" aria-hidden="true"></i>
                                    {{ t('cp__permissions__back', 'Назад') }}
                                </a>
                                {!! Form::button('
                                    <i class="fa fa-bolt m-r-xs" aria-hidden="true"></i>'. t("cp__permissions__create", "Создать"),
                                     ['class' => 'btn btn-primary btn-sm', 'type' => 'submit' ]
                                ) !!}
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection