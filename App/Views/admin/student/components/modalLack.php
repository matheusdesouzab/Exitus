<form id="formNote<?= $this->view->lackData[0]->lackId ?>" class="col-lg-11 mx-auto mb-4" action="">

<?php print_r($this->view->lackData) ?>

    <div class="col-lg-12">

        <div class="form-row modal-header d-flex justify-content-between">
            <H5 discipline class="col-lg-6 pl-0">Registro de falta</H5>
            <div class="col-lg-6 d-flex justify-content-end pr-0">

                <span idElement="#formNote<?= $this->view->lackData[0]->lackId ?>" class="mr-2 edit-data-icon">
                    <i class="fas fa-edit"></i>
                </span>

                <span idElement="#formNote<?= $this->view->lackData[0]->lackId ?>" routeUpdate="/admin/gestao/turma/perfil-turma/aluno/avaliacoes/dados/atualizar" toastData="Nota atualizada" container="containerListNote" routeList="/admin/gestao/turma/perfil-turma/aluno/lista-notas" class="mr-2 update-data-icon" routeData="#formNote<?= $this->view->lackData[0]->lackId ?>">
                    <i class="fas fa-check"></i>
                </span>

                <span idElement="#formNote<?= $this->view->lackData[0]->lackId ?>" routeDelete="/admin/gestao/turma/perfil-turma/aluno/avaliacoes/dados/deletar" toastData="Avaliação deletada" routeData="#formNote<?= $this->view->lackData[0]->lackId ?>" container="containerListNote" routeList="/admin/gestao/turma/perfil-turma/aluno/lista-notas" class="mr-2 delete-data-icon">
                    <i class="fas fa-trash-alt"></i>
                </span>

            </div>
        </div>


        <div class="form-row mb-2 mt-3">

            <input type="hidden" name="noteId" value="<?= $this->view->lackData[0]->lackId ?>">

            <div class="form-group col-lg-6">
                <label for="">Disciplina:</label>
                <input class="form-control" disabled value="<?= $this->view->lackData[0]->disciplineName ?>" type="text" name="" id="" style="pointer-events:none">
            </div>

            <div class="form-group col-lg-4">
                <label for="">Unidade:</label>
                <input class="form-control" maxlength="4" disabled value="<?= $this->view->lackData[0]->unity ?>" type="text" name="" id="" style="pointer-events:none">
            </div>

            <div class="form-group col-lg-2">
                <label for="">Faltas:</label>
                <input class="form-control" maxlength="4" disabled value="<?= $this->view->lackData[0]->totaLack ?>" type="text" name="" id="" style="pointer-events:none">
            </div>

        </div>


        <div class="form-row d-flex justify-content-end modal-links-alternativos mt-3 mb-3">

            <a class="btn main-button text-white" data-dismiss="modal" href="">Retornar a sessão</a>

        </div>

</form>