$(document).ready(function () {

    function toastData(text, backgroundColor) {

        $('.update-time').text(text)

        $('.toast-header').removeClass('bg-success bg-danger bg-primary').addClass(backgroundColor)

        $('#toastContainer').toast({
            'delay': 3000
        }).toast('show')

    }

    function addSchoolTerm() {

        let form = $('#addSchoolTerm').serialize()

        $.ajax({
            url: '/addSchoolTerm',
            dataType: 'html',
            type: 'POST',
            data: form,
            success: data => {

                $('#addSchoolTerm input[type="date"]').val('0000-00-00')
                toastData('Período letivo adicionado com sucesso', 'bg-success')

            },
            error: function (error) {

                // modal de erro

            }
        });
    }


    function editSchoolTerm(id) {

        $('form .form-control').prop('disabled', true)
        $('.update-data-icon, .delete-data-icon').css("pointer-events", "none")

        $('#addSchoolTerm .form-control').prop('disabled', false)

        $(`#form${id} .form-control`).prop('disabled', false)
        $(`#form${id} .update-data-icon, #form${id} .delete-data-icon`).css("pointer-events", "auto")

    }

    function listSchoolTermSituation() {

        $.ajax({
            url: '/listSchoolTermSituation',
            dataType: 'json',
            type: 'GET',
            success: data => {

                let selectSituation = $('form select[name="schoolTermSituation"]')

                $.each(data, i => {

                    selectSituation.append(`<option value="${data[i].id_situation}">${data[i].situation}</option>`)

                })

            },
            error: erro => {
                console.log(erro.responseText)
            }

        })

    }



    function updateSchoolTerm(id) {

        let form = $(`#form${id}`).serialize()

        $.ajax({
            url: '/updateSchoolTerm',
            type: 'POST',
            dataType: 'html',
            data: form,
            success: data => {

                listSchoolTerm()
                toastData('Período letivo atualizado com sucesso', 'bg-primary')

            },
            erro: erro => {
                console.log('erro')

            }

        })
    }

    function deleteSchoolTerm(id) {

        let form = $(`#form${id}`).serialize()

        $.ajax({
            url: '/deleteSchoolTerm',
            type: 'POST',
            dataType: 'html',
            data: form,
            success: data => {

                listSchoolTerm()
                toastData('Período letivo deletado', 'bg-danger')

            },
            erro: erro => {
                console.log('erro')

            }

        })
    }


    function listSchoolTerm() {

        let $gifImg = ('<div class="gif-loading col-lg-10 mx-auto mt-5"><img class="" src="assets/img/image.gif"></div>')
        let container = $('[containerListSchoolTerm]')

        container.text('').append($gifImg)

        $.ajax({
            url: '/listSchoolTerm',
            dataType: 'json',
            type: 'GET',
            success: data => {

                $('.gif-loading').remove()

                if (Object.keys(data).length > 0) {

                    $.each(data, i => {

                        let idSchoolYear = data[i].id_school_year
                        let schoolYear = data[i].school_year
                        let startDate = data[i].start_date
                        let endDate = data[i].end_date
                        let idSituation = data[i].fk_id_situation_school_term
                        let situationSchoolTerm = data[i].situation_school_term

                        container.append(`

            <form id="form${idSchoolYear}" class="card mb-3" action="">

            <div class="form-row col-lg-11 mx-auto d-flex align-items-center">

                <div class="col-lg-8 font-weight-bold">Ano letivo ${schoolYear}</div>

                <div class="col-lg-4 d-flex justify-content-end mt-2">

                    <span href="#" class="mr-2 edit-data-icon"><i class="fas fa-edit"></i></span>
                    <span href="#" class="mr-2 update-data-icon"><i class="fas fa-check"></i></span>
                    <span href="#" class="mr-2 delete-data-icon"><i class="fas fa-ban"></i></span>


                </div>

            </div>

            <div class="form-row col-lg-11 mx-auto mt-4 mb-2">

            <input class="form-control" name="idSchoolYear" value="${idSchoolYear}" type="hidden">

                <div class="form-group col-lg-4">
                    <label for="">Data de início:</label>
                    <input class="form-control" disabled name="startDate" value="${startDate}" type="date"  id="">
                </div>
                <div class="form-group col-lg-4">
                    <label for="">Data de fim:</label>
                    <input class="form-control" disabled value="${endDate}" type="date" name="endDate" id="">
                </div>
                <div class="form-group col-lg-4">
                    <label for="">Situação:</label>
                    <select name="schoolTermSituation" disabled id="inputState" class="form-control custom-select" name="schoolTermSituation"  required>
                    <option value="${idSituation}">${situationSchoolTerm}</option>
                    </select>
                </div>

            </div>

            </form> `)

                        $(`#form${idSchoolYear} .edit-data-icon`).on('click', () => editSchoolTerm(idSchoolYear))
                        $(`#form${idSchoolYear} .update-data-icon`).on('click', () => updateSchoolTerm(idSchoolYear))
                        $(`#form${idSchoolYear} .delete-data-icon`).on('click', () => deleteSchoolTerm(idSchoolYear))

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

                $('[schoolYear]').text(schoolTerm)
                $('#addSchoolTerm input[type="hidden"]').val(schoolTerm)

            },
            error: error => {

            }
        })
    }


    $('#buttonAddSchoolTerm').on('click', addSchoolTerm)

    $('#schoolTerm').on('load', [listSchoolTerm(), lastSchoolTerm()])

    $('#collapseListSchoolTerm').on('click', listSchoolTerm)

    $('#collapseAddListSchoolTerm').on('click', lastSchoolTerm)


})