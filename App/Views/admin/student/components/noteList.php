<?php if (count($this->view->listNote) >= 1) {

    foreach ($this->view->listNote as $i => $note) { ?>

        <?php $photoDir =  "/assets/img/studentProfilePhotos/" ?>

        <tr id="note<?= $note->note_id ?>">

            <?php if ($this->view->listNoteType == 'class') { ?>

                <td class="">
                    <img class="miniature-photo" src='<?= $note->student_profilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $note->student_profilePhoto ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'>
                </td>

                <td class="">
                    <?= $note->student_name ?>
                </td>

            <?php } ?>

            <td class=""><?= $note->exam_description ?> - <?= $note->unity ?> unidade </td>
            <td><?= $note->discipline_name ?></td>
            <td><?= $note->note_value ?> / <?= $note->exam_value ?></td>
        </tr>

    <?php } ?>

    <tr class="mt-4">
        <td class="font-weight-bold" colspan="4" style="pointer-events:none"><?= count($this->view->listNote) ?> notas listadas <i class="fas fa-history ml-2"></i></td>
    </tr>


<?php } else { ?>

    <tr class="mt-4">
        <td class="text-center" colspan="<?= $this->view->listNoteType == 'class' ? '7' : '5' ?>" style="pointer-events:none">Nenhuma avaliação encrontada <i class="fas fa-history ml-2"></i></td>
    </tr>

<?php } ?>