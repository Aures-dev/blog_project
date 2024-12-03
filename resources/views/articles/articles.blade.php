@extends('layouts.master')
@section('title','Articles')

@section('content')
<h2 class="text-4xl font-extrabold dark:text-white">Articles</h2>
<div class="grid gap-6 justify-center m-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
    @each('partials.article', $articles, 'article', 'partials.article-empty')
</div>
@endsection