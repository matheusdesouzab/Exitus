class Paginas {

    // Mudança randômica entre side-bar normal e side-bar-responsive

    sideBarResposive() {

        let painelLeftImg = $('#painel-left .logo img')

        $('#navbar-top').toggleClass('col-lg-11 col-lg-10')
        $('.side-pagina').toggleClass('col-lg-11 col-lg-10')

        $('.side-painel').toggleClass('col-lg-1 col-lg-2')

        $('#painel-left ul').toggleClass('side-bar-responsivo side-bar')

        $('#painel-left ul').hasClass('side-bar-responsivo') ? [painelLeftImg.attr('src', '/assets/img/logo.png'), $('.fa-bars').addClass('ml-2')] : [painelLeftImg.attr('src', '/assets/img/logo-completo.png'), $('.fa-bars').removeClass('ml-2')]
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

class matriculaAluno extends Paginas {

    matricularAluno() {

        $('#matriculaModal > div').addClass('modal-aluno-matricular-erro')

        $('#matriculaModal').modal('show')

    }

}

let pagina_matriculaAluno = new matriculaAluno()

$("#cep").on('blur', (pagina_matriculaAluno.getCep))
$("#bars").on("click", (pagina_matriculaAluno.sideBarResposive))
$("#matricularAluno").on('click', (e) => {
    e.target.preventDefault
    pagina_matriculaAluno.matricularAluno()

})


//Formatação de campos com Jquey Mask 

$("#cpf").on('keypress', e => $(e.target).mask('000.000.000-00'))
$("#telefone1 , #telefone2").on('keypress', e => $(e.target).mask(('(00) 00000-0000')))
$(".unidades input").on('keypress', e => $(e.target).mask('0,00'))

$("#perfilAlunoModal , #disciplinaModal").modal('show')

$('.assistente-etapas-painel a i').on('click', function () {

    let tela = this.className

    tela = tela.replace('fas', '')

    console.log(tela)

    switch(tela){

        case ' fa-home':
            $('.linha-conexao').css({"background-image": "linear-gradient(to right, #0000FF 50%, #e5e5e5 50% )"})
            break
        case ' fa-users':
            $('.linha-conexao').css({"background-image": "linear-gradient(to left, #0000FF 50%, #0000ff 50% )"})
            break
        default:
            $('.linha-conexao').css({"background-image": "linear-gradient(to left, #e5e5e5 50%, #e5e5e5 50% )"})
        
    }


})




























let dataAtual = document.querySelector('#dataAtual')
let horaAtual = document.querySelector('#horaAtual')

let dia = new Array("Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado")
let mes = new Array("janeiro", "fevereiro", "março", "abril", "Maio", "junho", "julho", "agosto", "Setembro", "Outubro", "Novembro", "Dezembro")

now = new Date

let obterDataAtual = () => {
    let data = `${dia[now.getDay()]} ${now.getDate()} de ${mes[now.getMonth()]}`
    return data
}

let obterHoraAtual = () => {

    h = new Date().getHours();
    m = new Date().getMinutes();
    s = new Date().getSeconds();

    h <= 9 ? h = `0${h}` : h
    m <= 9 ? m = `0${m}` : m
    s <= 9 ? s = `0${s}` : s

    horaAtual.innerHTML = h + ":" + m + ":" + s;
    setTimeout('obterHoraAtual()', 100);
}

console.log(obterHoraAtual())

let body = document.querySelector('body')

body.onload = () => {
    dataAtual.innerHTML = obterDataAtual()
    horaAtual.innerHTML = obterHoraAtual()
}


let modoNoturno = document.querySelector('#night-mode')
let modoNoturnoLS = localStorage.getItem('noturno')
let html = document.querySelector('html')

if (modoNoturnoLS) {
    html.classList.add('night-mode')
    modoNoturno.checked = true
}

modoNoturno.onclick = () => {
    html.classList.toggle('night-mode')
    if (html.classList.contains('night-mode')) {
        localStorage.setItem('noturno', true)
        return
    }
    localStorage.removeItem('noturno')
}

/* let verificarModoNoturno = () => {
    if(localStorage.getItem('noturno')){
        let html = document.querySelector('html')
        html.classList.add('night-mode')
    }
} */