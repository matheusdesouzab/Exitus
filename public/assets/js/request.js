function addMultipleParts(form, route) {

    let formData = new FormData(this)

    $.ajax({
        url: route,
        dataType: 'html',
        type: 'POST',
        data: $formData,
        cache: false,
        contentType: false,
        processData: false,
        success: data => console.log('Tudo ok'),
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


function loadOptions(elements) {

    $.each(elements, i => {

        let form = elements[i][3] == '' ? 'form' : elements[i][3];

        let $selectSituation = $(`${form} select[name="${elements[i][0]}"]`)

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


function removerOurAdd(vetor) {

    vetor.forEach((number, index, vetor) => {
        console.log(number);
    });

        

        /* vetor[e][1] == 'addClass' ? $(`${vetor[e][0]}`).addClass(`${vetor[e][2]}`) : $(`${vetor[e][0]}`).removeClass(`${vetor[e][2]}`)

        vetor[e][3] == 'needToast' ? showToast(`${vetor[e][4]}`, 'bg-info') : '' */

}


function checkClass() {

    let dados = $('#addClass')

    $.ajax({
        url: '/admin/gestao/turma/verificar-dados',
        data: dados.serialize(),
        type: 'GET',
        success: data => {

            let situation = data.replace(/[^\d]+/g, '')

            removerOurAdd([
                ['#buttonAddClass', 'addClass', 'disabled'],
                ['#addClass #classRoom , #addClass #shift', 'addClass', 'is-invalid']
                ['#addClass #ballot , #addClass #series', 'removeClass', 'is-invalid', 'needToast', 'Sala e turno já adicionados']
            ])

           /*  switch (situation) {

                case 00:

                    removerOurAdd([
                        ['#buttonAddClass', 'removeClass', 'disabled'],
                        ['#addClass #classRoom , #addClass #shift', 'removeClass', 'is-invalid']
                        ['#addClass #ballot , #addClass #series', 'removeClass', 'is-valid']
                    ])

                    break

                case 01:

                    removerOurAdd([
                        ['#buttonAddClass', 'addClass', 'disabled'],
                        ['#addClass #classRoom , #addClass #shift', 'removeClass', 'is-invalid']
                        ['#addClass #ballot , #addClass #series', 'addClass', 'is-invalid', 'needToast', 'Série e cédula já adicionadas']
                    ])

                    break

                case situation >= 10:

                    removerOurAdd([
                        ['#buttonAddClass', 'addClass', 'disabled'],
                        ['#addClass #classRoom , #addClass #shift', 'addClass', 'is-invalid']
                        ['#addClass #ballot , #addClass #series', 'removeClass', 'is-invalid', 'needToast', 'Sala e turno já adicionados']
                    ])
            } */

        },
        error: erro => console.log(erro)
    })
}