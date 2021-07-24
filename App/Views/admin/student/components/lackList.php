<?php if (count($this->view->lackList) >= 1) {

    foreach ($this->view->lackList as $key => $lack) { ?>

        <tr id="lack<?= $lack->lackId?>">
            <td><?= $lack->disciplineName ?></td>
            <td><?= $lack->unity ?></td>
            <td><?= $lack->totalLack ?></td>

        </tr>

    <?php } ?>

    <tr class="mt-4">
        <td class="font-weight-bold" colspan="3" style="pointer-events:none"><?= count($this->view->lackList) ?> registros listados <i class="fas fa-history ml-2"></i></td>
    </tr>

<?php } else { ?>

    <tr class="mt-4">
        <td colspan="3" style="pointer-events:none">Nenhuma avaliação encrontada <i class="fas fa-history ml-2"></i></td>
    </tr>

<?php } ?>