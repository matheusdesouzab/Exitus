function sideState() {

    let $sidebarLogo = $('#painel-left .logo img')

    $("#navbar-top").toggleClass('col-lg-12 col-lg-10').toggleClass('col-md-10 col-md-9')

    $(".side-pagina").toggleClass('col-md-10 col-md-9').toggleClass('col-lg-12 col-lg-10')

    $('.panel-side').toggleClass('col-lg-1 col-lg-2')

    $('#painel-left ul').toggleClass('side-bar-responsivo side-bar')

    $('#painel-left ul').hasClass('side-bar-responsivo') ? [$sidebarLogo.attr('src', '/assets/img/logo.png'), $('.fa-bars').addClass('ml-2')] : [$sidebarLogo.attr('src', '/assets/img/logo-completo.png'), $('.fa-bars').removeClass('ml-2')]
}



function getLocation() {

    let zipCode = $('#zipCode').val().replace(/[^\d]/g, "")

    if (zipCode.length == 8) {

        $('.zipCode-info').remove()
        $('#zipCode').addClass('is-valid')

        $.ajax({
            type: 'GET',
            url: `https://viacep.com.br/ws/${zipCode}/json/unicode/`,
            dataType: 'json',
            success: data => {

                $('#address').val(data.logradouro)
                $('#district').val(data.bairro)
                $('#county').val(data.localidade)
                $('#uf').val(data.uf)
                $('#zipCode').val(data.cep)

                let validation = new Validation()

                let address = ['county', 'district', 'address', 'uf']

                address.forEach(element => validation.validateByContent(element))

            },
            error: erro => showToast('CEP inválido', 'bg-danger')
        })

    } else {

        $('#zipCode').removeClass('is-valid')
        $('#zipCodeField').append('<small class="text-danger text-center zipCode-info">Formato Invalido</small>')
    }
}


function automaticDate() {

    let $schoolYear = $('#addSchoolTerm select[name="schoolYear"]').find(":selected").text()

    $('#addSchoolTerm input[name="startDate"]').prop('value', `${$schoolYear}-02-01`)
    $('#addSchoolTerm input[name="endDate"]').prop('value', `${$schoolYear}-12-01`)
}


function showToast(description, background, delay = 3000) {

    $('.toast-data').text(description)

    $('.toast-header').removeClass('bg-success bg-danger bg-primary').addClass(background)

    $('#toastContainer').toast({
        'delay': delay
    }).toast('show')

}