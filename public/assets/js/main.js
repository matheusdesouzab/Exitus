// Declaration of required objects

const validation = new Validation()
const application = new Application()
const tools = new Tools()
const management = new Management()


//* Element insertion session


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

        ["disciplineClass", "/admin/gestao/turma/perfil-turma/turma-disciplina/select-disciplinas", "clean", "#addClassDiscipline", "#formClassId", "Todas disciplinas já adicionadas", "#buttonAddClassDiscipline"],

        ["disciplineClass", "/admin/gestao/turma/perfil-turma/turma-disciplina/disciplinas-adicionadas", "clean", "#seekExam", "#formClassId", "Nenhuma disciplina vincula a turma"]

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


$("#class #buttonAddClass").on("click", function () {

    application.addSinglePart("#addClass", "/admin/gestao/turma/inserir", "Turma adicionada")

    management.checkClass()

})


$("#addClass .form-control").change(management.checkClass)


$("#discipline #buttonAddDiscipline").on("click", function (e) {

    application.addSinglePart("#addDiscipline", "/admin/gestao/disciplina/inserir", "Disciplina adicionada")

})


$("#course #buttonAddCourse").on("click", function (e) {

    application.addSinglePart("#addCourse", "/admin/gestao/curso/inserir", "Curso adicionado")

})


$("#buttonAddStudent").on("click", function (e) {

    application.addMultipleParts(this, "/admin/aluno/cadastro/inserir")

})


$("#buttonAddTeacher").on("click", function (e) {

    application.addMultipleParts(this, "/admin/professor/cadastro/inserir")

})


$(document).on('click', "#buttonAddObservationStudent", function (e) {

    application.addSinglePart("#addObservation", "/admin/gestao/turma/perfil-turma/aluno/obervacoes/insert", "Observação adicionada", "")

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


//* Data loading session


$("#schoolTerm #collapseListSchoolTerm").on("click", function (e) {

    application.loadListElements("containerListSchoolTerm", "/admin/gestao/periodo-letivo/lista")

})


$("#classRoom #collapseListClassRoom").on("click", function (e) {

    application.loadListElements("containerListClassRoom", "/admin/gestao/sala/lista")

})


$("#course #collapseListCourse").on("click", function (e) {

    application.loadListElements("containerListCourse", "/admin/gestao/curso/lista")

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


$(document).on("click", "#profileClassModal [data-target='#list-exam'] , #profileClassModal [data-target='#class-profile-assessments'] ", function (e) {

    application.loadListElements("containerExamsList", "/admin/gestao/turma/perfil-turma/avaliacoes/lista", "#formClassId")

})


$(document).on("blur", "#profileClassModal #addExam #disciplineClass , #addExam #unity", function (e) {

    application.loadListElements("containerListExam", "/admin/gestao/turma/perfil-turma/avaliacoes/lista-recentes", "#addExam")

    $("#addExam #examValue").val("0")

})


$(document).on("blur", "#profileClassModal #seekExam #disciplineClass , #seekExam #unity", function (e) {

    application.loadListElements("containerExamsList", "/admin/gestao/turma/perfil-turma/avaliacoes/buscar", "#seekExam")

})


$(document).on("click", "#profileClassModal list-exam-list", function (e) {

    application.loadOptions([
        ["disciplineClass", "/admin/gestao/turma/perfil-turma/turma-disciplina/disciplinas-adicionadas", "clean", "", "#formClassId", "Nenhuma disciplina vincula a turma", "#buttonAddExam"],

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


$('#studentPortal  [data-target="#bulletin"]').on('click', function(e){
    application.loadListElements("containerBulletin", "/admin/gestao/turma/perfil-turma/aluno/boletim")
})


$(document).on("click", "#profileStudentModal [data-target='#class-profile-disciplineFinalData'], #profileStudentModal [data-target='#disciplineFinalData-list']", function (e) {

    application.loadListElements("containerDisciplineAverageList", "/admin/gestao/turma/perfil-turma/aluno/medias-finais/lista", "#addDisciplineFinalData")

})


$(document).on("click", "#printBuleetin", function (e) {

    let myTable = document.getElementById('table-bulletin-print').innerHTML
    var win = window.open('', '', 'height=700,width=700')
    win.document.write('<html><head>')
    win.document.write('<title>Boletim</title>')
    win.document.write('<meta charset="utf-8">')
    win.document.write('<link href="/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">')
    win.document.write('</head>')
    win.document.write('<body>')
    win.document.write('<h2>Aluno: Matheus de Souza</h2>')
    win.document.write(myTable)
    win.document.write('</body></html>')
    win.document.close()
    win.print()

})


$(document).on("click", "[data-target='#add-disciplineFinalData']", function (e) {
    management.disciplineFinalData("#addDisciplineFinalData")
    management.disciplineAverageAlreadyAdded()
})


$(document).on("change", "#addDisciplineFinalData .form-control", function (e) {
    management.disciplineFinalData("#addDisciplineFinalData")
    management.disciplineAverageAlreadyAdded()
})


$(document).on("click", ".refesh-data-icon", function(e){
    management.disciplineFinalData($(this).attr('form'))
})


/////////////////////////////////////////////////////////////////////////


//* Option loading session


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
        ["disciplineClass", "/admin/gestao/turma/perfil-turma/turma-disciplina/select-disciplinas", "clean", "#addClassDiscipline", "#formClassId", "Todas disciplinas já adicionadas", "#buttonAddClassDiscipline"]
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


$(document).on("change", "#profileStudentModal #addLack select", function (e) {

    management.availableLack()

})


/////////////////////////////////////////////////////////////////////////


//* Modal opening session


$(document).on("click", "#discipline tr", function () {
    application.showModal(this.id, "/admin/gestao/disciplina/dados", "containerModal", "#modalDiscipline")
})


$(document).on("click", "#lack-table tr", function () {
    application.showModal(this.id, "/admin/gestao/turma/perfil-turma/aluno/faltas/dados", "containerModalLack", "#modalLack")
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

$(document).on("click", "#sidebar #settings", function () {

    application.showModal(0, "/admin/configuracoes", "containerSettingsModal", "#settingsModal")

})



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


$(document).on("click", "#profileClassModal #students-list tbody tr", function (e) {

    application.showModal(this.id, "/admin/aluno/lista/perfil-aluno", "containerStudentProfileModal", "#profileStudentModal")

})

/////////////////////////////////////////////////////////////////////////


//* Controls for editing, updating and deleting


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


//* Element search session


let timeout = null


$("#seekDiscipline input[name='seekName']").keyup(function (e) {

    if (timeout) clearTimeout(timeout)

    timeout = setTimeout(() => application.seekElement("#seekDiscipline", "containerListDiscipline", "/admin/gestao/disciplina/buscar"), 1000)

})


$("#seekStudent input[name='name']").keyup(function (e) {

    if (timeout) clearTimeout(timeout);

    timeout = setTimeout(() => application.seekElement("#seekStudent", "containerListStudent", "/admin/aluno/lista/buscar"), 1500)

})


$(document).on("keyup", "#seekExam #examDescription", function (e) {

    if (timeout) clearTimeout(timeout)

    timeout = setTimeout(() => application.seekElement("#seekExam", "containerExamsList", "/admin/gestao/turma/perfil-turma/avaliacoes/buscar"), 1500)

})


$(document).on("keyup", "#seekNoteExamStudent #examDescription", function (e) {

    if (timeout) clearTimeout(timeout)

    timeout = setTimeout(() => application.seekElement("#seekNoteExamStudent", "containerListNote", "/admin/gestao/turma/perfil-turma/aluno/lista-avaliacoes/buscar"), 2000)

})


$(document).on("keyup", "#seekNoteExamClass #examDescription", function (e) {

    if (timeout) clearTimeout(timeout)

    timeout = setTimeout(() => application.seekElement("#seekNoteExamClass", "containerListNote", "/admin/gestao/turma/perfil-turma/lista-notas/buscar"), 1500)

})


$(document).on('change', "#seekNoteExamStudent select", function (e) {

    application.seekElement("#seekNoteExamStudent", "containerListNote", "/admin/gestao/turma/perfil-turma/aluno/lista-avaliacoes/buscar")

})

$(document).on('change', "#seekNoteExamClass select", function (e) {

    application.seekElement("#seekNoteExamClass", "containerListNote", "/admin/gestao/turma/perfil-turma/lista-notas/buscar")

})


$("#seekClass .custom-select").change(() => application.seekElement("#seekClass", "containerListClass", "/admin/gestao/turma/buscar"))

$("#seekDiscipline select[name='seekModality']").change(() => application.seekElement("#seekDiscipline", "containerListDiscipline", "/admin/gestao/disciplina/buscar"))

$("#seekStudent select").change(() => application.seekElement("#seekStudent", "containerListStudent", "/admin/aluno/lista/buscar"))

$(document).on("change", "#seekLackStudent select", function (e) {
    application.loadListElements("containerListLack", "/admin/gestao/turma/perfil-turma/aluno/faltas/buscar", "#seekLackStudent")
})

/////////////////////////////////////////////////////////////////////////


//* Validation session


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


//* Note and exam controllers session


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

    let noteValue = dataVector[3].replace("pontos", "").replace("décimos", "")

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


//* Masks via @Jquery-mask-plugin


$(document).on("keypress", "#cpf", e => $(e.target).mask("000.000.000-00"))

$(document).on("keypress", "#zipCode", e => $(e.target).mask("00000-000"))

$(document).on("keypress", "#telephoneNumber", e => $(e.target).mask(("(00) 00000-0000")))

$(document).on("keypress", "#totalLack", e => $(e.target).mask(("00")))

$("input[name='acronym'] , input[name='uf']").on("keyup", e => e.target.value = e.target.value.toUpperCase())

$("#zipCode").on("blur", getLocation)

/////////////////////////////////////////////////////////////////////////


//* Field validation of students is teachers


$("[data-target='#student-registration-finishing']").on("click", function (e) {

    validation.checkAllFields("#addStudent", 19, "#buttonAddStudent")
})


$("[data-target='#teacher-registration-finishing']").on("click", function (e) {

    validation.checkAllFields("#addTeacher", 16, "#buttonAddTeacher")
})


/////////////////////////////////////////////////////////////////////////


//* Image update control session


$(document).on("click", "#profilePhotoModal img", function () {

    let file = document.getElementById("profilePhoto")

    file.click()

})


$(document).on("change", "#profilePhotoModal #profilePhoto", function () {

    let file = document.getElementById("profilePhoto")

    tools.imagePreview(file, "#profilePhotoModal img")

    $("#updateImg").attr("disabled", false)

})


$(document).on("click", "#profileStudentModal #updateImg", function (e) {

    application.addMultipleParts($("#formUpdateProfilePhoto")[0], "/admin/aluno/lista/perfil-aluno/atualizar-foto")

    /* application.loadListElements("containerStudentProfileModal", "/admin/aluno/lista/perfil-aluno", "#formUpdateProfilePhoto")

    application.loadListElements("containerListStudent", "/admin/aluno/lista/listagem") */

    //tools.showToast("Foto do perfil atualizada", "bg-success")

})


$(document).on("click", "#profileTeacherModal #updateImg", function (e) {

    application.addMultipleParts($("#formUpdateProfilePhoto")[0], "/admin/professor/lista/perfil-professor/atualizar-foto")

    //application.loadListElements("containerTeacherProfileModal", "/admin/professor/lista/perfil-professor", "#formUpdateProfilePhoto")

    //application.loadListElements("containerListTeacher", "/admin/professor/lista/listagem")

    //tools.showToast("Foto do perfil atualizada", "bg-success")

})


/////////////////////////////////////////////////////////////////////////


//* Session style elements


$(".sidebar-lists [data-toggle='collapse']").on("click", function (e) {

    let link = (`[aria-controls="${$(this).attr("href")}"]`).replace("#", "")

    $(`#sidebar ${link} [fa-angle-right]`).toggleClass("fa-angle-down fa-angle-right")

})


$(".bars-xs , .sidebar-header span").on("click", function (e) {

    $(".panel-side").is(":hidden") ? $(".panel-side").show() : $(".panel-side").hide()
})


$("#bars").on("click", sideState)



$("#accessCode").on("keypress", e => $(e.target).mask("000.000"))

$("#teacherPortal #class tbody tr").on('click', function (e) {

    application.showModal(this.id, "/admin/gestao/turma/perfil-turma", "containerClasseProfileModal", "#profileClassModal")

})

$("#teacherPortal #seekClass .custom-select").change(() => application.seekElement("#seekClass", "containerListClass", "/portal-docente/turmas/buscar"))


$(document).on('click', "#profileClassModal [data-target='#class-note-history']", function (e) {

    application.loadListElements("containerListNote", "/admin/gestao/turma/perfil-turma/lista-notas", "#formClassId")

})