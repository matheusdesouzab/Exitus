$(document).ready(function () {

    function toastData(text, backgroundColor) {

        $('.update-time').text(text)

        $('.toast-header').removeClass('bg-success bg-danger bg-primary').addClass(backgroundColor)

        $('#toastContainer').toast({
            'delay': 3000
        }).toast('show')

    }

    function addElement(id, route, Datatoast) {

        let form = $(id).serialize()

        $.ajax({
            url: route,
            dataType: 'html',
            type: 'POST',
            data: form,
            success: data => {

                toastData(Datatoast, 'bg-success')

            },

            error: error => console.log(error)

        })
    }

    function deleteSchoolTerm(id, route, Datatoast) {

        let form = $(`#form${id}`).serialize()

        $.ajax({
            url: route,
            type: 'POST',
            dataType: 'html',
            data: form,
            success: data => {

                toastData(Datatoast, 'bg-danger')

            },

            erro: erro => console.log('erro')

        })
    }

    function editSchoolTerm(id) {

        $('form .form-control').prop('disabled', true)
        $('.update-data-icon, .delete-data-icon').css("pointer-events", "none")

        $('#addSchoolTerm .form-control').prop('disabled', false)

        $(`#form${id} .form-control`).prop('disabled', false)
        $(`#form${id} .update-data-icon, #form${id} .delete-data-icon`).css("pointer-events", "auto")

    }


    function availableElement(nameSelect, route, situation) {

        let selectSituation = $(`form select[name="${nameSelect}"]`)

        selectSituation.text(' ')

        $.ajax({
            url: route,
            dataType: 'json',
            type: 'GET',
            success: data => {

                if (situation == 'TwoArray') {

                    let availablePeriods = []

                    $.each(data[1], i => availablePeriods.push(data[1][i].added_option_value))

                    $.each(data[0], i => {

                        if (availablePeriods.indexOf(data[0][i].option_value) == -1) {

                            selectSituation.append(`<option value="${data[0][i].option_value}">${data[0][i].option_text}</option>`)

                        }

                    })

                } else {

                    $.each(data, i => selectSituation.append(`<option value="${data[i].id_situation}">${data[i].situation}</option>`))

                }

            },

            error: erro => console.log(erro)

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

            erro: erro => console.log('erro')

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
                        let startDate = data[i].start_date
                        let endDate = data[i].end_date
                        let idSituation = data[i].fk_id_situation_school_term
                        let situationSchoolTerm = data[i].situation_school_term
                        let schoolYear = data[i].ano_letivo

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
                        $(`#form${idSchoolYear} .delete-data-icon`).on('click', () => [deleteSchoolTerm(idSchoolYear, '/deleteSchoolTerm', 'Periodo letivo deletado'), listSchoolTerm()])

                    })

                } else {

                    container.append('<h4 class="mt-3">Nenhum ano letivo adicionado</h4>')

                }

                availableElement('schoolYear', '/availableSchoolTerm', 'TwoArray')
                availableElement('schoolTermSituation', '/listSchoolTermSituation', 'OneArray')

            },

            error: error => {

                container.append('<h5 class="mt-3">Houve um erro na requisição, tente mais tarde</h5>')

            }

        })

    }

    function listClassRoom() {

        let $gifImg = ('<div class="gif-loading col-lg-10 mx-auto mt-5"><img class="" src="assets/img/image.gif"></div>')
        let container = $('[containerListClassRoom]')

        container.text('').append($gifImg)

        $.ajax({
            url: '/listClassRoom',
            dataType: 'json',
            type: 'GET',
            success: data => {

                $('.gif-loading').remove()

                if (Object.keys(data).length > 0) {

                    $.each(data, i => {

                        container.append(`

                        <form id="form${data[i].id_room}" class="mt-3 card" action="">
                      
                               <input type="hidden" value="${data[i].id_room}" name="idClassRoom">

                                <div class="form-row col-lg-11 mx-auto d-flex align-items-center">

                                    <div class="col-lg-8 font-weight-bold">Sala de aula número: ${data[i].classroom_number}</div>

                                    <div class="col-lg-4 d-flex justify-content-end">

                                        <span class="mr-2 delete-data-icon d-flex align-items-center"><i class="fas fa-ban"></i></span>

                                    </div>

                                </div>

                            </form>
                        
                        `)

                        $(`#form${data[i].id_room} .delete-data-icon`).on('click', () => [deleteSchoolTerm(data[i].id_room, '/deleteClassRoom', 'Sala de aula deletada'), listClassRoom()])

                    })

                } else {
                    container.append('<h4 class="mt-3">Nenhuma sala adicionada</h4>')
                }

                availableElement('classroomNumber', '/listAvailableClassrooms', 'TwoArray')

            },
            error: erro => console.log(erro)

        })
    }


    function automaticDate() {

        let schoolYear = $('#addSchoolTerm select[name="schoolYear"]').find(":selected").text()

        $('#addSchoolTerm input[name="startDate"]').prop('value', `${schoolYear}-02-01`)
        $('#addSchoolTerm input[name="endDate"]').prop('value', `${schoolYear}-12-01`)
    }


    $('#buttonAddSchoolTerm')
        .on('click', () => [automaticDate(), addElement('#addSchoolTerm', '/addSchoolTerm', 'Período letivo adicionado'), availableElement('schoolYear', '/availableSchoolTerm', 'TwoArray')])

    $('#buttonAddClassRoom')
        .on('click', () => [addElement('#addClassRoom', '/addClassRoom', 'Sala de aula adicionada'), availableElement('classroomNumber', '/listAvailableClassrooms', 'TwoArray')])


    $('#schoolTerm').on('load', listSchoolTerm())

    $('#classRoom').on('load', listClassRoom())

    $('#collapseListSchoolTerm').on('click', listSchoolTerm)

    $('#collapseListClassRoom').on('click', listClassRoom)

    $('#addSchoolTerm select[name="schoolYear"]').on('blur', automaticDate)


})