<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Mime\Part\Multipart\RelatedPart;

class profissionais extends Model
{
    protected $table='profissionais';
    protected $primarykey='id';
    protected $fillable=['id','nome','funcao','conselho','cpf','nascimento','endereco','contato']; // Medida de segurança do laravel que define quais campos poderam ser salvos no DB


    use HasFactory;
    
    public function relPraticantes(){ //defina a relação das tabelas de praticantes e profissionais
        return $this->hasMany(related:'App\Models\praticante', foreignKey:'id');
    }
}