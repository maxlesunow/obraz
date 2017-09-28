@extends('site.layouts.app')

@section('title', $speaker->seo_title)
@section('description', $speaker->seo_description)
@section('keywords', $speaker->seo_keywords)

@section('content')
       <h1>Speaker!</h1>
       <h1>{{$speaker->full_name}}</h1>
@endsection