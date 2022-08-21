<?php

namespace App\Http\Controllers\Pub;

use App\Models\ArticleSc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ArticleScController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('Forms.Posts.article');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        return ArticleSc::create([
            'annee' => $data['annee'],
            'titre' => $data['titre'],
            'lien'=>$data['lien'],
            'file'=>$data['file'],
            'date'=>$data['date'],
            'auteur'=>$data['auteur'],
            'mail'=>$data['mail'],
            'auteurex'=>$data['auteurex'],
            'mailex'=>$data['mailex'],
            'titre_journal'=>$data['titre_journal'],
            'quartile'=>$data['quartile'],
            'volume'=>$data['volume'],
            'impact'=>$data['impact'],
            'indexation'=>$data['indexation'],
            'site_revue'=>$data['site_revue']
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "annee"=>"in:2022",
            "titre" => "required",
            "lien" => "required",
            "file" => "required|mimes:pdf,doc,docx|max:10000",
            "date" => "",
            "auteur" => "required",
            "mail"=>"required",
            "auteurex"=>"required",
            "mailex"=>"required",
            "titre_journal"=>"required",
            "quartile"=>"in:Q1,Q2,Q3,Q4,Autre",
            "volume"=>"required",
            "impact"=>"required",
            "indexation"=>"in:WOS,SCOPUS,Elsevier,Non indexé,Autres",
            "site_revue"=>"required",

        ]);
        if($request->hasfile('file'))
            {
                $filename = uniqid() . '_' . time(). '.' . $request->file->extension();
                $path = public_path() .'/article_file';
                $request->file->move($path, $filename);
                $file = $filename;
            }else{
            $file = '--';
            }
        $article= new ArticleSc();
        $article->annee = $request->input('annee');
        $article->titre = $request->titre;
        $article->lien = $request->lien;
        $article->file = $file;
        $article->date = $request->date;
        $article->auteur = $request->auteur;
        $article->mail = $request->mail;
        $article-> auteurex = $request->auteurex ;
        $article-> mailex = $request-> mailex;
        $article->titre_journal = $request->titre_journal;
        $article->quartile = $request->input('quartile');
        $article-> volume= $request->volume;
        $article->  impact= $request-> impact;
        $article->indexation = $request->input('indexation');
        $article->  site_revue= $request-> site_revue;
        $article->save();
        return redirect('article')->with('status', 'article was created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArticleSc  $articleSc
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleSc $articleSc)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticleSc  $articleSc
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleSc $articleSc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArticleSc  $articleSc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleSc $articleSc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleSc  $articleSc
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleSc $articleSc)
    {
        //
    }
}
