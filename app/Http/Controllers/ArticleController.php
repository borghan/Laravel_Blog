<?php

namespace App\Http\Controllers;

use App\Article;
use App\Config;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Pagination\Paginator;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $config = Config::getConfig();
        $articles = Article::with('getTags', 'getComments')->latest()->published()->paginate(5);
        return view('articles.index', compact('articles', 'config'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $config = Config::getConfig();
        $article = Article::findOrFail($id);
        $next_article = $article->getNextArticleId($id);
        $prev_article = $article->getPrevArticleId($id);
        $comments = $article->getComments;
        $tags = $article->getTags;
        return view('articles.show', compact('article', 'next_article', 'prev_article', 'comments', 'tags', 'config'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
