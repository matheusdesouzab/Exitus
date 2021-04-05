<?php foreach ($this->view->listClass as $i => $class) { ?>

    <tr id="<?= $class->id_class ?>">
        <td><?= $class->course ?> - <?= $class->series_acronym ?> - <?=$class->shift?> - <?=$class->ballot?></td>
        <td>0</td>
        <td><?= $class->school_term ?></td>
        <td>0.0</td>
    </tr>

<?php } ?>