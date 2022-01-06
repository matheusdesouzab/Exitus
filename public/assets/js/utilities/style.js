function sideState() {

    let $sidebarLogo = $('#painel-left .logo img')

    $("#navbar-top").toggleClass('col-lg-11 col-lg-10').toggleClass('col-md-11 col-md-10')

    $("#pagina").toggleClass('col-md-10 col-md-9').toggleClass('col-lg-11 col-lg-10')

    $('.panel-side').toggleClass('col-lg-1 col-lg-2')

    $('body').toggleClass('sidebar-responsive')
    /* 
        $('#painel-left ul').hasClass('side-bar-responsivo') ? [$sidebarLogo.attr('src', '/assets/img/logo.png'), $('.fa-bars').addClass('ml-2')] : [$sidebarLogo.attr('src', '/assets/img/logo-completo.png'), $('.fa-bars').removeClass('ml-2')] */
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
        $('.zipCode-info').remove()
        $('#zipCodeField').append('<small class="text-danger text-center zipCode-info">Formato Invalido</small>')
    }
}


function activeLinks(link) {

    let url = window.location.href.split('/')
    let links = $(`${link}`)

    url.shift()

    $.each(links, function (value) {

        let name = $(links[value]).attr('name')

        if (url.includes(name) || url.includes(`${name}#`)) {
            $(`${link}[name='${name}']`).addClass("link-active")
        }

    })

}