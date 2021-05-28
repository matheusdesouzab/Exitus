<?php if (count($this->view->listClassRoom) >= 1) { ?>

    <?php foreach ($this->view->listClassRoom as $i => $classRoom) { ?>

        <form id="formClassRoom<?= $classRoom->id_room ?>" class="card mb-4" action="">

            <div class="form-row d-flex align-items-center col-lg-11 mx-auto">

                <input type="hidden" name="classroomId" value="<?= $classRoom->id_room ?>">

                <div class="col-lg-8 font-weight-bold">
                    Sala de aula número <?= $classRoom->classroom_number ?></div>

                <div class="col-lg-4 d-flex justify-content-end mt-2">

                    <span idElement="#formClassRoom<?= $classRoom->id_room ?>" formGroup="containerListClassRoom" class="mr-2 edit-data-icon"><i class="fas fa-edit"></i></span>

                    <span idElement="#formClassRoom<?= $classRoom->id_room ?>" routeUpdate="/admin/gestao/sala/atualizar" toastData="Sala Atualizada" container="containerListClassRoom" routeList="/admin/gestao/sala/lista" class="mr-2 update-data-icon"><i class="fas fa-check"></i></span>

                    <span idElement="#formClassRoom<?= $classRoom->id_room ?>" routeDelete="/admin/gestao/sala/deletar" toastData="Periodo Letivo Atualizado" container="containerListClassRoom" routeList="/admin/gestao/sala/lista" class="mr-2 delete-data-icon"><i class="fas fa-ban"></i></span>

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

    <h5 class="mt-3">Nenhuma sala encontrada</h5>


<?php } ?>