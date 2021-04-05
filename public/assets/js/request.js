$(document).ready(function () {

    let timeout = null

    function showToast(description, background) {

        $('.toast-data').text(description)

        $('.toast-header').removeClass('bg-success bg-danger bg-primary').addClass(background)

        $('#toastContainer').toast({
            'delay': 3000
        }).toast('show')

    }


    function addElement(form, route, toastDescription, clean = true) {

        let $formData = $(form).serialize()

        console.log($formData)

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

                error: error => console.log(error)

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
            success: data => showToast(dataToast, 'bg-danger'),
            error: erro => showToast('Houve um erro na requisição', 'bg-info')
        })
    }


    function availableElement(dataMatrix) {

        $.each(dataMatrix, i => {

            let $selectSituation = $(`form select[name="${dataMatrix[i][0]}"]`)

            if ((dataMatrix[i][0] == 'classroomNumber' || dataMatrix[i][0] == 'schoolYear' || dataMatrix[i][0] == 'modalityAdd' || dataMatrix[i][0] == 'schoolTermSituationAdd')) $selectSituation.empty()

            $.ajax({
                url: dataMatrix[i][1],
                dataType: 'json',
                type: 'GET',
                success: data => {

                    $.each(data, i => $selectSituation.append(`<option value="${data[i].option_value}">${data[i].option_text}</option>`))

                },

                error: erro => console.log(erro)

            })

        })

    }


    function updateElement(form, route, dataToast) {

        let $formData = $(`${form}`).serialize()

        console.log([$formData])

        $.ajax({
            url: route,
            type: 'POST',
            dataType: 'html',
            data: $formData,
            success: data => showToast(dataToast, 'bg-primary'),
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

        $('#addSchoolTerm .form-control, #addCourse .form-control, #seekElement .form-control, #addDiscipline .form-control, #addClassRoom .form-control').prop('disabled', false)

        $(`${form} .form-control`).prop('disabled', false)
        $(`${form} .update-data-icon, ${form} .delete-data-icon`).css("pointer-events", "auto")

    }


    function listElement(container, route) {

        let $container = $(`[${container}]`)

        $container.text('')

        $.ajax({
            url: route,
            type: 'GET',
            success: data => $container.append(data),
            error: erro => console.log(erro.responseText)
        })
    }


    function seekElement(form, container, route) {

        let formData = $(form).serialize()

        let $container = $(`[${container}]`)

        $container.text('')

        $.ajax({
            url: route,
            type: 'GET',
            data: formData,
            success: data => $container.append(data),
            error: erro => console.log(erro.responseText)
        })
    }


    function showModal(formId) {

        let id = formId.replace(/[^0-9]/g, '')

        let $container = $('[containerModal]')

        $.ajax({
            url: '/admin/gestao/disciplina/dados',
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

                $(`${formModal} .delete-data-icon`).on('click', () => [deleteElement(`${formModal}`, '/admin/gestao/disciplina/deletar', 'Disciplina deletada'), listDiscipline(), showModal(`${formModal}`)])

                $(`${formModal} .update-data-icon`).on('click', () => [updateElement(`${formModal}`, '/admin/gestao/disciplina/atualizar', 'Disciplina atualizada'), listDiscipline(), showModal(`${formModal}`)])

                availableElement([
                    [`modality`, '/admin/gestao/disciplina/lista-modalidades']
                ])

                $('#modalDiscipline').modal("show")

            },

            error: erro => $container.append('<h5 class="mt-3">Houve um erro na requisição, tente novamente mais tarde</h5>')

        })

    }


    function checkClass() {

        let dados = $('#addClass')

        $.ajax({
            url: '/admin/gestao/turma/verificar-dados',
            data: dados.serialize(),
            type: 'GET',
            success: data => {

                let situation = data.replace(/[^\d]+/g, '')

                situation == 00 ? [$('#buttonAddClass').removeClass('disabled'),
                    $('#addClass #classRoom , #addClass #shift ').removeClass('is-invalid'),
                    $('#addClass #ballot , #addClass #series ').removeClass('is-invalid')
                ] : ''

                situation >= 10 ? [
                    $('#buttonAddClass').addClass('disabled'),
                    showToast('Sala e turno já adicionados', 'bg-info'),
                    $('#addClass #classRoom , #addClass #shift ').addClass('is-invalid'),
                    $('#addClass #ballot , #addClass #series ').removeClass('is-invalid')
                ] : ''

                situation == 01 ? [
                    $('#buttonAddClass').addClass('disabled'),
                    showToast('Série e cédula já adicionadas', 'bg-info'),
                    $('#addClass #ballot , #addClass #series ').addClass('is-invalid'),
                    $('#addClass #classRoom , #addClass #shift ').removeClass('is-invalid')
                ] : ''

            },
            error: erro => console.log(erro)
        })
    }


    $(document).on('click', '.edit-data-icon', function () {
        editElement($(this).attr('idElement'))
    })


    $(document).on('click', '.update-data-icon', function () {

        updateElement($(this).attr('idElement'), $(this).attr('routeUpdate'), $(this).attr('toastData'))

        listElement($(this).attr('container'), $(this).attr('routeList'))
    })

    $(document).on('click', '.delete-data-icon', function () {

        deleteElement($(this).attr('idElement'), $(this).attr('routeDelete'), $(this).attr('toastData'))

        listElement($(this).attr('container'), $(this).attr('routeList'))
    })




    // Grupo de butões para adicionar elementos


    $('#buttonAddSchoolTerm')
        .on('click', () => [automaticDate(), addElement('#addSchoolTerm', '/admin/gestao/periodo-letivo/inserir', 'Período letivo adicionado', false),
            availableElement([
                ['schoolYear', '/admin/gestao/periodo-letivo/lista-anos-disponiveis']
            ])
        ])


    $('#buttonAddClassRoom')
        .on('click', () => [addElement('#addClassRoom', '/admin/gestao/sala/inserir', 'Sala de aula adicionada'),
            availableElement([
                ['classroomNumber', '/admin/gestao/sala/lista-numeros-disponiveis']
            ])
        ])


    $('#buttonAddCourse')
        .on('click', () => addElement('#addCourse', '/admin/gestao/curso/inserir', 'Curso adicionado'))


    $('#buttonAddDiscipline')
        .on('click', () => addElement('#addDiscipline', '/admin/gestao/disciplina/inserir', 'Disciplina adicionada'))


    $('#buttonAddClass')
        .on('click', () => [addElement('#addClass', '/admin/gestao/turma/inserir', 'Turma adicionada'), checkClass()])


    // Load Element




    $('#class').on('load', [availableElement([
        ['shift', '/admin/gestao/turma/lista-turnos'],
        ['ballot', '/admin/gestao/turma/lista-cedulas'],
        ['series', '/admin/gestao/turma/lista-series'],
        ['course', '/admin/gestao/turma/lista-cursos'],
        ['classRoom', '/admin/gestao/turma/lista-salas'],
        ['schoolTerm', '/admin/gestao/periodo-letivo/ativado']
    ]), listElement('containerListClass', '/admin/gestao/turma/lista')])


    $('#classRoom').on(document, 'load', [
        listElement('containerListClassRoom', '/admin/gestao/sala/lista'),
        availableElement([
            ['classroomNumber', '/admin/gestao/sala/lista-numeros-disponiveis']
        ])
    ])


    $('#schoolTerm').on(document, 'load', [listElement('containerListSchoolTerm', '/admin/gestao/periodo-letivo/lista'), availableElement([
        ['schoolYear', '/admin/gestao/periodo-letivo/lista-anos-disponiveis'],
        ['schoolTermSituation', '/admin/gestao/periodo-letivo/lista-situacao-periodo-letivo'],
        ['schoolTermSituationAdd', '/admin/gestao/periodo-letivo/lista-situacao-periodo-letivo']
    ])])


    $('#course').on('load', listElement('containerListCourse', '/admin/gestao/curso/lista'))

    $('#discipline').on('load',
        [listElement('containerListDiscipline', '/admin/gestao/disciplina/lista'), availableElement([
            ['modalityAdd', '/admin/gestao/disciplina/lista-modalidades'],
            ['seekModality', '/admin/gestao/disciplina/lista-modalidades']
        ])])



    // Collapse add


    $('#collapseAddClassRoom').on('click', () => availableElement([
        ['classroomNumber', '/admin/gestao/sala/lista-numeros-disponiveis']
    ]))


    // All


    $('select[name="seekModality"]').change(() => seekElement('#seekDiscipline', 'containerListDiscipline', '/admin/gestao/disciplina/buscar'))

    $('#seekClass .custom-select').change(() => seekElement('#seekClass', 'containerListClass', '/admin/gestao/turma/buscar'))


    $('#addClass .form-control').change(checkClass)


    $('#checkClass').on('click', () => checkClass())


    $('input[name="acronym"]').on('keyup', e => e.target.value = e.target.value.toUpperCase())


    $('input[name="seekName"]').keyup(function (e) {

        if (timeout) clearTimeout(timeout);

        timeout = setTimeout(() => seekElement('#seekDiscipline', 'containerListDiscipline', '/admin/gestao/disciplina/buscar'), 1500)

    });


    $(document).on('click', '#discipline tr', function () {
        showModal(this.id)
    })

    $(document).on('click','#collapseListSchoolTerm', listElement('containerListSchoolTerm', '/admin/gestao/periodo-letivo/lista'))





})