$(document).ready(function () {

    function addSchoolTerm() {

        let form = $('#addSchoolTerm').serialize()

        $.ajax({
            url: '/addSchoolTerm',
            dataType: 'html',
            type: 'POST',
            data: form,
            success: data => {

                $('#addSchoolTerm input[type="date"]').val('0000-00-00')

                $('#addSchoolTermModal').modal('show')
                $('#addSchoolTermModal .modal-title').text('Periodo letivo adicionado')
                $('#addSchoolTermModal .container-icon').addClass('modal-registration-success').html('<i class="fas fa-check-circle">')

            },
            error: function (error) {

            }
        });
    }

    function activateFields(id) {

        $('form .form-control').prop('disabled', true)
        $('#addSchoolTerm .form-control').prop('disabled', false)

        $(`#form${id} .form-control`).prop('disabled', false)

    }

    function listSchoolTermSituation() {

        $.ajax({
            url: '/listSchoolTermSituation',
            dataType: 'json',
            type: 'GET',
            success: data => {

                let selectSituation = $('form select[name="schoolTermSituation"]')

                $.each(data, function (i, order) {

                    selectSituation.append(`<option value="${data[i].id_situation}">${data[i].situation}</option>`)

                })

            },
            error: erro => {
                console.log(erro.responseText)
            }

        })

    }

    // Atualizar dados do Período Letivo

    function updateSchoolTerm(id) {

        let form = $(`#form${id}`).serialize()

        $.ajax({
            url: '/updateSchoolTerm',
            type: 'POST',
            dataType: 'html',
            data: form,
            success: data => {
                listSchoolTerm()
            },
            erro: erro => {
                console.log('erro')

            }

        })
    }

    function listSchoolTerm() {

        $('#containerListSchoolTerm').text(' ')

        $.ajax({
            url: '/listSchoolTerm',
            dataType: 'json',
            type: 'GET',
            success: data => {

                let container = $('#containerListSchoolTerm')

                if (Object.keys(data).length > 0) {

                    $.each(data, function (i, order) {

                        container.append(`

            <form id="form${data[i].id_school_year}" class="card mb-3" action="">

            <div class="form-row col-lg-11 mx-auto d-flex align-items-center">

                <div class="col-lg-8 font-weight-bold">Ano letivo ${data[i].school_year}</div>

                <div class="col-lg-4 d-flex justify-content-end mt-2">

                    <span href="#" class="mr-2 edit-data-icon"><i class="fas fa-edit"></i></span>
                    <span href="#" class="mr-2 update-data-icon"><i class="fas fa-check"></i></span>


                </div>

            </div>

            <div class="form-row col-lg-11 mx-auto mt-4 mb-2">

            <input class="form-control" name="idSchoolYear" value="${data[i].id_school_year}" type="hidden">

                <div class="form-group col-lg-4">
                    <label for="">Data de início:</label>
                    <input class="form-control" disabled name="startDate" value="${data[i].start_date}" type="date"  id="">
                </div>
                <div class="form-group col-lg-4">
                    <label for="">Data de fim:</label>
                    <input class="form-control" disabled value="${data[i].end_date}" type="date" name="endDate" id="">
                </div>
                <div class="form-group col-lg-4">
                    <label for="">Situação:</label>
                    <select name="schoolTermSituation" disabled id="inputState" class="form-control custom-select" name="schoolTermSituation"  required>
                    <option value="${data[i].fk_id_situation_school_term}">${data[i].situation_school_term}</option>
                    </select>
                </div>

            </div>

            </form> `)

                        $(`#form${data[i].id_school_year} .edit-data-icon`).on('click', () => activateFields(data[i].id_school_year))
                        $(`#form${data[i].id_school_year} .update-data-icon`).on('click', () => updateSchoolTerm(data[i].id_school_year))

                    })

                } else {

                    container.append('<h4 class="mt-3">Nenhum ano letivo adicionado</h4>')

                }

                listSchoolTermSituation()

            },
            error: error => {

                container.append('<h5 class="mt-3">Houve um erro na requisição, tente mais tarde</h5>')

            }

        })

    }


    function lastSchoolTerm() {

        $('#schoolYear').text(' ')

        $.ajax({
            url: '/lastSchoolTerm',
            type: 'GET',
            dataType: 'json',
            success: data => {

                let now = new Date()

                let schoolTerm = data.length == 0 ? now.getFullYear() : parseInt(data[0].school_year) + 1

                $('#addSchoolTerm input[name="startDate"]').prop('value', `${schoolTerm}-02-01`)
                $('#addSchoolTerm input[name="endDate"]').prop('value', `${schoolTerm}-12-01`)

                $('#schoolYear').text(schoolTerm)
                $('.schoolYear').val(schoolTerm)

            },
            error: error => {

            }
        })
    }



    $('#buttonAddSchoolTerm').on('click', addSchoolTerm)

    $('#school-term-management').on('load', [listSchoolTerm(), lastSchoolTerm()])

    $('#collapseListSchoolTerm').on('click', listSchoolTerm)

    $('#collapseAddListSchoolTerm').on('click', lastSchoolTerm)


})