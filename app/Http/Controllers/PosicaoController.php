<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posicao;

class PosicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posicao = new posicao();
		$posicoes = Posicao::All();
        return view("posicao.index", [
			"posicao" => $posicao,
			"posicoes" => $posicoes
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ($request->get("id") == "") {
			$posicao = new Posicao();
		} else {
			$posicao = Posicao::Find($request->get("id"));
		}
		
		$posicao->descricao = $request->get("descricao");
		$posicao->save();
		
		$request->Session()->flash("acao", "salvo");
		
		return redirect("/posicao");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $posicao = Posicao::Find($id);
		$posicoes = Posicao::All();
		return view("posicao.index", [
			"posicao" => $posicao,
			"posicoes" => $posicoes	
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
        Posicao::Destroy($id);
		$request->Session()->flash("acao", "excluido");
		return redirect("/posicao");
    }
}
