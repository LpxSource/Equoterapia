<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class responsavel extends Model
{
    protected $table='responsaveis'; //Define a tabela relacionada a model em questão
    protected $fillable=['id','nome','nascimento','grauDeParentesco','profissao','telefone','telefoneTrabalho','email','observacao','rendaFamiliar','endereco'];
    // Medida de segurança do laravel que define quais campos poderam ser salvos no DB
     
    public function relPraticanteResp(){ //defina a relação das tabelas de praticantes e profissionais
        return $this->hasMany(related:'App\Models\praticante', foreignKey:'id_responsavel', localKey:'id');
    }    
}







