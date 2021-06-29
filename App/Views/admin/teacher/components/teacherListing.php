<?php if (count($this->view->listTeacher) >= 1) { ?>

    <?php foreach ($this->view->listTeacher as $key => $teacher) { ?>

        <tr id="teacher<?= $teacher->teacher_id ?>" class="text-center">

            <?php $photoDir =  "/assets/img/teacherProfilePhotos/" ?>

            <td class="text-rigth">
                <img src='<?= $teacher->profilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $teacher->profilePhoto ?>' alt="" style="width: 40px; height: 40px; object-position:top; object-fit: cover" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'>
            </td>

            <td class="text-left"><?= $teacher->teacher_name ?></td>

            <?php if ($this->view->typeTeacherList != 'class' && isset($this->view->typeTeacherList)) { ?>

                <td>43</td>
                <td><?= $teacher->teacher_sex ?></td>
                <td><?= $teacher->total_discipline ?></td>

            <?php } else { ?>

                <td><?= $teacher->discipline_name ?></td>

            <?php } ?>
        </tr>

    <?php } ?>

    <tr class="mt-4">
        <td class="font-weight-bold" colspan="6" style="background-color: #F9F8F8;"><?= count($this->view->listTeacher) ?> professores(a) retornados <i class="fas fa-history ml-2"></i></td>
    </tr>

<?php } else { ?>

    <tr class="mt-4 thead-light">
        <td class="ml-3" colspan="5" style="pointer-events:none">Nenhum professor encontrado </td>
    </tr>

<?php } ?>