<article class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200">
    <div class="w-full h-48 bg-gray-100">
        <img src="{{ asset('storage/' . $article->image) }}" alt="cover-image" class="w-full h-full object-cover">
    </div>
    <div class="p-4">
        <h2 class="font-bold text-lg text-gray-800 mb-2">
            Titre : <span class="text-gray-700">{{ $article->title }}</span>
        </h2>
        <div class="flex items-center justify-between mt-4">
            <a href="/article/{{ $article->id }}" 
               class="font-medium text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-500 hover:underline">
                Lire l'article
            </a>
            @if ($article->file_path)
            <a href="{{ asset('storage/' . $article->file_path) }}" 
               class="font-medium text-green-600 hover:text-green-700 dark:text-green-400 dark:hover:text-green-500 hover:underline">
                Télécharger
            </a>
            @endif
        </div>
    </div>
</article>
