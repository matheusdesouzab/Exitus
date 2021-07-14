<?php if (count($this->view->teacherClasses) > 0) { ?>

    <?php foreach ($this->view->teacherClasses as $key => $class) { ?>

        <?php $shift = substr($class->shift, 0, 1) ?>

        <tr id="class<?= $class->class_id ?>">
            <td><?= $class->course ?>-<?= $class->series_acronym ?><?= $shift ?>-<?= $class->ballot ?></td>
            <td><?= $class->classroom_number ?></td>
            <td><?= $class->school_term ?></td>
            <td><?= $class->discipline_total ?></td>
            <td><?= $class->student_total ?></td>
        </tr>

    <?php } ?>

    <tr class="mt-4">
        <td colspan="5" class="font-weight-bold" style="pointer-events:none"><?= count($this->view->teacherClasses) ?> turmas listadas <i class="fas fa-history ml-2"></i></td>
    </tr>

<?php } else { ?>

    <tr class="mt-4">
        <td colspan="5" style="pointer-events:none">Nenhuma turma encontrada <i class="fas fa-history ml-2"></i></td>
    </tr>

<?php } ?>