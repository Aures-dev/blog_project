<article>
    <h2 class="font-bold" > Titre : <span>{{$article->title}}</span> </h2>
    <div class="w-2/4">  
        <img src="{{ asset( 'storage/'.$article->image) }}" alt="cover-image">
    </div>
    <a href="/article/{{ $article->id }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lire l'article</a>
    @if ($article->file_path)
    <a href="{{ asset('storage/' . $article->file_path) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Télécharger</a>
    @endif
</article>