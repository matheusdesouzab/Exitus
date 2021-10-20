<?php

$students = [];
$disciplineId = [];

foreach ($this->view->listStudent as $key => $value) {

    $students[$value->student_id]['name'] = $value->student_name;
    $students[$value->student_id]['profilePhoto'] = $value->profilePhoto;
    foreach ($this->view->disciplinesClassAlreadyAdded as $key => $discipline) {
        $students[$value->student_id]['discipline'][$discipline->option_value] = $discipline->option_text;

        foreach ($this->view->unity as $x => $unity) {

            $students[$value->student_id][$discipline->option_value]['notes'][$unity->option_value] = 0;
            $students[$value->student_id][$discipline->option_value]['numberEvaluations'][$unity->option_value] = 0;
        }
    }
}


foreach ($this->view->disciplinesClassAlreadyAdded as $key => $discipline) {
    $disciplineId[$discipline->option_value] = $discipline->option_value;
}


foreach ($this->view->listNote as $key => $note) {

    if (array_key_exists($note->student_id, $students)) {

        if (array_key_exists($note->class_discipline_id, $disciplineId)) {
            if ($note->unity == 1) {
                $students[$note->student_id][$note->class_discipline_id]['notes']['1'] += $note->note_value;
                $students[$note->student_id][$note->class_discipline_id]['numberEvaluations']['1'] += 1;
            } else if ($note->unity == 2) {
                $students[$note->student_id][$note->class_discipline_id]['notes']['2'] += $note->note_value;
                $students[$note->student_id][$note->class_discipline_id]['numberEvaluations']['2'] += 1;
            } else {
                $students[$note->student_id][$note->class_discipline_id]['notes']['3'] += $note->note_value;
                $students[$note->student_id][$note->class_discipline_id]['numberEvaluations']['3'] += 1;
            }
        }
    }
}

$studentsEnd = [];

$photoDir =  "/assets/img/studentProfilePhotos/";

foreach ($students as $x => $value) {

    $name = $value['name'];
    $profilePhoto = $value['profilePhoto'];

    foreach ($disciplineId as $y => $discipline) {

        $disciplineName = $value['discipline'][$y];

        foreach ($value[$discipline]['notes'] as $key => $disciplineFinal) {

            $situation = null;

            if ($value[$discipline]['numberEvaluations'][$key] == 0) {
                $situation = array('0' => 'Nenhuma avaliação vinculada', '1' => 'N.A.V');
            } else if ($disciplineFinal >= 5) {
                $situation = array('0' => 'Aprovado', '1' => 'AP');
            } else if ($disciplineFinal < 5) {
                $situation = array('0' => 'Reprovado', '1' => 'RP');
            }

            $studentsEnd[] = array(
                'profilePhoto' => $profilePhoto,
                'name' => $name,
                'discipline' => $disciplineName,
                'unity' => $key,
                'note' => $disciplineFinal,
                'noteSituation' => $situation
            );
        }
    }
}

$order = [];

foreach ($studentsEnd as $key => $row) {
    $order[$key] = $row['note'];
}

array_multisort($order, $this->view->orderBy == 'DESC' ? SORT_DESC : SORT_ASC, $studentsEnd);

?>

<hr class="">

<table class="table table-borderless col-lg-12 table-striped" id="note-table-class">
    <thead>
        <tr>
            <th scope="col" colspan="2">Nome do aluno</th>
            <th scope=" col">Disciplina</th>
            <th class="text-center" scope="col">Unidade</th>
            <th class="text-center" scope="col">Nota</th>
            <th class="text-center" scope="col">Status na disciplina</th>
        </tr>
    </thead>

    <tbody>

        <?php foreach ($studentsEnd as $key => $value) { ?>

            <tr>

                <td><img class="miniature-photo" src='<?= $value['profilePhoto'] == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value['profilePhoto'] ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></td>

                <td><?= $value['name'] ?></td>
                <td><?= $value['discipline'] ?></td>
                <td class="text-center"><?= $value['unity'] ?></td>
                <td class="text-center"><?= $value['note'] ?></td>
                <td class="text-center"><?= $value['noteSituation'][1] ?></td>

            </tr>

        <?php } ?>

    </tbody>

</table>