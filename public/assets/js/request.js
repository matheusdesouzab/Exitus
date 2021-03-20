$(document).ready(function () {


    const gifImg = ('<div class="gif-loading d-flex justify-content-center mt-5 col-lg-12"><img class="" src="assets/img/image.gif"></div>')
    let timeout = null;


    function showToast(description, background) {

        $('.toast-data').text(description)

        $('.toast-header').removeClass('bg-success bg-danger bg-primary').addClass(background)

        $('#toastContainer').toast({
            'delay': 3000
        }).toast('show')

    }


    function addElement(form, route, toastDescription, clean = true) {

        let $formData = $(form).serialize()

        if ($(`${form} .form-control`).val() != '') {

            $.ajax({
                url: route,
                dataType: 'html',
                type: 'POST',
                data: $formData,
                success: data => {

                    clean ? $(`${form} input`).val('') : ''

                    showToast(toastDescription, 'bg-success')

                },

                error: error => showToast('Houve um erro na requisição', 'bg-info')

            })

        } else {

            showToast('Preencha todos os campos', 'bg-danger')
        }
    }


    function deleteElement(form, route, dataToast) {

        let $formData = $(`${form}`).serialize()

        $.ajax({
            url: route,
            type: 'POST',
            dataType: 'html',
            data: $formData,
            success: data => {

                showToast(dataToast, 'bg-danger')

            },

            error: erro => showToast('Houve um erro na requisição', 'bg-info')

        })
    }


    function availableElement(nameSelect, route, form = 'form') {

        let $selectSituation = $(`${form} select[name="${nameSelect}"]`)

        if ((nameSelect == 'classroomNumber' || nameSelect == 'schoolYear')) $selectSituation.empty()

        $.ajax({
            url: route,
            dataType: 'json',
            type: 'GET',
            success: data => {

                $.each(data, i => $selectSituation.append(`<option value="${data[i].option_value}">${data[i].option_text}</option>`))

            },

            error: erro => showToast('Houve um erro nas requisições', 'bg-info')

        })

    }


    function updateElement(form, route, dataToast) {

        let $formData = $(`${form}`).serialize()

        $.ajax({
            url: route,
            type: 'POST',
            dataType: 'html',
            data: $formData,
            success: data => {

                showToast(dataToast, 'bg-primary')

            },

            error: erro => showToast('Houve um erro na requisição', 'bg-info')

        })
    }


    function automaticDate() {

        let $schoolYear = $('#addSchoolTerm select[name="schoolYear"]').find(":selected").text()

        $('#addSchoolTerm input[name="startDate"]').prop('value', `${$schoolYear}-02-01`)
        $('#addSchoolTerm input[name="endDate"]').prop('value', `${$schoolYear}-12-01`)
    }


    function editElement(form) {

        $('form .form-control').prop('disabled', true)
        $('.update-data-icon, .delete-data-icon').css("pointer-events", "none")

        $('#addSchoolTerm .form-control, #addCourse .form-control, #seekDiscipline .form-control, #addDiscipline .form-control').prop('disabled', false)

        $(`${form} .form-control`).prop('disabled', false)
        $(`${form} .update-data-icon, ${form} .delete-data-icon`).css("pointer-events", "auto")

    }


    function listSchoolTerm() {

        let $container = $('[containerListSchoolTerm]')

        $container.text('').append(gifImg)

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
                        let formId = `#formSchoolTerm${idSchoolTerm}`

                        $container.append(`

            <form id="formSchoolTerm${idSchoolTerm}" class="card mb-3" action="">

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

                        $(`${formId} .edit-data-icon`).on('click', () => editElement(`${formId}`))

                        $(`${formId} .update-data-icon`).on('click', () => [updateElement(`${formId}`, '/updateSchoolTerm', 'Periodo letivo adicionado'),
                            listSchoolTerm()
                        ])

                        $(`${formId} .delete-data-icon`).on('click', () => [deleteElement(`${formId}`, '/deleteSchoolTerm', 'Periodo letivo deletado'),
                            listSchoolTerm()
                        ])

                    })

                } else {

                    $container.append('<h4 class="mt-3">Nenhum ano letivo adicionado</h4>')

                }

                availableElement('schoolYear', '/availableSchoolTerm')
                availableElement('schoolTermSituation', '/listSchoolTermSituation')

            },

            error: error => container.append('<h5 class="mt-3">Houve um erro na requisição, tente novamente mais tarde</h5>')

        })

    }


    function listClassRoom() {

        let $container = $('[containerListClassRoom]')

        $container.text('').append(gifImg)

        $.ajax({
            url: '/listClassRoom',
            dataType: 'json',
            type: 'GET',
            success: data => {

                $('.gif-loading').remove()

                if (Object.keys(data).length > 0) {

                    $.each(data, i => {

                        let formId = `#formClassRoom${data[i].id_room}`

                        $container.append(`

                        <form id="formClassRoom${data[i].id_room}" class="mt-3 card" action="">
                      
                               <input type="hidden" value="${data[i].id_room}" name="idClassRoom">

                                <div class="form-row col-lg-11 mx-auto d-flex align-items-center">

                                    <div class="col-lg-8 font-weight-bold">Sala de aula número: ${data[i].classroom_number}</div>

                                    <div class="col-lg-4 d-flex justify-content-end">

                                        <span class="mr-2 delete-data-icon d-flex align-items-center"><i class="fas fa-ban"></i></span>

                                    </div>

                                </div>

                            </form>
                        
                        `)

                        $(`${formId} .delete-data-icon`).on('click', () => [deleteElement(`${formId}`, '/deleteClassRoom', 'Sala de aula deletada'), listClassRoom()])

                    })

                } else {
                    $container.append('<h4 class="mt-3">Nenhuma sala adicionada</h4>')
                }
            },

            error: erro => $container.append('<h5 class="mt-3">Houve um erro na requisição, tente novamente mais tarde</h5>')
        })
    }


    function listCourse() {

        let $container = $('[containerListCourse]')

        $container.text('').append(gifImg)

        $.ajax({
            url: '/listCourse',
            dataType: 'json',
            type: 'GET',
            success: data => {

                $('.gif-loading').remove()

                if (Object.keys(data).length > 0) {

                    $.each(data, i => {

                        let formId = `#formCourse${data[i].id_course}`

                        $container.append(`

                        <form id="formCourse${data[i].id_course}" class="card mb-4" action="">

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

                        $(`${formId} .edit-data-icon`).on('click', () => editElement(`${formId}`))
                        $(`${formId} .update-data-icon`).on('click', () => [updateElement(`${formId}`, '/updateCourse', 'Curso adicionado'), listCourse()])
                        $(`${formId} .delete-data-icon`).on('click', () => [deleteElement(`${formId}`, '/deleteCourse', 'Curso deletado'), listCourse()])

                    })

                } else {

                    $container.append('<h4 class="mt-3">Nenhum curso adicionado</h4>')

                }

            },

            error: erro => $container.append('<h5 class="mt-3">Houve um erro na requisição, tente novamente mais tarde</h5>')
        })
    }


    function listDiscipline() {

        let $container = $('[containerListDiscipline]')

        $container.text('')

        $.ajax({
            url: '/listDiscipline',
            dataType: 'json',
            type: 'GET',
            success: data => {

                //$('.gif-loading').remove()

                if (Object.keys(data).length > 0) {

                    $.each(data, i => {
                        $container.append(`<tr id="disciplina${data[i].id_discipline}"><td>${data[i].discipline}</td><td>${data[i].acronym}</td><td>${data[i].discipline_modality}</td></tr>`)
                    })

                } else {

                    $container.append('<h4 class="mt-3">Nenhuma disciplina adicionada</h4>')

                }

            },

            error: erro => $container.append('<h5 class="mt-3">Houve um erro na requisição, tente novamente mais tarde</h5>')
        })
    }


    function seekDiscipline() {

        //$('input[name = "seekName"]').val() == '' ? $('input[name = "seekName"]').val(' ') : ''

        let formData = $('#seekDiscipline').serialize()

        let $container = $('tbody[containerListDiscipline]')

        $container.text(' ')

        $.ajax({
            url: '/seekDiscipline',
            dataType: 'json',
            type: 'GET',
            data: formData,
            success: data => {

                //$('.gif-loading').remove()

                if (Object.keys(data).length > 0) {

                    $.each(data, i => {
                        $container.append(`<tr id="disciplina${data[i].id_discipline}"><td>${data[i].discipline}</td><td>${data[i].acronym}</td><td>${data[i].discipline_modality}</td></tr>`)
                    })

                } else {

                    $container.append('<h4 class="mt-3">Nenhuma disciplina encrontada</h4>')
                }

            },
            
            error: erro => $container.append('<h5 class="mt-3">Houve um erro na requisição, tente novamente mais tarde</h5>')
        })
    }

    function showModal(formId) {

        let id = formId.replace(/[^0-9]/g, '')

        let $container = $('[containerModal]')

        $.ajax({
            url: '/disciplineData',
            dataType: 'json',
            type: 'GET',
            data: {
                idDiscipline: id
            },
            success: data => {

                let formModal = `#formModal${data[0].id_discipline}`

                $container.text('').append(`

                <form id="formModal${data[0].id_discipline}" class="col-lg-11 mx-auto mb-4" action="">

                <div class="col-lg-12">
                <div class="form-row modal-header">
                    <div discipline class="col-lg-6 mt-2 font-weight-bold"></div>
                    <div class="col-lg-6 d-flex justify-content-end">

                        <span class="mr-2 edit-data-icon"><i class="fas fa-edit"></i></span>
                        <span class="mr-2 update-data-icon"><i class="fas fa-check"></i></span>
                        <span class="mr-2 delete-data-icon"><i class="fas fa-ban"></i></span>

                    </div>
                </div>              
               

                <div class="form-row mb-2 mt-3">
                <input type="hidden" name="idDiscipline" value="${data[0].id_discipline}">
                    <div class="form-group col-lg-7">
                        <label for="">Nome da disciplina:</label>
                        <input class="form-control" disabled value="${data[0].discipline}" type="text" name="discipline" id="">
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="">Sigla:</label>
                        <input class="form-control"  onkeyup="this.value = this.value.toUpperCase()" maxlength="4" disabled value="${data[0].acronym}" type="text" name="acronym" id="">
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="inputState">Modalidade:</label>
                        <select disabled id="inputState" name="modality" class="form-control custom-select " required>
                        </select>
                    </div>
                </div>

                <div class="form-row d-flex justify-content-end modal-links-alternativos mt-3 mb-3">

                <a class="btn btn-info" data-dismiss="modal" href=""><i class="fas fa-arrow-alt-circle-right mr-2"></i> Retornar a sessão</a>

            </div>
                
                </form>`)


                $('#modalDiscipline').modal("hide")

                $('[discipline]').text(data[0].discipline)

                $(`${formModal} select[name="modality"]`).append(`<option value="${data[0].id_modality}">${data[0].discipline_modality}</option>`)

                $(`${formModal} .edit-data-icon`).on('click', () => editElement(`${formModal}`))
                $(`${formModal} .delete-data-icon`).on('click', () => [deleteElement(`${formModal}`, '/deleteDiscipline', 'Disciplina deletada')], listDiscipline())
                $(`${formModal} .update-data-icon`).on('click', () => [updateElement(`${formModal}`, '/updateDiscipline', 'Disciplina atualizada'), listDiscipline, showModal(`${formModal}`)])

                availableElement(`modality`, '/listDisciplineModality', `${formModal}`)

                $('#modalDiscipline').modal("show")

            },

            error: erro => $container.append('<h5 class="mt-3">Houve um erro na requisição, tente novamente mais tarde</h5>')

        })

    }


    // Add Element


    $('#buttonAddSchoolTerm')
        .on('click', () => [automaticDate(), addElement('#addSchoolTerm', '/addSchoolTerm', 'Período letivo adicionado', false),
            availableElement('schoolYear', '/availableSchoolTerm')
        ])

    $('#buttonAddClassRoom')
        .on('click', () => [addElement('#addClassRoom', '/addClassRoom', 'Sala de aula adicionada', false),
            availableElement('classroomNumber', '/availableClassroom')
        ])

    $('#buttonAddCourse')
        .on('click', () => addElement('#addCourse', '/addCourse', 'Curso adicionado'))

    $('#buttonAddDiscipline')
        .on('click', () => addElement('#addDiscipline', '/addDiscipline', 'Disciplina adicionada'))


    // Load Element


    $('#schoolTerm').on('load', [listSchoolTerm(), availableElement('schoolTermSituationAdd', '/listSchoolTermSituation')])

    $('#classRoom').on('load', listClassRoom())

    $('#course').on('load', listCourse())

    $('#discipline').on('load', [listDiscipline(), availableElement('modality', '/listDisciplineModality'), availableElement('seekModality', '/listDisciplineModality')])


    // Collapse list


    let elements = ['SchoolTerm', 'ClassRoom', 'Course', 'Discipline']

    $.each(elements, i => $(`#collapseList${elements[i]}`).on('click', eval(`list${elements[i]}`)))


    // Collapse add


    $('#collapseAddClassRoom').on('click', availableElement('classroomNumber', '/availableClassroom'))

    $('select[name="seekModality"]').change(seekDiscipline)


    // All

    $('input[name="acronym"]').on('keyup', e => e.target.value = e.target.value.toUpperCase()) 

    $('input[name="seekName"]').keyup(function (e) {

        if (timeout) clearTimeout(timeout);

        timeout = setTimeout(() => seekDiscipline(), 1500)

    });

    $(document).on('click', '#discipline tr', function () {
        showModal(this.id)
    });












})