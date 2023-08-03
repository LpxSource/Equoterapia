<?php

namespace App\Http\Controllers;

use App\Http\Requests\PraticanteRequest;

use App\Models\praticante;
use App\Models\profissionais;
use App\Models\responsavel;
use App\Http\Controllers\profissionalController;
use Illuminate\Console\Scheduling\Event;
use \Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use phpDocumentor\Reflection\Types\Null_;




class praticanteController extends Controller
{
    private $objprofissional;
    private $objpraticante;
    private $objresponsavel;
    public function __construct()
    {
        $this->objpraticante=new praticante(); //instancia da classe de praticantes
        $this->objprofissional=new profissionais(); //instancia da classe de profissionais
        $this->objresponsavel= new responsavel(); //instancia da classe de responsavel
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaPraticante=$this->objpraticante->all()->sortBy('nome'); // Realiza a listagem dos praticantes em ordem alfabética
       
       return view('praticantes', compact(var_name:'listaPraticante'));  //Retorna a página index  com a lista de praticantes      
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
        return view('create',compact('profissionais','responsaveis')); 
        // retorna a página de criação de cadastro de praticantes passando $profissionais como parametro
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PraticanteRequest $request)
    {
        //pega osvalores dos campos para serem salvos no banco usando o $request   
        //dd($request);     
        $cad=$this->objpraticante->create([
            'nome'=>$request->nomePraticante, 
            'escolaridade'=>$request->escolaridadePraticante,
            'instituicaoEnsino'=>$request->instituicaoPraticante,
            'periodo'=>$request->periodoPraticante,
            'inicioNaEquo'=>$request->inicioPraticante,
            'previsaoDeAlta'=>$request->previsaoPraticante,
            'diagnostico'=>$request->diagnostico,
            'RespPelaColeta'=>$request->RespPelaColeta,
            'segunda'=>$request->segunda,
            'terca'=>$request->terca,
            'quarta'=>$request->quarta,
            'quinta'=>$request->quinta,
            'sexta'=>$request->sexta,
            'obs'=>$request->obs,
            'endereco'=>$request->endereco,

            'id_profissional'=>$request->id_profissional,
            'id_responsavel'=>$request->id_responsavel,
         
            //Nome da tabela => $request-> Nome do input            
         ]);
        if($cad){
            return redirect(to:'praticantes');            
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
    
       $praticante=$this->objpraticante->find($id);
        return view('showPraticantes', compact('praticante'));
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
               
        $praticante=$this->objpraticante->find($id);
        $profissionais=$this->objprofissional->all();
        $responsaveis=$this->objresponsavel->all();
        return view('create',compact('praticante','profissionais','responsaveis'));
        // a pagina de cadastro é adaptada para o cadastro e a edição de dados 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    
   public function update(praticanteRequest $request, $id)
    {   //verifica o id do praticante e realiza as alterações dos campos
    
   
      $this->objpraticante->where(['id'=>$id])->update([
        'nome'=>$request->nomePraticante, 
        'escolaridade'=>$request->escolaridadePraticante,
        'instituicaoEnsino'=>$request->instituicaoPraticante,
        'periodo'=>$request->periodoPraticante,
        'inicioNaEquo'=>$request->inicioPraticante,
        'previsaoDeAlta'=>$request->previsaoPraticante,
        'diagnostico'=>$request->diagnostico,
        'RespPelaColeta'=>$request->RespPelaColeta,
        'segunda'=>$request->segunda,
        'terca'=>$request->terca,
        'quarta'=>$request->quarta,
        'quinta'=>$request->quinta,
        'sexta'=>$request->sexta,
        'obs'=>$request->obs,
        'endereco'=>$request->endereco,
    
        'id_profissional'=>$request->id_profissional,
        'id_responsavel'=>$request->id_responsavel,
        ]);
    
 return redirect(to: 'praticantes'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        praticante::destroy($id);
        return redirect('praticantes')->with('flash_message', 'Praticante desligado');        
    }
}
