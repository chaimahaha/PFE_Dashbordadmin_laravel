<?php

namespace App\Http\Controllers\Pub;

use App\Models\ArticleSc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ArticleScController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles =DB::table('article_scs')->paginate(3);
        if (Auth::user()-> is_admin ) {
       return view('AdminDashboard.Forms.Posts.article',compact('articles'));}
       else return view('MembreDashboard.Forms.Posts.article',compact('articles'));
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
        //$dynamicRowCount = is_array($this->input('Registration_Tag')) ? count($this->input('Registration_Tag')) : 0;
        $request->validate([
            "annee"=>"required",
            "titre" => "required",
            "lien" => "required",
            "file" => "required|mimes:pdf,doc,docx|max:10000",
            "date" => "",
            
            /*"auteur" =>  [
                'required',
                'array',
                "size:$dynamicRowCount",],
            "mail"=> [
                'required',
                'array',
                "size:$dynamicRowCount",],
            "auteurex"=> [
                'required',
                'array',
                "size:$dynamicRowCount",],
            "mailex"=> [
                'required',
                'array',
                "size:$dynamicRowCount",],*/
                "auteur"=>"required",
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
            /*
            $auteur = $request->auteur;
            $mail = $request->mail;
                for ($i=0; $i < count($auteur); $i++) { 
                 $datasave=
                    [
                        'auteur' => $auteur[$i],
                        'mail' => $mail[$i]
                    ];
                }
            $auteurex = $request->auteurex ;
            $mailex = $request-> mailex;
            for ($i=0; $i < count($auteurex); $i++) { 
                $datasave2=
                   [
                    'auteurex' => $auteurex[$i],
                   'mailex' => $mailex[$i]
                    ];
               }*/
        $article= new ArticleSc();
        $article->annee = $request->annee;
        $article->titre = $request->titre;
        $article->lien = $request->lien;
        $article->file = $file;
        $article->date = $request->date;
        //$article->datasave=$request->datasave;
        //$article->datasave2=$request->datasave2;
        $article->auteur = $request->auteur;
        $article->mail = $request->mail;
        $article->auteurex = $request->auteurex ;
        $article->mailex = $request-> mailex;
        $article->titre_journal = $request->titre_journal;
        $article->quartile = $request->input('quartile');
        $article-> volume= $request->volume;
        $article->  impact= $request-> impact;
        $article->indexation = $request->input('indexation');
        $article->  site_revue= $request-> site_revue;
        $article->save();
        return redirect('article')->with('status', 'article was created');
    }
    function deleteArticle(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => "required",
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        ArticleSc::find($request->id)->delete();
        return back()
            ->with('success', 'Article deleted successfully');
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
    public function editArticle($id)
    {
        $articles = ArticleSc::find($id);
        if (Auth::user()-> is_admin ) {
        return view('AdminDashboard.UpdatedForms.editArticle',compact('articles'));
        } else  return view('MembreDashboard.UpdatedForms.editArticle',compact('articles'));
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
        $id=$request->id;
        $annee = $request->input('annee');
        $titre = $request->input('titre');
        $lien = $request->input('lien');
        $date = $request->input('date');
        $auteur = $request->input('auteur');
        $mail = $request->input('mail');
        $auteurex = $request->input('auteurex');
        $mailex = $request->input('mailex');
        $titre_journal = $request->input('titre_journal');
        $quartile = $request->input('quartile');
        $volume= $request->input('volume');
        $impact= $request-> input('impact');
        $indexation = $request->input('indexation');
        $site_revue= $request-> input('site_revue');
        $isUpdateSuccess= ArticleSc::where('id',$id) ->update([ 'annee'=>$annee,
                                                                'titre'=>$titre,
                                                                'lien'=>$lien,
                                                                'date'=>$date,
                                                                'auteur'=>$auteur,
                                                                'mail'=>$mail,
                                                                'auteurex'=>$auteurex,
                                                                'mailex'=>$mailex,
                                                                'titre_journal'=>$titre_journal,
                                                                'quartile'=>$quartile,
                                                                'volume'=>$volume,
                                                                'impact'=>$impact,
                                                                'indexation'=>$indexation,
                                                                'site_revue'=>$site_revue


                                                            ]);
        return redirect('postsManager')->with('status', 'Article was updated');
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
