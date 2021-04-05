<?php foreach ($this->view->listDiscipline as $i => $discipline) { ?>

    <tr id="disciplina<?= $discipline->id_discipline ?>">
        <td><?= $discipline->discipline ?></td>
        <td><?= $discipline->acronym ?></td>
        <td><?= $discipline->discipline_modality ?></td>
    </tr>

<?php } ?>