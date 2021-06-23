<form id="formExam<?= $this->view->examData[0]->exam_id ?>" class="col-lg-11 mx-auto mb-4" action="">

    <div class="col-lg-12">

        <div class="form-row modal-header">
            <div discipline class="col-lg-6 mt-2 font-weight-bold"><?= $this->view->examData[0]->exam_description ?></div>
            <div class="col-lg-6 d-flex justify-content-end">

                <span idElement="#formExam<?= $this->view->examData[0]->exam_id ?>" class="mr-2 edit-data-icon">
                    <i class="fas fa-edit"></i>
                </span>

                <span idElement="#formExam<?= $this->view->examData[0]->exam_id ?>" routeUpdate="/admin/gestao/turma/perfil-turma/avaliacoes/atualizar" toastData="Avaliação atualizada" container="containerExamsList" routeList="/admin/gestao/turma/perfil-turma/avaliacoes/lista" class="mr-2 update-data-icon" routeData="#formExam<?= $this->view->examData[0]->exam_id ?>">
                    <i class="fas fa-check"></i>
                </span>

                <span idElement="#formExam<?= $this->view->examData[0]->exam_id ?>" routeDelete="/admin/gestao/turma/perfil-turma/avaliacoes/deletar" toastData="Avaliação deletada" routeData="#formExam<?= $this->view->examData[0]->exam_id ?>" container="containerExamsList" routeList="/admin/gestao/turma/perfil-turma/avaliacoes/lista" class="mr-2 delete-data-icon">
                    <i class="fas fa-ban"></i>
                </span>

            </div>
        </div>


        <div class="form-row mb-2 mt-3">

            <input type="hidden" name="examId" value="<?= $this->view->examData[0]->exam_id ?>">
            <input type="hidden" name="unity" value="<?= $this->view->examData[0]->fk_id_exam_unity ?>">
            <input type="hidden" name="disciplineClassId" value="<?= $this->view->examData[0]->fk_id_discipline_class ?>">
            <input type="hidden" name="classId" value="<?= $this->view->examData[0]->class_id ?>">

            <div class="form-group col-lg-6">
                <label for="">Descrição da avaliação:</label>
                <input class="form-control" disabled value="<?= $this->view->examData[0]->exam_description ?>" type="text" name="examDescription" id="">
            </div>

            <div class="form-group col-lg-4">
                <label for="">Disciplina:</label>
                <input class="form-control" maxlength="4" disabled value="<?= $this->view->examData[0]->discipline_name ?>" type="text" name="" id="" style="pointer-events:none">
            </div>

            <div class="form-group col-lg-2">
                <label for="">Unidade:</label>
                <input class="form-control" maxlength="4" disabled value="<?= $this->view->examData[0]->unity ?>" type="text" name="" id="" style="pointer-events:none">
            </div>

        </div>

        <div class="form-row mb-2 mt-3">

            <div class="form-group col-lg-4">
                <label for="">Data realizada:</label>
                <input class="form-control" maxlength="4" disabled value="<?= $this->view->examData[0]->realize_date ?>" type="date" name="realizeDate" id="">
            </div>

            <div class="form-group col-lg-5">
                <label for="">Professor:</label>
                <input class="form-control" maxlength="4" disabled value="<?= $this->view->examData[0]->teacher_name ?>" type="text" name="" id="" style="pointer-events:none">
            </div>

            <div class="form-group col-lg-3">
                <label for="">Valor:</label>
                <input class="form-control" initialValue="<?= $this->view->examData[0]->exam_value ?>" formId="#formExam<?= $this->view->examData[0]->exam_id ?>" id="examValue" maxlength="" disabled value="<?= $this->view->examData[0]->exam_value ?>" type="text" name="examValue">
            </div>

        </div>

        <div class="form-row d-flex justify-content-end modal-links-alternativos mt-3 mb-3">

            <a class="btn btn-info" data-dismiss="modal" href=""><i class="fas fa-arrow-alt-circle-right mr-2"></i> Retornar a sessão</a>

        </div>

</form>