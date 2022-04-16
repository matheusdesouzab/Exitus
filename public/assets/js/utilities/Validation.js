class Validation {

    // Validar o CPF informado

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

    // Verificar o status do CPF

    cpfState(cpf) {

        let formattedCpf = cpf.replace(/[^\d]/g, "")
        let $cpfField = $('#cpfField')
        let message = '';

        $('.cpf-info').remove()

        if (formattedCpf.length == 11) {

            if (!this.cpfAlreadyInformed()) {

                $('#cpf').removeClass('is-valid')
                message = 'Cpf já cadastrado no sistema'

            } else {

                $('#cpf').addClass('is-valid')
            }

        } else {

            $('#cpf').removeClass('is-valid')
            message = 'Formato Inválido'
        }

        $($cpfField).append(`<small class="text-danger text-center cpf-info">${message}</small>`)

    }

    // Validar pelo total de caracteres 

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

    // Função para verificar se o campo possui um valor, caso sim, ele recebe a .class 'is-valid'

    validateByContent(element) {

        let $element = $(`#${element}`)

        $element.val() == '' ? $element.removeClass('is-valid') : $element.addClass('is-valid')

    }

    // Função para verificar se a imagem recebida é valida

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

    // Função para verificar se todos os campos do formulário foram preenchidos

    checkAllFields(form, totalFields, button) {

        let inputs = $(`${form} .form-control`)
        let photo = $('#profilePhoto')
        let name = $("#name").val().split(" ", 1)

        let size = null

        $('[containerRegistrationSuccess] , [containerRegistrationError]').hide()
        $("#name").val() == "" ? "" : $("[givenName]").text(`de ${name[0]}`)

        $.each(inputs, (key, value) => $(value).hasClass('is-valid') ? size += 1 : '')

            !photo.hasClass('is-valid') && $('.photo-info').length == 0 ? size += 1 : ''

        if (totalFields == size) {

            let accessCode = management.randCode()

            $(button).prop("disabled", false)

            $('[accessCode]').text('').append(accessCode)

            $('form #accessCode').val(accessCode)

            $('[containerRegistrationSuccess]').show()

        } else {

            $(button).prop("disabled", true)

            $('[containerRegistrationError]').show()

        }

    }

    // Função para verificar se o nome da avaliação já foi informada em outra na mesma unidade da disciplina

    checkRedundantName(route, form, button) {

        let $form = $(`${form}`).serialize()

        $.ajax({
            url: route,
            type: 'GET',
            data: $form,
            dataType: 'json',
            success: data => {

                if (data[0] != null) {

                    console.log(data)

                    tools.showToast('Nome já vinculado a uma avaliação nessa unidade', 'bg-info', 6000)

                    $(button).addClass('disabled')

                } else {

                    $(button).removeClass('disabled')
                }

            }
        })

    }

    // Função para verificar se o formato do e-mail é válido

    checkEmail(email) {

        let result = /\S+@\S+\.\S+/
        let message = ''

        $('.email-info').remove()

        if (!result.test(email)) {

            message = "Formato inválido"

            $("#email").removeClass('is-valid')

            $('#emailField').append(`<small class="text-danger text-center email-info">${message}</small>`)

        } else {

            $('.email-info').remove()

            $("#email").addClass('is-valid')

        }
    }

}