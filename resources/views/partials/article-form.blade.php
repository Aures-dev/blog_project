<label for="title" class="font-bold" >Titre de l'article</label>
<input value="{{ old('title', isset($article->title) ? $article->title : null) }}" type="text" name="title" id="title"
    class="my-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
@error('title')
    <div> {{$message}} </div>
@enderror

<label for="content" class="font-bold">Entrez le contenu de l'article</label>
<textarea name="content" id="content" cols="30" rows="8"
    class="my-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
    placeholder="Saisissez l'article ici ...">

    {{ old('content', isset($article->content) ? $article->content : null) }}

</textarea>
@error('content')
    <div> {{$message}} </div>
@enderror

<div>Vous disposez d'un fichier pdf ?</div>

<label for="file_path" class="font-bold">Importez plutôt un fichier pdf</label>
<input name="file_path" type="file" accept="application/pdf"
    class="my-4 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />
@error('file_path')
    <div> {{$message}} </div>
@enderror

<label for="image" class="font-bold">Importez une image de couverture</label>
<input type="file" name="image" id="image"
    class="my-4 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
@error('image')
    <div> {{$message}} </div>
@enderror

<button type="submit"
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
    Publier l'article
</button>