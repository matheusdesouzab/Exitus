<form id="formNote<?= $this->view->noteData[0]->note_id ?>" class="col-lg-11 mx-auto mb-4" action="">

    <div class="col-lg-12">

        <div class="form-row modal-header d-flex justify-content-between">
            <H5 discipline class="col-lg-6 pl-0"><?= $this->view->noteData[0]->exam_description ?></H5>
            <div class="col-lg-6 d-flex justify-content-end pr-0">

                <span idElement="#formNote<?= $this->view->noteData[0]->note_id ?>" class="mr-2 edit-data-icon" data-toggle="tooltip" data-placement="left" title="Editar">
                    <i class="fas fa-edit"></i>
                </span>

                <span idElement="#formNote<?= $this->view->noteData[0]->note_id ?>" routeUpdate="/admin/gestao/turma/perfil-turma/aluno/avaliacoes/dados/atualizar" toastData="Nota atualizada" container="containerListNote" routeList="/admin/gestao/turma/perfil-turma/aluno/lista-notas" class="mr-2 update-data-icon" routeData="#formNote<?= $this->view->noteData[0]->note_id ?>" data-toggle="tooltip" data-placement="top" title="Atualizar">
                    <i class="fas fa-check"></i>
                </span>

                <span idElement="#formNote<?= $this->view->noteData[0]->note_id ?>" routeDelete="/admin/gestao/turma/perfil-turma/aluno/avaliacoes/dados/deletar" toastData="Avaliação deletada" routeData="#formNote<?= $this->view->noteData[0]->note_id ?>" container="containerListNote" routeList="/admin/gestao/turma/perfil-turma/aluno/lista-notas" class="mr-2 delete-data-icon" data-toggle="tooltip" data-placement="right" title="Deletar">
                    <i class="fas fa-trash-alt"></i>
                </span>

            </div>
        </div>


        <div class="form-row mb-2 mt-3">

        <input type="hidden" name="noteId" value="<?= $this->view->noteData[0]->note_id ?>">
        <input type="hidden" name="enrollmentId" value="<?= $this->view->noteData[0]->enrollment_id ?>">

            <div class="form-group col-lg-6">
                <label for="">Descrição da avaliação:</label>
                <input class="form-control" disabled value="<?= $this->view->noteData[0]->exam_description ?>" type="text" name="" id="" style="pointer-events:none">
            </div>

            <div class="form-group col-lg-4">
                <label for="">Disciplina:</label>
                <input class="form-control" maxlength="4" disabled value="<?= $this->view->noteData[0]->discipline_name ?>" type="text" name="" id="" style="pointer-events:none">
            </div>

            <div class="form-group col-lg-2">
                <label for="">Unidade:</label>
                <input class="form-control" maxlength="4" disabled value="<?= $this->view->noteData[0]->unity ?>" type="text" name="" id="" style="pointer-events:none">
            </div>

        </div>


        <div class="form-row mb-2 mt-3">

            <div class="form-group col-lg-4">
                <label for="">Data realizada:</label>
                <input class="form-control" maxlength="4" disabled value="<?= $this->view->noteData[0]->realize_date ?>" type="date" id="" style="pointer-events:none">
            </div>

            <div class="form-group col-lg-4">
                <label for="">Professor:</label>
                <input class="form-control" maxlength="4" disabled value="<?= $this->view->noteData[0]->teacher_name ?>" type="text" id="" style="pointer-events:none">
            </div>

            <div class="form-group col-lg-2">
                <label for="">Valor AV:</label>
                <input class="form-control" initialValue="<?= $this->view->noteData[0]->exam_value ?>" formId="#formNote<?= $this->view->noteData[0]->note_id ?>" id="examValue" maxlength="" disabled value="<?= $this->view->noteData[0]->exam_value ?>" type="text" style="pointer-events:none">
            </div>

            <div class="form-group col-lg-2">
                <label for="">Nota aluno:</label>
                <input class="form-control" initialValue="<?= $this->view->noteData[0]->exam_value ?>" formId="#formNote<?= $this->view->noteData[0]->note_id ?>" id="noteValue" maxlength="" disabled value="<?= $this->view->noteData[0]->note_value ?>" type="text" name="noteValue">
            </div>

        </div>

        <div class="form-row d-flex justify-content-end modal-links-alternativos mt-3 mb-3">

        <a class="btn main-button text-white" data-dismiss="modal" href="">Retornar a sessão</a>

        </div>

</form>