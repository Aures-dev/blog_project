<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    /**
     * champs à remplir par le factory
     * @var array
     */
    protected $fillable = [
        'title',
        'image',
        'content',
        'file_path'
    ];

    //relation entre Article et user
    public function user (){
        return $this->belongsTo(User::class);//chaque article n'est associé qu'a un seul utilisateur
    }
}
