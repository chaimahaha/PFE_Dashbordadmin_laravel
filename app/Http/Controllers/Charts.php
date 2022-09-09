<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Actuality;
use App\Models\ArticleSc;
use App\Models\Brevet;
use App\Models\ChapitreOuv;
use App\Models\Conference;
use App\Models\Cooperation;
use App\Models\Domaine;
use App\Models\Event;
use App\Models\Formation;
use App\Models\habilitation;
use App\Models\Manifestation;
use App\Models\Master;
use App\Models\OuvrageSc;
use App\Models\Pfe;
use App\Models\Publication;
use App\Models\These;
use phpDocumentor\Reflection\Types\Null_;

class Charts extends Controller
{
    
    function userCharts (){
        
        $result=DB::select(DB::raw("SELECT COUNT(*) as total_grade , grade FROM users WHERE deleted_at IS NULL GROUP BY grade
        "));
        $chartsData="";
        foreach($result as $list){
            $chartsData .="['".$list->grade." ' ,      ".$list->total_grade."], ";
        }
        $arr['chartsData'] = rtrim($chartsData,",");
        $confs =DB::table('manifestations')->select(DB::raw('count(*) as total_conf'))->where(DB::raw('deleted_at',Null))->pluck('total_conf');
        $formations =DB::table('formations')->select(DB::raw('count(*) as form'))->where(DB::raw('deleted_at',Null))->pluck('form');
        $arts =DB::table('article_scs')->select(DB::raw('count(*) as total_arts'))->where(DB::raw('deleted_at',Null))->pluck('total_arts');
        $brevs =DB::table('brevets')->select(DB::raw('count(*) as total_brev'))->where(DB::raw('deleted_at',Null))->pluck('total_brev');
        $ouvs =DB::table('ouvrage_scs')->select(DB::raw('count(*) as total_ouv'))->where(DB::raw('deleted_at',Null))->pluck('total_ouv');
        $chaps =DB::table('chapitre_ouvs')->select(DB::raw('count(*) as total_chap'))->where(DB::raw('deleted_at',Null))->pluck('total_chap');
        $confes =DB::table('conferences')->select(DB::raw('count(*) as total_confes'))->where(DB::raw('deleted_at',Null))->pluck('total_confes');
        $hab =DB::table('habilitations')->select(DB::raw('count(*) as total_hab'))->where(DB::raw('deleted_at',Null))->pluck('total_hab');
        $masters =DB::table('masters')->select(DB::raw('count(*) as total_master'))->where(DB::raw('deleted_at',Null))->pluck('total_master');
        $pfes =DB::table('pves')->select(DB::raw('count(*) as total_pfe'))->where(DB::raw('deleted_at',Null))->pluck('total_pfe');
        $theses =DB::table('theses')->select(DB::raw('count(*) as total_these'))->where(DB::raw('deleted_at',Null))->pluck('total_these');
        return view ('AdminDashboard.Dashboard.dashboard1',$arr,compact('confs','formations','arts','brevs','ouvs','chaps','confes',
        'hab','masters','pfes','theses'));
        
    }
    function pieChart(){
        $results=DB::select(DB::raw("SELECT COUNT(*) as total_class , class FROM manifestations WHERE deleted_at IS NULL GROUP BY class
        "));
        $chartsDatas="";
        foreach($results as $lists){
            $chartsDatas .="['".$lists->class." ' ,      ".$lists->total_class."], ";
        }
        $arrc['chartsDatas'] = rtrim($chartsDatas,",");
        return view('AdminDashboard.Dashboard.googleapicharts',$arrc);
    }


}
