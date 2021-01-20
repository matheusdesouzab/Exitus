$(document).ready(() => {

    //Formatação de campos com Jquey Mask 


    $("#cpf").on('keypress', e => $(e.target).mask('000.000.000-00'))

    $("#telefone1 , #telefone2").on('keypress', e => $(e.target).mask(('(00) 00000-0000')))


    // Preenchimento automático da localidade do aluno


    $('#cep').on('blur', () => {

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
    })


    /** Assistente de etapas 
     * ? Autor: omri-shaiko's
     * ? Link: https://bootsnipp.com/snippets/yaZa 
     * ? Codigo atualizado por Matheus de Souza
     */


    let grupoDados = $('div.assistente-etapas-painel div a')
    let allWells = $('.assistente-etapas-conteudo')
    let allNextBtn = $('.nextBtn')

    allWells.hide()

    grupoDados.on('click', function (e) {

        e.preventDefault

        let target = $($(this).attr('href'))
        let item = $(this)

        if (!item.hasClass('disabled')) {
            grupoDados.removeClass('btn-primary').addClass('btn-default')
            item.addClass('btn-primary')
            allWells.hide()
            target.show()
            target.find('input:eq(0)').focus()
        }

    })

    allNextBtn.on('click', function (e) {

        let curStep = $(this).closest(".assistente-etapas-conteudo")
        let curStepBtn = curStep.attr("id")
        let nextStepWizard = $('div.assistente-etapas-painel div a[href="#' + curStepBtn + '"]').parent().next().children("a")
        let curInputs = curStep.find("input[type='text'],input[type='url']")
        let isValid = true

        $(".form-group").removeClass("has-error")

        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false
                $(curInputs[i]).closest(".form-group").addClass("has-error")
            }
        }

        isValid ? nextStepWizard.removeAttr('disabled').trigger('click') : ''

    })


    $('div.assistente-etapas-painel div a.btn-primary').trigger('click')

        
        if(window.innerWidth < 992){

            $("#bars").hide()  

            $('#painel-left ul').toggleClass('sider-bar sider-bar-responsivo')

            $('#painel-left img').attr('src', '/assets/img/logo.png')

        }

    $("#bars").on("click", () => {     

        if ($('#painel-left ul').hasClass('sider-bar-responsivo')) {

            $('.sider-pagina #navbar-top').toggleClass('col-lg-11 col-lg-10')

            $('.sider-painel').toggleClass('col-lg-1 col-lg-2')         

            $('#painel-left img').attr('src', '/assets/img/logo-completo.png')

            $('#painel-left ul').toggleClass('sider-bar-responsivo sider-bar')   
                   
        } else {

            $('.sider-pagina #navbar-top').toggleClass('col-lg-10 col-lg-11')

            $('.sider-painel').toggleClass('col-lg-2 col-lg-1')

            $('#painel-left img').attr('src', '/assets/img/logo.png')

            $('#painel-left ul').toggleClass('sider-bar sider-bar-responsivo')

        }

    }) 



























    let nome_curso = []
    let aluno_curso = []

    $.ajax({
        url: '/graficoAlunoCurso',
        type: 'get',
        success: dados => {

            var dadosArray = JSON.parse(dados)

            dadosArray.forEach(element => {
                nome_curso.push(element['nome_curso'])
                aluno_curso.push(element['Alunos'])
            })

            let ctxalunoCurso = document.getElementById("alunoCurso");

            Chart.defaults.scale.gridLines.display = false;

            let alunoCurso = new Chart(ctxalunoCurso, {

                type: 'bar',
                data: {
                    // Legendas das Barras
                    labels: nome_curso,
                    datasets: [{
                        // Legenda geral
                        label: 'Aluno por curso',
                        // Dados a serem inseridos nas barras
                        data: aluno_curso,
                        // Define as cores de preenchimento das barras
                        // de acordo com sua posição no vetor
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        // Define as cores de preenchimento das bordas das barras
                        // de acordo com sua posição no vetor
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        // Define a espessura da borda dos retângulos
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            })
        },
        error: erro => console.log(erro)
    })

    let dataDias = []
    let dataMatriculaTotais = []
    let novaData = []

    $.ajax({
        url: '/graficoMatriculasSemanais',
        type: 'get',
        success: dados => {

            var dadosArray = JSON.parse(dados)

            dadosArray.forEach(dados => {

                dataMatriculaTotais.push(dados[0]['total'])
                dataDias.push(dados[1])

            })

            let hoje = new Date().getDate()

            dataDias.forEach(datas => {
                datas = datas.split('-')
                if (hoje == datas[2]) {
                    novaData.push(`Hoje`)
                } else {
                    novaData.push(datas[2])
                }

            })


            var ctx = document.getElementById("matriculaSemana").getContext('2d');

            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: novaData,
                    datasets: [{
                        label: 'Matriculas', // Name the series
                        data: dataMatriculaTotais, // Specify the data values array
                        fill: false,
                        borderColor: '#2196f3', // Add custom color border (Line)
                        backgroundColor: '#2196f3', // Add custom color background (Points and Fill)
                        borderWidth: 1 // Specify bar border width
                    }]
                },
                options: {
                    responsive: true, // Instruct chart js to respond nicely.
                    maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
                }
            });
        },
        erro: erro => console.log(erro)
    })


    let chart1 = document.getElementById("chart1")


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