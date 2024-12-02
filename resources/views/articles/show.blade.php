@extends('layouts.master')
@section('title','Article')

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
    <iframe src="{{ asset('storage/' . $article->file_path) }}" frameborder="0" width="100%" height="700" alt="pdf"></iframe>
    @else
    <div class="flex justify-between" > 
        <p> {{$article->content}} </p>
        <div class="w-full">  
            <img src="{{ asset( 'storage/'.$article->image) }}" alt="cover-image" class="w-2/6">
        </div>
    </div>
    @endif

</article>


@endsection
