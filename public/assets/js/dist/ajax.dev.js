"use strict";

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance"); }

function _iterableToArray(iter) { if (Symbol.iterator in Object(iter) || Object.prototype.toString.call(iter) === "[object Arguments]") return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } }

// Script de requisições AJAX
$(document).ready(function () {
  // Estrutura de navegação ajax entre as páginas
  // Função para obter informações da localidade via ajax
  var valores = [];
  var situacaoCPF = null,
      situacaoEmail = null; // Variáveis de estado

  var nome_curso, nome_turma, nome_turno, vagasOcupadas;

  var verificacaoDados = function verificacaoDados() {
    var curso = $('#curso').val();
    var turma = $('#turma').val();
    var turno = $('#turno').val();
    var cpf = $('#cpf_aluno').val();
    var email = $('#email').val();
    var nome = $('#nome_aluno').val();
    var sexo = $('#sexo').val();
    var data_nascimento = $('#data_nascimento').val();
    var telefone = $('#telefone').val();
    var cep = $('#cep_aluno').val();
    var bairro = $('#bairro').val();
    var municipio = $('#municipio').val();
    var endereco = $('#endereco').val();
    var naturalidade = $('#naturalidade').val();
    var uf = $('#uf').val();
    valores = [curso, turma, turno, cpf, email, nome, sexo, data_nascimento, telefone, cep, bairro, municipio, endereco, naturalidade, uf];
    valores = _toConsumableArray(valores);
    situacao = valores.every(function (valor) {
      return valor != '';
    });
    return situacao ? true : false;
  }; // Função para realizar a verificação sobre os dados gerais da vaga em questão


  function verificarVaga() {
    // Valores do campos em questão
    var curso = $('#curso').val();
    var turma = $('#turma').val();
    var turno = $('#turno').val();
    var cpf = $('#cpf_aluno').val();
    var email = $('#email').val();
    $('#situacao_vaga').empty(); // Limpando div para não haver redutancia de informação

    $.ajax({
      type: 'GET',
      url: "/verificarVaga",
      data: "curso=".concat(curso, "&turma=").concat(turma, "&turno=").concat(turno, "&email=").concat(email, "&cpf=").concat(cpf),
      dataType: 'json',
      success: function success(dados) {
        nome_curso = dados.totalVagasOcupadas[0].nome_curso;
        nome_turma = dados.totalVagasOcupadas[0].nome_turma;
        nome_turno = dados.totalVagasOcupadas[0].nome_turno;
        vagasOcupadas = dados.totalVagasOcupadas[0].total;
        dados.situacaoEmail.length == 0 ? situacaoEmail = true : situacaoEmail = false;
        dados.situacaoCPF.length == 0 ? situacaoCPF = true : situacaoCPF = false;
      },
      error: function error(erro) {
        console.log(erro.status);
      }
    });
  }

  var verificarEmail = function verificarEmail() {
    switch (situacaoEmail) {
      case true:
        $('#situacaoEmail').html('OK');
        break;

      case false:
        $('#situacaoEmail').html('Email já cadastrado');
        break;

      default:
        $('#situacaoEmail').html('');
    }
  };

  var verificarCPF = function verificarCPF() {
    switch (situacaoCPF) {
      case true:
        $('#situacaoCpf').html('OK');
        break;

      case false:
        $('#situacaoCpf').html('Cpf já cadastrado');
        break;

      default:
        $('#situacaoCpf').html('');
    }
  };

  $(".grupo-endereco").on("mousemove", function () {
    verificarVaga();
    verificarCPF();
    verificarEmail();
  });
  $(".grupo-curso").on("mousemove", function () {
    return verificarVaga();
  });
  $('#sessao_matricula_aluno').on('mousemove', function () {
    if (situacaoCPF && situacaoEmail && verificacaoDados()) {
      $("#matricula").removeClass('disabled');
    } else {
      $("#matricula").addClass('disabled');
    }
  });
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
    var id = $(this).attr('id').replace(/([^\d])+/gim, '');
    $.ajax({
      type: 'get',
      url: '/fichaAluno',
      data: "id=".concat(id),
      dataType: 'json',
      success: function success(dados) {
        $("#sexoAtualModal").val(dados[0]['sexo']);
        $("#sexoAtualModal").text(dados[0]['sexo']);
        $("#id_aluno").val(dados[0]['id_aluno']);
        $("#cursoAtualModal").val(dados[0]['fk_id_curso']);
        $("#cursoAtualModal").text(dados[0]['nome_curso']);
        $("#turnoAtualModal").val(dados[0]['fk_id_turno']);
        $("#turnoAtualModal").text(dados[0]['nome_turno']);
        $("#turmaAtualModal").val(dados[0]['fk_id_turma']);
        $("#turmaAtualModal").text(dados[0]['nome_turma']);
        $("#modalDadosAlunoTitle").text(dados[0]['nome_aluno']);
        $("#nomeModal").val(dados[0]['nome_aluno']);
        $("#cursoModal").text(dados[0]['nome_curso']);
        $("#cpfModal").val(dados[0]['cpf']);
        $("#telefoneModal").val(dados[0]['telefone']);
        $("#emailModal").val(dados[0]['email']);
        $("#naturalidadeModal").val(dados[0]['naturalidade']);
        $("#cepModal").val(dados[0]['cep']);
        $("#enderecoModal").val(dados[0]['endereco']);
        $("#bairroModal").val(dados[0]['bairro']);
        $("#ufModal").val(dados[0]['uf']);
        $("#municipioModal").val(dados[0]['municipio']);
        $("#turmaModal").val(dados[0]['nome_turma']);
        $("#turnoModal").val(dados[0]['nome_turno']); //var today = moment().format('2020-11-11');

        var data = dados[0]['data_nascimento'].split('-');
        $("#nascimentoModal").val(dados[0]['data_nascimento']);
        dados[0]['sexo'] == 'Masculino' ? $("#imgSexo").attr("src", "../img/perfilHomem.png") : $("#imgSexo").attr("src", "../img/mulher2.png");
        $("#modalDadosAluno").modal("hide");
        $("#modalDadosAluno").modal("show");
      },
      erro: function erro(_erro) {
        return console.log(_erro);
      }
    });
  });
  $("#editarDados").on('click', function () {
    $("input").prop('disabled', false);
    $("select").prop('disabled', false);
    $("#atualizarDados").removeClass('disabled');
  });
  $("#fecharModal").on('click', function () {
    $("input").prop('disabled', true);
    $("select").prop('disabled', true);
    $("#atualizarDados").addClass('disabled');
  });
  $("#atualizarDados").on("click", function (e) {
    e.preventDefault();
    var data = $('form').serialize();
    $.ajax({
      type: 'post',
      url: '/atualizarDados',
      dataType: 'json',
      data: data,
      success: function success(dados) {
        /*  $("#modalDadosAluno").modal("hide")
         $("#modalDadosAluno").modal("show") */
        console.log(dados);
      },
      erro: function erro(_erro2) {
        return console.log(_erro2);
      }
    });
  });
});