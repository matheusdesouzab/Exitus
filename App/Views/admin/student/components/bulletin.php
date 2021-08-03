<div class="row">

    <?php

    $disciplineId = [];

    foreach ($this->view->disciplinesClassAlreadyAdded as $key => $discipline) {
        if (!array_key_exists($discipline->option_value, $disciplineId)) {
            $disciplineId[$discipline->option_text] = array('disciplina' => $discipline->option_text);
        }
    }


    foreach ($this->view->bulletin as $y => $bulletin) {
        if (array_key_exists($bulletin['disciplineName'], $disciplineId)) {
            $disciplineId[$bulletin['disciplineName']]['notas'][] = $bulletin['note'];
        }
    }

    foreach ($this->view->lackList as $y => $lack) {
        if (array_key_exists($lack->disciplineName, $disciplineId)) {
            $disciplineId[$lack->disciplineName]['faltas'][] = $lack->totalLack;
        }
    }

    ?>


    <h5 class="col-lg-11 mx-auto mb-4">Boletim do aluno</h5>

    <div class="table-responsive col-lg-11 mx-auto">

        <table id="table-bulletin" class="table table-bordered mt-3 col-lg-12">

            <thead class="thead-light">

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

                    <tr>
                        <td><?= $discipline['disciplina'] ?></td>
                        <td><?= isset($discipline['notas'][0]) ? round($discipline['notas'][0], 1) : '0' ?></td>
                        <td><?= isset($discipline['faltas'][0]) ? $discipline['faltas'][0] : '0' ?></td>
                        <td><?= isset($discipline['notas'][1]) ? round($discipline['notas'][1], 1) : '0' ?></td>
                        <td><?= isset($discipline['faltas'][1]) ? $discipline['faltas'][1] : '0' ?></td>
                        <td><?= isset($discipline['notas'][2]) ? round($discipline['notas'][2], 1) : '0' ?></td>
                        <td><?= isset($discipline['faltas'][2]) ? $discipline['faltas'][2] : '0' ?></td>
                    </tr>

                <?php } ?>

            </tbody>

        </table>

    </div>

</div>