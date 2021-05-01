<?php foreach ($this->view->listStudent as $key => $student) { ?>

    <?php $photoDir =  "/assets/img/profilePhoto/" ?>

    <tr>
        <td class="text-right">
            <img src='<?= $student->profilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $student->profilePhoto ?>' alt="" style="width: 40px; height: 40px; object-position:top; object-fit: cover" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'>
        </td>

        <td class="text-left"><?= $student->student_name ?></td>
        <td><?= $student->student_cpf ?></td>
        <td><?= $student->acronym_series . ' ' . $student->class_ballot  . ' - ' . $student->course . ' - ' . $student->shift ?></td>

        <td>
            <div class="row text-center d-flex justify-content-center mt-2">
                <div class="col-2 registered-unit-icon"><i class="fas fa-check-circle"></i></div>
                <div class="col-2 unregistered-unit-icon"><i class="fas fa-check-circle"></i></div>
                <div class="col-2 unregistered-unit-icon"><i class="fas fa-check-circle"></i></div>
            </div>
        </td>

    </tr>

<?php } ?>