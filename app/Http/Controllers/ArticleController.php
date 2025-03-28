<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    // 記事一覧
    public function index()
    {
        $articles = Article::orderBy('published_at', 'desc')->get();
        return view('articles.index', compact('articles'));
    }

    // 記事詳細
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }
}
