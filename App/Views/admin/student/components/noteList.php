<?php 

require __DIR__ . '../../../../../config/variables.php';

?>

<?php if (count($this->view->listNote) >= 1) {

    $total = 1;

    foreach ($this->view->listNote as $i => $note) { ?>

        <?php $photoDir =  "$app_url/assets/img/studentProfilePhotos/" ?>

        <tr id="note<?= $note->note_id ?>">

            <td><?= $total++ ?></td>

            <td class="">
                <img class="miniature-photo" src='<?= $note->student_profile_photo == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $note->student_profile_photo ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'>
            </td>

            <td>
                <?= $note->student_name ?>
            </td>

            <td class='text-center' data-toggle="tooltip" data-placement="bottom" title="Aproveitamento - <?= number_format(($note->note_value * 100) / $note->exam_value, 1, '.', '') ?> %"><?= number_format($note->note_value, 1, '.', '') ?> / <?= number_format($note->exam_value, 1, '.', '') ?></td>

            <td class="limited-text-description" data-toggle="tooltip" data-placement="bottom" title="<?= $note->exam_description ?> - <?= $note->discipline_name ?> - <?= $note->unity ?>ª unidade"><?= $note->exam_description ?> - <?= $note->discipline_name ?> - <?= $note->unity ?>ª unidade </td>

        </tr>

    <?php } ?>

    <tr class="mt-4">
        <td class="font-weight-bold text-right" colspan="5" style="pointer-events:none"><?= count($this->view->listNote) ?> notas listadas <i class="fas fa-history ml-2"></i></td>
    </tr>

<?php } else { ?>

    <tr class="mt-4">
        <td class="text-center" colspan="5" style="pointer-events:none">Nenhuma avaliação encrontada <i class="fas fa-history ml-2"></i></td>
    </tr>

<?php } ?>