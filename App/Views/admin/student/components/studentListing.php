<?php if (count($this->view->listStudent) >= 1) { ?>

    <?php foreach ($this->view->listStudent as $key => $student) { ?>

        <?php $photoDir =  "/assets/img/studentProfilePhotos/" ?>

        <tr id="aluno<?= $student->student_id ?>">
            <td class="text-right">
                <img src='<?= $student->profilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $student->profilePhoto ?>' alt="" style="width: 40px; height: 40px; object-position:top; object-fit: cover" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'>
            </td>

            <td class="text-left"><?= $student->student_name ?></td>

            <?php if ($this->view->typeStudentList != 'class' && isset($this->view->typeStudentList)) { ?>

                <td><?= $student->acronym_series . ' ' . $student->class_ballot  . ' - ' . $student->course . ' - ' . $student->shift ?></td>

                <td>0</td>

            <?php } else { ?>

                <td>0</td>



            <?php } ?>

        </tr>


    <?php } ?>

    <tr class="mt-4">
        <td class="font-weight-bold" colspan="5" style="background-color: #F9F8F8;"><?= count($this->view->listStudent) ?> alunos retornados <i class="fas fa-history ml-2"></i></td>
    </tr>

<?php } else { ?>

    <tr class="mt-4 thead-light">
        <td class="ml-3" colspan="5" style="pointer-events:none">Nenhum aluno encontrado </td>
    </tr>

<?php } ?>