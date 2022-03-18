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


    checkClass($form , type , button) {

        let dados = $($form).serialize()

        $.ajax({
            url: '/admin/gestao/turma/verificar-dados',
            data: dados,
            type: 'GET',
            dataType: 'json',
            success: data => {

                let stateClass = (`${data.class_id_ballot_course || 0 } ${data.class_id_shift_classroom || 0 }`).split(' ')

                if(type == 'add'){
                    stateClass[0] = ( stateClass[0] >= 1 ? '1' : '0' )
                    stateClass[1] = ( stateClass[1] >= 1 ? '1' : '0' )
                }

                if(type == 'update'){
                    let classID = $(`${$form} #classId`).val() 
                    stateClass[0] = ( stateClass[0] == classID ? '0' : stateClass[0] >= 1 ? '1' : '0')
                    stateClass[1] = ( stateClass[1] == classID ? '0' : stateClass[1] >= 1 ? '1' : '0')
                }

                stateClass = stateClass.join('')

                switch (stateClass) {

                    case '10':

                        $(button).addClass('disabled')

                        tools.showToast('Série e cédula já adicionadas', 'bg-info')

                        $(`${$form} #ballot , ${$form} #series`).addClass('is-invalid')

                        $(`${$form} #classRoom , ${$form} #shift`).removeClass('is-invalid')

                        break

                    case '00':

                        $(button).removeClass('disabled')

                        $(`${$form} #classRoom , ${$form} #shift , ${$form} #ballot , ${$form} #series`).removeClass('is-invalid')

                        tools.showToast('Tudo ok', 'bg-success')

                        break

                    case '01':

                        $(button).addClass('disabled')

                        tools.showToast('Sala e turno já adicionados', 'bg-info')

                        $(`${$form} #classRoom , ${$form} #shift`).addClass('is-invalid')

                        $(`${$form} #ballot , ${$form} #series`).removeClass('is-invalid')

                        break

                    case '11':

                        $(button).addClass('disabled')

                        tools.showToast('Todos os dados já vinculados a outra turma', 'bg-info')

                        $(`${$form} #classRoom , ${$form} #shift`).addClass('is-invalid')

                        $(`${$form} #ballot , ${$form} #series`).addClass('is-invalid')
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

        randPassword.length < 5 ? randPassword + '7' : ''

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


    disciplineFinalData(form) {

        let $form = $(form).serialize()

        $.ajax({
            dataType: 'json',
            type: 'get',
            data: $form,
            url: '/admin/gestao/turma/perfil-turma/aluno/medias-finais',
            success: data => {

                console.log(data)

                let note, lack

                if (data.length == 1) {
                    [note = 0, lack = 0]
                } else {
                    note = data[0].note == null ? 0 : (parseFloat(data[0].note) / 3).toFixed(1)
                    lack = data[1].note || 0
                }

                $(`${form} #average`).val(`${note}`)

                $(`${form} #situation`).val(`Média: ${note} | Faltas: ${lack}`)

            }

        })

    }


    disciplineAverageAlreadyAdded() {

        let $form = $('#addDisciplineFinalData').serialize()

        $.ajax({
            dataType: 'json',
            type: 'get',
            data: $form,
            url: '/admin/gestao/turma/perfil-turma/aluno/medias-finais/disponiveis',
            success: data => {

                $('#buttonAddDisciplineFinalData').removeClass('disabled')

                if (data.length == 1) {
                    $('#buttonAddDisciplineFinalData').addClass('disabled')
                    tools.showToast('Média já adicionada', 'bg-info')
                }

            }
        })
    }
}