<hr class='mt-3 mx-auto col-lg-11'>

<div class="table-responsive">

    <table class="table table-hover col-lg-11 mx-auto table-borderless" id="tableListExam">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Descrição</th>
                <th scope="col">Disciplina</th>
                <th scope="col">UE</th>
                <th scope="col">Valor</th>
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
                        <td><?= $exam->unity ?></td>
                        <td><?= $exam->exam_value ?></td>
                    </tr>

                    <?php $sum += $exam->exam_value ?>

                <?php } ?>

                <?php if(isset($this->view->typeListExam) && $this->view->typeListExam[0] != 'recent') { ?>

                <tr class="mt-4">
                    <td colspan="5"> <i class="far fa-sticky-note mr-3"></i> <?= $sum ?> pontos já atribuidos na <?= $this->view->listExam[0]->unity ?> unidade de <?= $this->view->listExam[0]->discipline_name ?> ( Restam <?= 10 - $sum ?> )</td>
                </tr>

            <?php }} else { ?>

                <tr class="mt-4">
                    <td colspan="5" style="pointer-events:none">Nenhuma avaliação encrontada</td>
                </tr>

            <?php } ?>

        </tbody>
    </table>
</div>