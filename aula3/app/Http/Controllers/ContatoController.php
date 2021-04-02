<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;

class ContatoController extends Controller
{
    //INÍCIO - FUNÇÕES WEB
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contatos = Contato::all();
        return view('contato.listar',compact('contatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = '';
        $verb = 'POST';
        $action = '/cadastrar';
        return view('contato.cadastrarEditar',compact('id','verb','action'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $verb = 'PUT';
        $action = '/editar/';
        $contato = Contato::find($id);
        return view('contato.cadastrarEditar',compact('id','verb','action','contato'));
    }

    /**
     * Show the form for delete the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $verb = 'DELETE';
        $action = '/deletar/';
        $contato = Contato::find($id);
        return view('contato.cadastrarEditar',compact('id','verb','action','contato'));
    }
    //FIM - FUNÇÕES WEB

    //INÍCIO - FUNÇÕES API
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contato = Contato::find($id);
        if(empty($contato)) {
            return response()->json([
                'message' => 'Registro não encontrado.'
            ],404);
        }
        else {
            return response()->json($contato);
        }
    }

    public function showAll()
    {
        $contatos = Contato::all();
        if(empty($contatos->first())) {
            return response()->json([
                'message' => '0 registros encontrados.',
            ],404);
        }
        else {
            return response()->json($contatos);
        }

    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            \DB::beginTransaction();
            $contato = new Contato;
            $contato->fill($request->all());
            $contato->save();

            \DB::commit();
            return response()->json($contato, 201);
            
        } catch (\PDOException $e) {
            \DB::rollBack();
            return response()->json(['message' => $e->getMessage()
        ],400);

        }
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
        $contato = Contato::find($id);
        if(empty($contato)) {
            return response()->json([
                'message' => 'Registro não encontrado.',
            ], 404);
        }
        else {

            try {
                \DB::beginTransaction();
                $contato->fill($request->all());
                $contato->update();

                \DB::commit();
                return response()->json($contato, 201);
                
            } catch (\PDOException $e) {
                \DB::rollBack();
                return response()->json([
                    'message'=> $e->getMessage()
                ], 400);
                
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $contato = Contato::find($id);
        if(empty($contato)) {
            return response()->json([
                'message'=> 'Registro não encontrado.',
            ], 404);
        }
        else {

            try {
                \DB::beginTransaction();
                $contato->deleted_at = date('Y-m-d H:i:s');
                $contato->save();

                \DB::commit();
                return response()->json([
                    'message' => 'Registro deletado',
                ], 200);
                
            } catch (\PDOException $e) {
                \DB::rollBack();
                return response()->json([
                    'message'=> $e->getMessage()
                ], 400);                
            }
        }
    }
    //FIM - FUNÇÕES API
}
