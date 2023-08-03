<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fisioterapica extends Model
{
    protected $table='avaliacaoFisioterapica'; //Define a tabela relacionada a model em questão
    protected $fillable=['id','diagnosticoClinico','diagnosticoFisioterapeutico','dataAvaliacao','historiaGestacional',
    'parto','choro','apgar','peso','comprimento','idadeGestacional','complicacoes','uti','tempo','altaHospitalar','idadePrimeiroDiagnostico',
    'convulcoes', 'medicamentos','constipacao','sono','audicao','refluxoGastroesofagico','intervencoesCirurgicas','alergias','consideracoesPos',
    'fala','gestos','usoDosOlhos','ttoAnteriores','ttoAtuais','sustentacaoCabeca','sentar','engatinhar','andar','queixaprincipal',
    'locomocaoAtual','mobilidadeArticular','restricoes','deformidades','ortesesProteses','tonusAdutor','scoreAdutor', 'tonusMuscular','scoremuscular',
    'sustentoDaCabeca','sentaSemApoio','posOrtostaticaSA','posOrtostaticaCA','posMilitarOA','posMilitarOF','umPeSoOA','umPeSoOF',
    'engatinha','marchaVoluntaria','saltarDoisPes','correrDesviando','alcanceDeObjetos','bimanual','alimentase','vestese','preensaoObjetos','negligenciaMembro',
    'higienizase','caminhar','escritaManual','provaMaoObjetos','indexNarizUnilateral','noEngatinhar','naMarcha','sequenciaMovimentos',
    'entraSaiSentado','sentadoCadeira','PosEquilibrio','passaSentado','comAuxilio','semAuxilio','sobe','desce','passaObstaculo','pula','corre',
    'preensao', 'tonusMuscularDescricao','conclusao','id_praticante' ];
    // Medida de segurança do laravel que define quais campos poderam ser salvos no DB
     
    public function relPraticanteFisioterapica(){ //defina a relação das tabelas de praticantes e avaliacao fisioterapica
        return $this->hasOne(related:'App\Models\praticante', foreignKey:'id', localKey:'id_praticante');
    }    
}
