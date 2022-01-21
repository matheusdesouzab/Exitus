

<div class="table-responsive col-lg-12 p-0">

    <hr>

    <table class="table table-hover col-lg-12 mx-auto table-borderless table-striped" id="tableListExam">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Descrição da avaliação</th>
                <th scope="col">Disciplina</th>
                <th class="text-center" scope="col">Unidade</th>
                <th class="text-center" scope="col">Valor</th>
            </tr>
        </thead>
        <tbody>

            <?php if (count($this->view->listExam) >= 1) {

                $sum = 0;
                $total = 1;

                foreach ($this->view->listExam as $i => $exam) { ?>

                    <tr id="exam<?= $exam->exam_id ?>">
                        <td><?= $total++ ?></td>
                        <td><?= $exam->exam_description ?></td>
                        <td><?= $exam->discipline_name ?></td>
                        <td class="text-center"><?= $exam->unity ?></td>
                        <td class="text-center"><?= number_format($exam->exam_value, 1, '.', '') ?></td>
                    </tr>

                    <?php $sum += $exam->exam_value ?>

                <?php } ?>

                <tr class="mt-4">
                    <td class="font-weight-bold text-right" colspan="5" style="pointer-events:none"><?= count($this->view->listExam) ?> exames listados <i class="fas fa-history ml-2"></i></td>
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
                        <td class="text-center" colspan="5"> <i class="far fa-sticky-note mr-3"></i> <?= $sum ?> pontos já atribuidos na <?= $this->view->listExam[0]->unity ?> unidade de <?= $this->view->listExam[0]->discipline_name ?> ( Restam <?= 10 - $sum ?> <?= $pointsOrTenths ?> )</td>
                    </tr>

                <?php }
            } else { ?>

                <tr class="mt-4">
                    <td class="text-center" colspan="5" style="pointer-events:none">Nenhuma avaliação encrontada <i class="fas fa-history ml-2"></i></td>
                </tr>

            <?php } ?>

        </tbody>
    </table>
</div>