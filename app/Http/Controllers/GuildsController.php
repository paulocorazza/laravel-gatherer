<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guild;
use Illuminate\Support\Facades\DB;

class GuildsController extends Controller
{
    public function index(Request $request)
    {
        $guilds = Guild::All();
        return view('guilds.index',compact('guilds'));
    }
   
}
