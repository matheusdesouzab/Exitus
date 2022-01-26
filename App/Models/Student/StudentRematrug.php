<?php

namespace App\Models\Student;

use MF\Model\Model;

class StudentRematrug extends Model
{

    private $fk_id_rematrug_situation;
    private $fk_id_enrollment;


    public function __get($att)
    {
        return $this->$att;
    }


    public function __set($att, $newValue)
    {
        return $this->$att = $newValue;
    }


    /**
     * Criar uma solicitação de rematrícula
     * 
     * @return void
     */
    public function insert()
    {

        $query = "INSERT INTO rematricula(fk_id_rematricula_aluno, fk_id_situacao_rematricula) VALUES (:enrollmentId, :rematrugSituation)";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':enrollmentId', $this->__get('fk_id_enrollment'));
        $stmt->bindValue(':rematrugSituation', $this->__get('fk_id_rematrug_situation'));

        $stmt->execute();
    }


    /**
     * Retorna os estados que uma solicitação de rematrícula pode está. Entretanto, ele deve ser usado para peencher a tag select na View.
     * 
     * @return array
     */
    public function rematrugSituation()
    {

        return $this->speedingUp(
            "SELECT id_situacao_rematricula AS option_value , situacao AS option_text FROM situacao_rematricula"
        );
    }


    /**
     * Verifica se o aluno já enviou uma solicitação de rematrícula no período letivo atual.
     * 
     * @return array
     */
    public function checkForRegistration()
    {

        $query = "SELECT rematricula.id_rematricula FROM rematricula WHERE rematricula.fk_id_rematricula_aluno = :enrollmentId;";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':enrollmentId', $this->__get('fk_id_enrollment'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    /**
     * Retorna o total de rematrículas com base nos estados que uma solicitação de remtrícula pode ter.
     * 
     * @return array
     */
    public function totalRematriumMarkedWithYesAndNo()
    {

        return $this->speedingUp(

            "SELECT 
            
            (SELECT COUNT(rematricula.id_rematricula) 
            
            FROM rematricula 
             
            LEFT JOIN matricula ON(rematricula.fk_id_rematricula_aluno = matricula.id_matricula)
            LEFT JOIN periodo_letivo ON(matricula.fk_id_periodo_letivo_matricula = periodo_letivo.id_ano_letivo)
            LEFT JOIN situacao_periodo_letivo ON(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo)
            
            WHERE rematricula.fk_id_situacao_rematricula = situacao_rematricula.id_situacao_rematricula
             
            AND
             
            situacao_periodo_letivo.id_situacao_periodo_letivo = 1) AS totalAnswer , 
            situacao_rematricula.situacao AS rematrugAnswer
            
            FROM situacao_rematricula"
        );
    }
}
