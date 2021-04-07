


function sideState() {

    let $sidebarLogo = $('#painel-left .logo img')

    $("#navbar-top").toggleClass('col-lg-12 col-lg-10').toggleClass('col-md-10 col-md-9')

    $(".side-pagina").toggleClass('col-md-10 col-md-9').toggleClass('col-lg-12 col-lg-10')

    $('.panel-side').toggleClass('col-lg-1 col-lg-2')

    $('#painel-left ul').toggleClass('side-bar-responsivo side-bar')

    $('#painel-left ul').hasClass('side-bar-responsivo') ? [$sidebarLogo.attr('src', '/assets/img/logo.png'), $('.fa-bars').addClass('ml-2')] : [$sidebarLogo.attr('src', '/assets/img/logo-completo.png'), $('.fa-bars').removeClass('ml-2')]
}



function getLocation() {

    let cep = $('#cep').val()

    $.ajax({
        type: 'GET',
        url: `https://viacep.com.br/ws/${cep}/json/unicode/`,
        dataType: 'json',
        success: cepDados => {

            $('#endereco').val(cepDados.logradouro)
            $('#bairro').val(cepDados.bairro)
            $('#municipio').val(cepDados.localidade)
            $('#uf').val(cepDados.uf)
            $('#cep').val(cepDados.cep)

        },
        error: erro => {
            console.log(`Ocorreu um erro na busca do cep, código de erro = ${erro.status}`)
        }
    })
}


function automaticDate() {

    let $schoolYear = $('#addSchoolTerm select[name="schoolYear"]').find(":selected").text()

    $('#addSchoolTerm input[name="startDate"]').prop('value', `${$schoolYear}-02-01`)
    $('#addSchoolTerm input[name="endDate"]').prop('value', `${$schoolYear}-12-01`)
}


function showToast(description, background) {

    $('.toast-data').text(description)

    $('.toast-header').removeClass('bg-success bg-danger bg-primary').addClass(background)

    $('#toastContainer').toast({
        'delay': 3000
    }).toast('show')

}