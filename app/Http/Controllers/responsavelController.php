<?php

namespace App\Http\Controllers;

use App\Models\praticante;
use App\Models\profissionais;
use App\Models\responsavel;
use App\Http\Controllers\profissionalController;
use Illuminate\Console\Scheduling\Event;
use \Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use phpDocumentor\Reflection\Types\Null_;

class responsavelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->objpraticante=new praticante(); //instancia da classe de praticantes
        $this->objprofissional=new profissionais(); //instancia da classe de profissionais
        $this->objresponsavel= new responsavel(); //instancia da classe de responsavel
     }
    public function index()
    {
        $listaResponsaveis=$this->objresponsavel->all()->sortBy('nome'); // Realiza a listagem dos responsaveis em ordem alfabética
       
        return view('responsaveis.responsaveis', compact('listaResponsaveis'));  //Retorna a página index  com a lista de responsaveis      
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $praticantes=$this->objpraticante->all();
        return view('responsaveis.create',compact('praticantes')); 
        // retorna a página de criação de cadastro de responsaveis passando $praticantes como parametro
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
        $cad=$this->objresponsavel->create([
            'nome'=>$request->nomeResponsavel, 
            'nascimento'=>$request->nascimentoResponsavel,
            'grauDeParentesco'=>$request->parentesco,
            'profissao'=>$request->profissaoResponsavel,
            'telefone'=>$request->telefoneResponsavel,
            'telefoneTrabalho'=>$request->telefoneTrabalho,
            'email'=>$request->email,
            'endereco'=>$request->enderecoResponsavel,
            'rendaFamiliar'=>$request->rendaResponsavel,
            'observacao'=>$request->observacoesResponsavel
            
            //Nome da tabela => $request-> Nome do input    
                 
         ]);
        if($cad){
            return redirect(to:'responsaveis');            
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
        $responsavel=$this->objresponsavel->find($id);
        return view('responsaveis.show', compact('responsavel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $responsavel=$this->objresponsavel->find($id);
        return view('responsaveis.create',compact('responsavel'));


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
        $this->objresponsavel->where(['id'=>$id])->update([
        
            'nome'=>$request->nomeResponsavel, 
            'nascimento'=>$request->nascimentoResponsavel,
            'grauDeParentesco'=>$request->parentesco,
            'profissao'=>$request->profissaoResponsavel,
            'telefone'=>$request->telefoneResponsavel,
            'telefoneTrabalho'=>$request->telefoneTrabalho,
            'email'=>$request->email,
            'endereco'=>$request->enderecoResponsavel,
            'rendaFamiliar'=>$request->rendaResponsavel,
            'observacao'=>$request->observacoesResponsavel,

        ]);
        $listaResponsaveis=$this->objresponsavel->all()->sortBy('nome'); // Realiza a listagem dos praticantes em ordem alfabética
 
        return view('responsaveis.responsaveis', compact('listaResponsaveis' ));  //Retorna a página index dos registros diarios  com a lista de praticantes  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        responsavel::destroy($id);
        return redirect('responsaveis')->with('flash_message', 'Responsavel desligado');   
    }
}
