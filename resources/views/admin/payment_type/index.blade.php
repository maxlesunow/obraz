@extends('admin.layouts.app')

@section('title', 'Список типов оплаты')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h4 class="panel-title">Список типов оплаты<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
        </div>
        {{-- <div class="panel-body"></div> --}}
        <payment-types-table></payment-types-table>
    </div>
@endsection

@section('scripts')
    <script>
    </script>
@endsection