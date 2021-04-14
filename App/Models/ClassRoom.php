<?php

namespace App\Models;

use MF\Model\Model;

class ClassRoom extends Model
{

    protected $idClassRoom;
    protected $studentCapacity;
    protected $fk_id_classroom_number;


    public function insert()
    {

        $query = 'INSERT INTO sala(fk_id_numero_sala,capacidade_alunos) VALUES (:fk_id_classroom_number,:studentCapacity);';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':fk_id_classroom_number', $this->__get('fk_id_classroom_number'));
        $stmt->bindValue(':studentCapacity', $this->__get('studentCapacity'));

        $stmt->execute();
    }

    public function list()
    {

        return $this->speedingUp(
            "SELECT sala.id_sala AS id_room , numero_sala_aula.numero_sala_aula AS classroom_number , sala.capacidade_alunos AS student_capacity FROM sala LEFT JOIN numero_sala_aula ON(sala.fk_id_numero_sala = numero_sala_aula)"
        );
    }

    public function update()
    {

        $query = 'UPDATE sala SET capacidade_alunos = :studentCapacity WHERE id_sala = :idClassRoom';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':studentCapacity', $this->__get('studentCapacity'));
        $stmt->bindValue(':idClassRoom', $this->__get('idClassRoom'));

        $stmt->execute();
    }

    public function delete()
    {

        $query = 'DELETE FROM sala WHERE sala.id_sala = :idClassRoom';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':idClassRoom', $this->__get('idClassRoom'));

        $stmt->execute();
    }


    public function availableClassroom()
    {

        return $this->speedingUp(
            "SELECT numero_sala_aula.id_numero_sala_aula AS option_value , numero_sala_aula.numero_sala_aula AS option_text FROM numero_sala_aula LEFT JOIN sala ON(numero_sala_aula.id_numero_sala_aula = sala.fk_id_numero_sala) WHERE sala.fk_id_numero_sala IS NULL;"
        );
    }


    public function activeClassRoom()
    {

        return $this->speedingUp(
            "SELECT sala.id_sala AS option_value , numero_sala_aula.numero_sala_aula AS option_text FROM sala LEFT JOIN numero_sala_aula ON(sala.fk_id_numero_sala = numero_sala_aula.id_numero_sala_aula)"
        ); 
    }
}
