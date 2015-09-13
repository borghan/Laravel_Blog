<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $articles = Article::with('getTags', 'getComments')->latest()->published()->paginate(5);
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
     * @param  Request $request
     * @return Response
     */
    public function store(Requests\StoreArticleRequest $request)
    {
        $input = $request -> all();
        $input['intro'] = mb_substr($request['content'], 0, 250) . '......';
        $article = Article::create($input);

        $tags = $this -> separateTags($request['tags']);
        $this -> saveTags($article, $tags);

        return redirect('/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        $next_article = $article->getNextArticleId($id);
        $prev_article = $article->getPrevArticleId($id);
        $comments = $article->getComments;
        $tags = $article->getTags;
        return view('articles.show', compact('article', 'next_article', 'prev_article', 'comments', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $tags = $article->getTags;
        $tagName = null;
        foreach ($tags as $tag) {
            $tagName .= $tag->name . ',';
        }
        return view('articles.edit', compact('article', 'tagName'));
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
        $input = [
            'content' => $request['content'],
            'intro' => mb_substr($request['content'], 0, 250) . '......',
            'title' => $request['title'],
            'published_at' => $request['published_at']
        ];
        $article = Article::findOrFail($id);
        $article->update($input);

        $tags = $this->separateTags($request['tags']);
        $old_tags = $article->getTags;
        if(!empty($old_tags)) {
            foreach ($old_tags as $tag) {
                $index = array_search($tag->name, $tags);
                if ($index !== false) {
                    unset($tags[$index]);
                } else {
                    $tag->count--;
                    $tag->save();
                    $article->getTags()->detach($tag->id);
                }
            }
        }
        $this->saveTags($article, $tags);

        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Article::where('id', $id)->delete();
        return redirect('/post');
    }

    public function separateTags($tags)
    {
        return array_filter(array_unique(explode(',', $tags)));
    }

    public function saveTags(Article $article, $tags)
    {
        foreach ($tags as $tagName) {
            $tag = Tag::where('name', '=', $tagName)->first();
            if (!$tag) {
                $tag = Tag::create(['name' => $tagName]);
            }
            $tag->count++;
            $article->getTags()->save($tag);
        }
    }

}
