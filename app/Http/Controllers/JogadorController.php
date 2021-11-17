<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\models\Jogador;
use App\models\Posicao;
use App\models\Clube;



class JogadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jogadores = DB::table("jogador AS j")
                ->join("posicao AS p", "j.posicao", "=", "p.id")
                ->select("j.nome_jogador", "j.id", "p.descricao AS posicao")
                ->get();
        
$jogador = new Jogador ();
$posicoes = Posicao::All();


return view("jogador.index", [
        "jogadores" => $jogadores,
        "jogador" => $jogador,
        "jogadores" => $jogadores
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
        if ($request->get("id") == ""){
			$jogador = new Jogador();
		}else{
			$jogador = Jogador::Find($request->get("id"));
		}
			
		
		$jogador->nome_jogador = $request->get("nome_jogador");
		$jogador->data_nascimento = $request->get("data_nascimento");
		$jogador->posicao = $request->get("posicao");
		
		$jogador->save();
		
		$request->Session()->flash("acao", "salvo");
		
		return redirect("/jogador");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jogador = Jogador::Find($id);
		return response()->json([
			"nome_jogador" => $jogador->nome_jogador,
		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jogadores = DB::table("jogador AS j")
					->join("posicao AS p", "j.posicao", "=", "p.id")
					->select("j.nome_jogador", "j.id", "p.descricao AS posicao")
					->get();
					
        $jogadores = Jogador::All();
		$jogador = Jogador::Find($id);
		$posicoes = Posicao::All();
		
		
		return view("jogador.index", [
			"jogadores" => $jogadores,
			"jogador" => $jogador,
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
        Jogador::Destroy($id);	
		$request->Session()->flash("acao", "excluido");
		return redirect("/jogador");
    }
}
