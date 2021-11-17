<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clube;


class ClubeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clube = new clube();
		$clubes = Clube::All();
        return view("clube.index", [
			"clube" => $clube,
			"clubes" => $clubes
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->get("id") == "") {
			$clube = new Clube();
		} else {
			$clube = Clube::Find($request->get("id"));
		}
		
		$clube->nome_clube = $request->get("nome_clube");
		$clube->save();
		
		$request->Session()->flash("acao", "salvo");
		
		return redirect("/clube");	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clube = Clube::Find($id);
		$clubes = Clube::All();
		return view("clube.index", [
			"clube" => $clube,
			"clubes" => $clubes	
		]);
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
        Clube::Destroy($id);
		$request->Session()->flash("acao", "excluido");
		return redirect("/clube");
    }
}
