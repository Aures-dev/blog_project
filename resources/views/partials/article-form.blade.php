{{-- <h2 class="text-2xl font-bold mb-6 text-gray-800">Créer un Nouvel Article</h2>

<!-- Titre -->
<div class="mb-4">
    <label for="title" class="font-bold block mb-2 text-gray-700">Titre de l'article</label>
    <input value="{{ old('title', $article->title ?? '') }}" type="text" name="title" id="title"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Entrez le titre ici">
    @error('title')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Contenu -->
<div class="mb-4">
    <label for="content" class="font-bold block mb-2 text-gray-700">Contenu de l'article</label>
    <textarea name="content" id="content" rows="8"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Saisissez le contenu ici...">{{ old('content', $article->content ?? '') }}</textarea>
    @error('content')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Fichier PDF -->
<div class="mb-4">
    <label for="file_path" class="font-bold block mb-2 text-gray-700">Importer un fichier PDF</label>
    <input type="file" name="file_path" accept="application/pdf"
        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
    @error('file_path')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Image -->
<div class="mb-4">
    <label for="image" class="font-bold block mb-2 text-gray-700">Importer une image de couverture</label>
    <input type="file" name="image" id="image"
        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
    @error('image')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Bouton de soumission -->
<div class="mt-6">
    <button type="submit"
        class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
        Publier l'article
    </button>
</div> --}}

<h2 class="text-2xl font-bold mb-6 text-gray-800">Créer un Nouvel Article</h2>

<!-- Titre -->
<div class="mb-4">
    <label for="title" class="font-bold block mb-2 text-gray-700">Titre de l'article</label>
    <input value="{{ old('title', $article->title ?? '') }}" type="text" name="title" id="title"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Entrez le titre ici">
    @error('title')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Description -->
<div class="mb-4">
    <label for="description" class="font-bold block mb-2 text-gray-700">Description de l'article</label>
    <textarea name="description" id="description" rows="6"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Saisissez le contenu ici...">{{ old('description', $article->description ?? '') }}</textarea>
    @error('description')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Zone de Choix : PDF ou Éditeur -->
<div class="mb-4">
    <label for="choice" class="font-bold block mb-2 text-gray-700">Choisissez un type de contenu</label>
    <div class="flex items-center">
        <input type="radio" id="contentChoice" name="content_choice" value="text" class="mr-2" checked>
        <label for="contentChoice" class="mr-4">Utiliser l'éditeur de texte</label>
        <input type="radio" id="pdfChoice" name="content_choice" value="pdf" class="mr-2">
        <label for="pdfChoice">Importer un fichier PDF</label>
    </div>
</div>

<!-- Contenu : Cacher l'éditeur de texte ou le PDF selon la sélection -->
<div class="mb-4" id="contentEditorDiv">
    <label for="content" class="font-bold block mb-2 text-gray-700">Contenu de l'article</label>
    <textarea name="content" id="content" rows="6"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
        placeholder="Saisissez le contenu ici...">{{ old('content') }}</textarea>
    @error('content')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
<!-- CDN du Ckeditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });
</script>

<!-- PDF : Cacher l'upload du PDF ou l'éditeur de texte selon la sélection -->
<div class="mb-4" id="fileInputDiv" style="display: none;">
    <label for="file_path" class="font-bold block mb-2 text-gray-700">Importer un fichier PDF</label>
    <input type="file" name="file_path" accept="application/pdf"
        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
    @error('file_path')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Image -->
<div class="mb-4">
    <label for="image" class="font-bold block mb-2 text-gray-700">Importer une image de couverture</label>
    <input type="file" name="image" id="image"
        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
    @error('image')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Bouton de soumission -->
<div class="mt-6">
    <button type="submit"
        class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        Publier l'article
    </button>
</div>