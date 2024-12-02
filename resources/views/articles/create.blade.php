@extends('layouts.master')
@section('title','Edition d\'article')

@section('content')

<form action="{{url('article/new')}}" method="POST" enctype="multipart/form-data" class="max-w-sm mx-auto">
    @csrf
    @include('partials.article-form')
</form>

@endsection