@extends('admin.layouts.app')

@section('title', 'Список типов курсов')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h4 class="panel-title">Список типов курсов<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
        </div>
        {{-- <div class="panel-body"></div> --}}
        <course-types-table></course-types-table>
    </div>
@endsection

@section('scripts')
    <script>
    </script>
@endsection