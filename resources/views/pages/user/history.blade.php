@extends('layouts.app')

@section('title')
  Verofin News
@endsection

@push('add-on-style')
  <link rel="stylesheet" href="/css/elements/news_list.css">
  <link rel="stylesheet" href="/css/elements/news_item.css">
  <link rel="stylesheet" href="/css/pages/user/history.css">
@endpush

@section('content')
  <h1 id="history-heading">History</h1>
  <main id="news-list"></main>
  @include('includes.newsTemplate')
@endsection

@push('add-on-script')
  <script src="/js/pages/user/history.js"></script>
  <script src="/js/component/aside.js"></script>
@endpush