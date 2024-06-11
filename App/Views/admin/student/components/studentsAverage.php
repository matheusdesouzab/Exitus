<?php 

require __DIR__ . '../../../../../config/variables.php';

?>

<?php

$students = [];
$clasSubjects = [];
$exams = [];

if(count($this->view->listStudent) >= 1){

foreach ($this->view->listStudent as $key => $value) {

    $students[$value->id]['name'] = $value->name;
    $students[$value->id]['profilePhoto'] = $value->profile_photo;

    foreach ($this->view->linkedDisciplines as $y => $discipline) {

        $students[$value->id]['discipline'][$discipline->option_value] = $discipline->option_text;
        $exams[$discipline->option_value] = array();

        foreach ($this->view->unity as $x => $unity) {

            $students[$value->id][$discipline->option_value]['notes'][$unity->option_value] = 0;
            $students[$value->id][$discipline->option_value]['averageEnd'] = 0;
            $students[$value->id][$discipline->option_value]['numberEvaluations'][$unity->option_value] = 0;
            $exams[$discipline->option_value][$unity->option_value] = 0;
        }
    }
}



foreach ($this->view->linkedDisciplines as $key => $discipline) {
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
$photoDir =  "$app_url/assets/img/studentProfilePhotos/";

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

}

?>

<hr>

<table class="table table-borderless table-striped col-lg-12 table-hover p-0" id="note-table-class">
    <thead>
        <tr>
            <th class="text-left" scope="col">#</th>
            <?php if ($this->view->listType == 'class') { ?> <th scope="col" colspan="2">Nome do aluno</th> <?php } ?>
            <th class="text-left" scope="col">Disciplina</th>
            <?php if ($this->view->averageType == 'averageUnity') { ?> <th class="text-center" scope="col">Unidade</th> <?php } ?>
            <th class="text-center" scope="col">Nota</th>
            <th class="text-center" scope="col">Status</th>
            <?php if ($this->view->averageType == 'averageUnity') { ?> <th class="text-center" data-toggle="tooltip" data-placement="bottom" title="Status do total de avaliações cadastradas" scope="col">STA</th> <?php } ?>
        </tr>
    </thead>

    <tbody>

        <?php $total = 1 ?>

        <?php 

if(count($this->view->listStudent) >= 1){
        
        foreach ($studentsEnd as $key => $value) {

            if (in_array($this->view->noteStatus, $value['noteStatus'])) {

        ?>

                <tr>

                <td class="text-left"><?= $total++ ?></td>

                    <?php if ($this->view->listType == 'class') { ?>                      

                        <td><img class="miniature-photo" src='<?= $value['profilePhoto'] == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value['profilePhoto'] ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></td>

                        <td><?= $value['name'] ?></td>

                    <?php } ?>

                    <td class="text-left"><?= $value['discipline'] ?></td>
                    <?php if ($this->view->averageType == 'averageUnity') { ?> <td class="text-center"><?= $value['unity'] ?></td> <?php } ?>
                    <td class="text-center"><?= $value['note'] ?></td>
                    <td class="text-center"><?= $value['noteSituation'] ?></td>
                    <?php if ($this->view->averageType == 'averageUnity') { ?><td class="text-center"><?= $value['statusRegisteredExams'] ?> <?= $value['statusRegisteredExamsIcon'] ?></td> <?php } ?>

                </tr>

        <?php }
        }} ?>

        <tr class="mt-4">
            <td class="font-weight-bold text-right" colspan="8" style="pointer-events:none"><?= $total - 1 ?> médias listadas <i class="fas fa-history ml-2"></i></td>
        </tr>


    </tbody>

</table>