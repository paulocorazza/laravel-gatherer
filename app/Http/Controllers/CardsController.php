<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
Use Alert;


class CardsController extends Controller
{
    public function index(Request $request)
    {
        // if(Auth::check()){
        //     throw new AuthenticationException();
        // }
        $cards = Card::All();
        //DB::table('cards')->truncate();
        return view('cards.index',compact('cards'));
    }
    
    public function create()
    {
        return view('cards.create');
    }

    public function edit($id)
    {
        $card = Card::find($id);
        return view('cards.edit')->with('card',$card);
    }

    public function update($id, Request $request)
    {
        $card = Card::find($id);
        $card->condition = $request->condition;
        $card->quantity  = $request->quantity;
        $card->CMC = $request->CMC;
        $card->save();
        Alert::success('Success', $card->name .' updated');
        return to_route('cards.index');
    }


    public function show($id)
    {
        $card =  Card::Find($id);
        return view('cards.show')->with('card',$card);
    }

    public function store(Request $request)
    {
        Card::create($request->all());
        Alert::success('Success','Card creaded successfully!');
        return to_route('cards.index');
    }

    public function destroy($id)
    {
        $card = Card::find($id);
        $card->delete();
        //Alert::success('Success', $card->name.' deleted ');
        return to_route('cards.index');
    }

    public function showRedCards()
    {
        $cards = Card::where('color', '=', 'r')->get();
        return view('cards.index',compact('cards'));
    }

    public function showBlackCards()
    {
        $cards = Card::where('color', '=', 'b')->get();
        return view('cards.index',compact('cards'));
    }

    public function showBlueCards()
    {
        $cards = Card::where('color', '=', 'u')->get();
        return view('cards.index',compact('cards'));
    }

    public function showWhiteCards()
    {
        $cards = Card::where('color', '=', 'w')->get();
        return view('cards.index',compact('cards'));
    }


    public function showGreenCards()
    {
        $cards = Card::where('color', '=', 'g')->get();
        return view('cards.index',compact('cards'));
    }
}
