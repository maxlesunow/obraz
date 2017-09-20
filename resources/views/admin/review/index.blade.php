@extends('admin.layouts.app')

@section('title', 'Список отзывов')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h4 class="panel-title">Список отзывов<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
        </div>
        {{-- <div class="panel-body"></div> --}}
        <review-table></review-table>
    </div>
@endsection

@section('scripts')
    <script>
    </script>
@endsection