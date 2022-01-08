<?php

$disciplineId = [];

foreach ($this->view->linkedDisciplines as $key => $discipline) {
    if (!array_key_exists($discipline->option_value, $disciplineId)) {
        $disciplineId[$discipline->option_text] = array('disciplina' => $discipline->option_text);
    }
}


foreach ($this->view->bulletin as $y => $bulletin) {

    if (array_key_exists($bulletin->discipline_name, $disciplineId)) {
        if ($bulletin->unity == 1) {
            $disciplineId[$bulletin->discipline_name]['notas']['I'] = $bulletin->note;
        } else if ($bulletin->unity == 2) {
            $disciplineId[$bulletin->discipline_name]['notas']['II'] = $bulletin->note;
        } else if ($bulletin->unity == 3) {
            $disciplineId[$bulletin->discipline_name]['notas']['III'] = $bulletin->note;
        }
    }
}


foreach ($this->view->lackList as $y => $lack) {

    if (array_key_exists($lack->discipline_name, $disciplineId)) {
        if ($lack->unity == 1) {
            $disciplineId[$lack->discipline_name]['faltas']['I'] = $lack->total_lack;
        } else if ($lack->unity == 2) {
            $disciplineId[$lack->discipline_name]['faltas']['II'] = $lack->total_lack;
        } else if ($lack->unity == 3) {
            $disciplineId[$lack->discipline_name]['faltas']['III'] = $lack->total_lack;
        }
    }
}

foreach ($this->view->disciplineAverageList as $y => $discipline) {

    if (array_key_exists($discipline->discipline_name, $disciplineId)) {
        $disciplineId[$discipline->discipline_name]['mediaFinal']['nota'] = $discipline->average;
        $disciplineId[$discipline->discipline_name]['mediaFinal']['situacao'] = $discipline->subtitle;
    }
}



?>


<div class="col-lg-12">

    <div class="row d-flex align-items-center">

        <div class="col-lg-8 p-0">
            <h5 class='mt-2'>Boletim do aluno</h5>
        </div>

        <div class="col-lg-4 p-0">

            <div class="row collapse-options-container">

                <a class="font-weight-bold" href="#"><span id="printBuleetin" class="printer-icon"><i class="fas fa-download mr-2"></i> Baixar boletim</span></a>

            </div>

        </div>

    </div>
</div>


<div class="col-lg-12 table-responsive p-0" id="table-bulletin-print">

    <table id="table-bulletin" class="table table-bordered mt-3">

        <thead class="text-center">

            <tr>
                <th rowspan="2" scope="col" style="vertical-align : middle;text-align:center;">Disciplinas</th>
                <th colspan="2" scope="col">UNIDADE I</th>
                <th colspan="2" scope="col">UNIDADE II</th>
                <th colspan="2" scope="col">UNIDADE III</th>
                <th rowspan="2" scope="col" style="vertical-align : middle;text-align:center;">Média final</th>
                <th rowspan="2" scope="col" style="vertical-align : middle;text-align:center;">Resultado final</th>
            </tr>

            <tr>
                <th class="" scope="col">Nota</th>
                <th class="" scope="col">Faltas</th>
                <th class="" scope="col">Nota</th>
                <th class="" scope="col">Faltas</th>
                <th class="" scope="col">Nota</th>
                <th class="" scope="col">Faltas</th>
            </tr>

        </thead>

        <tbody>

            <?php foreach ($disciplineId as $key => $discipline) { ?>

                <tr class="text-center">
                    <td><?= $discipline['disciplina'] ?></td>
                    <td><?= isset($discipline['notas']['I']) ? round($discipline['notas']['I'], 1) : '0' ?></td>
                    <td><?= isset($discipline['faltas']['I']) ? $discipline['faltas']['I'] : '0' ?></td>
                    <td><?= isset($discipline['notas']['II']) ? round($discipline['notas']['II'], 1) : '0' ?></td>
                    <td><?= isset($discipline['faltas']['II']) ? $discipline['faltas']['II'] : '0' ?></td>
                    <td><?= isset($discipline['notas']['III']) ? round($discipline['notas']['III'], 1) : '0' ?></td>
                    <td><?= isset($discipline['faltas']['III']) ? $discipline['faltas']['III'] : '0' ?></td>
                    <td><?= isset($discipline['mediaFinal']['nota']) ? $discipline['mediaFinal']['nota'] : '0' ?></td>
                    <td><?= isset($discipline['mediaFinal']['situacao']) ? $discipline['mediaFinal']['situacao'] : '' ?></td>
                </tr>

            <?php } ?>

        </tbody>

        <tfoot>

            <tr>
                <td colspan="9" class="text-center">Situação do aluno(a): <?= $this->view->enrollmentId[0]->situation ?></td>

            </tr>

        </tfoot>

        </tbody>

    </table>

</div>