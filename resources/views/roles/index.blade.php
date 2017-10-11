@extends('layouts.app')

@section('page_heading')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>{{ t('cp__title__roles_list', 'Список ролей') }}</h2>
        </div>
        <div class="col-lg-2">

        </div>
    </div>



@endsection

@section('content')
    <div class="ibox-content m-b-sm border-bottom">
        <div class="row">
            <div class="col-md-12">

                <a href="{{ route('roles.create') }}" class="btn btn-primary btn-lg">
                    <i class="fa fa-plus"></i> Create
                </a>

            </div>
        </div>
    </div>
    <div class="ibox">
        <div class="ibox-content">

            <div class="row">
                <div class="col-md-12">

                    <input type="text" class="form-control input-sm m-b-xs" id="filter"
                           placeholder="{{ t('cp__roles__search_in_table', 'Поиск в таблице') }}">

                </div>
            </div>
            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15" data-filter=#filter>
                <thead>
                <tr>
                    <th data-toggle="true">#</th>
                    <th data-hide="phone">{{ t('cp__roles__display_name', 'Имя') }}</th>
                    <th data-hide="all">{{ t('cp__roles__description', 'Описание') }}</th>
                    <th class="text-right" data-sort-ignore="true">Action</th>

                </tr>
                </thead>
                    <tbody>
                    @foreach($roles_json['data'] as $role)
                        <tr>
                            <td>
                                {{ $role['id'] }}
                            </td>
                            <td>
                                {{ $role['display_name'] }}
                            </td>
                            <td>
                                {{ $role['description'] }}
                            </td>
                            <td class="text-right">
                                <a href="{{ route('roles.edit', $role['id']) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                <a href="{{ route('roles.destroy', $role['id']) }}" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                <tfoot>
                <tr>
                    <td colspan="6">
                        <ul class="pagination pull-right"></ul>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection





