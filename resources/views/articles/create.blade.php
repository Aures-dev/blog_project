@extends('layouts.master')
@section('title','Edition d\'article')

@section('content')

<form action="{{url('article/new')}}" method="POST" enctype="multipart/form-data" class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg border border-gray-200">
    @csrf
    @include('partials.article-form')
</form>

@endsection