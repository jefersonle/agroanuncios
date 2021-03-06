<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\EstadoRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Estado;

class EstadoController extends Controller
{
    public function __construct()

    {
        $this->middleware('auth');  
        $this->middleware('isAdmin');        

    }

    public function getIndex()

    {

       $estados = Estado::orderBy('nome', 'asc')->paginate("10");

        $data['estados'] = $estados;

        return view('admin.estados', $data);   

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {   
        
        return view('admin.formestado');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(EstadoRequest $request)
    {
        $estado = new Estado();
        $estado->nome = $request->nome;
        $estado->uf = $request->uf;
        $estado->save();

        session(['msg' => 'Estado cadastrado!']);
        return redirect('/admin/estados');

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
    public function getEdit($id)
    {
        $data['estado'] = Estado::find($id);
        $data['edit'] = true;
        return view('admin.formestado', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(EstadoRequest $request, $id)
    {
        $estado = Estado::find($id);
        $estado->nome = $request->nome;
        $estado->uf = $request->uf;
        $estado->save();

        session(['msg' => 'Estado editado!']);
        return redirect('/admin/estados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDestroy($id)
    {
        $estado = Estado::find($id);
       
        if($estado->cidades->count() != 0){
           session(['msg' => 'Este estado não pode ser excluído pois contém cidades!']);
            return redirect('/admin/estados');
        }else{
            $estado->delete();
            session(['msg' => 'Estado excluído!']);
            return redirect('/admin/estados');
        }
    }
}
