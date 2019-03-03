@extends('layouts.main')

@section('title')
    {{$page->title}}
@endsection

@section('body')
    @include('blocks._secondarynavbar')

    @include('blocks._content', ['data' => $page, 'type' => 'page'])


@endsection