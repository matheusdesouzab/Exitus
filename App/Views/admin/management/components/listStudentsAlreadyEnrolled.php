<?php

$studentsRematrung = [];
$photoDir =  "/assets/img/studentProfilePhotos/";
$studentsRematrungSuccess = 0;

foreach ($this->view->listStudent as $key => $value) {

    foreach ($this->view->studentsAlreadyRegisteredNextYear as $key => $student) {

        if ($student->studentId == $value->student_id) {

            $studentsRematrung[$value->student_name]['name'] = $value->student_name;
            $studentsRematrung[$value->student_name]['profilePhoto'] = $value->profilePhoto;
            $studentsRematrung[$value->student_name]['status'] = 'Efetivada';
            $studentsRematrung[$value->student_name]['newClass'] = $student->acronym_series . $student->ballot . ' - ' . $student->course . ' - ' . $student->shift;

            break;
        } else {

            $studentsRematrung[$value->student_name]['name'] = $value->student_name;
            $studentsRematrung[$value->student_name]['profilePhoto'] = $value->profilePhoto;
            $studentsRematrung[$value->student_name]['status'] = 'Não efetivada';
            $studentsRematrung[$value->student_name]['newClass'] = 'Não definida';
        }
    }
}

foreach ($studentsRematrung as $key => $value) {
    $value['status'] == 'Efetivada' ?  $studentsRematrungSuccess++ : '';
}


?>

<table class="table table-hover mt-3 table-borderless">
    <thead>
        <tr>
            <th colspan="2">Alunos</th>
            <th>Status da rematrícula</th>
            <th>Nova turma</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($studentsRematrung as $key => $value) { ?>
            <tr>
                <td class="text-right">
                    <img class="miniature-photo" src='<?= $value['profilePhoto'] == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value['profilePhoto'] ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'>
                </td>

                <td class="text-left"><?= $value['name'] ?></td>
                <td><?= $value['status'] ?></td>
                <td><?= $value['newClass'] ?></td>
            </tr>
        <?php } ?>
    </tbody>

</table>



<div class="col-lg-12">
<hr class="text-dark">
    <p class="text-right font-weight-bold">Rematrículas efetivadas: <?= $studentsRematrungSuccess ?> de <?= count($this->view->listStudent) ?> <i class="fas fa-history ml-2"></i></p>
</div>