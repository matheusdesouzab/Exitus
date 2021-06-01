<?php

$vetor = [];

foreach ($this->view->disciplineAvailable as $key => $discipline) {
    array_push($vetor, $discipline->option_value);
}

?>



    <label for="">Disciplina:</label>

    <select id="discipline" name="discipline" class="form-control custom-select" required>

        <?php foreach ($this->view->disciplineAll as $key => $discipline) { ?>

            <?php if (in_array($discipline->option_value, $vetor)) { ?>

            <?php } else { ?>

                <option value="<?= $discipline->option_value ?>"><?= $discipline->option_text ?></option>

        <?php }
        } ?>

    </select>