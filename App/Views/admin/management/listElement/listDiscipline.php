<?php

if (count($this->view->listDiscipline) >= 1) {

    foreach ($this->view->listDiscipline as $i => $discipline) { ?>

        <tr id="disciplina<?= $discipline->id_discipline ?>">
            <td><?= $discipline->discipline ?></td>
            <td><?= $discipline->acronym ?></td>
            <td><?= $discipline->discipline_modality ?></td>
        </tr>

    <?php }
} else { ?>

    <tr class="mt-4">
        <td colspan="3">Nenhuma disciplina adicionada</td>
    </tr>

<?php } ?>