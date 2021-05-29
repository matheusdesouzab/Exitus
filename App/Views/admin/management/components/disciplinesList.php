<?php

if (count($this->view->listDiscipline) >= 1) {

    foreach ($this->view->listDiscipline as $i => $discipline) { ?>

        <tr id="disciplina<?= $discipline->discipline_id ?>">
            <td><?= $discipline->discipline_name ?></td>
            <td><?= $discipline->acronym ?></td>
            <td><?= $discipline->discipline_modality ?></td>
        </tr>

    <?php } ?>

    <tr class="mt-4">
        <td colspan="5" style="background-color: #ECECEC;"><?= count($this->view->listDiscipline) ?> disciplinas retornadas</td>
    </tr>

<?php } else { ?>

    <tr class="mt-4">
        <td colspan="3" style="pointer-events:none">Nenhuma disciplina adicionada</td>
    </tr>

<?php } ?>