

<form id="formDiscipline<?= $this->view->discipline[0]->id_discipline ?>" class="col-lg-11 mx-auto mb-4" action="">

        <div class="col-lg-12">
            <div class="form-row modal-header">
                <div discipline class="col-lg-6 mt-2 font-weight-bold"><?= $this->view->discipline[0]->discipline ?></div>
                <div class="col-lg-6 d-flex justify-content-end">

                    <span idElement="#formDiscipline<?= $this->view->discipline[0]->id_discipline ?>" class="mr-2 edit-data-icon"><i class="fas fa-edit"></i></span>

                    <span  idElement="#formDiscipline<?= $this->view->discipline[0]->id_discipline ?>" routeUpdate="/admin/gestao/disciplina/atualizar" toastData="Disciplina Atualizada" container="containerListDiscipline" routeList="/admin/gestao/disciplina/lista" class="mr-2 update-data-icon"><i class="fas fa-check"></i></span>

                    <span idElement="#formDiscipline<?= $this->view->discipline[0]->id_discipline ?>" routeDelete="/admin/gestao/disciplina/deletar" toastData="Disciplina Deletada" container="containerListDiscipline" routeList="/admin/gestao/disciplina/lista" class="mr-2 delete-data-icon"><i class="fas fa-ban"></i></span>

                    </div>
                </div>              
               

                <div class="form-row mb-2 mt-3">

                <input type="hidden" name="idDiscipline" value="<?= $this->view->discipline[0]->id_discipline ?>">
                    <div class="form-group col-lg-7">
                        <label for="">Nome da disciplina:</label>
                        <input class="form-control" disabled value="<?= $this->view->discipline[0]->discipline ?>" type="text" name="discipline" id="">
                    </div>

                    <div class="form-group col-lg-2">
                        <label for="">Sigla:</label>
                        <input class="form-control"  onkeyup="this.value = this.value.toUpperCase()" maxlength="4" disabled value="<?= $this->view->discipline[0]->acronym ?>" type="text" name="acronym" id="">
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="inputState">Modalidade:</label>
                        <select disabled id="inputState" name="modality" class="form-control custom-select " required>

                            <option value="<?= $this->view->discipline[0]->id_modality ?>" ><?= $this->view->discipline[0]->discipline_modality ?></option>

                            <?php foreach($this->view->listDisciplineModality as $key => $modality){ ?>

                                <?php if($this->view->discipline[0]->id_modality != $modality->option_value){ ?>
                                <option value="<?= $modality->option_value ?>" ><?= $modality->option_text?></option>
                                <?php } ?>

                            <?php } ?>

                        </select>
                    </div>

                </div>

                <div class="form-row d-flex justify-content-end modal-links-alternativos mt-3 mb-3">

                <a class="btn btn-info" data-dismiss="modal" href=""><i class="fas fa-arrow-alt-circle-right mr-2"></i> Retornar a sessão</a>

            </div>
                
</form> 
