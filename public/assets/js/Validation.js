class Validation {

    cpfAlreadyInformed() {

        let state = false
        let cpf = $('#cpf').val()

        $.ajax({
            url: '/verificar-dados/cpf',
            type: 'GET',
            data: {
                cpf: cpf
            },
            async: false,
            dataType: 'json',
            success: data => data[0] != null ? state : state = true
        })

        return state
    }


    cpfState(cpf) {

        let formattedCpf = cpf.replace(/[^\d]/g, "")
        let $cpfField = $('#cpfField')
        let message = '';

        $('.cpf-info').remove()

        if (formattedCpf.length == 11) {

            if (!this.cpfAlreadyInformed()) {

                $('#cpf').removeClass('is-valid')
                message = 'Cpf já informado'

            } else {

                $('#cpf').addClass('is-valid')
            }

        } else {

            $('#cpf').removeClass('is-valid')
            message = 'Formato Inválido'
        }

        $($cpfField).append(`<small class="text-danger text-center cpf-info">${message}</small>`)

    }


    validateBySize(element, size, classField, elementInfo) {

        let formatElement = ($(`#${element}`).val()).replace(/[^\d]/g, "")

        if (formatElement.length == size) {

            $(`#${element}`).addClass('is-valid')
            $(`.${elementInfo}`).remove()

        } else {

            $(`#${element}`).removeClass('is-valid')
            $(`.${elementInfo}`).remove()
            $(classField).append(`<small class="text-danger text-center ${elementInfo} ">Formato Inválido</small>`)
        }

    }


    validateByContent(element) {

        let $element = $(`#${element}`)

        $element.val() == '' ? $element.removeClass('is-valid') : $element.addClass('is-valid')

    }


    validateImage() {

        let photo = $('#profilePhoto')
        let dir = photo.val()
        let message = ''

        let extesion = /(.jpg|.jpeg)$/i;

        $('.photo-info').remove()

        if (!extesion.exec(dir)) {

            $('#profilePhoto').removeClass('is-valid')

            message = 'Formato inválido - Válidos somentes jpg e jpeg'

        } else {

            if (photo.get(0).files[0].size <= 10485760) {

                $('#profilePhoto').addClass('is-valid')

            } else {

                $('#profilePhoto').removeClass('is-valid')

                message = 'Anexe um arquivo com no máximo 10 MB'
            }
        }

        $('#photoField').append(`<small class="text-danger text-center photo-info">${message}</small>`)

    }


    checkAllFields(form, totalFields, button, container, successMassage, errorMessage) {

        let inputs = $(`${form} .form-control`)
        let photo = $('#profilePhoto')

        $(`[${container}]`).text('')

        let size = null

        $.each(inputs, (key, value) => $(value).hasClass('is-valid') ? size += 1 : '')

            !photo.hasClass('is-valid') && $('.photo-info').length == 0 ? size += 1 : ''

        if (totalFields == size) {

            $(button).prop("disabled", false)

            $(`[${container}]`).append(successMassage)

            $('[accessCode]').text('').append(management.randCode())

        } else {

            $(button).prop("disabled", true)

            $(`[${container}]`).append(errorMessage)
        }

    }


    checkRedundantName(route, form, button) {

        let $form = $(`${form}`).serialize()

        $.ajax({
            url: route,
            type: 'GET',
            data: $form,
            dataType: 'json',
            success: data => {

                console.log(data)

                if (data[0] != null) {

                    showToast('Nome já vinculado a uma avaliação nessa unidade', 'bg-info', 6000)

                    $(button).addClass('disabled')

                } else {

                    $(button).removeClass('disabled')
                }

            }
        })

    }

}