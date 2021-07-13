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