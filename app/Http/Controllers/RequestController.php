<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RequestController extends Controller
{
    public function index(){


        $requests = DB::table('requests AS R')
                        ->select('R.product_id', 'P.name', 'T.token', 'R.ipaddress','R.created_at')
                        ->join('products AS P','P.id','=','R.product_id')
                        ->join('tokens AS T','T.id','=','R.token_id')
                        ->get();
        
        $pageid = 3;
        $pageTitle = "Requests";
        return view('requests.index', compact('requests', 'pageid', 'pageTitle'));
    }
}
