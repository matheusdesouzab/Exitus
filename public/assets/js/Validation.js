class Validation {

    validCpf() {

        let $form = $('#addStudent').serialize()
        var state = false

        $.ajax({
            url: '/verificar-dados/cpf',
            type: 'POST',
            data: $form,
            async: false,
            dataType: 'json',
            success: data => data[0] != null ? state : state = true
        })

        return state
    }



    cpfState(cpf) {

        let newValue = cpf.replace(/[^\d]/g, "")
        let $cpfField = $('#cpfField')
        let message = '';

        $('.cpf-info').remove()

        if (newValue.length == 11) {

            if (!this.validCpf()) {

                $('#cpf').removeClass('is-valid')

                message = (`<small class="text-danger text-center cpf-info">Cpf já informado</small>`)

            } else {
                $('#cpf').addClass('is-valid')
            }

        } else {

            $('#cpf').removeClass('is-valid')

            message = (`<small class="text-danger text-center cpf-info">Formato Inválido</small>`)
        }

        $($cpfField).append(message)

    }


    generic(verificationMode, element, size = null) {

        let formatElement = ($(`#${element}`).val()).replace(/[^\d]/g, "")

        if (verificationMode == 'basic') {

            if ($(`#${element}`).val() == '') {
                $(`#${element}`).removeClass('is-valid')
            } else {
                $(`#${element}`).addClass('is-valid')
            }

        } else {

            if (formatElement.length == size) {
                $(`#${element}`).addClass('is-valid')
                $('.telephone-info').remove()

            } else {
                $(`#${element}`).removeClass('is-valid')
                $('#telephoneField').append('<small class="text-danger text-center telephone-info">Formato Inválido</small>')
            }

        }

    }

}