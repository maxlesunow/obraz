@extends('admin.layouts.app')

@section('title', 'Список типов курсов')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h4 class="panel-title">Список страниц<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
        </div>
        {{-- <div class="panel-body"></div> --}}
        <pages-table></pages-table>
    </div>
@endsection

@section('scripts')
    <script>
    </script>
@endsection