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

        $('#addSchoolTerm .form-control, #addCourse .form-control, #seekDiscipline .form-control, #addDiscipline .form-control, #addClassRoom .form-control').prop('disabled', false)

        $(`${form} .form-control`).prop('disabled', false)
        $(`${form} .update-data-icon, ${form} .delete-data-icon`).css("pointer-events", "auto")

    }


    function listElement(container, route) {

        let $container = $(`[${container}]`)

        let loading = '<div class="d-flex justify-content-center loading"><div class="spinner-grow text-primary" role="status"></div></div>'

        $container.text('').append(loading)

        $.ajax({
            url: route,
            type: 'GET',
            success: data => {

                $('.loading').remove()
                $container.append(data)

            },
            error: erro => $container.append('<h5 class="mt-3">Houve um erro na requisição, tente novamente mais tarde</h5>')
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


    function showModal(formId, route, container, modal) {

        let id = formId.replace(/[^0-9]/g, '')

        let $container = $(`[${container}]`)

        $container.text('')

        $.ajax({
            url: route,
            type: 'GET',
            data: {
                idDiscipline: id
            },
            success: data => {

                $container.append(data)

                $(modal).modal("show")

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



    // School Term


    //? Load list school term and group available element


    $('#schoolTerm').on('load', [listElement('containerListSchoolTerm', '/admin/gestao/periodo-letivo/lista'), availableElement([
        ['schoolYear', '/admin/gestao/periodo-letivo/lista-anos-disponiveis'],
        ['schoolTermSituation', '/admin/gestao/periodo-letivo/lista-situacao-periodo-letivo'],
        ['schoolTermSituationAdd', '/admin/gestao/periodo-letivo/lista-situacao-periodo-letivo']
    ])])


    //? List school term using collapse


    $('#collapseListSchoolTerm').on('click', () => listElement('containerListSchoolTerm', '/admin/gestao/periodo-letivo/lista'))


    //? Group of elements available using collapse


    $('#collapseAddSchoolTerm').on('click', () => availableElement([
        ['schoolYear', '/admin/gestao/periodo-letivo/lista-anos-disponiveis'],
        ['schoolTermSituation', '/admin/gestao/periodo-letivo/lista-situacao-periodo-letivo'],
        ['schoolTermSituationAdd', '/admin/gestao/periodo-letivo/lista-situacao-periodo-letivo']
    ]))


    //? Button to add school year


    $('#buttonAddSchoolTerm').on('click', () => [automaticDate(), addElement('#addSchoolTerm', '/admin/gestao/periodo-letivo/inserir', 'Período letivo adicionado', false),
        availableElement([
            ['schoolYear', '/admin/gestao/periodo-letivo/lista-anos-disponiveis']
        ])
    ])


    // ClassRoom


    //? Load list classroom and group available element


    $('#classRoom').on('load', [
        listElement('containerListClassRoom', '/admin/gestao/sala/lista'),
        availableElement([
            ['classroomNumber', '/admin/gestao/sala/lista-numeros-disponiveis']
        ])
    ])


    //? List classroom using collapse


    $('#collapseListClassRoom').on('click', () => listElement('containerListClassRoom', '/admin/gestao/sala/lista'))


    //? Group of elements available using collapse


    $('#collapseAddClassRoom').on('click', availableElement([
        ['classroomNumber', '/admin/gestao/sala/lista-numeros-disponiveis']
    ]))


    //? Button to add classroom


    $('#buttonAddClassRoom')
        .on('click', () => [addElement('#addClassRoom', '/admin/gestao/sala/inserir', 'Sala de aula adicionada'),
            availableElement([
                ['classroomNumber', '/admin/gestao/sala/lista-numeros-disponiveis']
            ])
        ])


    // Course


    //? Load list school term and group available element


    $('#course').on('load', listElement('containerListCourse', '/admin/gestao/curso/lista'))


    //? List classroom using collapse


    $('#collapseListCourse').on('click', () => listElement('containerListCourse', '/admin/gestao/curso/lista'))


    //? Button to add Course


    $('#buttonAddCourse')
        .on('click', () => addElement('#addCourse', '/admin/gestao/curso/inserir', 'Curso adicionado'))


    // Discipline


    //? Load list element and group element available


    $('#discipline').on('load',
        [listElement('containerListDiscipline', '/admin/gestao/disciplina/lista'), availableElement([
            ['modalityAdd', '/admin/gestao/disciplina/lista-modalidades'],
            ['seekModality', '/admin/gestao/disciplina/lista-modalidades']
        ])])


    //? List classroom using collapse


    $('#collapseListDiscipline').on('click', () => listElement('containerListDiscipline', '/admin/gestao/disciplina/lista'))


    //? Seek discipline


    $('select[name="seekModality"]').change(() => seekElement('#seekDiscipline', 'containerListDiscipline', '/admin/gestao/disciplina/buscar'))


    $('input[name="seekName"]').keyup(function (e) {

        if (timeout) clearTimeout(timeout);

        timeout = setTimeout(() => seekElement('#seekDiscipline', 'containerListDiscipline', '/admin/gestao/disciplina/buscar'), 1500)

    })


    //? Show modal


    $(document).on('click', '#discipline tr', function () {
        showModal(this.id, '/admin/gestao/disciplina/dados', 'containerModal', '#modalDiscipline')
    })


    //? Upper Case


    $('input[name="acronym"]').on('keyup', e => e.target.value = e.target.value.toUpperCase())


    //? Button add discipline


    $('#buttonAddDiscipline')
        .on('click', () => addElement('#addDiscipline', '/admin/gestao/disciplina/inserir', 'Disciplina adicionada'))



    // Class


    //? Load list class and group available elements


    $('#class').on('load', [availableElement([
        ['shift', '/admin/gestao/turma/lista-turnos'],
        ['ballot', '/admin/gestao/turma/lista-cedulas'],
        ['series', '/admin/gestao/turma/lista-series'],
        ['course', '/admin/gestao/turma/lista-cursos'],
        ['classRoom', '/admin/gestao/turma/lista-salas'],
        ['schoolTerm', '/admin/gestao/periodo-letivo/ativado']
    ]), listElement('containerListClass', '/admin/gestao/turma/lista')])


    //? Button add class


    $('#buttonAddClass')
        .on('click', () => [addElement('#addClass', '/admin/gestao/turma/inserir', 'Turma adicionada'), checkClass()])


    //? List class using collapse


    $('#collapseListClass').on('click', () => listElement('containerListClass', '/admin/gestao/turma/lista'))


    //? Seek class


    $('#seekClass .custom-select').change(() => seekElement('#seekClass', 'containerListClass', '/admin/gestao/turma/buscar'))


    //? Check class


    $('#addClass .form-control').change(checkClass)


    //---------------------------------------------------------------------------------------------------------------------------------


    // Edit , update and delete


    //? Edit element


    $(document).on('click', '.edit-data-icon', function () {
        editElement($(this).attr('idElement'))
    })


    //? Update element


    $(document).on('click', '.update-data-icon', function () {

        updateElement($(this).attr('idElement'), $(this).attr('routeUpdate'), $(this).attr('toastData'))

        listElement($(this).attr('container'), $(this).attr('routeList'))
    })


    //? Delete element


    $(document).on('click', '.delete-data-icon', function () {

        deleteElement($(this).attr('idElement'), $(this).attr('routeDelete'), $(this).attr('toastData'))

        listElement($(this).attr('container'), $(this).attr('routeList'))
    })



})