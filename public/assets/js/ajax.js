// Script de requisições AJAX


$(document).ready(() => {

    $("#editarDados").on('click', () => {

        $("input").prop('disabled', false)
        $("select").prop('disabled', false)
        $("#atualizarDados").removeClass('disabled')

    })

    $("#fecharModal").on('click', () => {

        $("input").prop('disabled', true)
        $("select").prop('disabled', true)
        $("#atualizarDados").addClass('disabled')

    })


})