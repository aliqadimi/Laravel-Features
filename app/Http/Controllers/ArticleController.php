<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleCollection;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Resources\ArticleResource;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles =  Article::all();
        //     //bejaye inke meta ha inja estefade beshe ArticleCollection sakhte mishe
        // return response()->json([
        //     // 'data'=>$articles,
        //     'data'=>ArticleResource::collection($articles),
        //     // 'meta' =>[
        //     //     'count' =>$articles->count()
        //     // ]
        // ],200);
            return response()->json( new ArticleCollection($articles),200);
    }

    public function store(Request $request)
    {
        $this->ValidateArticle($request);
        Article::create([
            'title'=> $request->title,
            'user_id'=> 5,
            'description'=> $request->description,
            'image'=> $this->uploadImage($request),
        ]);
        return response()->json([
           'messages'=> 'Created'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       try {
        $article = Article::FindOrFail($id);
        return response()->json([
            'data'=> new ArticleResource($article)
            // 'data'=>$article
        ],200);
       } catch (\Throwable $e) {
        return response()->json([
            'message'=> 'Not Found',
            'code'=>404
        ],404);
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ValidateArticle($request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
        ]);
    }

    public function uploadImage($request)
    {
        return $request->hasFile('image')
        ? $request->image->store('public')
        : null;
    }
}
