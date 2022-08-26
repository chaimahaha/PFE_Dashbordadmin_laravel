<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Charts extends Controller
{
    function userCharts (){
        $result=DB::select(DB::raw("SELECT COUNT(*) as total_grade , grade FROM users GROUP BY grade
        "));
        $chartsData="";
        foreach($result as $list){
            $chartsData .="['".$list->grade." ' ,      ".$list->total_grade."], ";
        }
        $arr['chartsData'] = rtrim($chartsData,",");
        return view ('AdminDashboard.Dashboard.dashboard1',$arr);
    }
}
