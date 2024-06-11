<?php

require __DIR__ . '../../../../../config/variables.php';

$studentsRematrung = [];
$photoDir =  "$app_url/assets/img/studentProfilePhotos/";
$studentsRematrungSuccess = 0;

foreach ($this->view->listStudent as $key => $value) {

    if (count($this->view->studentsAlreadyRegisteredNextYear) >= 1) {

        foreach ($this->view->studentsAlreadyRegisteredNextYear as $key => $student) {

            if ($student->student_id == $value->id) {

                $studentsRematrung[$value->name]['name'] = $value->name;
                $studentsRematrung[$value->name]['profilePhoto'] = $value->profile_photo;
                $studentsRematrung[$value->name]['status'] = 'Efetivada';
                $studentsRematrung[$value->name]['newClass'] = $student->acronym_series . $student->ballot . ' - ' . $student->course . ' - ' . $student->shift;

                break;

            } else {

                $studentsRematrung[$value->name]['name'] = $value->name;
                $studentsRematrung[$value->name]['profilePhoto'] = $value->profile_photo;
                $studentsRematrung[$value->name]['status'] = 'Não efetivada';
                $studentsRematrung[$value->name]['newClass'] = 'Não definida';
            }
        }

    } else {
        $studentsRematrung[$value->name]['name'] = $value->name;
        $studentsRematrung[$value->name]['profilePhoto'] = $value->profile_photo;
        $studentsRematrung[$value->name]['status'] = 'Não efetivada';
        $studentsRematrung[$value->name]['newClass'] = 'Não definida';
    }
}


foreach ($studentsRematrung as $key => $value) {
    $value['status'] == 'Efetivada' ?  $studentsRematrungSuccess++ : '';
}

$order = [];

foreach ($studentsRematrung as $key => $row) {
    $order[$key] = $row['name'];
}

array_multisort($order, SORT_ASC, $studentsRematrung);

?>

<div class="table-responsive">

    <table class="table table-hover mt-3 table-borderless table-striped">
        <thead>
            <tr>
                <th class="text-left" colspan="2">Nome do aluno</th>
                <th>Status da rematrícula</th>
                <th>Nova turma</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($studentsRematrung as $key => $value) { ?>
                <tr>
                    <td class="text-left">
                        <img class="miniature-photo" src='<?= $value['profilePhoto'] == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value['profilePhoto'] ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>" ' style="width: 30px;">
                    </td>

                    <td class="text-left"><?= $value['name'] ?></td>
                    <td><?= $value['status'] ?></td>
                    <td><?= $value['newClass'] ?></td>
                </tr>
            <?php } ?>
        </tbody>

    </table>

</div>



<div class="col-lg-12">
    <hr class="text-dark">
    <p class="text-right font-weight-bold">Rematrículas efetivadas: <?= $studentsRematrungSuccess ?> de <?= count($this->view->listStudent) ?> <i class="fas fa-history ml-2"></i></p>
</div>