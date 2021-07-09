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
        <td class="font-weight-bold" colspan="5"  style="pointer-events:none"><?= count($this->view->listDiscipline) ?> disciplinas listadas <i class="fas fa-history ml-2"></i></td>
    </tr>

<?php } else { ?>

    <tr class="mt-4">
        <td colspan="3" style="pointer-events:none">Nenhuma disciplina adicionada <i class="fas fa-history ml-2"></i></td>
    </tr>

<?php } ?>