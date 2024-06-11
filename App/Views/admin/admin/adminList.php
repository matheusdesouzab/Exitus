<?php 
require __DIR__ . '../../../../config/variables.php';
?>

<section id="list-students">

    <div class="row main-container">

        <div class="col-lg-11 mx-auto">

            <h5 class="col-12 mb-4">Lista de administadores</h5>

            <div class="col-lg-12">

                <div class="p-3 mb-3 card">

                    <div class="table-responsive">

                        <table class="table table-hover mt-3 table-borderless col-lg-11 mx-auto" id="admin-table">

                            <thead>
                                <tr>
                                    <th colspan="2" scope="col">Nome do administrador</th>
                                    <th scope="col">Cargo</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status da conta</th>
                                </tr>
                            </thead>

                            <tbody>

                            <?php $photoDir =  "$app_url/assets/img/adminProfilePhotos/" ?>


                                <?php foreach ($this->view->listAdmin as $key => $value) { ?>

                                    <tr id="admin<?= $value->id ?>">
                                        <td class="text-right">
                                            <img class="miniature-photo" src='<?= $value->profile_photo == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value->profile_photo ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'>
                                        </td>

                                        <td class="text-left"><?= $value->name ?></td>
                                        <td class=""><?= $value->hierarchy_function ?></td>
                                        <td class=""><?= $value->email ?></td>
                                        <td class=""><?= $value->account_status ?></td>

                                    </tr>

                                <?php } ?>

                                <tr class="mt-4">
                                    <td class="font-weight-bold" colspan="5"  style="pointer-events:none"><?= count($this->view->listAdmin) ?> administradores listados <i class="fas fa-history ml-2"></i></td>
                                </tr>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade modal-profile" id="profileAdminModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">

            <div class="modal-dialog modal-full">
                <div class="modal-content">
                    <div class="row">
                        <div class="col-lg-12"> <button type="button" class="close text-rig" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#profileAdminModal">
                                <span aria-hidden="true"><i class="fas fa-times-circle text-info mr-3 mt-2"></i></span>
                            </button></div>
                    </div>

                    <div containerAdminProfileModal class="modal-body"></div>
                </div>
            </div>
        </div>
    </div>



    
</section>