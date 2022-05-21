class Application {

    addMultipleParts(form, route) {

        let $formData = new FormData(form)

        $.ajax({
            url: route,
            dataType: 'html',
            type: 'POST',
            data: $formData,
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            error: error => tools.showToast('Tente novamente mais tarde', 'bg-info'),
            success: data => console.log(data)
        })
    }


    addSinglePart(form, route, toastDescription, clean = true) {

        let $formData = $(form).serialize()

        if ($(`${form} .form-control`).val() != '') {

            $.ajax({
                url: route,
                dataType: 'html',
                type: 'POST',
                data: $formData,
                success: data => {

                    clean ? $(`${form} input`).val('') : ''

                    tools.showToast(toastDescription, 'bg-success')

                },

                error: error => tools.showToast('Tente novamente mais tarde', 'bg-info')

            })

        } else {

            tools.showToast('Preencha todos os campos', 'bg-danger')
        }

    }


    deleteElement(form, route, dataToast) {

        let $formData = $(`${form}`).serialize()

        $.ajax({
            url: route,
            type: 'POST',
            dataType: 'html',
            data: $formData,
            success: data => tools.showToast(dataToast, 'bg-danger'),
            error: erro => tools.showToast('Tente novamente mais tarde', 'bg-info')
        })
    }


    updateElement(form, route, dataToast) {

        let $formData = $(`${form}`).serialize()

        $.ajax({
            url: route,
            type: 'POST',
            dataType: 'html',
            data: $formData,
            success: data => {

                tools.showToast(dataToast, 'bg-primary')

            },
            error: erro => tools.showToast('Tente novamente mais tarde', 'bg-info')
        })
    }


    loadOptions(elements) {

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

                    if (data.length > 0) {

                        $.each(data, i => $selectSituation.append(`<option value="${data[i].option_value}">${data[i].option_text}</option>`))

                        elements[i][6] != '' ? $(`${elements[i][6]}`).removeClass('disabled').attr("disabled", false) : ''

                    } else {

                        $(`${form} select[name="${elements[i][0]}"]`).append($("<option>", {
                            value: 0,
                            text: elements[i][5]
                        }))

                        elements[i][6] != '' ? $(`${elements[i][6]}`).addClass('disabled').attr("disabled", true) : ''

                    }

                },

                error: erro => console.log(erro.responseText)

            })

        })

    }


    loadListElements(container, route, form = '') {

        let $container = $(`[${container}]`)
        let $formData = $(`${form}`).serialize()

        let loading = '<div class="d-flex justify-content-center loading"><div class="spinner-grow text-primary" role="status"></div></div>'

        $container.text('').append(loading)

        $('.tooltip').hide()

        $.ajax({
            url: route,
            type: 'GET',
            data: $formData,
            success: data => {

                $('.loading').remove()
                $container.append(data)
                $('[data-toggle="tooltip"]').tooltip()

            },
            error: erro => $container.append('<h5 class="mt-3">Houve um erro, tente novamente mais tarde</h5>')
        })
    }


    showModal(formId, route, container, modal) {

        let id = formId == 0 ? '' : formId.replace(/[^0-9]/g, '')
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
                $('[data-toggle="tooltip"]').tooltip()

            },

            error: erro => $container.append('<h5 class="mt-3">Houve um erro, tente novamente mais tarde</h5>')

        })

    }

}