$(document).ready(function () {

    function toastData(text, backgroundColor) {

        $('.update-time').text(text)

        $('.toast-header').removeClass('bg-success bg-danger bg-primary').addClass(backgroundColor)

        $('#toastContainer').toast({
            'delay': 3000
        }).toast('show')

    }

    function addElement(formId, route, datatoast, clear_field) {

        let form = $(formId).serialize()

        if ($(`${formId} .form-control`).val() != '') {

            $.ajax({
                url: route,
                dataType: 'html',
                type: 'POST',
                data: form,
                success: data => {

                    clear_field == 'clean' ? $(`${formId} input`).val('') : ''

                    toastData(datatoast, 'bg-success')

                },

                error: error => console.log(error)

            })

        } else {

            toastData('Preencha todos os campos', 'bg-danger')
        }
    }

    function deleteElement(id, route, Datatoast) {

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

    function editElement(id) {

        $('form .form-control').prop('disabled', true)
        $('.update-data-icon, .delete-data-icon').css("pointer-events", "none")

        $('#addSchoolTerm .form-control, #addCourse .form-control').prop('disabled', false)

        $(`#form${id} .form-control`).prop('disabled', false)
        $(`#form${id} .update-data-icon, #form${id} .delete-data-icon`).css("pointer-events", "auto")

    }


    function availableElement(nameSelect, route) {

        let selectSituation = $(`form select[name="${nameSelect}"]`)

        if ((nameSelect == 'classroomNumber' || nameSelect == 'schoolYear')) selectSituation.empty()

        $.ajax({
            url: route,
            dataType: 'json',
            type: 'GET',
            success: data => {

                $.each(data, i => selectSituation.append(`<option value="${data[i].option_value}">${data[i].option_text}</option>`))

            },

            error: erro => console.log(erro)

        })

    }


    function updateElement(id, route, dataToast) {

        let form = $(`#form${id}`).serialize()

        $.ajax({
            url: route,
            type: 'POST',
            dataType: 'html',
            data: form,
            success: data => {

                toastData(dataToast, 'bg-primary')

            },

            erro: erro => console.log('erro')

        })
    }

    function automaticDate() {

        let schoolYear = $('#addSchoolTerm select[name="schoolYear"]').find(":selected").text()

        $('#addSchoolTerm input[name="startDate"]').prop('value', `${schoolYear}-02-01`)
        $('#addSchoolTerm input[name="endDate"]').prop('value', `${schoolYear}-12-01`)
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

                        let idSchoolTerm = data[i].id_school_term
                        let startDate = data[i].start_date
                        let endDate = data[i].end_date
                        let idSituation = data[i].fk_id_situation_school_term
                        let situationSchoolTerm = data[i].situation_school_term
                        let schoolYear = data[i].ano_letivo

                        container.append(`

            <form id="form${idSchoolTerm}" class="card mb-3" action="">

            <div class="form-row col-lg-11 mx-auto d-flex align-items-center"> 

                <div class="col-lg-8 font-weight-bold">Ano letivo ${schoolYear}</div>

                <div class="col-lg-4 d-flex justify-content-end mt-2">

                    <span href="#" class="mr-2 edit-data-icon"><i class="fas fa-edit"></i></span>
                    <span href="#" class="mr-2 update-data-icon"><i class="fas fa-check"></i></span>
                    <span href="#" class="mr-2 delete-data-icon"><i class="fas fa-ban"></i></span>

                </div>

            </div>

            <div class="form-row col-lg-11 mx-auto mt-4 mb-2">

            <input class="form-control" name="idSchoolTerm" value="${idSchoolTerm}" type="hidden">

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

                        $(`#form${idSchoolTerm} .edit-data-icon`).on('click', () => editElement(idSchoolTerm))
                        $(`#form${idSchoolTerm} .update-data-icon`).on('click', () => [updateElement(idSchoolTerm, '/updateSchoolTerm', 'Periodo letivo adicionado'), listSchoolTerm()])
                        $(`#form${idSchoolTerm} .delete-data-icon`).on('click', () => [deleteElement(idSchoolTerm, '/deleteSchoolTerm', 'Periodo letivo deletado'), listSchoolTerm()])

                    })

                } else {

                    container.append('<h4 class="mt-3">Nenhum ano letivo adicionado</h4>')

                }


                availableElement('schoolYear', '/availableSchoolTerm')
                availableElement('schoolTermSituation', '/listSchoolTermSituation')

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

                        $(`#form${data[i].id_room} .delete-data-icon`).on('click', () => [deleteElement(data[i].id_room, '/deleteClassRoom', 'Sala de aula deletada'), listClassRoom()])

                    })

                } else {
                    container.append('<h4 class="mt-3">Nenhuma sala adicionada</h4>')
                }


            },
            error: erro => console.log(erro)

        })
    }

    function listCourse() {

        let $gifImg = ('<div class="gif-loading col-lg-10 mx-auto mt-5"><img class="" src="assets/img/image.gif"></div>')
        let container = $('[containerListCourse]')

        container.text('').append($gifImg)

        $.ajax({
            url: '/listCourse',
            dataType: 'json',
            type: 'GET',
            success: data => {

                $('.gif-loading').remove()

                if (Object.keys(data).length > 0) {

                    $.each(data, i => {

                        container.append(`

                        <form id="form${data[i].id_course}" class="card mt-3" action="">

                            <div class="form-row d-flex align-items-center col-lg-11 mx-auto">

                            <input type="hidden" name="idCourse" value="${data[i].id_course}">

                                <div class="col-lg-8 font-weight-bold">Curso Técnico de ${data[i].course}</div>

                                    <div class="col-lg-4 d-flex justify-content-end mt-2">

                                        <span class="mr-2 edit-data-icon"><i class="fas fa-edit"></i></span>
                                        <span class="mr-2 update-data-icon"><i class="fas fa-check"></i></span>
                                        <span class="mr-2 delete-data-icon"><i class="fas fa-ban"></i></span>

                                        </div>

                                        </div>

                                        <div class="form-row mt-4 mb-2 col-lg-11 mx-auto">
                                            <div class="form-group col-lg-9">
                                                <label for="">Nome do curso:</label>
                                                <input class="form-control" disabled value="${data[i].course}" type="text" name="course" id="">
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="">Sigla:</label>
                                                <input class="form-control" disabled onkeyup="this.value = this.value.toUpperCase()" value="${data[i].acronym}" type="text" name="acronym" id="">
                                            </div>


                                        </div>

                                    </form>
                        `)

                        $(`#form${data[i].id_course} .edit-data-icon`).on('click', () => editElement(data[i].id_course))
                        $(`#form${data[i].id_course} .update-data-icon`).on('click', () => [updateElement(data[i].id_course, '/updateCourse', 'Curso adicionado'), listCourse()])
                        $(`#form${data[i].id_course} .delete-data-icon`).on('click', () => [deleteElement(data[i].id_course, '/deleteCourse', 'Curso deletado'), listCourse()])

                    })

                } else {

                    container.append('<h4 class="mt-3">Nenhum curso adicionado</h4>')

                }

            },
            erro: erro => console.log(erro)
        })
    }

    function listDiscipline() {

        let $gifImg = ('<div class="gif-loading col-lg-10 mx-auto mt-5"><img class="" src="assets/img/image.gif"></div>')
        let container = $('[containerListDiscipline]')

        container.text('').append($gifImg)

        $.ajax({
            url: '/listDiscipline',
            dataType: 'json',
            type: 'GET',
            success: data => {

                $('.gif-loading').remove()

                if (Object.keys(data).length > 0) {

                    $.each(data, i => {
                        container.append(`<tr id="disciplina${data[i].id_discipline}"><td>${data[i].discipline}</td><td>${data[i].acronym}</td><td>${data[i].discipline_modality}</td></tr>`)
                    })

                } else {

                }

            }
        })
    }

    function seekDiscipline() {

        $('input[name = "seekName"]').val() === '' ? $('input[name = "seekName"]').val(' ') : ''

        let formData = $('#seekDiscipline').serialize()

        let $gifImg = ('<div class="gif-loading col-lg-10 mx-auto mt-5"><img class="" src="assets/img/image.gif"></div>')
        let container = $('[containerListDiscipline]')

        container.text('').append($gifImg)

        $.ajax({
            url: '/seekDiscipline',
            dataType: 'json',
            type: 'GET',
            data: formData,
            success: data => {

                console.log(data)

                $('.gif-loading').remove()

                if (Object.keys(data).length > 0) {

                    $.each(data, i => {
                        container.append(`<tr id="disciplina${data[i].id_discipline}"><td>${data[i].discipline}</td><td>${data[i].acronym}</td><td>${data[i].discipline_modality}</td></tr>`)
                    })

                } else {

                }

            },
            error: erro => console.log(erro.responseText)
        })
    }

    /* function showModal() {
        //let id = formId.replace(/[^a-zA-Z ]/g)
        $('#modalDiscipline').modal('show')
    } */

    $('#disciplina6').on('click', console.log('x'))









    // Add Element


    $('#buttonAddSchoolTerm')
        .on('click', () => [automaticDate(), addElement('#addSchoolTerm', '/addSchoolTerm', 'Período letivo adicionado', 'dont_clean'),
            availableElement('schoolYear', '/availableSchoolTerm')
        ])

    $('#buttonAddClassRoom')
        .on('click', () => [addElement('#addClassRoom', '/addClassRoom', 'Sala de aula adicionada', 'dont_clean'),
            availableElement('classroomNumber', '/availableClassroom')
        ])

    $('#buttonAddCourse')
        .on('click', () => addElement('#addCourse', '/addCourse', 'Curso adicionado', 'clean'))

    $('#buttonAddDiscipline')
        .on('click', () => addElement('#addDiscipline', '/addDiscipline', 'Disciplina adicionada', 'clean'))


    // Load Element


    $('#schoolTerm').on('load', [listSchoolTerm(), availableElement('schoolTermSituationAdd', '/listSchoolTermSituation')])

    $('#classRoom').on('load', listClassRoom())

    $('#course').on('load', listCourse())

    $('#discipline').on('load', [listDiscipline(), availableElement('modality', '/listDisciplineModality'), availableElement('seekModality', '/listDisciplineModality')])


    // Collapse list


    $('#collapseListSchoolTerm').on('click', listSchoolTerm)
    $('#collapseListClassRoom').on('click', listClassRoom)
    $('#collapseListCourse').on('click', listCourse)
    $('#collapseListDiscipline').on('click', listDiscipline)


    // Collapse add


    $('#collapseAddClassRoom').on('click', availableElement('classroomNumber', '/availableClassroom'))
    $('input[name = "seekName"]').on('keyup', seekDiscipline)
    $('select[name = "seekModality"]').change(seekDiscipline)











})