<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{

    public function listarClientes(){
        $cliente = new Cliente();
        $data= $cliente::paginate(10);
        return view('clientes',['data'=>$data]);
    }

    public function buscaClientes($s){
        $data = Cliente::where('CPF','like', '%'.$s.'%')->paginate(10);
        return view('clientes',['data'=>$data]);
    }

    public function create(){
        return view('criarCliente');
    }

    public function edit($id){
        $cliente= Cliente::find($id);

        return view('editarCliente',['cliente'=> $cliente]);
    }

    public function validar($request){
        $request->validate([
            'nome'=> 'required',
            'CPF'=> 'required',
            'email'=> 'required',
            'telefone'=> 'required',
            'endereco'=> 'required',
        ],[
            'nome.required'=>'Campo nome deve ser preenchido',
            'CPF.required'=>'Campo CPF deve ser preenchido',
            'email.required'=>'Campo email deve ser preenchido',
            'telefone.required'=>'Campo telefone deve ser preenchido',
            'endereco.required'=>'Campo endereco deve ser preenchido'
        ]);
    }

    public function store(Request $request){
        $this->validar($request);

        $cliente = new Cliente();
        $cliente->fill($request->all());
        $cliente->save();

        return redirect()->route('clientes');
    }

    public function update(Request $request){
        $this->validar($request);

        $cliente= Cliente::find($request->id);
        $cliente->update($request->all());

        return redirect()->route('clientes');
    }

    public function destroy($id)
    {
        Cliente::destroy($id);
    }
}
