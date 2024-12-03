<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);//max 255 caractère pour le champ du titre
            $table->string('image')->nullable();//champ pour stocker le chemin de l'image de couverture
            $table->text('description')->nullable();//champ pour la description de l'article
            $table->text('content')->nullable();//champ pour le contenu de l'article
            $table->string('file_path')->nullable();//chemin du fichier pdf
            $table->foreignId('user_id')->nullable();// Crée la colonne 'user_id', qui est une clé étrangère vers la table 'users'
            $table->timestamps(); // Crée les colonnes 'created_at' et 'updated_at' pour suivre les dates de création et de mise à jour des articles
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');/// Définit la relation étrangère entre 'user_id' et 'id' de la table 'users', et définit la règle de suppression à 'SET NULL'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
