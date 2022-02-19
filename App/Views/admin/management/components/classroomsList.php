<?php if (count($this->view->listClassRoom) >= 1) { ?>

    <?php foreach ($this->view->listClassRoom as $i => $classRoom) { ?>

        <form id="formClassRoom<?= $classRoom->classroom_id ?>" class="card mb-4" action="">

            <div class="form-row d-flex align-items-center col-lg-11 mx-auto">

                <input type="hidden" name="classroomId" value="<?= $classRoom->classroom_id ?>">

                <div class="col-lg-8 font-weight-bold">
                    Sala de aula número <?= $classRoom->classroom_number ?>
                </div>

                <div class="col-lg-4 d-flex justify-content-end option-icon-group mt-2">

                    <span idElement="#formClassRoom<?= $classRoom->classroom_id ?>" formGroup="containerListClassRoom" class="mr-2 edit-data-icon"  data-toggle="tooltip" data-placement="left" title="Editar">
                        <i class="fas fa-edit"></i>
                    </span>

                    <span idElement="#formClassRoom<?= $classRoom->classroom_id ?>" routeUpdate="/admin/gestao/sala/atualizar" toastData="Sala Atualizada" container="containerListClassRoom" routeList="/admin/gestao/sala/lista" class="mr-2 update-data-icon" data-toggle="tooltip" data-placement="bottom" title="Atualizar">
                        <i class="fas fa-check"></i>
                    </span>

                </div>

            </div>

            <div class="form-row mt-4 mb-2 col-lg-11 mx-auto">

                <div class="form-group col-lg-12">
                    <label for="">Capacidade de alunos:</label>
                    <input class="form-control" disabled value="<?= $classRoom->student_capacity ?>" type="text" name="studentCapacity" id="">
                </div>


            </div>

        </form>

    <?php }
} else { ?>

    <h5 class="mt-3">Nenhuma sala adicionada</h5>


<?php } ?>