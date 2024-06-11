<?php 

require __DIR__ . '../../../../../config/variables.php';

?>

<?php if (count($this->view->listStudent) >= 1) { ?>

    <?php foreach ($this->view->listStudent as $key => $student) { ?>

        <?php $photoDir =  "$app_url/assets/img/studentProfilePhotos/" ?>

        <tr class="" id="aluno<?= $student->enrollment_id ?>">

            <td class="text-right">
                <img class="miniature-photo" src='<?= $student->profile_photo == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $student->profile_photo ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'>
            </td>

            <td class="text-left"><?= $student->name ?></td>

            <?php if ($this->view->typeStudentList != 'class' && isset($this->view->typeStudentList)) { ?>

                <td><?= $student->email ?></td>

                <td><?= $student->acronym_series . ' ' . $student->ballot  . ' - ' . $student->course . ' - ' . $student->shift ?></td>

                <td><?= $student->situation ?></td>

            <?php } else { ?>

                <td><?= $student->email ?></td>

               <td><?= $student->situation ?></td> 

            <?php } ?>

        </tr>


    <?php } ?>

    <tr class="mt-4">
        <td class="font-weight-bold" colspan="5"  style="pointer-events:none"><?= count($this->view->listStudent) ?> alunos listados <i class="fas fa-history ml-2"></i></td>
    </tr>

<?php } else { ?>

    <tr class="mt-4 thead-light">
        <td class="ml-3" colspan="5" style="pointer-events:none">Nenhum aluno encontrado </td>
    </tr>

<?php } ?>