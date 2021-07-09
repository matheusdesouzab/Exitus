<?php if (count($this->view->listNote) >= 1) {

    foreach ($this->view->listNote as $i => $note) { ?>

        <tr id="note<?= $note->note_id ?>">
            <td><?= $note->exam_description ?></td>
            <td><?= $note->discipline_name ?></td>
            <td><?= $note->unity ?></td>
            <td><?= $note->exam_value ?></td>
            <td><?= $note->note_value ?></td>
        </tr>

<?php }} else { ?>

    <tr class="mt-4">
        <td colspan="5" style="pointer-events:none">Nenhuma avaliação encrontada <i class="fas fa-history ml-2"></i></td>
    </tr>

<?php } ?>