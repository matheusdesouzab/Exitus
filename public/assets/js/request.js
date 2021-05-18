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


function availableElement(elements) {


    $.each(elements, i => {

        let $selectSituation = $(`form select[name="${elements[i][0]}"]`)

        elements[i][2] == 'clean' ? $selectSituation.empty() : ''

        $.ajax({
            url: elements[i][1],
            dataType: 'json',
            type: 'GET',
            success: data => {

                $.each(data, i => $selectSituation.append(`<option value="${data[i].option_value}">${data[i].option_text}</option>`))

            },

            error: erro => console.log(erro.responseText)

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
        success: data => {
            showToast(dataToast, 'bg-primary')
            console.log(data)
        },
        error: erro => showToast('Houve um erro na requisição', 'bg-info')

    })
}


function editElement(activeForm, formGroup) {

    $(`[${formGroup}] .form-control`).prop('disabled', true)
    $(`${activeForm} .form-control`).prop('disabled', false)

    $('.update-data-icon, .delete-data-icon').css("pointer-events", "none")
    $(`${activeForm} .update-data-icon, ${activeForm} .delete-data-icon`).css("pointer-events", "auto")

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
        error: erro => $container.append('<h5 class="mt-3">Houve um erro na requisição, tente novamente mais tarde</h5>')
    })
}


function showModal(formId, route, container, modal, type = 'normal') {

    let id = formId.replace(/[^0-9]/g, '')

    let $container = $(`[${container}]`)

    $container.text('')

    $.ajax({
        url: route,
        type: 'GET',
        data: {
            id: id
        },
        success: data => {

            $container.append(data)

            $(modal).modal("show")

            if (type == 'profile') {

                $('#cpf').mask('000.000.000-00')

                $('#zipCode').mask('00000-000')

                $("#telephoneNumber").mask(('(00) 00000-0000'))

            }

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