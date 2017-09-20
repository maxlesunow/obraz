@extends('admin.layouts.app')

@section('title', 'Список групп курсов')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h4 class="panel-title">Список групп курсов<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
        </div>
        {{-- <div class="panel-body"></div> --}}
        <course-groups-table></course-groups-table>
    </div>
@endsection

@section('scripts')
    <script>
    </script>
@endsection