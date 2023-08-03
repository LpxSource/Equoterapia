<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroDiario extends Model
{
    protected $table='registrodiario'; //Define a tabela relacionada a model em questão
    protected $fillable=['id','mediadores','condutor','cavalo','encilhamento','Data','id_praticante','observacoes','mediadores'];
    // Medida de segurança do laravel que define quais campos poderam ser salvos no DB
     
    public function relPraticanteRegistro(){ //defina a relação das tabelas de praticantes e profissionais
        return $this->hasMany(related:'App\Models\praticante', foreignKey:'id', localKey:'id_praticante');
    }    
}