<?php

namespace App\Http\Controllers;

use App\Models\PlanoTerapeutico as ModelsPlanoTerapeutico;
use Illuminate\Http\Request;

use App\Models\praticante;
use App\Models\responsavel;
use App\Models\profissionais;
use App\Models\RegistroDiario;
use App\Models\PlanoTerapeutico;


class PlanoTerapeuticoController extends Controller
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
    private $objplano;

    public function __construct()
    {
        $this->objpraticante=new praticante(); //instancia da classe de praticantes
        $this->objprofissional=new profissionais(); //instancia da classe de profissionais
        $this->objresponsavel= new responsavel(); //instancia da classe de responsavel
        $this->objregistro= new RegistroDiario(); //instancia da classe de registros diarios
        $this->objplano= new ModelsPlanoTerapeutico(); //instancia da classe de plano terapeutico
    }

    public function index()
    {
        //dd($this->objregistro->find(1)->relPraticanteRegistro);
        $listaPraticante=$this->objpraticante->all()->sortBy('id'); // Realiza a listagem dos praticantes em ordem alfabética
        $registro=$this->objregistro->all();//parei aqui
       // dd($listaPraticante);
        return view('planoTerapeutico.index', compact('listaPraticante','registro'));  //Retorna a página index dos registros diarios  com a lista de praticantes  
        
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
        $planos=$this->objplano->all();

        return view('planoTerapeutico.create',compact('profissionais','responsaveis','praticantes')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request);
        $cad=$this->objplano->create([
            'queixaPrincipal'=>$request->queixa, 
            'HMP'=>$request->hmp,
            'HMA'=>$request->hma,
            'doencasAssociadas'=>$request->associadas,
            'nivelDeConsciencia'=>$request->consciência,
            'estadoEmocional'=>$request->emocional,

            'metasTerapeuticas'=>$request->metasTerapeuticas,
            'estrategiasDeIntervencao'=>$request->intervencao,
            'cuidadosEspeciais'=>$request->cuidados,
            'id_praticante'=>$request->id_praticante

            
            //Nome da tabela => $request-> Nome do input  
        ]);
        if($cad){
            return redirect(to:'planoterapeutico');            
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
        $plano=$this->objpraticante->find($id)->relPlano;
        //dd($plano);
        return view('planoterapeutico.show', compact('plano'));
        
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
        $plano=$this->objplano->find($id);
        //dd( $plano);
        return view('planoterapeutico.edit',compact('plano'));
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
        
        //dd($request);
        $this->objplano->where(['id'=>$id])->update([
        
            'queixaPrincipal'=>$request->queixa, 
            'HMP'=>$request->hmp, 
            'HMA'=>$request->hma,
            'doencasAssociadas'=>$request->associadas,
            'nivelDeConsciencia'=>$request->consciência,
            'estadoEmocional'=>$request->emocional,
            'metasTerapeuticas'=>$request->metasTerapeuticas,
            'estrategiasDeIntervencao'=>$request->intervencao,
            'cuidadosEspeciais'=>$request->cuidados,


        ]);
        $listaPraticante=$this->objpraticante->all()->sortBy('nome'); // Realiza a listagem dos praticantes em ordem alfabética
        //$registro=$this->objregistro->all(); 

        return view('planoterapeutico.index', compact('listaPraticante'));  //Retorna a página index dos registros diarios  com a lista de praticantes  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        PlanoTerapeutico::destroy($id);
        $listaPraticante=$this->objpraticante->all()->sortBy('nome'); // Realiza a listagem dos praticantes em ordem alfabética
        $registro=$this->objregistro->all();
    return view('planoterapeutico.index', compact('listaPraticante','registro'));  //Retorna a página index dos planos terapêuticos
    }
}
