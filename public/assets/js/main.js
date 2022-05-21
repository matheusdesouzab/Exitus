// Declaração de objetos necessários 

const validation = new Validation()
const application = new Application()
const tools = new Tools()
const management = new Management()

let botaoClicado = true

// Iniciando o tooltip

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})


$(document).ready(function(){

    $(document).on('click', '#nightMode', function (e) {
        $('html').toggleClass('nightMode')
        let portal = 'nightMode' + $(this).attr('portal')
        if ($('html').hasClass('nightMode')) {
            localStorage.setItem(portal, true)
            document.location.reload()
            return
        }
        localStorage.removeItem(portal)
        document.location.reload()
    })

    if (localStorage.getItem('nightModeAdmin')) {
        $('#admin #logo-exitus').attr('src', '/assets/img/logo-components/logo-completa-branca.png')
    }

    if (localStorage.getItem('nightModeTeacher')) {
        $('#teacherPortal #logo-exitus').attr('src', '/assets/img/logo-components/logo-completa-branca.png')
    }

    if (localStorage.getItem('nightModeStudent')) {
        $('#studentPortal #logo-exitus-main').attr('src', '/assets/img/logo-components/logo-completa-branca.png')
    }


    $(document).on('click', '[data-target="#accordion-interface-admin"] , [data-target="#accordion-interface-teacher"],  [data-target="#accordion-interface-student"]', function (e) {
        if ($('html').hasClass('nightMode')) {
            $('#nightMode').prop("checked", true)
        }
    })

})


// Função para definir o link ativo

$(document).ready(function () {
    activeLinks('.sidebar-lists li')
    activeLinks('#navbarBottom li a')
    activeLinks('.navbarBottomTeacher li a')
    activeLinks('#teacherPortal .sidebar-lists li')
})


// Função que bloqueia o show de links quando a sidebar estiver no modo responsive

$(document).on('click', '.sidebar-responsive .sidebar-lists li a', function (e) {
    e.preventDefault()
    $('.sidebar-responsive .sidebar-lists div').removeClass('show')
    sideState()
})


// Sessão de funções relacionadas a inserção de dados no sistema


$(document).on("click", "#profileClassModal #buttonAddExam", function (e) {

    e.preventDefault()

    let $form = $("#addExam").serialize()

    $.ajax({
        type: "GET",
        url: "/admin/gestao/turma/perfil-turma/avaliacoes/soma-notas-unidade",
        data: $form,
        dataType: "json",
        success: response => {

            let sumNote = response[0].sum_notes || 0

            if (sumNote >= 10) {
                tools.showToast("Limite de nota atigindo", "bg-info")
            } else {
                application.addSinglePart("#addExam", "/admin/gestao/turma/perfil-turma/avaliacoes/inserir", "Avaliação adicionada", false)

                $("#addExam #examValue").val("0")
                $("#addExam #examDescription").val("")
                $("#addExam #realizeDate").val("")

                application.loadListElements("containerListExam", "/admin/gestao/turma/perfil-turma/avaliacoes/lista-recentes", "#addExam")
            }
        }
    })
})


$(document).on("click", "#profileStudentModal #buttonAddNoteStudent", function (e) {

    application.addSinglePart("#addNote", "/admin/gestao/turma/perfil-turma/aluno/boletim/adicionar-nota-avaliacao", "Nota adicionada", false)

    application.loadOptions([
        ["examDescription", "/admin/gestao/turma/perfil-turma/aluno/notas-disponiveis", "clean", "#addNote", "#addNote", "Todas avaliações já adicionadas", "#buttonAddNoteStudent"]
    ])

    $("#addNote #noteValue").val("0")

})


$(document).on("click", "#profileClassModal #buttonAddClassDiscipline", function () {

    application.addSinglePart("#addClassDiscipline", "/admin/gestao/turma/perfil-turma/turma-disciplina/inserir", "Disciplina adicionada", false)

    application.loadOptions([

        ["disciplineClass", "/admin/gestao/turma/perfil-turma/turma-disciplina/disciplinas-adicionadas", "clean", "", "#formClassId", "Nenhuma disciplina vincula a turma"],

        ["disciplineClassAdd", "/admin/gestao/turma/perfil-turma/turma-disciplina/select-disciplinas", "clean", "#addClassDiscipline", "#formClassId", "Todas disciplinas já adicionadas", "#buttonAddClassDiscipline"]

    ])

})


$("#schoolTerm #buttonAddSchoolTerm").on("click", function () {

    tools.automaticDate()
    application.addSinglePart("#addSchoolTerm", "/admin/gestao/periodo-letivo/inserir", "Período letivo adicionado")
    application.loadOptions([
        ["schoolYear", "/admin/gestao/periodo-letivo/lista-anos-disponiveis", "clean", "", "Nenhum ano disponível", "#buttonAddSchoolTerm"]
    ])

})


$("#classRoom #buttonAddClassRoom").on("click", function () {

    application.addSinglePart("#addClassRoom", "/admin/gestao/sala/inserir", "Sala de aula adicionada")
    application.loadOptions([
        ["classroomNumber", "/admin/gestao/sala/lista-numeros-disponiveis", "clean", "", "Nenhuma sala disponível", '#buttonAddClassRoom']
    ])

})


$(document).on("click", "#profileStudentModal #buttonSwitchClasses", function (e) {
    application.addSinglePart("#switchClasses", "/admin/gestao/turma/perfil-turma/aluno/troca-turma", "Troca aluno de turma")
    location.reload()
})


$("#class #buttonAddClass").on("click", function () {
    application.addSinglePart("#addClass", "/admin/gestao/turma/inserir", "Turma adicionada")
    management.checkClass('#addClass', 'add', '#buttonAddClass')
})


$("#discipline #buttonAddDiscipline").on("click", function (e) {
    application.addSinglePart("#addDiscipline", "/admin/gestao/disciplina/inserir", "Disciplina adicionada")
})


$(document).on("click", "#addWarning #buttonAddWarning", function (e) {
    application.addSinglePart("#addWarning", "/admin/gestao/turma/perfil-turma/aviso/inserir", "Aviso adicionado")
})


$("#course #buttonAddCourse").on("click", function (e) {
    application.addSinglePart("#addCourse", "/admin/gestao/curso/inserir", "Curso adicionado")
})


$(document).on("click", "#buttonAddRematrung", function (e) {
    application.addSinglePart("#addRematrung", "/admin/gestao/turma/perfil-turma/rematricular", "Aluno rematrículado")
    application.loadListElements("containerRematrugRequests", "/admin/gestao/turma/perfil-turma/solicitacoes-rematricula", "#dataClass")
})



$("#addTeacher").submit(function (e) {
    if (botaoClicado) {
        application.addMultipleParts(this, "/admin/professor/cadastro/inserir")
        botaoClicado = false
    }
})


$("#student-registration #addStudent").submit(function (e) {
    if (botaoClicado) {
        application.addMultipleParts(this, "/admin/aluno/cadastro/inserir")
        botaoClicado = false
    }
})


$("#admin-registration #addAdmin").submit(function (e) {
    application.addMultipleParts(this, "/admin/administrador/cadastro/inserir")
})


$("#buttonAddRematrug").on("click", function (e) {
    application.addSinglePart("#addRematrug", "/portal-aluno/rematricular", "")
})


$(document).on('click', "#buttonAddObservationStudent", function (e) {
    application.addSinglePart("#addObservation", "/admin/gestao/turma/perfil-turma/aluno/obervacoes/inserir", "Observação adicionada", "")
    $("#addObservation #description").val('')
})


$(document).on('click', "#buttonAddLackStudent", function (e) {

    application.addSinglePart("#addLack", "/admin/gestao/turma/perfil-turma/aluno/faltas/inserir", "Falta adicionada", "")
    management.availableLack()
    $("#addLack #totalLack").val('')

})


$(document).on("click", "#buttonAddDisciplineFinalData", function (e) {

    application.addSinglePart("#addDisciplineFinalData", "/admin/gestao/turma/perfil-turma/aluno/medias-finais/inserir", "Média adicionada", "")
    management.disciplineFinalData("#addDisciplineFinalData")
    management.disciplineAverageAlreadyAdded()

})


/////////////////////////////////////////////////////////////////////////


//* Sessão de funções relacionadas ao carregamento de elementos


$("#schoolTerm #collapseListSchoolTerm").on("click", function (e) {
    application.loadListElements("containerListSchoolTerm", "/admin/gestao/periodo-letivo/lista")
})


$("#classRoom #collapseListClassRoom").on("click", function (e) {
    application.loadListElements("containerListClassRoom", "/admin/gestao/sala/lista")
})


$("#course #collapseListCourse").on("click", function (e) {
    application.loadListElements("containerListCourse", "/admin/gestao/curso/lista")
})


$(document).on('click', "#profileClassModal [data-target='#class-note-history']", function (e) {
    application.loadListElements("containerListNote", "/admin/gestao/turma/perfil-turma/lista-notas", "#formClassId")
})


$("#discipline #collapseListDiscipline").on("click", function (e) {
    application.loadListElements("containerListDiscipline", "/admin/gestao/disciplina/lista")
})


$("#class #collapseListClass").on("click", function (e) {
    application.loadListElements("containerListClass", "/admin/gestao/turma/lista")
})


$(document).on("click", "#profileClassModal [data-target='#teacher-list']", function (e) {
    application.loadListElements("containerListTeacherClass", "/admin/gestao/turma/perfil-turma/turma-disciplina/professores-turma", "#formClassId")
    application.loadListElements("containerListStudentClass", "/admin/aluno/lista/listagem", "#formClassId")
})


$(document).on("click", "#profileClassModal [data-target='#list-discipline']", function (e) {
    application.loadListElements("containerListDisciplineClass", "/admin/gestao/turma/perfil-turma/turma-disciplina/professores-disciplina-turma", "#formClassId")
})


$(document).on("click", "#profileClassModal [data-target='#list-exam'], #profileClassModal [data-target='#class-profile-assessments'] ", function (e) {
    application.loadListElements("containerExamsList", "/admin/gestao/turma/perfil-turma/avaliacoes/lista", "#formClassId")
})


$(document).on("click", "#profileClassModal [data-target='#class-rematrug']", function (e) {
    application.loadListElements("containerRematrugRequests", "/admin/gestao/turma/perfil-turma/solicitacoes-rematricula", "#dataClass")
})


$(document).on("click", "#profileClassModal [data-target='#class-student-average']", function (e) {
    application.loadListElements("containerStudentsAverage", "/admin/gestao/turma/perfil-turma/medias-alunos", "#formClassId")
})


$(document).on("click", "#profileClassModal [data-target='#class-warning'], #profileClassModal [data-target='#list-warning']", function (e) {
    application.loadListElements("containerListWarning", "/admin/gestao/turma/perfil-turma/aviso/listagem", "#formClassId")
})


$(document).on("click", "#profileClassModal [data-target='#finalized-rematrecules']", function (e) {
    application.loadListElements("containerRematrugFinalized ", "/admin/gestao/turma/perfil-turma/rematricula/alunos-ja-matriculados", "#dataClass")
})


$(document).on("blur", "#profileClassModal #addExam #disciplineClass , #addExam #unity", function (e) {

    application.loadListElements("containerListExam", "/admin/gestao/turma/perfil-turma/avaliacoes/lista-recentes", "#addExam")

    $("#addExam #examValue").val("0")

    validation.checkRedundantName("/admin/gestao/turma/perfil-turma/avaliacoes/verificar-nome", "#addExam", "#buttonAddExam")

})


$(document).on("click", "#profileStudentModal [data-target='#class-student-profile-average']", function (e) {
    application.loadListElements("containerStudentsProfileAverage", "/admin/gestao/turma/perfil-turma/aluno/medias-gerais", "#addNote")
})


$(document).on("click", "[data-target='#averageNote']", function (e) {
    application.loadListElements("containerStudentsProfileAverage", "/admin/gestao/turma/perfil-turma/aluno/medias-gerais", "#seekAverageStudentProfile")
})


$(document).on("blur", "#profileClassModal #seekExam #disciplineClass , #seekExam #unity", function (e) {
    application.loadListElements("containerExamsList", "/admin/gestao/turma/perfil-turma/avaliacoes/buscar", "#seekExam")
})


$(document).on("blur", "#studentsAverageSeek #disciplineClass, #studentsAverageSeek #unity, #studentsAverageSeek #orderBy, #studentsAverageSeek #noteStatus, #studentsAverageSeek #averageType", function (e) {
    application.loadListElements("containerStudentsAverage", "/admin/gestao/turma/perfil-turma/medias-alunos/buscar", "#studentsAverageSeek")
})


$(document).on("blur", "#seekAverageStudentProfile #disciplineClass, #seekAverageStudentProfile #unity, #seekAverageStudentProfile #orderBy, #seekAverageStudentProfile #noteStatus, #seekAverageStudentProfile #averageType", function (e) {
    application.loadListElements("containerStudentsProfileAverage", "/admin/gestao/turma/perfil-turma/aluno/medias-gerais/buscar", "#seekAverageStudentProfile")
})


$(document).on("click", "#profileClassModal list-exam-list", function (e) {

    application.loadOptions([
        ["disciplineClass", "/admin/gestao/turma/perfil-turma/turma-disciplina/disciplinas-adicionadas", "clean", "", "#formClassId", "Nenhuma disciplina vincula a turma", "#buttonAddExam"]
    ])

    application.loadListElements("containerExamsList", "/admin/gestao/turma/perfil-turma/avaliacoes/lista", "#formClassId")

    $("#seekExam #disciplineClass").append($("<option>", {
        value: 0,
        text: "Todas"
    }))

})


$(document).on("click", "#profileStudentModal [data-target='#student-exam'] , #profileStudentModal [data-target='#rating-list']", function (e) {
    application.loadListElements("containerListNote", "/admin/gestao/turma/perfil-turma/aluno/lista-notas", "#addNote")
})


$(document).on("click", "#profileStudentModal [data-target='#class-profile-observation'] , #profileStudentModal [data-target='#observation-list']", function (e) {
    application.loadListElements("containerObservation", "/admin/gestao/turma/perfil-turma/aluno/obervacoes/lista", "#addObservation")
})


$(document).on("click", "#profileStudentModal [data-target='#class-profile-lack'], #profileStudentModal [data-target='#lack-list']", function (e) {
    application.loadListElements("containerListLack", "/admin/gestao/turma/perfil-turma/aluno/faltas/lista", "#addLack")
})


$(document).on("click", "#profileStudentModal [data-target='#class-profile-bulletin']", function (e) {
    application.loadListElements("containerBulletin", "/admin/gestao/turma/perfil-turma/aluno/boletim", "#addLack")
})


$('#studentPortal  [data-target="#bulletin"]').on('click', function (e) {
    application.loadListElements("containerBulletin", "/admin/gestao/turma/perfil-turma/aluno/boletim")
})


$(document).on("click", "#profileStudentModal [data-target='#class-profile-disciplineFinalData'], #profileStudentModal [data-target='#disciplineFinalData-list']", function (e) {
    application.loadListElements("containerDisciplineAverageList", "/admin/gestao/turma/perfil-turma/aluno/medias-finais/lista", "#addDisciplineFinalData")
})


$(document).on('click', '#buttonUpdateClass', function (e) {
    application.updateElement('#updateClass', '/admin/gestao/turma/perfil-turma/atualizar', 'Dados atualizados')
    application.loadListElements('containerClasseProfileModal', '/admin/gestao/turma/perfil-turma', '#updateClass')
})


/////////////////////////////////////////////////////////////////////////


//* Sessão das funções relacionadas ao carregamento de dados em campos options


$("#schoolTerm #collapseAddSchoolTerm").on("click", function () {
    application.loadOptions([
        ["schoolYear", "/admin/gestao/periodo-letivo/lista-anos-disponiveis", "clean", "", "Nenhum ano disponível"]
    ])
})


$("#classRoom #collapseAddClassRoom").on("click", function () {
    application.loadOptions([
        ["classroomNumber", "/admin/gestao/sala/lista-numeros-disponiveis", "clean", "", "Não há mais sala disponíveis", "#buttonAddClassRoom"]
    ])
})


$(document).on("click", "#profileClassModal [data-target='#add-discipline']", function (e) {
    application.loadOptions([
        ["disciplineClassAdd", "/admin/gestao/turma/perfil-turma/turma-disciplina/select-disciplinas", "clean", "#addClassDiscipline", "#formClassId", "Todas disciplinas já adicionadas", "#buttonAddClassDiscipline"]
    ])
})


$(document).on("click", "#profileClassModal [data-target='#add-assessments']", function (e) {
    application.loadOptions([
        ["disciplineClass", "/admin/gestao/turma/perfil-turma/turma-disciplina/disciplinas-adicionadas", "clean", "#addExam", "#formClassId", "Nenhuma disciplina vinculada a turma", "#buttonAddExam"]
    ])
})


$(document).on("click", "#profileStudentModal #student-exam [data-target='#add-reviews']", function (e) {
    application.loadOptions([
        ["examDescription", "/admin/gestao/turma/perfil-turma/aluno/notas-disponiveis", "clean", "#addNote", "#addNote", "Todas avaliações já adicionadas", "#buttonAddNoteStudent", "#buttonAddNoteStudent"]
    ])
})


/////////////////////////////////////////////////////////////////////////


//* Sessão das funções relacionadas ao carregamento e show do modals


$(document).on("click", "#discipline tr", function () {
    application.showModal(this.id, "/admin/gestao/disciplina/dados", "containerModal", "#modalDiscipline")
})


$(document).on("click", "#teacherPortal #table-class-teacher tbody tr", function (e) {
    application.showModal(this.id, "/admin/gestao/turma/perfil-turma", "containerClasseProfileModal", "#profileClassModal")
})


$(document).on("click", "#lack-table tr", function () {
    application.showModal(this.id, "/admin/gestao/turma/perfil-turma/aluno/faltas/dados", "containerModalLack", "#modalLack")
})


$(document).on("click", "#admin-table tr", function () {
    application.showModal(this.id, "/admin/administrador/lista/perfil", "containerAdminProfileModal ", "#profileAdminModal")
})


$(document).on("click", "#student-table tbody tr", function () {
    application.showModal(this.id, "/admin/aluno/lista/perfil-aluno", "containerStudentProfileModal", "#profileStudentModal", "profile")
})


$(document).on("click", "#teacher-table tbody tr", function () {
    application.showModal(this.id, "/admin/professor/lista/perfil-professor", "containerTeacherProfileModal", "#profileTeacherModal", "profile")
})


$(document).on("click", "#classe-table tbody tr", function () {
    application.showModal(this.id, "/admin/gestao/turma/perfil-turma", "containerClasseProfileModal", "#profileClassModal", "profile")
})


$(document).on("click", "#note-table tbody tr", function () {
    application.showModal(this.id, "/admin/gestao/turma/perfil-turma/aluno/lista-avaliacoes/dados", "containerModalNote", "#modalNote")
})


$(document).on("click", "#profileClassModal #list-exam tbody tr", function () {
    application.showModal(this.id, "/admin/gestao/turma/perfil-turma/avaliacoes/dados", "containerModalExam", "#modalExam")
})


$(document).on("click", "#sidebar #settings, #admin #settingsAdminPortal", function () {
    application.showModal(0, "/admin/configuracoes", "containerSettingsModal", "#settingsModal")
})


$(document).on("click", "#settingsTeacherPortal", function () {
    application.showModal(0, "/portal-docente/configuracoes", "containerSettingsModal", "#settingsModal")
})


$("#studentPortalNavbar img, #settingsStudentPortal").on("click", function (e) {
    application.showModal(0, "/portal-aluno/configuracoes", "containerSettingsModal", "#settingsModal")
})


$(document).on("click", "#profileClassModal #students-list tbody tr", function (e) {
    application.showModal(this.id, "/admin/aluno/lista/perfil-aluno", "containerStudentProfileModal", "#profileStudentModal")
})


// Aplicando máscaras de formatação em dados que estão dentro do modal


$('#settingsModal , #profileStudentModal').on('show.bs.modal', function (e) {
    $('#cpf').mask("000.000.000-00")
    $('#zipCode').mask("00000-000")
    $('#telephoneNumber').mask(("(00) 00000-0000"))
    $('#totalLack').mask(("00"))
})


// Configurações necessária para que um modal possa fica na frente do outro


$('.modal').on('show.bs.modal', function (event) {
    var idx = $('.modal:visible').length;
    $(this).css('z-index', 1040 + (10 * idx));
})

$('.modal').on('shown.bs.modal', function (event) {
    var idx = ($('.modal:visible').length) - 1; // raise backdrop after animation.
    $('.modal-backdrop').not('.stacked').css('z-index', 1039 + (10 * idx));
    $('.modal-backdrop').not('.stacked').addClass('stacked');
})

$('.modal').on('hidden.bs.modal', function (event) {
    if ($('.modal:visible').length > 0) {
        setTimeout(function () {
            $(document.body).addClass('modal-open');
        }, 0);
    }
});


/////////////////////////////////////////////////////////////////////////


//* Controles de edição, atualização e delete


$(document).on("click", ".edit-data-icon", function () {
    tools.editElement($(this).attr("idElement"), $(this).attr("formGroup"))
})


$(document).on("click", ".update-data-icon", function () {

    application.updateElement($(this).attr("idElement"), $(this).attr("routeUpdate"), $(this).attr("toastData"))
    application.loadListElements($(this).attr("container"), $(this).attr("routeList"), $(this).attr("routeData"))

    $(`${$(this).attr("idElement")} .form-control`).prop("disabled", true)

})


$(document).on("click", ".delete-data-icon", function () {
    application.deleteElement($(this).attr("idElement"), $(this).attr("routeDelete"), $(this).attr("toastData"))
    application.loadListElements($(this).attr("container"), $(this).attr("routeList"), $(this).attr("routeData"))
})


/////////////////////////////////////////////////////////////////////////


//* Sessão de carregamento de elementos através de busca


let timeout = null

$("#seekDiscipline input[name='seekName']").keyup(function (e) {
    if (timeout) clearTimeout(timeout)
    timeout = setTimeout(() => application.loadListElements("containerListDiscipline", "/admin/gestao/disciplina/buscar", "#seekDiscipline"), 1000)
})


$("#seekTeacher input[name='name']").keyup(function (e) {
    if (timeout) clearTimeout(timeout)
    timeout = setTimeout(() => application.loadListElements("containerListTeacher", "/admin/professor/lista/buscar", "#seekTeacher"), 1000)
})


$("#seekStudent input[name='name']").keyup(function (e) {
    if (timeout) clearTimeout(timeout);
    timeout = setTimeout(() => application.loadListElements("containerListStudent", "/admin/aluno/lista/buscar", "#seekStudent"), 1500)
})


$(document).on("keyup", "#seekExam #examDescription", function (e) {
    if (timeout) clearTimeout(timeout)
    timeout = setTimeout(() => application.loadListElements("containerExamsList", "/admin/gestao/turma/perfil-turma/avaliacoes/buscar", "#seekExam"), 1500)
})


$(document).on("keyup", "#studentsAverageSeek #name", function (e) {
    if (timeout) clearTimeout(timeout)
    timeout = setTimeout(() => application.loadListElements("containerStudentsAverage", "/admin/gestao/turma/perfil-turma/medias-alunos/buscar", "#studentsAverageSeek"), 1500)
})


$(document).on("keyup", "#seekNoteExamStudent #examDescription", function (e) {
    if (timeout) clearTimeout(timeout)
    timeout = setTimeout(() => application.loadListElements("containerListNote", "/admin/gestao/turma/perfil-turma/aluno/lista-avaliacoes/buscar", "#seekNoteExamStudent"), 2000)
})


$(document).on("click", '[data-target="#averageNote"]', function (e) {
    application.loadListElements("containerListNote", "/admin/gestao/turma/perfil-turma/aluno/lista-notas", "#seekNoteExamStudent")
})


$(document).on("keyup", "#seekNoteExamClass #examDescription", function (e) {
    if (timeout) clearTimeout(timeout)
    timeout = setTimeout(() => application.loadListElements("containerListNote", "/admin/gestao/turma/perfil-turma/lista-notas/buscar", "#seekNoteExamClass"), 1500)
})


$(document).on('change', "#seekNoteExamStudent select", function (e) {
    application.loadListElements("containerListNote", "/admin/gestao/turma/perfil-turma/aluno/lista-avaliacoes/buscar", "#seekNoteExamStudent")
})


$("#seekTeacher select").on('change', function (e) {
    application.loadListElements("containerListTeacher", "/admin/professor/lista/buscar", "#seekTeacher")
})


$(document).on('change', "#seekNoteExamClass select", function (e) {
    application.loadListElements("containerListNote", "/admin/gestao/turma/perfil-turma/lista-notas/buscar", "#seekNoteExamClass")
})


$(document).on('change', "#teacherPortal #seekClassTeacher .custom-select", function (e) {
    application.loadListElements("containerListClass", "/portal-docente/turmas/buscar", "#seekClassTeacher")
})


$(document).on("change", "#seekLackStudent select", function (e) {
    application.loadListElements("containerListLack", "/admin/gestao/turma/perfil-turma/aluno/faltas/buscar", "#seekLackStudent")
})


$("#seekClass .custom-select").change(() => application.loadListElements("containerListClass", "/admin/gestao/turma/buscar", "#seekClass"))


$("#seekDiscipline select[name='seekModality']").change(() => application.loadListElements("containerListDiscipline", "/admin/gestao/disciplina/buscar", "#seekDiscipline"))


$("#seekStudent select").change(() => application.loadListElements("containerListStudent", "/admin/aluno/lista/buscar", "#seekStudent"))


/////////////////////////////////////////////////////////////////////////


//* Sessão de validação de dados


let commonElements = ["#name , #birthDate", "#naturalness", "#nationality", "#motherName", "#fatherName", "#county", "#district", "#address", "#uf", "#email"]

commonElements.forEach(element => $(element).on("blur", e => validation.validateByContent(e.target.id)))

$("#cpf").on("blur", e => validation.cpfState(e.target.value))

$("#telephoneNumber").on("blur", e => validation.validateBySize(e.target.id, 11, "#telephoneField", "telephone-info"))

$("#photoField #profilePhoto").change(function (e) {
    validation.validateImage()
    tools.imagePreview(this, "#profilePhotoModal img")
})

$('#email').on('blur', e => validation.checkEmail(e.target.value))


/////////////////////////////////////////////////////////////////////////


//* Controle de notas e exames


$(document).on("keypress", `#addExam #examValue`, function (e) {
    if (timeout) clearTimeout(timeout)
    timeout = setTimeout(() => management.getNotesAlreadyAdded(`#addExam`, this, e, false), 500)
})


$(document).on("keypress", `#modalExam form #examValue`, function (e) {
    if (timeout) clearTimeout(timeout)
    timeout = setTimeout(() => management.getNotesAlreadyAdded($(this).attr("formId"), this, e, true, $(this).attr("initialValue")), 500)
})


$(document).on("keypress", `#modalNote form #noteValue`, function (e) {
    if (timeout) clearTimeout(timeout)
    timeout = setTimeout(() => management.getGrade(this, e, tools.round($(this).attr("initialValue"), 1)), 500)
})


$(document).on("keypress", "#addNote #noteValue", function (e) {
    let dataVector = $("#addNote #examDescription :selected").text().split(" - ")
    let noteValue = dataVector[dataVector.length - 1].replace("pontos", "").replace("décimos", "")

    if (timeout) clearTimeout(timeout)

    timeout = setTimeout(() => management.getGrade(this, e, tools.round(parseFloat(noteValue), 1)), 500)
})


$(document).on("change", "#addNote #examName", function (e) {
    $("#addNote #noteValue").val("0")
})


$(document).on("blur", "#addExam #examDescription", function (e) {
    validation.checkRedundantName("/admin/gestao/turma/perfil-turma/avaliacoes/verificar-nome", "#addExam", "#buttonAddExam")
})


/////////////////////////////////////////////////////////////////////////


//* Máscaras via @Jquery-mask-plugin


$(document).on("keypress", "#cpf", e => $(e.target).mask("000.000.000-00"))

$(document).on("keypress", "#zipCode", e => $(e.target).mask("00000-000"))

$(document).on("keypress", "#telephoneNumber", e => $(e.target).mask(("(00) 00000-0000")))

$(document).on("keypress", "#totalLack", e => $(e.target).mask(("00")))

$("input[name='acronym'] , input[name='uf']").on("keyup", e => e.target.value = e.target.value.toUpperCase())

//$("#accessCode").on("keypress", e => $(e.target).mask("000.000.000"))

$("#zipCode").on("blur", getLocation)

$(document).on('keypress', '#accessCode', function (e) {
    var regex = new RegExp("^[a-zA-Z0-9\b]+$")
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode)

    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
})

/////////////////////////////////////////////////////////////////////////


//* Campo de validação de dados no cadastro 


$("[data-target='#student-registration-finishing']").on("click", function (e) {
    validation.checkAllFields("#addStudent", 19, "#buttonAddStudent")
})


$("[data-target='#teacher-registration-finishing']").on("click", function (e) {
    validation.checkAllFields("#addTeacher", 16, "#buttonAddTeacher")
})


$("[data-target='#admin-registration-finishing']").on("click", function (e) {
    validation.checkAllFields("#addAdmin", 17, "#buttonAddAdmin")
})


/////////////////////////////////////////////////////////////////////////


//* Update de foto do perfil


$(document).on("click", "#profilePhotoModal img", function () {
    let file = document.getElementById("profilePhoto")
    file.click()
})


$(document).on("change", "#profilePhotoModal #profilePhoto", function () {

    let file = document.getElementById("profilePhoto")

    tools.imagePreview(file, "#profilePhotoModal img")

    $("#updateImg , #updateImgAdmin").attr("disabled", false)

})


$(document).on("click", "#profileStudentModal #updateImg", function (e) {
    application.addMultipleParts($("#formUpdateProfilePhoto")[0], "/admin/aluno/lista/perfil-aluno/atualizar-foto")
})


$(document).on("click", "#profileTeacherModal #updateImg", function (e) {
    application.addMultipleParts($("#formUpdateProfilePhoto")[0], "/admin/professor/lista/perfil-professor/atualizar-foto")
})


$(document).on("click", "#updateImgAdmin", function (e) {
    application.addMultipleParts($("#formUpdateProfilePhoto")[0], "/admin/configuracoes/atualizar-foto")
})


/////////////////////////////////////////////////////////////////////////


//* Sessão de estilo de elementos


$(".sidebar-lists [data-toggle='collapse']").on("click", function (e) {

    let link = (`[aria-controls="${$(this).attr("href")}"]`).replace("#", "")

    $(`#sidebar ${link} [fa-angle-right]`).toggleClass("fa-angle-down fa-angle-right")

})


$(".bars-xs , .sidebar-lists #minimize").on("click", function (e) {
    $(".panel-side").is(":hidden") ? $(".panel-side").show() : $(".panel-side").hide()
})


$("#bars").on("click", function (e) {
    sideState()
    $('.sidebar-responsive .sidebar-lists div').removeClass('show')
})


$(document).on('show.bs.modal', '.modal', function () {
    $('html').css("overflow", "hidden")
})


$(document).on('hide.bs.modal', '.modal', function () {
    $('html').css("overflow", "auto")
})


$(document).on("click", "#profileStudentModal #activateButtonSwitchClasses", function (e) {
    $("#buttonSwitchClasses").removeClass("disabled")
})


/////////////////////////////////////////////////////////////////////////


// Demais funções


$(document).on("change", "#profileStudentModal #addLack select", function (e) {
    management.availableLack()
})


$(document).on('change', '#updateClass .form-control', () => management.checkClass('#updateClass', 'update', '#buttonUpdateClass'))

$("#addClass .form-control").change(() => management.checkClass('#addClass', 'add', "#buttonAddClass"))

$(document).on("click", "[data-target='#add-disciplineFinalData']", function (e) {
    management.disciplineFinalData("#addDisciplineFinalData")
    management.disciplineAverageAlreadyAdded()
})


$(document).on("change", "#addDisciplineFinalData .form-control", function (e) {
    management.disciplineFinalData("#addDisciplineFinalData")
    management.disciplineAverageAlreadyAdded()
})


$(document).on("click", ".refesh-data-icon", function (e) {
    management.disciplineFinalData($(this).attr('form'))
})


$(document).on('click', '#updateStudentPortalData', function (e) {
    application.updateElement("#formSettingsStudent", "/portal-aluno/configuracoes/atualizar", "Configurações atualizadas")
    location.reload()
})


$(document).on('click', '.input-group-accessCode', function (e) {

    $('.input-group-accessCode i').toggleClass('fa-eye fa-eye-slash')

    if ($('#accessCode').attr('type') == 'password') {
        $('#accessCode').attr('type', 'text')
    } else {
        $('#accessCode').attr('type', 'password')
    }
})