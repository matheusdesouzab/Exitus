<?php

namespace App\Models;

use MF\Model\Model;

class ClassRoom extends Model
{

    protected $idClassRoom;
    protected $studentCapacity;
    protected $fk_id_classroom_number;
    

    public function insertClassRoom()
    {

        $query = 'insert into sala(fk_id_numero_sala,capacidade) values (:fk_id_classroom_number,:studentCapacity);';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':fk_id_classroom_number', $this->__get('fk_id_classroom_number'));
        $stmt->bindValue(':studentCapacity', $this->__get('studentCapacity'));

        $stmt->execute();
    }

    public function listClassRoom()
    {

        $query = 'select sala.id_sala as id_room , numero_sala_aula.numero_sala_aula as classroom_number , sala.capacidade as student_capacity from sala left join numero_sala_aula on(sala.fk_id_numero_sala = numero_sala_aula);';

        return $this->speedingUp($query);
    }

    public function updateClassRoom(){

        $query = 'update sala set capacidade = :studentCapacity where id_sala = :idClassRoom';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':studentCapacity', $this->__get('studentCapacity'));
        $stmt->bindValue(':idClassRoom', $this->__get('idClassRoom'));

        $stmt->execute();

    }

    public function deleteClassRoom()
    {

        $query = 'delete from sala where sala.id_sala = :idClassRoom';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':idClassRoom', $this->__get('idClassRoom'));

        $stmt->execute();
    }


    public function availableClassroom()
    {

        $query = 'select numero_sala_aula.id_numero_sala_aula as option_value , numero_sala_aula.numero_sala_aula as option_text from numero_sala_aula left join sala on(numero_sala_aula.id_numero_sala_aula = sala.fk_id_numero_sala) where sala.fk_id_numero_sala is null; ';

        return $this->speedingUp($query);
    }
}
