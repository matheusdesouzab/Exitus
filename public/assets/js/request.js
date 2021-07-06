function addMultipleParts(form, route) {

    let formData = new FormData(form)

   $.ajax({
        url: route,
        dataType: 'html',
        type: 'POST',
        data: formData,
        enctype: 'multipart/form-data',
        cache: false,
        contentType: false,
        processData: false,
        success: data => console.log(data),
        error: error => console.log(error)

    }) 
}


function addSinglePart(form, route, toastDescription, clean = true) {

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



function loadOptions(elements) {

    $.each(elements, i => {

        let form = elements[i][3] == '' ? 'form' : elements[i][3]

        let $data = $(`${elements[i][4]}`).serialize() || 'form'

        let $selectSituation = $(`${form} select[name="${elements[i][0]}"]`)

        elements[i][2] == 'clean' ? $selectSituation.empty() : ''

        $.ajax({
            url: elements[i][1],
            dataType: 'json',
            data: $data,
            type: 'GET',
            success: data => {

                console.log(data)

                $.each(data, i => $selectSituation.append(`<option value="${data[i].option_value}">${data[i].option_text}</option>`))

            },

            error: erro => console.log(erro.responseText)

        })

    })

}



function editElement(activeForm, formGroup) {

    $(`[${formGroup}] .form-control`).prop('disabled', true)
    $(`${activeForm} .form-control`).prop('disabled', false)

    $('.update-data-icon, .delete-data-icon').css("pointer-events", "none")
    $(`${activeForm} .update-data-icon, ${activeForm} .delete-data-icon`).css("pointer-events", "auto")

}


function loadListElements(container, route, form = '') {

    let $container = $(`[${container}]`)

    let $formData = $(`${form}`).serialize()

    let loading = '<div class="d-flex justify-content-center loading"><div class="spinner-grow text-primary" role="status"></div></div>'

    $container.text('').append(loading)

    $.ajax({
        url: route,
        type: 'GET',
        data: $formData,
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

        },

        error: erro => $container.append('<h5 class="mt-3">Houve um erro na requisição, tente novamente mais tarde</h5>')

    })

}


function checkClass() {

    let dados = $('#addClass').serialize()

    $.ajax({
        url: '/admin/gestao/turma/verificar-dados',
        data: dados,
        type: 'GET',
        dataType:'json',
        success: data => {

            let stateClass = []

            $.each(data, i => stateClass.push(data[i].result))

            stateClass = stateClass.toString().replace(',','')

            console.log(stateClass)

            switch (stateClass) {

                case '01':

                    $('#buttonAddClass').addClass('disabled')

                    showToast('Série e cédula já adicionadas', 'bg-info')

                    $('#addClass #ballot , #addClass #series ').addClass('is-invalid')

                    $('#addClass #classRoom , #addClass #shift ').removeClass('is-invalid')

                    break

                case '0':

                    $('#buttonAddClass').removeClass('disabled')

                    $('#addClass #classRoom , #addClass #shift ').removeClass('is-invalid')

                    $('#addClass #ballot , #addClass #series ').removeClass('is-invalid')

                    break

                default:

                    $('#buttonAddClass').addClass('disabled')

                    showToast('Sala e turno já adicionados', 'bg-info')

                    $('#addClass #classRoom , #addClass #shift ').addClass('is-invalid')

                    $('#addClass #ballot , #addClass #series ').removeClass('is-invalid')

            } 

        },
        error: erro => console.log(erro)
    })
}


function getGrade(event, e, sumNote) { 

    let code = (e.keyCode || e.which)

    if (code == 37 || code == 38 || code == 39 || code == 40 || code == 8) return

    let num = Number(event.value.replace(".", "."))

    if (event.value.replace(".", "").length > 2) num = num * 100

    let value = (num <= sumNote ? num : sumNote)

    event.value = value.toFixed(1).replace(".", ".")

}


function getNotesAlreadyAdded(form, event, e , calculateWithCurrentGrade, currentGrade = '') {

    let $form = $(`${form}`).serialize()

    $.ajax({
        type: "GET",
        url: "/admin/gestao/turma/perfil-turma/avaliacoes/soma-notas-unidade",
        data: $form,
        dataType: 'json',
        async: false,
        success: response => {

            let sumNote = response[0].sum_notes || 0

            sumNote = (calculateWithCurrentGrade == false ? (10 - validation.round(sumNote, 1)) : validation.round(10 + (currentGrade - sumNote), 1) )

            getGrade(event, e, sumNote)

        },
        error: erro => console.log(erro)

    })
}



