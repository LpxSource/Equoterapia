<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanoTerapeutico extends Model
{
    protected $table='planoTerapeutico'; //Define a tabela relacionada a model em questão


    protected $fillable=['id','queixaPrincipal','HMP','HMA','doencasAssociadas','nivelDeConsciencia','estadoEmocional','metasTerapeuticas','estrategiasDeIntervencao','cuidadosEspeciais','id_praticante']; 
    // Medida de segurança do laravel que define quais campos poderam ser salvos no DB

     public function relPraticantePlano(){ //defina a relação das tabelas de praticantes e plano terapeutico   
        return $this->hasOne(related:'App\Models\praticante', foreignKey:'id_Plano', localKey:'id');
    }   
}
