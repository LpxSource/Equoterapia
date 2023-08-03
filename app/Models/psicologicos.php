<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class psicologicos extends Model
{
    use HasFactory;

    protected $table='psicologicos';
    protected $primarykey='id';
    protected $fillable=['id','equoterapiaAntes','criancaPlanejada','acompPreNatal','choroNascer','tipoAlimentacao',
    'alergias','convulcoes','doencasTraumas','digestao','transtornoAlimentar','respiracao','sono','defictCognitivo',
    'brincadeiras','preferenciasAversoes','mudancaRotina','consideracoes','nucleoFamiliar','educacao','irmaosOrdem',
    'lazer','religiao','higieneSozinho','roupasSozinho','alimentaSozinho','extroversao','fobia','obsessao','introversao',
    'ansiedade','histeria','dependenciaEmocional','timidez','verbalCompreensiva','gestual','gritos','mimicaFacial',
    'monossilabos','frasesCurtas','frasesCompletas','compreendeOrdens','ordensVerbaisSimples','ordensVerbaisComplexas',
    'confusaoMental','delirios','alucinacoes','interageCriancas','interageAdultos','buscaContato','conatoVisual',
    'agitacao','toleranciaFrustracao','respeitaRegras','oposicao','atencaoConsentracao','passividade','autoagressividade',
    'heteroAgressividade','assertividade','carinhoEspecialAlguem','divideCoisas','ajudaSolicitado','expressaoSentimentos',
    'adequada','superprotecao','dificuldadePerceberDeficiencia','rejeicao','indiferenca','ansiedade','expectativaFamilia',
    'sinteseCaso','obs','id_praticante','oportunidadeContato']; // Medida de segurança do laravel que define quais campos poderam ser salvos no DB

    public function relPraticantePsicologico(){ //defina a relação das tabelas de praticantes e avaliacao psicologica
        return $this->hasOne(related:'App\Models\praticante', foreignKey:'id', localKey:'id_praticante');
    }  
}
