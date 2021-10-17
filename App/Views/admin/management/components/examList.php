

<div class="table-responsive">

    <table class="table table-hover col-lg-12 mx-auto table-borderless" id="tableListExam">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Descrição</th>
                <th scope="col">Disciplina</th>
                <th class="text-center" scope="col">UE</th>
                <th class="text-center" scope="col">Valor</th>
            </tr>
        </thead>
        <tbody>

            <?php if (count($this->view->listExam) >= 1) {

                $sum = 0;

                foreach ($this->view->listExam as $i => $exam) { ?>

                    <tr id="exam<?= $exam->exam_id ?>">
                        <td><?= $exam->exam_id ?></td>
                        <td><?= $exam->exam_description ?></td>
                        <td><?= $exam->discipline_name ?></td>
                        <td class="text-center"><?= $exam->unity ?></td>
                        <td class="text-center"><?= $exam->exam_value ?></td>
                    </tr>

                    <?php $sum += $exam->exam_value ?>

                <?php } ?>

                <tr class="mt-4">
                    <td class="font-weight-bold" colspan="5" style="pointer-events:none"><?= count($this->view->listExam) ?> exames listados <i class="fas fa-history ml-2"></i></td>
                </tr>

                <?php if (isset($this->view->typeListExam) && $this->view->typeListExam[0] != 'recent') {

                    $pointsOrTenths = '';

                    switch ($sum) {
                        case $sum > 1:
                            $pointsOrTenths = " pontos";
                            break;
                        case $sum < 1:
                            $pointsOrTenths = " décimos";
                            break;
                        case $sum == 1:
                            $pointsOrTenths = " ponto";
                            break;
                    }

                ?>

                    <tr>
                        <td class="" colspan="5"> <i class="far fa-sticky-note mr-3"></i> <?= $sum ?> pontos já atribuidos na <?= $this->view->listExam[0]->unity ?> unidade de <?= $this->view->listExam[0]->discipline_name ?> ( Restam <?= 10 - $sum ?> <?= $pointsOrTenths ?> )</td>
                    </tr>

                <?php }
            } else { ?>

                <tr class="mt-4">
                    <td colspan="5" style="pointer-events:none">Nenhuma avaliação encrontada <i class="fas fa-history ml-2"></i></td>
                </tr>

            <?php } ?>

        </tbody>
    </table>
</div>