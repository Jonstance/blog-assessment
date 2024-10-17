<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Models\Article;


Route::get('/', function () {
    $articles = Article::all();// Fetch all articles
    return view('welcome', compact('articles'));// Pass the articles to the view
});
Route::apiResource('articles', ArticleController::class);

