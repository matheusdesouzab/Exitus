<?php

if (count($this->view->listClass) >= 1) {

    foreach ($this->view->listClass as $i => $class) { ?>

        <?php $shift = substr($class->shift, 0, 1) ?>

        <tr id="<?= $class->id_class ?>">
            <td><?= $class->course ?>-<?= $class->series_acronym ?><?= $shift ?>-<?= $class->ballot ?></td>
            <td>0</td>
            <td><?= $class->school_term ?></td>
            <td>0.0</td>
        </tr>

    <?php }
} else { ?>

    <tr class="mt-4">
        <td colspan="4">Nenhuma turma adicionada</td>
    </tr>


<?php } ?>