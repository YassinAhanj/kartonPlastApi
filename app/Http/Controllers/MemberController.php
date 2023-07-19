<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        return ArticleResource::collection(
            Article::all()
        );
    }

    public function show($id)
    {
        $article = Article::find($id);
        return new ArticleResource($article);
    }
}
