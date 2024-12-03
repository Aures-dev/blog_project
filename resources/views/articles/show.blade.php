@extends('layouts.master')
@section('title', 'Article')

@section('content')

<article>
    <!-- <div class="my-4 ">
        <a href="/article/{{ $article->id }}/edit"
            class="font-medium text-green-600 dark:text-green-500 hover:underline">
            Éditer l'article
        </a>
        <form action="/article/{{ $article->id }}/delete" method="POST" class="m-0">
            @csrf
            @method('DELETE')
            <button type="submit"
            class="font-medium text-red-600 dark:text-red-500 hover:underline">
                Effacer l'article
            </button>
        </form>
    </div> -->

    @if ($article->file_path)
        <div class="container mx-auto my-6 p-4 bg-white shadow-lg rounded-lg border border-gray-200">
            <iframe src="{{ asset('storage/' . $article->file_path) }}" frameborder="0" width="100%" height="700"
                class="rounded-md" title="PDF Viewer">
            </iframe>
        </div>
    @else
        <div
            class="container mx-auto my-6 p-4 bg-white shadow-lg rounded-lg border border-gray-200 flex flex-col md:flex-row gap-6 items-start">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Description :</h2>
            <p class="flex-1 text-gray-800 text-lg leading-relaxed">
                {{$article->content}}
            </p>
            <div class="flex justify-center md:w-1/3 w-full">
                <img src="{{ asset('storage/' . $article->image) }}" alt="cover-image"
                    class="w-full h-auto rounded-lg shadow-md object-cover">
            </div>
        </div>
    @endif

</article>


@endsection