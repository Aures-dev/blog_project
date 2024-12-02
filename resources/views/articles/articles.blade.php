@extends('layouts.master')
@section('title','Articles')

@section('content')
<h2 class="text-4xl font-extrabold dark:text-white">Articles</h2>
<div class="flex gap-6  justify-center m-6">
    @each('partials.article',$articles,'article','partials.article-empty')
</div>
@endsection