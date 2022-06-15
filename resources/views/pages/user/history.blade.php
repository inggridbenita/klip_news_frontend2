@extends('layouts.app')

@section('title')
  Verofin News
@endsection

@push('add-on-style')
  <link rel="stylesheet" href="/css/elements/news_list.css">
  <link rel="stylesheet" href="/css/elements/news_item.css">
@endpush

@section('content')
  <main id="news-list"></main>
  @include('includes.newsTemplate')
@endsection

@push('add-on-script')
  <script src="/js/pages/user/history.js"></script>
@endpush