@extends('admin.layouts.app')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h4 class="panel-title">Список курсов<a class="heading-elements-toggle"><i class="icon-more"></i></a>
            </h4>
        </div>

        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper no-footer">
            <div class="datatable-header">
                <div id="DataTables_Table_1_filter" class="dataTables_filter">
                    <label>
                        <span>Поиск:</span>
                        <input type="search" class="" placeholder="Введите для поиска..."
                               aria-controls="DataTables_Table_1">
                    </label>
                </div>
                <div class="dt-buttons">
                    <a class="btn bg-green" tabindex="0" href="{{ action ('CourseController@create') }}">
                        <span><i class="icon-add position-left"></i> Добавить</span>
                    </a>
                    <a class="btn bg-grey" tabindex="0" aria-controls="DataTables_Table_1" href="#">
                        <span><i class="icon-trash position-left"></i> Удалить</span>
                    </a>
                </div>
                <div class="datatable-scroll-wrap">
                    <table class="table datatable-button-init-custom dataTable no-footer" id="DataTables_Table_1"
                           role="grid" aria-describedby="DataTables_Table_1_info">
                        <thead>
                        <tr role="row">
                            <th>
                                <div class="checker border-primary text-primary">
                                    <input type="checkbox" class="styled" id="checked_all">
                                </div>
                            </th>
                            <th>ФИО</th>
                            <th>Количество курсов</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($courses as $course)
                            <tr role="row" class="odd">
                                <td>
                                    <div class="checker border-primary text-primary">
                                        <input type="checkbox" class="styled check_item">
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ action ('CourseController@edit', $course->id) }}">{{$course->name}}</a>
                                </td>
                                {{--<td>{{$course->phone}}</td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="datatable-footer">
                    <div class="dataTables_info" id="DataTables_Table_1_info" role="status" aria-live="polite">
                        Всего: {{ $courses->total() }}</div>
                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate">
                        {{ $courses->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>@endsection

@section('scripts')
    <script>
        $(".styled").uniform({
            radioClass: 'choice'
        });

        $('#checked_all').change(function(){
            if(document.getElementById("checked_all").checked){
                $('.check_item').parent().addClass('checked')
                $('.check_item').prop("checked", $(this).prop("checked"))
            }
            else {
                $('.check_item').parent().removeClass('checked')
                $('.check_item').prop("checked", $(this).prop("checked"))
            }
        })

    </script>
@endsection