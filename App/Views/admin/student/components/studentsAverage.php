<?php

$students = [];
$clasSubjects = [];
$exams = [];

foreach ($this->view->listStudent as $key => $value) {

    $students[$value->student_id]['name'] = $value->student_name;
    $students[$value->student_id]['profilePhoto'] = $value->profilePhoto;

    foreach ($this->view->disciplinesClassAlreadyAdded as $y => $discipline) {

        $students[$value->student_id]['discipline'][$discipline->option_value] = $discipline->option_text;
        $exams[$discipline->option_value] = array();

        foreach ($this->view->unity as $x => $unity) {

            $students[$value->student_id][$discipline->option_value]['notes'][$unity->option_value] = 0;
            $students[$value->student_id][$discipline->option_value]['averageEnd'] = 0;
            $students[$value->student_id][$discipline->option_value]['numberEvaluations'][$unity->option_value] = 0;
            $exams[$discipline->option_value][$unity->option_value] = 0;
        }
    }
}


foreach ($this->view->disciplinesClassAlreadyAdded as $key => $discipline) {
    $clasSubjects[$discipline->option_value] = $discipline->option_value;
}


foreach ($this->view->listNote as $key => $note) {

    if (array_key_exists($note->student_id, $students)) {

        if (array_key_exists($note->class_discipline_id, $clasSubjects)) {
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

            $students[$note->student_id][$note->class_discipline_id]['averageEnd'] += $note->note_value;;
        }
    }
}


foreach ($this->view->listExam as $key => $exam) {

    if (array_key_exists($exam->fk_id_discipline_class, $clasSubjects)) {

        if ($exam->unity == 1) {
            $exams[$exam->fk_id_discipline_class]['1'] += 1;
        } else if ($exam->unity == 2) {
            $exams[$exam->fk_id_discipline_class]['2'] += 1;
        } else if ($exam->unity == 3) {
            $exams[$exam->fk_id_discipline_class]['3'] += 1;
        }
    }
}

$studentsEnd = [];
$photoDir =  "/assets/img/studentProfilePhotos/";

foreach ($students as $x => $value) {

    $name = $value['name'];
    $profilePhoto = $value['profilePhoto'];

    foreach ($clasSubjects as $y => $discipline) {

        $disciplineName = $value['discipline'][$y];

        if ($this->view->averageType == 'averageUnity') {

            foreach ($value[$discipline]['notes'] as $key => $disciplineFinal) {

                $situation = ($disciplineFinal >= 5 ? 'Aprovado' : 'Reprovado');

                $studentsEnd[] = array(
                    'profilePhoto' => $profilePhoto,
                    'name' => $name,
                    'discipline' => $disciplineName,
                    'unity' => $key,
                    'note' => number_format($disciplineFinal, 1, '.', ''),
                    'noteSituation' => $situation,
                    'statusRegisteredExams' => $value[$discipline]['numberEvaluations'][$key] . ' / ' . $exams[$discipline][$key],
                    'statusRegisteredExamsIcon' => $value[$discipline]['numberEvaluations'][$key] == $exams[$discipline][$key] ? '<i class="fas fa-check-circle ml-1 text-success"></i>' : '<i class="fas fa-minus-circle text-info ml-1"></i>',
                    'noteStatus' => array(1 => $situation, 2 => '0')
                );
            }
        } else {

            $situation = (($students[$x][$y]['averageEnd'] / 3) >= 5 ? 'Aprovado' : 'Reprovado');

            $studentsEnd[] = array(
                'profilePhoto' => $profilePhoto,
                'name' => $name,
                'discipline' => $disciplineName,
                'note' => number_format($students[$x][$y]['averageEnd'] / 3, 1, '.', ''),
                'noteSituation' => $situation,
                'noteStatus' => array(1 => $situation, 2 => '0')
            );
        }
    }
}

$order = [];

foreach ($studentsEnd as $key => $row) {

    if ($this->view->orderBy == 'alphabetical') {
        $order[$key] = $row['name'];
    } else {
        $order[$key] = $row['note'];
    }
}

$orderBy = ($this->view->orderBy == 'lowestGrade' || $this->view->orderBy == 'alphabetical' ? SORT_ASC : SORT_DESC);

array_multisort($order, $orderBy, $studentsEnd);

?>

<hr class="">

<table class="table table-borderless col-lg-12 table-striped" id="note-table-class">
    <thead>
        <tr>
            <th scope="col" colspan="2">Nome do aluno</th>
            <th scope=" col">Disciplina</th>
            <?php if ($this->view->averageType == 'averageUnity') { ?> <th class="text-center" scope="col">Unidade</th> <?php } ?>
            <th class="text-center" scope="col">Nota</th>
            <th class="text-center" scope="col">Status</th>
            <?php if ($this->view->averageType == 'averageUnity') { ?> <th class="text-center" data-toggle="tooltip" data-placement="bottom" title="Status do total de avaliaçãoes cadastradas" scope="col">STA</th> <?php } ?>
        </tr>
    </thead>

    <tbody>

        <?php foreach ($studentsEnd as $key => $value) {

            if (in_array($this->view->noteStatus, $value['noteStatus'])) {

        ?>

                <tr>

                    <td><img class="miniature-photo" src='<?= $value['profilePhoto'] == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value['profilePhoto'] ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></td>

                    <td><?= $value['name'] ?></td>
                    <td><?= $value['discipline'] ?></td>
                    <?php if ($this->view->averageType == 'averageUnity') { ?> <td class="text-center"><?= $value['unity'] ?></td> <?php } ?>
                    <td class="text-center"><?= $value['note'] ?></td>
                    <td class="text-center"><?= $value['noteSituation'] ?></td>
                    <?php if ($this->view->averageType == 'averageUnity') { ?><td class="text-center"><?= $value['statusRegisteredExams'] ?> <?= $value['statusRegisteredExamsIcon'] ?></td> <?php } ?>

                </tr>

        <?php }
        } ?>

    </tbody>

</table>