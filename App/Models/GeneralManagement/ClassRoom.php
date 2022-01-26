<?php

namespace App\Models\GeneralManagement;

use MF\Model\Model;

class ClassRoom extends Model
{

    private $classroomId;
    private $studentCapacity;
    private $fk_id_classroom_number;


    public function __get($att)
    {
        return $this->$att;
    }


    public function __set($att, $newValue)
    {
        return $this->$att = $newValue;
    }


    /**
     * Criar sala
     * 
     * @return void
     */
    public function insert()
    {

        $query = "INSERT INTO sala(fk_id_numero_sala, capacidade_alunos) VALUES (:fk_id_classroom_number, :studentCapacity)";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":fk_id_classroom_number", $this->__get("fk_id_classroom_number"));
        $stmt->bindValue(":studentCapacity", $this->__get("studentCapacity"));

        $stmt->execute();
    }


    /**
     * Retorna todas as salas
     * 
     * @return array
     */
    public function list()
    {

        return $this->speedingUp(

            "SELECT 
            
            sala.id_sala AS classroom_id , 
            numero_sala_aula.numero_sala_aula AS classroom_number , 
            sala.capacidade_alunos AS student_capacity 
            
            FROM sala 
            
            INNER JOIN numero_sala_aula ON(sala.fk_id_numero_sala = numero_sala_aula.numero_sala_aula)"
            
        );
    }


    /**
     * Atualizar dados da sala
     * 
     * @return void
     */
    public function update()
    {

        $query = "UPDATE sala SET capacidade_alunos = :studentCapacity WHERE id_sala = :classroomId";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":studentCapacity", $this->__get("studentCapacity"));
        $stmt->bindValue(":classroomId", $this->__get("classroomId"));

        $stmt->execute();
    }


    /**
     * Deletar sala
     * 
     * @return void
     */
    public function delete()
    {

        $query = "DELETE FROM sala WHERE sala.id_sala = :classroomId";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":classroomId", $this->__get("classroomId"));
        $stmt->execute();
    }


    /**
     * Retorna os números que ainda não foram vinculados a uma sala
     * 
     * @return array
     */
    public function availableNumbers()
    {

        return $this->speedingUp(

            "SELECT 
            
            numero_sala_aula.id_numero_sala_aula AS option_value , 
            numero_sala_aula.numero_sala_aula AS option_text 
            
            FROM numero_sala_aula 
            
            LEFT JOIN sala ON(numero_sala_aula.id_numero_sala_aula = sala.fk_id_numero_sala) 
            
            WHERE sala.fk_id_numero_sala IS NULL"
            
        );
    }


    /**
     * Esse método retorna todas as salas. Entretanto, ele deve ser usado para peencher a tag select na View.
     * 
     * @return array
     */
    public function listForSelect()
    {

        return $this->speedingUp(

            "SELECT 
            
            sala.id_sala AS option_value , 
            numero_sala_aula.numero_sala_aula AS option_text 
            
            FROM sala 
            
            INNER JOIN numero_sala_aula ON(sala.fk_id_numero_sala = numero_sala_aula.id_numero_sala_aula)"

        );
    }
}
