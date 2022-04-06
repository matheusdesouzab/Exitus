<form id="formLack<?= $this->view->lackData[0]->lack_id ?>" class="col-lg-11 mx-auto mb-4" action="">

    <div class="col-lg-12">

        <div class="form-row modal-header d-flex justify-content-between">
            <H5 discipline class="col-lg-6 pl-0">Registro de falta</H5>
            <div class="col-lg-6 d-flex justify-content-end pr-0">

                <span idElement="#formLack<?= $this->view->lackData[0]->lack_id ?>" class="mr-2 edit-data-icon" data-toggle="tooltip" data-placement="left" title="Editar">
                    <i class="fas fa-edit"></i>
                </span>

                <span idElement="#formLack<?= $this->view->lackData[0]->lack_id ?>" routeUpdate="/admin/gestao/turma/perfil-turma/aluno/faltas/atualizar" toastData="Falta atualizada" container="containerListLack" routeList="/admin/gestao/turma/perfil-turma/aluno/faltas/lista" class="mr-2 update-data-icon" routeData="#formLack<?= $this->view->lackData[0]->lack_id ?>" data-toggle="tooltip" data-placement="right" title="Atualizar">
                    <i class="fas fa-check"></i>
                </span>

            </div>
        </div>


        <div class="form-row mb-2 mt-3">

            <input type="hidden" name="id" value="<?= $this->view->lackData[0]->lack_id ?>">
            <input type="hidden" name="enrollmentId" value="<?= $this->view->lackData[0]->enrollment_id?>">

            <div class="form-group col-lg-6">
                <label for="">Disciplina:</label>
                <input class="form-control" disabled value="<?= $this->view->lackData[0]->discipline_name ?>" type="text" name="" id="" style="pointer-events:none">
            </div>

            <div class="form-group col-lg-4">
                <label for="">Unidade:</label>
                <input class="form-control" maxlength="4" disabled value="<?= $this->view->lackData[0]->unity ?>" type="text" name="" id="" style="pointer-events:none">
            </div>

            <div class="form-group col-lg-2">
                <label for="">Faltas:</label>
                <input class="form-control" maxlength="4" disabled value="<?= $this->view->lackData[0]->total_lack ?>" type="text" name="totalLack" id="" >
            </div>

        </div>


        <div class="form-row d-flex justify-content-end modal-links-alternativos mt-3 mb-3">

            <a class="btn main-button text-white" data-dismiss="modal" href="">Retornar a sessão</a>

        </div>

</form>