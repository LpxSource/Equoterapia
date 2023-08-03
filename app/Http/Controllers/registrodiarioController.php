<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\praticante;
use App\Models\responsavel;
use App\Models\profissionais;
use App\Models\RegistroDiario;

use Illuminate\Console\Scheduling\Event;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use phpDocumentor\Reflection\Types\Null_;

class registrodiarioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $objprofissional;
    private $objpraticante;
    private $objresponsavel;
    private $objregistro;

    public function __construct()
    {
        $this->objpraticante=new praticante(); //instancia da classe de praticantes
        $this->objprofissional=new profissionais(); //instancia da classe de profissionais
        $this->objresponsavel= new responsavel(); //instancia da classe de responsavel
        $this->objregistro= new RegistroDiario(); //instancia da classe de registros diarios

    }
    public function index()
    {
        //dd($this->objregistro->find(1)->relPraticanteRegistro);
        $listaPraticante=$this->objpraticante->all()->sortBy('id'); // Realiza a listagem dos praticantes em ordem alfabética
        $registro=$this->objregistro->all();//Coleta todos os registros diarios dentro do DB
        
        return view('RegistroDiario.index', compact('listaPraticante','registro'));  //Retorna a página index dos registros diarios  com a lista de praticantes  
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profissionais=$this->objprofissional->all();
        $responsaveis=$this->objresponsavel->all();
        $praticantes=$this->objpraticante->all();
        
        return view('RegistroDiario.create',compact('profissionais','responsaveis','praticantes')); 
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
        $cad=$this->objregistro->create([
        
            'id_praticante'=>$request->id_praticante,
            'condutor'=>$request->condutor,
            'mediadores'=>$request->mediador,
            'cavalo'=>$request->cavalo,
            'Data'=>$request->datetime,
            'encilhamento'=>$request->encilhamento,
            'observacoes'=>$request->observacoes,

            //Nome da tabela => $request-> Nome do input            
         ]);
        if($cad){
            return redirect(to:'registrodiario');            
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
        
        $registro=$this->objpraticante->find($id)->relRegistroDiario;
        //dd($registro);
        return view('RegistroDiario.showRegistro', compact('registro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($id);
        $registro=$this->objregistro->find($id);
        
        return view('RegistroDiario.edit',compact('registro'));
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
        //dd($id);
        $this->objregistro->where(['id'=>$id])->update([
        
            'mediadores'=>$request->nomeMediador, 
            'condutor'=>$request->nomeCondutor, 
            'cavalo'=>$request->nomeCavalo,
            'encilhamento'=>$request->encilhamento,
            'Data'=>$request->datetime,
            'encilhamento'=>$request->encilhamento,
            'observacoes'=>$request->observacoes,


        ]);
        $listaPraticante=$this->objpraticante->all()->sortBy('nome'); // Realiza a listagem dos praticantes em ordem alfabética
        $registro=$this->objregistro->all();//parei aqui 

        return view('RegistroDiario.index', compact('listaPraticante','registro'));  //Retorna a página index dos registros diarios  com a lista de praticantes  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        RegistroDiario::destroy($id);
            $listaPraticante=$this->objpraticante->all()->sortBy('nome'); // Realiza a listagem dos praticantes em ordem alfabética
            $registro=$this->objregistro->all();
        return view('RegistroDiario.index', compact('listaPraticante','registro'));  //Retorna a página index dos registros diarios  com a lista de praticantes  
    }
}
