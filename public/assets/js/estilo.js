class App {

    // Mudança randômica entre side-bar normal e side-bar-responsive

    sideState() {

        let $sidebarLogo = $('#painel-left .logo img')

        $("#navbar-top , .side-pagina").toggleClass('col-lg-11 col-lg-10')

        $('.panel-side').toggleClass('col-lg-1 col-lg-2')

        $('#painel-left ul').toggleClass('side-bar-responsivo side-bar')

        $('#painel-left ul').hasClass('side-bar-responsivo') ? [$sidebarLogo.attr('src', '/assets/img/logo.png'), $('.fa-bars').addClass('ml-2')] : [$sidebarLogo.attr('src', '/assets/img/logo-completo.png'), $('.fa-bars').removeClass('ml-2')]
    }


    // Preenchimento automático do endereço do aluno

    getCep() {

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
}

let app = new App()

$("#cep").on('blur', (app.getCep))

$("#bars").on("click", (app.sideState))

$("#matricularAluno").on('click', e => {
    e.target.preventDefault
    app.matricularAluno()

})


//Formatação de campos com Jquey Mask 

$("#cpf").on('keypress', e => $(e.target).mask('000.000.000-00'))

$("#telefone1 , #telefone2").on('keypress', e => $(e.target).mask(('(00) 00000-0000')))

$(".unidades input").on('keypress', e => $(e.target).mask('0,00'))

$('.bars-xs').on('click', e => $('.container-fluid .row div:nth-child(1)').toggleClass('panel-side-xs panel-side'))

$("#perfilAlunoModal , #disciplinaModal , #perfilFuncionarioModal , #perfilTurmaModal").modal('show')