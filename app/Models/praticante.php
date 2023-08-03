<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class praticante extends Model
{
    protected $table='praticantes'; //Define a tabela relacionada a model em questão
    
    protected $fillable=['id','nome','escolaridade','instituicaoEnsino','periodo','inicioNaEquo','previsaoDeAlta','RespPelaColeta','segunda','terca','quarta','quinta','sexta','obs','endereco','id_profissional','id_responsavel','diagnostico']; 
    // Medida de segurança do laravel que define quais campos poderam ser salvos no DB

    public function relProfissionais(){ //defina a relação das tabelas de praticantes e profissionais
        return $this->hasOne(related:'App\Models\profissionais', foreignKey:'id', localKey:'id_profissional');
    }    

    public function relResponsavel(){ //defina a relação das tabelas de praticantes e responsaveis
        return $this->hasOne(related:'App\Models\responsavel', foreignKey:'id', localKey:'id_responsavel');
    }    
   
    public function relRegistroDiario(){ //defina a relação das tabelas de praticantes e registro diario
        return $this->hasMany(related:'App\Models\registroDiario', foreignKey:'id_praticante', localKey:'id');
    }   

    public function relPlano(){ //defina a relação das tabelas de praticantes e Plano terapeutico
        return $this->hasMany(related:'App\Models\PlanoTerapeutico', foreignKey:'id_praticante', localKey:'id');
    }    
    public function relFisioterapica(){ //defina a relação das tabelas de praticantes e avaliação fisioterapica
        return $this->hasOne(related:'App\Models\PlanoTerapeutico', foreignKey:'id_praticante', localKey:'id');
    }   
    public function relPsicologico(){ //defina a relação das tabelas de praticantes e avaliação psicologica
        return $this->hasOne(related:'App\Models\psicologicos', foreignKey:'id_praticante', localKey:'id');
    }  
    public function relAvFisio(){ //defina a relação das tabelas de praticantes e avaliação fisioterapica
        return $this->hasOne(related:'App\Models\fisioterapica', foreignKey:'id_praticante', localKey:'id');
    } 
    public function relCronograma(){ //defina a relação das tabelas de praticantes e Cronograma
        return $this->hasOne(related:'App\Models\cronograma', foreignKey:'id_praticante', localKey:'id');
    }    
}
