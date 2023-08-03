<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\praticante;
use App\Models\responsavel;
use App\Models\profissionais;
use App\Models\RegistroDiario;
use App\Models\fisioterapica;
use App\Models\psicologicos;
 


use Illuminate\Console\Scheduling\Event;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use phpDocumentor\Reflection\Types\Null_;


class psicologicoController extends Controller
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
    private $objPsicologico;


     public function __construct()
     {
         $this->objpraticante=new praticante(); //instancia da classe de praticantes
         $this->objprofissional=new profissionais(); //instancia da classe de profissionais
         $this->objresponsavel= new responsavel(); //instancia da classe de responsavel
         $this->objregistro= new RegistroDiario(); //instancia da classe de registros diarios
         $this->objfisioterapica= new fisioterapica();// instancia da classe de avaliacao fisioterapica
         $this->objPsicologico= new psicologicos();// instancia da classe de avaliacao psicologica

     }

    public function index()
    {
        $listaPraticante=$this->objpraticante->all()->sortBy('id'); // Realiza a listagem dos praticantes em ordem alfabética
        return view('avaliacaoPsicologica.index', compact('listaPraticante'));  //Retorna a página index dos registros diarios  com a lista de praticantes  

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $praticantes=$this->objpraticante->all();// Realiza a listagem de todos os praticantes cadastrados
        return view('avaliacaoPsicologica.create', compact('praticantes'));  //Retorna a página index dos registros diarios  com a lista de praticantes  

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
        $cad=$this->objPsicologico->create([
        
            'id_praticante'=>$request->id_praticante,
            'alergias'=>$request->alergias,
            'convulcoes'=>$request->convulcoes,
            'doencasTraumas'=>$request->doencasTraumas,
            'digestao'=>$request->digestao,
            'transtornoAlimentar'=>$request->transtornoAlimentar,
            'respiracao'=>$request->respiracao,
            'sono'=>$request->sono,
            'defictCognitivo'=>$request->defictCognitivo,
            'equoterapiaAntes'=>$request->equoterapiaAntes,
            'criancaPlanejada'=>$request->criancaPlanejada,
            'acompPreNatal'=>$request->acompPreNatal,
            'choroNascer'=>$request->choroNascer,   
            'tipoAlimentacao'=>$request->tipoAlimentacao,
            'brincadeiras'=>$request->brincadeiras,
            'preferenciasAversoes'=>$request->preferenciasAversoes,
            'mudancaRotina'=>$request->mudancaRotina,
            'nucleoFamiliar'=>$request->nucleoFamiliar,
            'educacao'=>$request->educacao,
            'irmaosOrdem'=>$request->irmaosOrdem,
            'lazer'=>$request->lazer,
            'higieneSozinho'=>$request->higieneSozinho,
            'roupasSozinho'=>$request->roupasSozinho,
            'alimentaSozinho'=>$request->alimentaSozinho,
            'extroversao'=>$request->extroversao,
            'fobia'=>$request->fobia,
            'obsessao'=>$request->obsessao,
            'introversao'=>$request->introversao,
            'histeria'=>$request->histeria,
            'dependenciaEmocional'=>$request->dependenciaEmocional,
            'timidez'=>$request->timidez,
            'verbalCompreensiva'=>$request->verbalCompreensiva,
            'gestual'=>$request->gestual,
            'gritos'=>$request->gritos,
            'mimicaFacial'=>$request->mimicaFacial,
            'monossilabos'=>$request->monossilabos,
            'frasesCurtas'=>$request->frasesCurtas,
            'frasesCompletas'=>$request->frasesCompletas,
            'compreendeOrdens'=>$request->compreendeOrdens,
            'ordensVerbaisSimples'=>$request->ordensVerbaisSimples,
            'ordensVerbaisComplexas'=>$request->ordensVerbaisComplexas,
            'confusaoMental'=>$request->confusaoMental,
            'delirios'=>$request->delirios,
            'alucinacoes'=>$request->alucinações,
            'religiao'=>$request->religiao,
             
            'expectativaFamilia'=>$request->expectativaFamilia,

            'interageCriancas'=>$request->interageCriancas,
            'interageAdultos'=>$request->interageAdultos,
            'buscaContato'=>$request->buscaContato,
            'oportunidadeContato'=>$request->oportunidadeContato,
            'conatoVisual'=>$request->conatoVisual,
            'agitacao'=>$request->agitacao,
            'toleranciaFrustracao'=>$request->toleranciaFrustracao,
            'respeitaRegras'=>$request->respeitaRegras,
            'oposicao'=>$request->oposicao,
            'atencaoConsentracao'=>$request->atencaoConsentracao,
            'passividade'=>$request->passividade,
            'autoagressividade'=>$request->autoagressividade,
            'heteroAgressividade'=>$request->heteroAgressividade,
            'assertividade'=>$request->assertividade,
            'carinhoEspecialAlguem'=>$request->carinhoEspecialAlguem,
            'divideCoisas'=>$request->divideCoisas,
            'ajudaSolicitado'=>$request->ajudaSolicitado,
            'expressaoSentimentos'=>$request->expressaoSentimentos,
            'adequada'=>$request->adequada,
            'superprotecao'=>$request->superprotecao,
            'dificuldadePerceberDeficiencia'=>$request->dificuldadePerceberDeficiencia,
            'rejeicao'=>$request->rejeicao,
            'indiferenca'=>$request->indiferenca,
            'ansiedade'=>$request->ansiedade,
            'sinteseCaso'=>$request->sinteseCaso

            //Nome da tabela => $request-> Nome do input            
         ]);
        if($cad){
            return redirect(to:'psicologico');            
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
        //
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
            $show=$this->objpraticante->find($id)->relPsicologico;
            $praticantes=$this->objpraticante->all();// Realiza a listagem de todos os praticantes cadastrados
            $avaliacao=$this->objPsicologico->find($id);
            if($show==NULL){
                return redirect()->back()->with('message', 'O praticante não possui avaliação');
            }
        } 
        catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        //dd($id);
        }
        //dd($show);
        return view('avaliacaoPsicologica.edit',compact('avaliacao','show','praticantes'));



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
        $this->objPsicologico->where(['id'=>$id])->update([
            'id_praticante'=>$request->id_praticante,
            'alergias'=>$request->alergias,
            'convulcoes'=>$request->convulcoes,
            'doencasTraumas'=>$request->doencasTraumas,
            'digestao'=>$request->digestao,
            'transtornoAlimentar'=>$request->transtornoAlimentar,
            'respiracao'=>$request->respiracao,
            'sono'=>$request->sono,
            'defictCognitivo'=>$request->defictCognitivo,
            'equoterapiaAntes'=>$request->equoterapiaAntes,
            'criancaPlanejada'=>$request->criancaPlanejada,
            'acompPreNatal'=>$request->acompPreNatal,
            'choroNascer'=>$request->choroNascer,   
            'tipoAlimentacao'=>$request->tipoAlimentacao,
            'brincadeiras'=>$request->brincadeiras,
            'preferenciasAversoes'=>$request->preferenciasAversoes,
            'mudancaRotina'=>$request->mudancaRotina,
            'nucleoFamiliar'=>$request->nucleoFamiliar,
            'educacao'=>$request->educacao,
            'irmaosOrdem'=>$request->irmaosOrdem,
            'lazer'=>$request->lazer,
            'higieneSozinho'=>$request->higieneSozinho,
            'roupasSozinho'=>$request->roupasSozinho,
            'alimentaSozinho'=>$request->alimentaSozinho,
            'extroversao'=>$request->extroversao,
            'fobia'=>$request->fobia,
            'obsessao'=>$request->obsessao,
            'introversao'=>$request->introversao,
            'histeria'=>$request->histeria,
            'dependenciaEmocional'=>$request->dependenciaEmocional,
            'timidez'=>$request->timidez,
            'verbalCompreensiva'=>$request->verbalCompreensiva,
            'gestual'=>$request->gestual,
            'gritos'=>$request->gritos,
            'mimicaFacial'=>$request->mimicaFacial,
            'monossilabos'=>$request->monossilabos,
            'frasesCurtas'=>$request->frasesCurtas,
            'frasesCompletas'=>$request->frasesCompletas,
            'compreendeOrdens'=>$request->compreendeOrdens,
            'ordensVerbaisSimples'=>$request->ordensVerbaisSimples,
            'ordensVerbaisComplexas'=>$request->ordensVerbaisComplexas,
            'confusaoMental'=>$request->confusaoMental,
            'delirios'=>$request->delirios,
            'alucinacoes'=>$request->alucinações,
            'religiao'=>$request->religiao,
             
            'expectativaFamilia'=>$request->expectativaFamilia,

            'interageCriancas'=>$request->interageCriancas,
            'interageAdultos'=>$request->interageAdultos,
            'buscaContato'=>$request->buscaContato,
            'oportunidadeContato'=>$request->oportunidadeContato,
            'conatoVisual'=>$request->conatoVisual,
            'agitacao'=>$request->agitacao,
            'toleranciaFrustracao'=>$request->toleranciaFrustracao,
            'respeitaRegras'=>$request->respeitaRegras,
            'oposicao'=>$request->oposicao,
            'atencaoConsentracao'=>$request->atencaoConsentracao,
            'passividade'=>$request->passividade,
            'autoagressividade'=>$request->autoagressividade,
            'heteroAgressividade'=>$request->heteroAgressividade,
            'assertividade'=>$request->assertividade,
            'carinhoEspecialAlguem'=>$request->carinhoEspecialAlguem,
            'divideCoisas'=>$request->divideCoisas,
            'ajudaSolicitado'=>$request->ajudaSolicitado,
            'expressaoSentimentos'=>$request->expressaoSentimentos,
            'adequada'=>$request->adequada,
            'superprotecao'=>$request->superprotecao,
            'dificuldadePerceberDeficiencia'=>$request->dificuldadePerceberDeficiencia,
            'rejeicao'=>$request->rejeicao,
            'indiferenca'=>$request->indiferenca,
            'ansiedade'=>$request->ansiedade,
            'sinteseCaso'=>$request->sinteseCaso
        

        ]);
        $praticantes=$this->objpraticante->all();// Realiza a listagem de todos os praticantes cadastrados
        return redirect(to:'psicologico');            


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
