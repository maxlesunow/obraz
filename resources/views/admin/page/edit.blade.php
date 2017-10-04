@extends('admin.layouts.app')

@section('title', 'Тип курса:  '.$page->name)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h4 class="panel-title">Страница:  {{$page->name}}<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
                </div>

                <div class="panel-body">
                    {!! Form::model($page, ['method' => 'PATCH', 'action' => ['PageController@update', $page->id], 'class' => 'form-horizontal']) !!}
                    @include('admin.page.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection