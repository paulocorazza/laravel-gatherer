<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use Illuminate\Support\Facades\DB;
Use Alert;


class CardsController extends Controller
{
    public function index(Request $request)
    {
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
}
