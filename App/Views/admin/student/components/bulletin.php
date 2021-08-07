<div class="row">

    <?php

    $disciplineId = [];

    foreach ($this->view->disciplinesClassAlreadyAdded as $key => $discipline) {
        if (!array_key_exists($discipline->option_value, $disciplineId)) {
            $disciplineId[$discipline->option_text] = array('disciplina' => $discipline->option_text);
        }
    }


    foreach ($this->view->bulletin as $y => $bulletin) {

        if (array_key_exists($bulletin->disciplineName, $disciplineId)) {
            if ($bulletin->unity == 1) {
                $disciplineId[$bulletin->disciplineName]['notas']['I'] = $bulletin->note;
            } else if ($bulletin->unity == 2) {
                $disciplineId[$bulletin->disciplineName]['notas']['II'] = $bulletin->note;
            } else if ($bulletin->unity == 3) {
                $disciplineId[$bulletin->disciplineName]['notas']['III'] = $bulletin->note;
            }
        }
    }


    foreach ($this->view->lackList as $y => $lack) {

        if (array_key_exists($lack->disciplineName, $disciplineId)) {
            if ($lack->unity == 1) {
                $disciplineId[$lack->disciplineName]['faltas']['I'] = $lack->totalLack;
            } else if ($bulletin->unity == 2) {
                $disciplineId[$lack->disciplineName]['faltas']['II'] = $lack->totalLack;
            } else if ($bulletin->unity == 3) {
                $disciplineId[$lack->disciplineName]['faltas']['III'] = $lack->totalLack;
            }
        }
    }

    ?>


    <div class="col-lg-11 mx-auto mb-3">

        <div class="row d-flex align-items-center">

            <h5 class="col-lg-8">Boletim do aluno</h5>

            <div class="col-lg-4 d-flex justify-content-end">

                <span id="printBuleetin" class="mr-2 printer-icon"><i class="fas fa-print"></i></span>

            </div>

        </div>
    </div>


    <div class="table-responsive col-lg-11 mx-auto" id="bolletin-table">

        <table id="table-bulletin" class="table table-bordered mt-3 col-lg-12">

            <thead class="thead-light text-center">

                <tr>
                    <th class="th-rowspan-2" rowspan="2" scope="col" style="vertical-align : middle;text-align:center;">Disciplinas</th>
                    <th colspan="2" scope="col">UNIDADE I</th>
                    <th colspan="2" scope="col">UNIDADE II</th>
                    <th colspan="2" scope="col">UNIDADE III</th>
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
                    </tr>

                <?php } ?>

            </tbody>

        </table>

    </div>

</div>