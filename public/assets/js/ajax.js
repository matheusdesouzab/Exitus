// Script de requisições AJAX


$(document).ready(() => {

    // Estrutura de navegação ajax entre as páginas

    



















    // Função para obter informações da localidade via ajax

   

    let valores = []



    let situacaoCPF = null,
        situacaoEmail = null // Variáveis de estado
    let nome_curso, nome_turma, nome_turno, vagasOcupadas

    let verificacaoDados = () => {

        let curso = $('#curso').val()
        let turma = $('#turma').val()
        let turno = $('#turno').val()
        let cpf = $('#cpf_aluno').val()
        let email = $('#email').val()
        let nome = $('#nome_aluno').val()
        let sexo = $('#sexo').val()
        let data_nascimento = $('#data_nascimento').val()
        let telefone = $('#telefone').val()
        let cep = $('#cep_aluno').val()
        let bairro = $('#bairro').val()
        let municipio = $('#municipio').val()
        let endereco = $('#endereco').val()
        let naturalidade = $('#naturalidade').val()
        let uf = $('#uf').val()

        valores = [curso, turma, turno, cpf, email, nome, sexo, data_nascimento, telefone, cep, bairro, municipio, endereco, naturalidade, uf]
        valores = [...valores]
        situacao = valores.every(valor => {
            return valor != ''
        })

        return situacao ? true : false

    }

    // Função para realizar a verificação sobre os dados gerais da vaga em questão

    function verificarVaga() {

        // Valores do campos em questão

        let curso = $('#curso').val()
        let turma = $('#turma').val()
        let turno = $('#turno').val()
        let cpf = $('#cpf_aluno').val()
        let email = $('#email').val()

        $('#situacao_vaga').empty() // Limpando div para não haver redutancia de informação

        $.ajax({
            type: 'GET',
            url: `/verificarVaga`,
            data: `curso=${curso}&turma=${turma}&turno=${turno}&email=${email}&cpf=${cpf}`,
            dataType: 'json',
            success: dados => {

                nome_curso = dados.totalVagasOcupadas[0].nome_curso
                nome_turma = dados.totalVagasOcupadas[0].nome_turma
                nome_turno = dados.totalVagasOcupadas[0].nome_turno
                vagasOcupadas = dados.totalVagasOcupadas[0].total

                dados.situacaoEmail.length == 0 ? situacaoEmail = true : situacaoEmail = false
                dados.situacaoCPF.length == 0 ? situacaoCPF = true : situacaoCPF = false

            },
            error: erro => {
                console.log(erro.status)
            }
        })
    }

    let verificarEmail = () => {

        switch (situacaoEmail) {

            case true:
                $('#situacaoEmail').html('OK')
                break
            case false:
                $('#situacaoEmail').html('Email já cadastrado')
                break
            default:
                $('#situacaoEmail').html('')
        }

    }


    let verificarCPF = () => {

        switch (situacaoCPF) {

            case true:
                $('#situacaoCpf').html('OK')
                break
            case false:
                $('#situacaoCpf').html('Cpf já cadastrado')
                break
            default:
                $('#situacaoCpf').html('')
        }

    }

    $(".grupo-endereco").on("mousemove", () => {
        verificarVaga()
        verificarCPF()
        verificarEmail()
    })

    $(".grupo-curso").on("mousemove", () => verificarVaga())

    $('#sessao_matricula_aluno').on('mousemove', () => {

        if (situacaoCPF && situacaoEmail && verificacaoDados()) {

            $("#matricula").removeClass('disabled')

        } else {

            $("#matricula").addClass('disabled')

        }
    })

    /* $('#matricula').on("click", (e) => {

        verificarVaga()

        $("#cursoDesejado").text(nome_curso)
        $("#turnoDesejado").text(nome_turno)
        $("#turmaDesejada").text(nome_turma)

        console.log(vagasOcupadas)


        if ((20 - vagasOcupadas) > 0) {

            e.preventDefault()

            let dados = $('form').serialize()

            $.ajax({
                type: 'post',
                url: '/matricular',
                data: dados,
                dataType: 'json',
                success: dados => {

                    $("#modalSucesso").modal('show')

                    $("input").each(function (index, element) {
                        $(element).val('')
                    })

                    $("select").each(function (index, element) {
                        $(element).val(0)
                    })

                },
                error: erro => {
                    console.log(erro)
                }
            })

        } else {


            $("#modalErro").modal('show')

        }

    }) */


    $(".editar").on("click", function () {

        let id = $(this).attr('id').replace(/([^\d])+/gim, '')

        $.ajax({
            type: 'get',
            url: '/fichaAluno',
            data: `id=${id}`,
            dataType: 'json',
            success: dados => {

                $("#sexoAtualModal").val(dados[0]['sexo'])
                $("#sexoAtualModal").text(dados[0]['sexo'])

                $("#id_aluno").val(dados[0]['id_aluno'])

                $("#cursoAtualModal").val(dados[0]['fk_id_curso'])
                $("#cursoAtualModal").text(dados[0]['nome_curso'])

                $("#turnoAtualModal").val(dados[0]['fk_id_turno'])
                $("#turnoAtualModal").text(dados[0]['nome_turno'])

                $("#turmaAtualModal").val(dados[0]['fk_id_turma'])
                $("#turmaAtualModal").text(dados[0]['nome_turma'])


                $("#modalDadosAlunoTitle").text(dados[0]['nome_aluno'])
                $("#nomeModal").val(dados[0]['nome_aluno'])
                $("#cursoModal").text(dados[0]['nome_curso'])
                $("#cpfModal").val((dados[0]['cpf']))
                $("#telefoneModal").val((dados[0]['telefone']))
                $("#emailModal").val((dados[0]['email']))
                $("#naturalidadeModal").val((dados[0]['naturalidade']))
                $("#cepModal").val((dados[0]['cep']))
                $("#enderecoModal").val((dados[0]['endereco']))
                $("#bairroModal").val((dados[0]['bairro']))
                $("#ufModal").val((dados[0]['uf']))
                $("#municipioModal").val((dados[0]['municipio']))
                $("#turmaModal").val((dados[0]['nome_turma']))
                $("#turnoModal").val((dados[0]['nome_turno']))

                //var today = moment().format('2020-11-11');

                let data = dados[0]['data_nascimento'].split('-')
                $("#nascimentoModal").val(dados[0]['data_nascimento'])

                dados[0]['sexo'] == 'Masculino' ? $("#imgSexo").attr("src", "../img/perfilHomem.png") : $("#imgSexo").attr("src", "../img/mulher2.png")

                $("#modalDadosAluno").modal("hide")
                $("#modalDadosAluno").modal("show")

            },
            erro: erro => console.log(erro)

        })

    })

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



    $("#atualizarDados").on("click", (e) => {

        e.preventDefault()

        let data = $('form').serialize()

        $.ajax({
            type: 'post',
            url: '/atualizarDados',
            dataType: 'json',
            data: data,
            success: dados => {

                /*  $("#modalDadosAluno").modal("hide")
                 $("#modalDadosAluno").modal("show") */

                console.log(dados)

            },
            erro: erro => console.log(erro)
        })
    })

})