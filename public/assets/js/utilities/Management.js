class Management {

    getGrade(event, e, sumNote) {

        let code = (e.keyCode || e.which)

        if (code == 37 || code == 38 || code == 39 || code == 40 || code == 8) return

        let num = Number(event.value.replace(".", "."))

        if (event.value.replace(".", "").length > 2) num = num * 100

        let value = (num <= sumNote ? num : sumNote)

        event.value = value.toFixed(1).replace(".", ".")

    }


    getNotesAlreadyAdded(form, event, e, calculateWithCurrentGrade, currentGrade = '') {

        let $form = $(`${form}`).serialize()

        $.ajax({
            type: "GET",
            url: "/admin/gestao/turma/perfil-turma/avaliacoes/soma-notas-unidade",
            data: $form,
            dataType: 'json',
            async: false,
            success: response => {

                let sumNote = response[0].sum_notes || 0

                sumNote = (calculateWithCurrentGrade == false ? (10 - tools.round(sumNote, 1)) : tools.round(10 + (currentGrade - sumNote), 1))

                this.getGrade(event, e, sumNote)

            },
            error: erro => tools.showToast('Tente novamente mais tarde', 'bg-info')

        })
    }


    checkClass() {

        let dados = $('#addClass').serialize()

        $.ajax({
            url: '/admin/gestao/turma/verificar-dados',
            data: dados,
            type: 'GET',
            dataType: 'json',
            success: data => {

                let stateClass = []

                $.each(data, i => stateClass.push(data[i].result))

                stateClass = stateClass.toString().replace(',', '')

                switch (stateClass) {

                    case '01':

                        $('#buttonAddClass').addClass('disabled')

                        tools.showToast('Série e cédula já adicionadas', 'bg-info')

                        $('#addClass #ballot , #addClass #series ').addClass('is-invalid')

                        $('#addClass #classRoom , #addClass #shift ').removeClass('is-invalid')

                        break

                    case '0':

                        $('#buttonAddClass').removeClass('disabled')

                        $('#addClass #classRoom , #addClass #shift , #addClass #ballot , #addClass #series').removeClass('is-invalid')

                        break

                    default:

                        $('#buttonAddClass').addClass('disabled')

                        tools.showToast('Sala e turno já adicionados', 'bg-info')

                        $('#addClass #classRoom , #addClass #shift ').addClass('is-invalid')

                        $('#addClass #ballot , #addClass #series ').removeClass('is-invalid')

                }

            },
            error: erro => tools.showToast('Tente novamente mais tarde', 'bg-info')
        })
    }


    randCode() {

        var randPassword = Array(6).fill("0123456789").map(function (x) {

                return x[Math.floor(Math.random() * x.length)]
            }

        ).join('').replace(/(\d{3})(\d{3})/, "$1.$2")

        return randPassword
    }


    availableLack() {

        let $form = $("#addLack").serialize()

        $.ajax({
            url: "/admin/gestao/turma/perfil-turma/aluno/faltas/disponiveis",
            type: "GET",
            dataType: "json",
            data: $form,
            success: data => {

                if (data.length != 1) {

                    $("#buttonAddLackStudent").removeClass('disabled')

                } else {

                    $("#buttonAddLackStudent").addClass('disabled')

                    tools.showToast("Falta já adicionada", "bg-info")
                }

            },
            error: error => tools.showToast('errro', 'bg-info')

        })
    }


}