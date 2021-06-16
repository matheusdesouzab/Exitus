<?php

namespace App\Models\Management;

use MF\Model\Model;

class Note extends Model
{

    private $noteId;
    private $noteValue;
    private $fk_id_exam;
    private $fk_id_student_enrollment;


    public function __get($att)
    {
        return $this->$att;
    }


    public function __set($att, $newValue)
    {
        return $this->$att = $newValue;
    }


    public function insert()
    {

        $query =

            "INSERT INTO nota_avaliacao (valor_nota , fk_id_avaliacao , fk_id_matricula_aluno) 
            
            VALUES 
            
            (:noteValue , :fk_id_exam , :fk_id_student_enrollment)
        
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':noteValue', $this->__get('noteValue'));
        $stmt->bindValue(':fk_id_exam', $this->__get('fk_id_exam'));
        $stmt->bindValue(':fk_id_student_enrollment', $this->__get('fk_id_student_enrollment'));

        $stmt->execute();
    }


    public function examsPerformed($operation = '')
    {

        $query =

            "SELECT avaliacoes.id_avaliacao AS exam_id , avaliacoes.descricao_avaliacao AS exam_description , aluno.nome_aluno AS student_id , avaliacoes.valor_avaliacao AS exam_value , nota_avaliacao.valor_nota AS note_value 

            FROM aluno 
            
            LEFT JOIN matricula ON(aluno.id_aluno = matricula.fk_id_aluno) 
            LEFT JOIN nota_avaliacao ON(matricula.id_matricula = nota_avaliacao.fk_id_matricula_aluno) 
            LEFT JOIN avaliacoes ON(nota_avaliacao.fk_id_avaliacao = avaliacoes.id_avaliacao)

            $operation 
            
        ";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_student_enrollment', $this->__get('fk_id_student_enrollment'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


}
