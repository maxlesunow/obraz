@extends('site.layouts.app')

@section('title', $page->seo_title)
@section('description', $page->seo_description)
@section('keywords', $page->seo_keywords)

@section('breadcrumbs')
    @include('site.layouts.breadcrumbs', [
        'title' => 'Расписание курсов',
        'icon' => 'mdi-calendar',
        'breadcrumbs' => array(
            array('url' => '/', 'title' => 'Главная'),
            array('title' => 'Расписание курсов'),
        )])
@endsection

@section('content')
<!-- Page Content-->
<main class="page-content section-98 section-sm-top-110 section-sm-bottom-124">
  <div class="shell">
    <div class="range range-sm-center range-lg-left">
      <div class="cell-sm-10 cell-md-8 cell-lg-7 cell-md-push-2">
        <div class="inset-left-0 inset-md-left-20">
          <main-schedule></main-schedule>
        </div>
      </div>
      <div class="cell-md-3 cell-lg-3 cell-md-push-1 offset-top-66 offset-md-top-0">
        <!-- Section Blog Modern-->
        <aside class="text-left">
            <div class="range">
              <div class="cell-sm-6 cell-md-12 offset-sm-top-41 offset-md-top-0">
                <calendar-schedule></calendar-schedule>
              </div>
              <div class="cell-sm-6 cell-md-12 offset-top-41">
                @include('site.schedule.newest')
              </div>
        </aside>
      </div>
    </div>
  </div>
</main>
@endsection