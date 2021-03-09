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

    function listSchoolTerm() {

        $('#containerListSchoolTerm').text(' ')

        $.ajax({
            url: '/listSchoolTerm',
            dataType: 'JSON',
            type: 'GET',
            success: data => {

                let form = null

                if (Object.keys(data).length > 0) {

                    $.each(data, function (i, order) {

                        form = `

            <form class="card mb-3" action="">

            <div class="form-row col-lg-11 mx-auto d-flex align-items-center">

                <div class="col-lg-8 font-weight-bold">Ano letivo ${data[i].school_year}</div>

                <div class="col-lg-4 d-flex justify-content-end mt-2">

                    <span class="mr-2 edit-data-icon"><i class="fas fa-edit"></i></span>
                    <span class="mr-2 update-data-icon"><i class="fas fa-check"></i></span>


                </div>

            </div>

            <div class="form-row col-lg-11 mx-auto mt-4 mb-2">

                <div class="form-group col-lg-4">
                    <label for="">Data de início:</label>
                    <input class="form-control" disabled value="${data[i].start_date}" type="date" name="" id="">
                </div>
                <div class="form-group col-lg-4">
                    <label for="">Data de fim:</label>
                    <input class="form-control" disabled value="${data[i].end_date}" type="date" name="" id="">
                </div>
                <div class="form-group col-lg-4">
                    <label for="">Situação:</label>
                    <input class="form-control" disabled value="${data[i].situation_school_term}" type="text" name="" id="">
                </div>

            </div>

            </form> `

                        $('#containerListSchoolTerm').append(form)
                    })

                } else {

                    form = '<h4 class="mt-3">Nenhum ano letivo adicionado</h4>'
                    $('#containerListSchoolTerm').append(form)

                }

            },
            error: error => {
                console.log('Erro na requisição')
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

                console.log(data)

                let schoolTerm = data.length == 0 ? now.getFullYear() : parseInt(data[0].school_year) + 1

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