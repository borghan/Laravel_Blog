<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $articles = Article::latest() -> get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('articles.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
       $input = [
            'content' => $request['content'],
            'title' => $request['title'],
            'intro' => mb_substr($request['content'], 0, 250) . '......',
            'published_at' => date('Y-m-d H:i:s', time())
                ];
        $article = Article::create($input);

        $tags = explode(',', $request['tags']);
        foreach ($tags as $tagName) {
            $tag = Tag::where('name', '=', $tagName)->first();
            if(!$tag) {
                $tag = Tag::create(['name' => $tagName]);
            }
            $tag->count++;
            $article->getTags()->save($tag);
        }

        return redirect('/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        $next_article = $article -> getNextArticleId($id);
        $prev_article = $article -> getPrevArticleId($id);
        $comments = $article -> getComments;
        $tags = $article -> getTags;
        return view('articles.show', compact('article', 'next_article', 'prev_article', 'comments', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $tags = $article -> getTags;
        $tagName = null;
        foreach ($tags as $tag) {
            $tagName .= $tag->name . ',';
        }
        return view('articles.edit', compact('article', 'tagName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $input = [
            'content' => $request['content'],
            'title' => $request['title'],
        ];
        Article::where('id', $id) -> update($input);

//        $tags = array_unique(explode(',', $request['tags']));
//        $article -> getTags() -> save($tags);
        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
      Article::where('id', $id) -> delete();
      return redirect('/post');
    }
}
