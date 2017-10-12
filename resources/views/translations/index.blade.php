@extends('layouts.app')

@section('content_title')
    <h1 class="panel-title">
        Переводы
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ t('translation__title__name','Фильтр') }}</h1>
            @include('translations.parts.tabs')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(count($translations)>0)
                <div id="translationTable">
                    <table class="table table-striped table-bordered table-hover table-condensed table-hover">
                        <tr>
                            <th>Section</th>
                            <th>Type</th>
                            <th>Item</th>
                            <th>Full key</th>
                            <th>Values</th>
                        </tr>
                        @foreach($translations as $item)
                            <tr>
                                <td>{{ $item->section }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{{ $item->item }}</td>
                                <td>{{ $item->full_key }}</td>
                                <td>
                                    <table class="table table-condensed table-striped">
                                        @foreach($locales as $lang)
                                            <tr>
                                                <td>{{ $lang->t('name') }}</td>
                                                <td>{{ $item->getByAbbr($lang->abbr) }}</td>
                                                <td>
                                                <span class="btn btn-primary btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @else
                <h2>Пользователей не найдено</h2>
            @endif
        </div>
    </div>



    <script>
        jQuery(document).ready(function($) {

            var translations = new Vue({
                el: '#translationTable',
                data: {
                    items: [],
                },
                created: function () {

                },
                mounted: function () {

                },
                methods: {

                }
            });

        });
    </script>

@stop