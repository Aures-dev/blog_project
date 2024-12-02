<article>
    <h2 class="font-bold" > Titre : <span>{{$article->title}}</span> </h2>
    <div class="w-2/4">  
        <img src="{{ asset($article->image) }}" alt="cover-image">
    </div>
    <a href="#">Lire l'article</a>
    <a href="#">Télécharger</a>
</article>