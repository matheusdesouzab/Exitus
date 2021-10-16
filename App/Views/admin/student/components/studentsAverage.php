<?php

$students = [];
$disciplineId = [];

foreach ($this->view->listStudent as $key => $value) {
    $students[$value->student_id]['name'] = $value->student_name;
    $students[$value->student_id]['profilePhoto'] = $value->profilePhoto;
    foreach ($this->view->disciplinesClassAlreadyAdded as $key => $discipline) {
        $students[$value->student_id]['discipline'][$discipline->option_value] = $discipline->option_text;
        $students[$value->student_id][$discipline->option_value] = array('1' => 0, '2' => 0, '3' => 0);
    }
}

foreach ($this->view->disciplinesClassAlreadyAdded as $key => $discipline) {
    $disciplineId[$discipline->option_value] = $discipline->option_value;
}

foreach ($this->view->listNote as $key => $note) {

    if (array_key_exists($note->student_id, $students)) {

        if (array_key_exists($note->class_discipline_id, $disciplineId)) {
            if ($note->unity == 1) {
                $students[$note->student_id][$note->class_discipline_id]['1'] += $note->note_value;
            } else if ($note->unity == 2) {
                $students[$note->student_id][$note->class_discipline_id]['2'] += $note->note_value;
            } else {
                $students[$note->student_id][$note->class_discipline_id]['3'] += $note->note_value;
            }
        }
    }
}

$photoDir =  "/assets/img/studentProfilePhotos/";

/* echo '<pre>';
print_r($students); */

?>


<div class="col-lg-12 table-responsive">

    <table class="table table-borderless table-hover" id="">

        <thead>
            <tr>
                <th scope="col" colspan="2">Nome do aluno</th>
                <th scope=" col">Disciplina</th>
                <th scope="col">Unidade</th>
                <th scope="col">Nota</th>
            </tr>
        </thead>

        <tbody containerListNote>

            <?php foreach ($students as $x => $value) {

                $name = $value['name'];
                $profilePhoto = $value['profilePhoto'];

                foreach ($disciplineId as $y => $discipline) {

                    $disciplineName = $value['discipline'][$y];

                    foreach ($value[$discipline] as $key => $disciplineFinal) { ?>

                        <tr>
                            <td class="">
                                <img class="miniature-photo" src='<?= $profilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $profilePhoto ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'>
                            </td>
                            <td><?= $name ?></td>
                            <td><?= $disciplineName ?></td>
                            <td><?= $key ?></td>
                            <td><?= $disciplineFinal ?></td>
                        </tr>

            <?php }
                }
            } ?>
        </tbody>
    </table>
</div>