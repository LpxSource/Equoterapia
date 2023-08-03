<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\praticante;
use App\Models\responsavel;
use App\Models\profissionais;
use App\Models\RegistroDiario;
use App\Models\fisioterapica;


use Illuminate\Console\Scheduling\Event;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use phpDocumentor\Reflection\Types\Null_;

class fisioterapicaController extends Controller
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
    private $objfisioterapica;


     public function __construct()
     {
         $this->objpraticante=new praticante(); //instancia da classe de praticantes
         $this->objprofissional=new profissionais(); //instancia da classe de profissionais
         $this->objresponsavel= new responsavel(); //instancia da classe de responsavel
         $this->objregistro= new RegistroDiario(); //instancia da classe de registros diarios
         $this->objfisioterapica= new fisioterapica();// instancia da classe de avaliacao fisioterapica
     }

    public function index()
    {
        $listaPraticante=$this->objpraticante->all()->sortBy('id'); // Realiza a listagem dos praticantes em ordem alfabética
       //dd( $listaPraticante);
        return view('avaliacaoFisioterapica.index', compact('listaPraticante'));  //Retorna a página index dos registros diarios  com a lista de praticantes  

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $praticantes=$this->objpraticante->all();// Realiza a listagem de todos os praticantes cadastrados
        return view('avaliacaoFisioterapica.create', compact('praticantes'));  //Retorna a página index dos registros diarios  com a lista de praticantes  

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
        $cad=$this->objfisioterapica->create([
        
            'id_praticante'=>$request->id_praticante,
            'diagnosticoClinico'=>$request->diagnosticoClinico,
            'diagnosticoFisioterapeutico'=>$request->diagnosticoFisioterapeutico,
            'dataAvaliacao'=>$request->dataAvaliacao,
            'historiaGestacional'=>$request->historiaGestacional,
            'parto'=>$request->parto,
            'choro'=>$request->choro,
            'apgar'=>$request->apgar,
            'peso'=>$request->peso,
            'comprimento'=>$request->comprimento,
            'idadeGestacional'=>$request->idadeGestacional,
            'complicacoes'=>$request->complicacoes,
            'uti'=>$request->uti,
            'tempo'=>$request->tempo,
            'altaHospitalar'=>$request->altaHospitalar,
            'idadePrimeiroDiagnostico'=>$request->idadePrimeiroDiagnostico,
            'convulcoes'=>$request->convulcoes,
            'medicamentos'=>$request->medicamentos,
            'constipacao'=>$request->constipacao,
            'sono'=>$request->sono,
            'audicao'=>$request->audicao,
            'refluxoGastroesofagico'=>$request->refluxoGastroesofagico,
            'intervencoesCirurgicas'=>$request->intervencoesCirurgicas,
            'alergias'=>$request->alergias,
            'consideracoesPos'=>$request->consideracoesPos,
            'fala'=>$request->fala,
            'gestos'=>$request->gestos,
            'usoDosOlhos'=>$request->usoDosOlhos,
            'ttoAnteriores'=>$request->ttoAnteriores,
            'ttoAtuais'=>$request->ttoAtuais,
            'sustentacaoCabeca'=>$request->sustentacaoCabeca,
            'sentar'=>$request->sentar,
            'engatinhar'=>$request->engatinhar,
            'andar'=>$request->andar,
            'queixaprincipal'=>$request->queixaprincipal,
            'locomocaoAtual'=>$request->locomocaoAtual,
            'mobilidadeArticular'=>$request->mobilidadeArticular,
            'restricoes'=>$request->restricoes,
            'deformidades'=>$request->deformidades,
            'ortesesProteses'=>$request->ortesesProteses,
            'scoreAdutor'=>$request->scoreAdutor,
            'scoremuscular'=>$request->scoremuscular,

            'sustentoDaCabeca'=>$request->sustentoDaCabeca,
            'sentaSemApoio'=>$request->sentaSemApoio,
            'posOrtostaticaSA'=>$request->posOrtostaticaSA,
            'posOrtostaticaCA'=>$request->posOrtostaticaCA,
            'posMilitarOA'=>$request->posMilitarOA,
            'posMilitarOF'=>$request->posMilitarOF,
            'umPeSoOA'=>$request->umPeSoOA,
            'umPeSoOF'=>$request->umPeSoOF,
            'engatinha'=>$request->engatinha,
            'marchaVoluntaria'=>$request->marchaVoluntaria,
            'saltarDoisPes'=>$request->saltarDoisPes,
            'correrDesviando'=>$request->correrDesviando,

            'alcanceDeObjetos'=>$request->alcanceDeObjetos,
            'bimanual'=>$request->bimanual,
            'alimentase'=>$request->alimentase,
            'vestese'=>$request->vestese,
            'preensaoObjetos'=>$request->preensaoObjetos,
            'negligenciaMembro'=>$request->negligenciaMembro,
            'higienizase'=>$request->higienizase,
            'caminhar'=>$request->caminhar,
            'escritaManual'=>$request->escritaManual,
            'provaMaoObjetos'=>$request->provaMaoObjetos,
            'indexNarizUnilateral'=>$request->indexNarizUnilateral,
            'noEngatinhar'=>$request->noEngatinhar,
            'saltarDoisPes'=>$request->saltarDoisPes,
            'naMarcha'=>$request->naMarcha,
            'sequenciaMovimentos'=>$request->sequenciaMovimentos,
            'entraSaiSentado'=>$request->entraSaiSentado,
            'sentadoCadeira'=>$request->sentadoCadeira,
            'PosEquilibrio'=>$request->PosEquilibrio,
            'passaSentado'=>$request->passaSentado,
            'comAuxilio'=>$request->comAuxilio,
            'semAuxilio'=>$request->semAuxilio,
            'sobe'=>$request->sobe,
            'desce'=>$request->desce,
            'passaObstaculo'=>$request->passaObstaculo,
            'pula'=>$request->pula,
            'corre'=>$request->corre,
            'preensao'=>$request->preensao,
            'tonusMuscularDescricao'=>$request->tonusMuscularDescricao,
            'conclusao'=>$request->conclusao,

            



            //Nome da tabela => $request-> Nome do input            
         ]);
        if($cad){
            return redirect(to:'fisioterapica');            
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $show=$this->objpraticante->find($id)->relAvFisio;
            //dd($show);
            $praticantes=$this->objpraticante->all();// Realiza a listagem de todos os praticantes cadastrados
            
            $avaliacao=$this->objfisioterapica->find($id);
            //dd($avaliacao);
            if($show==NULL){
                return redirect()->back()->with('message', 'O praticante não possui avaliação');
            }
        } 
        catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
 
       
       return view('avaliacaoFisioterapica.edit',compact('avaliacao','show','praticantes'));
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
        $this->objfisioterapica->where(['id'=>$id])->update([
        
            'id_praticante'=>$request->id_praticante,
            'diagnosticoClinico'=>$request->diagnosticoClinico,
            'diagnosticoFisioterapeutico'=>$request->diagnosticoFisioterapeutico,
            'dataAvaliacao'=>$request->dataAvaliacao,
            'historiaGestacional'=>$request->historiaGestacional,
            'parto'=>$request->parto,
            'choro'=>$request->choro,
            'apgar'=>$request->apgar,
            'peso'=>$request->peso,
            'comprimento'=>$request->comprimento,
            'idadeGestacional'=>$request->idadeGestacional,
            'complicacoes'=>$request->complicacoes,
            'uti'=>$request->uti,
            'tempo'=>$request->tempo,
            'altaHospitalar'=>$request->altaHospitalar,
            'idadePrimeiroDiagnostico'=>$request->idadePrimeiroDiagnostico,
            'convulcoes'=>$request->convulcoes,
            'medicamentos'=>$request->medicamentos,
            'constipacao'=>$request->constipacao,
            'sono'=>$request->sono,
            'audicao'=>$request->audicao,
            'refluxoGastroesofagico'=>$request->refluxoGastroesofagico,
            'intervencoesCirurgicas'=>$request->intervencoesCirurgicas,
            'alergias'=>$request->alergias,
            'consideracoesPos'=>$request->consideracoesPos,
            'fala'=>$request->fala,
            'gestos'=>$request->gestos,
            'usoDosOlhos'=>$request->usoDosOlhos,
            'ttoAnteriores'=>$request->ttoAnteriores,
            'ttoAtuais'=>$request->ttoAtuais,
            'sustentacaoCabeca'=>$request->sustentacaoCabeca,
            'sentar'=>$request->sentar,
            'engatinhar'=>$request->engatinhar,
            'andar'=>$request->andar,
            'queixaprincipal'=>$request->queixaprincipal,
            'locomocaoAtual'=>$request->locomocaoAtual,
            'mobilidadeArticular'=>$request->mobilidadeArticular,
            'restricoes'=>$request->restricoes,
            'deformidades'=>$request->deformidades,
            'ortesesProteses'=>$request->ortesesProteses,
            'scoreAdutor'=>$request->scoreAdutor,
            'scoremuscular'=>$request->scoremuscular,

            'sustentoDaCabeca'=>$request->sustentoDaCabeca,
            'sentaSemApoio'=>$request->sentaSemApoio,
            'posOrtostaticaSA'=>$request->posOrtostaticaSA,
            'posOrtostaticaCA'=>$request->posOrtostaticaCA,
            'posMilitarOA'=>$request->posMilitarOA,
            'posMilitarOF'=>$request->posMilitarOF,
            'umPeSoOA'=>$request->umPeSoOA,
            'umPeSoOF'=>$request->umPeSoOF,
            'engatinha'=>$request->engatinha,
            'marchaVoluntaria'=>$request->marchaVoluntaria,
            'saltarDoisPes'=>$request->saltarDoisPes,
            'correrDesviando'=>$request->correrDesviando,

            'alcanceDeObjetos'=>$request->alcanceDeObjetos,
            'bimanual'=>$request->bimanual,
            'alimentase'=>$request->alimentase,
            'vestese'=>$request->vestese,
            'preensaoObjetos'=>$request->preensaoObjetos,
            'negligenciaMembro'=>$request->negligenciaMembro,
            'higienizase'=>$request->higienizase,
            'caminhar'=>$request->caminhar,
            'escritaManual'=>$request->escritaManual,
            'provaMaoObjetos'=>$request->provaMaoObjetos,
            'indexNarizUnilateral'=>$request->indexNarizUnilateral,
            'noEngatinhar'=>$request->noEngatinhar,
            'saltarDoisPes'=>$request->saltarDoisPes,
            'naMarcha'=>$request->naMarcha,
            'sequenciaMovimentos'=>$request->sequenciaMovimentos,
            'entraSaiSentado'=>$request->entraSaiSentado,
            'sentadoCadeira'=>$request->sentadoCadeira,
            'PosEquilibrio'=>$request->PosEquilibrio,
            'passaSentado'=>$request->passaSentado,
            'comAuxilio'=>$request->comAuxilio,
            'semAuxilio'=>$request->semAuxilio,
            'sobe'=>$request->sobe,
            'desce'=>$request->desce,
            'passaObstaculo'=>$request->passaObstaculo,
            'pula'=>$request->pula,
            'corre'=>$request->corre,
            'preensao'=>$request->preensao,
            'tonusMuscularDescricao'=>$request->tonusMuscularDescricao,
            'conclusao'=>$request->conclusao

        ]);
        $listaPraticante=$this->objpraticante->all()->sortBy('nome'); // Realiza a listagem dos praticantes em ordem alfabética

        return view('avaliacaoFisioterapica.index',compact('listaPraticante') );  //Retorna a página index dos registros diarios  com a lista de praticantes  
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
        return view('avaliacaoFisioterapica.index', compact('listaPraticante' ));  //Retorna a página index das avaliações com a lista de praticantes  
    }
}
