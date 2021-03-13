<?php

namespace App\Models;

use MF\Model\Model;

class ClassRoom extends Model
{

    public $idClassRoom;
    public $fk_id_class_room_number;

    public function __get($att)
    {
        return $this->$att;
    }

    public function __set($att, $newValue)
    {
        return $this->$att = $newValue;
    }

    public function addClassRoom()
    {

        $query = 'insert into sala(fk_id_numero_sala) values (:fk_id_class_room_number);';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':fk_id_class_room_number', $this->__get('fk_id_class_room_number'));

        $stmt->execute();
    }

    public function listClassRoom()
    {

        $query = 'select sala.id_sala as id_room , numero_sala_aula.numero_sala_aula as classroom_number from sala left join numero_sala_aula on(sala.fk_id_numero_sala = numero_sala_aula);';
        
        $stmt = $this->db->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function deleteClassRoom()
    {

        $query = 'delete from sala where sala.id_sala = :idClassRoom';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':idClassRoom', $this->__get('idClassRoom'));

        $stmt->execute();
    }

    public function listAvailableClassrooms(){

        $query = 'select numero_sala_aula.id_numero_sala_aula as id_number_classroom , numero_sala_aula.numero_sala_aula as number_classroom from numero_sala_aula';

        $stmt = $this->db->prepare($query);
        
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);

    }

    public function addedClassrooms(){

        $query = 'select numero_sala_aula.numero_sala_aula as add_classroom_number from numero_sala_aula left join sala on(numero_sala_aula.id_numero_sala_aula = sala.fk_id_numero_sala) where numero_sala_aula.numero_sala_aula =  sala.fk_id_numero_sala; ';

        $stmt = $this->db->prepare($query);
        
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}
