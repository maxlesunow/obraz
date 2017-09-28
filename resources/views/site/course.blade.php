@extends('site.layouts.app')

@section('title', $course->seo_title)
@section('description', $course->seo_description)
@section('keywords', $course->seo_keywords)

@section('content')
       <h1>Course!</h1>
       <h1>{{$course->name}}</h1>
@endsection