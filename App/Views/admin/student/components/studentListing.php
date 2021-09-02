<?php if (count($this->view->listStudent) >= 1) { ?>

    <?php foreach ($this->view->listStudent as $key => $student) { ?>

        <?php $photoDir =  "/assets/img/studentProfilePhotos/" ?>

        <tr class="" id="aluno<?= $student->student_id ?>" style="">

            <td class="text-right">
                <img src='<?= $student->profilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $student->profilePhoto ?>' alt="" style="width: 40px; height: 40px; object-position:top; object-fit: cover" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'>
            </td>

            <td class="text-left"><?= $student->student_name ?></td>

            <?php if ($this->view->typeStudentList != 'class' && isset($this->view->typeStudentList)) { ?>

                <?php

                $cpf = $student->student_cpf;

                $formattedCpf = substr($cpf, 0, 3) . "." . substr($cpf, 3, 3) . "." . substr($cpf, 6, 3) . "-" . substr($cpf, -2);

                ?>

                <td><?= $formattedCpf ?></td>

                <td><?= $student->acronym_series . ' ' . $student->ballot  . ' - ' . $student->course . ' - ' . $student->shift ?></td>

                <td><?= $student->student_situation ?></td>

            <?php } else { ?>

                <td><?= $student->student_situation ?></td>

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