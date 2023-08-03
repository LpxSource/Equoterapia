<?php

namespace App\Http\Controllers;

use App\Http\Requests\PraticanteRequest;

use App\Models\praticante;
use App\Models\profissionais;
use Illuminate\Console\Scheduling\Event;
use \Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use phpDocumentor\Reflection\Types\Null_;

class profissionalController extends Controller{
    private $objprofissional;
    private $objpraticante;
    public function __construct()
    {
        $this->objpraticante=new praticante(); //instancia da classe de praticantes
        $this->objprofissional=new profissionais(); //instancia da classe de profissionais
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //$profissionais= profissionais::all();
        $profissionais= $this->objprofissional->all()->sortby('id'); // Realiza a listagem dos praticantes em ordem alfabética
        return view('profissionais.Profissionais', compact('profissionais'));  //Retorna a página index  com a lista de praticantes  
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profissionais.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $cad=$this->objprofissional->create([
            'nome'=>$request->nomeProfissional, 
            'cpf'=>$request->cpf,
            'nascimento'=>$request->nascimento,
            'funcao'=>$request->funcao,
            'conselho'=>$request->conselho,
            'endereco'=>$request->edereco,
            'contato'=>$request->contato,
            //Nome da tabela => $request-> Nome do input  
         ]);

         $profissionais= $this->objprofissional->all()->sortby('nome');
        if($cad){
            return view('profissionais.Profissionais', compact('profissionais'));
            //return view('profissionais.Profissionais')->with('flash_message', 'Profissional cadastrado');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listaProfissional= $this->objprofissional->find($id);
        return view('profissionais.show', compact('listaProfissional'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profissional=$this->objprofissional->find($id);
        return view('profissionais.edit',compact('profissional'));

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
        $this->objprofissional->where(['id'=>$id])->update([
            'nome'=>$request->nomeProfissional, 
            'nascimento'=>$request->nascimento, 
            'cpf'=>$request->cpf, 
            'funcao'=>$request->funcao,
            'conselho'=>$request->conselho,
            'endereco'=>$request->edereco,
            'contato'=>$request->contato,
            
        ]);
        $profissionais= $this->objprofissional->all()->sortby('nome');

        return view('profissionais.Profissionais', compact('profissionais'));    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        profissionais::destroy($id);
        $profissionais= $this->objprofissional->all()->sortby('nome');

        return view('profissionais.Profissionais', compact('profissionais'));
    }
}
