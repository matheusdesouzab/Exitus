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

    if ($("#addNote #examDescription option").length == 0) {

        tools.showToast("Todas avaliações já atribuidas", "bg-info")

    } else {

        application.addSinglePart("#addNote", "/admin/gestao/turma/perfil-turma/aluno/adicionar-nota-avaliacao", "Nota adicionada", false)

        application.loadOptions([
            ["examDescription", "/admin/gestao/turma/perfil-turma/aluno/notas-disponiveis", "clean", "#addNote", "#addNote"]
        ])

        $("#addNote #noteValue").val("0")

        management.checkAvailableOptions("#addNote #examDescription", "#buttonAddNoteStudent", "Todas avaliações já foram atribuidas", "/admin/gestao/turma/perfil-turma/aluno/notas-disponiveis", "#addNote")

    }

})


$(document).on("click", "#profileClassModal #buttonAddClassDiscipline", function () {

    application.addSinglePart("#addClassDiscipline", "/admin/gestao/turma/perfil-turma/turma-disciplina/inserir", "Disciplina adicionada", false)

    application.loadOptions([
        ["availableSubjects", "/admin/gestao/turma/perfil-turma/turma-disciplina/select-disciplinas", "clean", "#addClassDiscipline", "#formClassId"],
        ["disciplineClassId", "/admin/gestao/turma/perfil-turma/turma-disciplina/disciplinas-adicionadas", "clean", "#seekExam", "#formClassId"]
    ])

    management.checkAvailableOptions("#addClassDiscipline #availableSubjects", "#buttonAddClassDiscipline", "Todas disciplinas já adicionadas", "/admin/gestao/turma/perfil-turma/turma-disciplina/select-disciplinas", "#formClassId")

})


$("#schoolTerm #buttonAddSchoolTerm").on("click", function () {

    tools.automaticDate()

    application.addSinglePart("#addSchoolTerm", "/admin/gestao/periodo-letivo/inserir", "Período letivo adicionado")

    application.loadOptions([
        ["schoolYear", "/admin/gestao/periodo-letivo/lista-anos-disponiveis", "clean", ""]
    ])

})


$("#classRoom #buttonAddClassRoom").on("click", function () {

    application.addSinglePart("#addClassRoom", "/admin/gestao/sala/inserir", "Sala de aula adicionada")

    application.loadOptions([
        ["classroomNumber", "/admin/gestao/sala/lista-numeros-disponiveis", "clean", ""]
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


$(document).on("click", "#profileClassModal [data-target='#accordion-class-data']", function (e) {

    application.loadListElements(".modal containerListTeacher", "/admin/gestao/turma/perfil-turma/turma-disciplina/professores-turma", "#formClassId")
    application.loadListElements(".modal containerListStudent", "/admin/aluno/lista/listagem", "#formClassId")

})


$(document).on("click", "#profileClassModal [data-target='#list-discipline']", function (e) {

    application.loadListElements("containerListDisciplineClass", "/admin/gestao/turma/perfil-turma/turma-disciplina/professores-disciplina-turma", "#formClassId")

})


$(document).on("click", "#profileClassModal [data-target='#list-exam'] , #profileClassModal [data-target='#class-profile-assessments'] ", function (e) {

    application.loadListElements("containerExamsList", "/admin/gestao/turma/perfil-turma/avaliacoes/lista", "#formClassId")

})


$(document).on("blur", "#profileClassModal #addExam #disciplineClassId , #addExam #unity", function (e) {

    application.loadListElements("containerListExam", "/admin/gestao/turma/perfil-turma/avaliacoes/lista-recentes", "#addExam")

    $("#addExam #examValue").val("0")

})


$(document).on("blur", "#profileClassModal #seekExam #disciplineClassId , #seekExam #unity", function (e) {

    application.loadListElements("containerExamsList", "/admin/gestao/turma/perfil-turma/avaliacoes/buscar", "#seekExam")

})


$(document).on("click", "#profileClassModal list-exam-list", function (e) {

    application.loadOptions([
        ["disciplineClassId", "/admin/gestao/turma/perfil-turma/turma-disciplina/disciplinas-adicionadas", "clean", "#addExam", "#formClassId"],
        ["disciplineClassId", "/admin/gestao/turma/perfil-turma/turma-disciplina/disciplinas-adicionadas", "clean", "#seekExam", "#formClassId"]
    ])

    $("#seekExam #disciplineClassId").append($("<option>", {
        value: 0,
        text: "Todas"
    }))

    application.loadListElements("containerExamsList", "/admin/gestao/turma/perfil-turma/avaliacoes/lista", "#formClassId")

})


$(document).on("click", "#profileStudentModal [data-target='#student-exam'] , #profileStudentModal [data-target='#rating-list']", function (e) {

    application.loadListElements("containerListNote", "/admin/gestao/turma/perfil-turma/aluno/lista-notas", "#addNote")

})


/////////////////////////////////////////////////////////////////////////


//* Option loading session


$("#schoolTerm #collapseAddSchoolTerm").on("click", function () {
    application.loadOptions([
        ["schoolYear", "/admin/gestao/periodo-letivo/lista-anos-disponiveis", "clean", ""]
    ])
})


$("#classRoom #collapseAddClassRoom").on("click", function () {
    application.loadOptions([
        ["classroomNumber", "/admin/gestao/sala/lista-numeros-disponiveis", "clean", ""]
    ])
})


$(document).on("click", "#profileClassModal [data-target='#add-discipline']", function (e) {

    application.loadOptions([
        ["availableSubjects", "/admin/gestao/turma/perfil-turma/turma-disciplina/select-disciplinas", "clean", "#addClassDiscipline", "#formClassId"]
    ])

    management.checkAvailableOptions("#addClassDiscipline #availableSubjects", "#buttonAddClassDiscipline", "Todas disciplinas já adicionadas", "/admin/gestao/turma/perfil-turma/turma-disciplina/select-disciplinas", "#formClassId")

    management.checkAvailableOptions("#addNote #examDescription", "#buttonAddNoteStudent", "Todas avaliações já foram atribuidas", "/admin/gestao/turma/perfil-turma/aluno/notas-disponiveis", "#addNote")

})


$(document).on("click", "#profileClassModal [data-target='#add-assessments']", function (e) {
    application.loadOptions([
        ["disciplineClassId", "/admin/gestao/turma/perfil-turma/turma-disciplina/disciplinas-adicionadas", "clean", "#addExam", "#formClassId"]
    ])
})


$(document).on("click", "#profileStudentModal #student-exam [data-target='#add-reviews']", function (e) {

    application.loadOptions([
        ["examDescription", "/admin/gestao/turma/perfil-turma/aluno/notas-disponiveis", "clean", "#addNote", "#addNote"]
    ])

    management.checkAvailableOptions("#addNote #examDescription", "#buttonAddNoteStudent", "Todas avaliações já foram atribuidas", "/admin/gestao/turma/perfil-turma/aluno/notas-disponiveis", "#addNote")

})


/////////////////////////////////////////////////////////////////////////


//* Modal opening session


$(document).on("click", "#discipline tr", function () {
    application.showModal(this.id, "/admin/gestao/disciplina/dados", "containerModal", "#modalDiscipline")
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

    $("#profileStudentModal .modal-body").css("opacity", "0.5")

    application.showModal(this.id, "/admin/gestao/turma/perfil-turma/aluno/lista-avaliacoes/dados", "containerModalNote", "#modalNote")
})


$(document).on("click", "#profileClassModal #list-exam tbody tr", function () {

    $("#profileClassModal .modal-body").css("opacity", "0.5")

    application.showModal(this.id, "/admin/gestao/turma/perfil-turma/avaliacoes/dados", "containerModalExam", "#modalExam")

})


$('.modal').on('shown.bs.modal', function (event) {
    var idx = ($('.modal:visible').length) - 1; // raise backdrop after animation.
    $('.modal-backdrop').not('.stacked').css('z-index', 1039 + (10 * idx));
    $('.modal-backdrop').not('.stacked').addClass('stacked');
})



$(document).on("click", "#profileClassModal #students-list tbody tr", function (e) {

    application.showModal(this.id, "/admin/aluno/lista/perfil-aluno", "containerStudentProfileModal", "#profileStudentModal")

})


$(document).on("hide.bs.modal", "#modalExam", function (event) {

    $("#profileClassModal .modal-body").css("opacity", "1.0")

})


$(document).on("hide.bs.modal", "#modalNote", function (event) {

    $("#profileStudentModal .modal-body").css("opacity", "1.0")

})


/* $(document).on("shown.bs.modal", "#profileStudentModal , #profileTeacherModal , #profileClassModal", function (e) {

    $(this).before($(".modal-backdrop"))
    $(this).css("z-index", parseInt($(".modal-backdrop").css("z-index")) + 1)

    $('#cpf').mask('000.000.000-00')

    $('#zipCode').mask('00000-000')

    $("#telephoneNumber").mask(('(00) 00000-0000'))
}) */

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


$(document).on("keyup", "#seekNoteExam #examDescription", function (e) {

    if (timeout) clearTimeout(timeout)

    timeout = setTimeout(() => application.seekElement("#seekNoteExam", "containerListNote", "/admin/gestao/turma/perfil-turma/aluno/lista-avaliacoes/buscar"), 2000)

})


$(document).on("keyup", "#seekNoteExam #examDescription", function (e) {

    if (timeout) clearTimeout(timeout)

    timeout = setTimeout(() => application.seekElement("#seekNoteExam", "containerListNote", "/admin/gestao/turma/perfil-turma/lista-notas/buscar"), 1500)

})


$(document).on('change', "#seekNoteExam select", function (e){
    
    application.seekElement("#seekNoteExam", "containerListNote", "/admin/gestao/turma/perfil-turma/lista-notas/buscar")

})


$("#seekClass .custom-select").change(() => application.seekElement("#seekClass", "containerListClass", "/admin/gestao/turma/buscar"))

$("#seekDiscipline select[name='seekModality']").change(() => application.seekElement("#seekDiscipline", "containerListDiscipline", "/admin/gestao/disciplina/buscar"))

$("#seekStudent select").change(() => application.seekElement("#seekStudent", "containerListStudent", "/admin/aluno/lista/buscar"))





/////////////////////////////////////////////////////////////////////////


//* Validation session


let commonElements = ["#name , #birthDate", "#naturalness", "#nationality", "#motherName", "#fatherName", "#county", "#district", "#address", "#uf" , "#email"]

commonElements.forEach(element => $(element).on("blur", e => validation.validateByContent(e.target.id)))

$("#cpf").on("blur", e => validation.cpfState(e.target.value))

$("#telephoneNumber").on("blur", e => validation.validateBySize(e.target.id, 11, "#telephoneField", "telephone-info"))

$("#photoField #profilePhoto").change(function (e) {
    validation.validateImage()
    tools.imagePreview(this, "#profilePhotoModal img")
})


/////////////////////////////////////////////////////////////////////////


//* Note and exam controllers session


$(document).on("keyup", `#addExam #examValue`, function (e) {

    management.getNotesAlreadyAdded(`#addExam`, this, e, false)

})


$(document).on("keyup", `#modalExam form #examValue`, function (e) {

    management.getNotesAlreadyAdded($(this).attr("formId"), this, e, true, $(this).attr("initialValue"))

})


$(document).on("keyup", `#modalNote form #noteValue`, function (e) {

    management.getGrade(this, e, tools.round($(this).attr("initialValue"), 1))

})


$(document).on("keyup", "#addNote #noteValue", function (e) {

    let dataVector = $("#addNote #examDescription :selected").text().split(" - ")

    let noteValue = dataVector[3].replace("pontos", "").replace("décimos", "")

    management.getGrade(this, e, tools.round(parseFloat(noteValue), 1))

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

$("input[name='acronym']").on("keyup", e => e.target.value = e.target.value.toUpperCase())

$("#zipCode").on("blur", getLocation)

/////////////////////////////////////////////////////////////////////////


//* Field validation of students is teachers


$("[data-target='#student-registration-finishing']").on("click", function (e) {

    let name = $("#name").val().split(" ", 1)
    $("#name").val() == "" ? "" : $("[givenName]").text(`de ${name[0]}`)

    validation.checkAllFields("#addStudent", 18, "#buttonAddStudent", "containerStudentRegistrationStatus", `<p class="col-lg-12 mb-4 p-0">Todos os campos foram preenchidos de forma correta <i class="fas text-success fa-check-circle ml-2"></i></p><p class = "col-lg-12 p-0 font-weight-bold"><i class = "fas text-info fa-info-circle mr-2"></i> Informe ao aluno seu código de acesso ao portal</p><div class="row d-flex justify-content-center "><p accessCode class="card col-lg-5 mx-auto font-weight-bold text-center mt-4 mb-3"></p></div>`, `<p class="col-lg-12 mb-4 p-0">Verifique se todos os campos foram preenchidos de forma correta <i class="fas text-info fa-info-circle mr-2"></i></p></div>`)
})


$("[data-target='#teacher-registration-finishing']").on("click", function (e) {

    let name = $("#name").val().split(" ", 1)
    $("#name").val() == "" ? "" : $("[givenName]").text(`de ${name[0]}`)

    validation.checkAllFields("#addTeacher", 16, "#buttonAddTeacher", "containerTeacherRegistrationStatus", `<p class="col-lg-12 mb-4 p-0">Todos os campos foram preenchidos de forma correta <i class="fas text-success fa-check-circle ml-2"></i></p><p class = "col-lg-12 p-0 font-weight-bold"><i class = "fas text-info fa-info-circle mr-2"></i> Informe ao professor seu código de acesso ao portal</p><div class="row d-flex justify-content-center "><p accessCode class="card col-lg-5 mx-auto font-weight-bold text-center mt-4 mb-3"></p></div>`, `<p class="col-lg-12 mb-4 p-0">Verifique se todos os campos foram preenchidos de forma correta <i class="fas text-info fa-info-circle mr-2"></i></p></div>`)
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

    e.preventDefault()

    application.addMultipleParts($("#formUpdateProfilePhoto")[0], "/admin/aluno/lista/perfil-aluno/atualizar-foto")

    application.loadListElements("containerStudentProfileModal", "/admin/aluno/lista/perfil-aluno", "#formUpdateProfilePhoto")

    application.loadListElements("containerListStudent", "/admin/aluno/lista/listagem")

    tools.showToast("Foto do perfil atualizada", "bg-success")

})


$(document).on("click", "#profileTeacherModal #updateImg", function (e) {

    e.preventDefault()

    application.addMultipleParts($("#formUpdateProfilePhoto")[0], "/admin/professor/lista/perfil-professor/atualizar-foto")

    application.loadListElements("containerTeacherProfileModal", "/admin/professor/lista/perfil-professor", "#formUpdateProfilePhoto")

    application.loadListElements("containerListTeacher", "/admin/professor/lista/listagem")

    tools.showToast("Foto do perfil atualizada", "bg-success")

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

$("#teacherPortal #class tbody tr").on('click', function(e){

    application.showModal(this.id, "/admin/gestao/turma/perfil-turma", "containerClasseProfileModal", "#profileClassModal")

})

$("#teacherPortal #seekClass .custom-select").change(() => application.seekElement("#seekClass", "containerListClass", "/portal-docente/turmas/buscar"))


$(document).on('click', "#profileClassModal [data-target='#class-note-history']" , function(e){

    application.loadListElements("containerListNote", "/admin/gestao/turma/perfil-turma/lista-notas", "#formClassId")

})