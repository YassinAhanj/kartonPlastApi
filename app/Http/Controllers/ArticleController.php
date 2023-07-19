<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ArticleResource::collection(
            Article::all()
        );
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $request->validated($request->all());
        $data = $this->uploadImage($request);

        $Article = Article::create([
            'firstImage' => $data['firstImage'],
            'firstDescription' => $request->firstDescription,
            'secoundImage' => $data['secoundImage'],
            'secoundDescription' => $request->secoundDescription,
            'title' => $request->title,
        ]);
        return new ArticleResource($Article);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return new ArticleResource($article);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return response(null, 204);
    }
    private function uploadImage($request)
    {
        //Global

        $folder = 'images';

        //First
        $firstimage = $request->file('firstImage');
        $firstImagename = Str::random(40) . '.' . $firstimage->getClientOriginalExtension();
        $firstimage->storeAs($folder, $firstImagename);
        //secound
        $secoundImage = $request->file('secoundImage');

        $secoundImagename = Str::random(40) . '.' . $secoundImage->getClientOriginalExtension();
        $secoundImage->storeAs($folder, $secoundImagename);

        return ['firstImage' => $firstImagename, 'secoundImage' => $secoundImagename];
    }
}
