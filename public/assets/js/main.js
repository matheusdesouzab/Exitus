// * Management


// School Term


$('#collapseListSchoolTerm').on('click', () => loadListElements('containerListSchoolTerm', '/admin/gestao/periodo-letivo/lista'))


$('#collapseAddSchoolTerm').on('click', function () {
    loadOptions([
        ['schoolYear', '/admin/gestao/periodo-letivo/lista-anos-disponiveis', 'clean', '']
    ])
})


$('#buttonAddSchoolTerm').on('click', function () {

    automaticDate()

    addSinglePart('#addSchoolTerm', '/admin/gestao/periodo-letivo/inserir', 'Período letivo adicionado')

    loadOptions([
        ['schoolYear', '/admin/gestao/periodo-letivo/lista-anos-disponiveis', 'clean', '']
    ])

})



// ClassRoom


$('#collapseListClassRoom').on('click', () => loadListElements('containerListClassRoom', '/admin/gestao/sala/lista'))


$('#collapseAddClassRoom').on('click', function () {

    loadOptions([
        ['classroomNumber', '/admin/gestao/sala/lista-numeros-disponiveis', 'clean', '']
    ])

})


$('#buttonAddClassRoom').on('click', function () {

    addSinglePart('#addClassRoom', '/admin/gestao/sala/inserir', 'Sala de aula adicionada')

    loadOptions([
        ['classroomNumber', '/admin/gestao/sala/lista-numeros-disponiveis', 'clean', '']
    ])

})


// Course


$('#collapseListCourse').on('click', () => loadListElements('containerListCourse', '/admin/gestao/curso/lista'))


$('#buttonAddCourse').on('click', () => addSinglePart('#addCourse', '/admin/gestao/curso/inserir', 'Curso adicionado'))


// Discipline


$('#collapseListDiscipline').on('click', () => loadListElements('containerListDiscipline', '/admin/gestao/disciplina/lista'))


$('select[name="seekModality"]').change(() => seekElement('#seekDiscipline', 'containerListDiscipline', '/admin/gestao/disciplina/buscar'))


let timeout = null


$('input[name="seekName"]').keyup(function (e) {

    if (timeout) clearTimeout(timeout)

    timeout = setTimeout(() => seekElement('#seekDiscipline', 'containerListDiscipline', '/admin/gestao/disciplina/buscar'), 2000)

})


// Class


$('#buttonAddClass').on('click', function () {

    addSinglePart('#addClass', '/admin/gestao/turma/inserir', 'Turma adicionada')

    checkClass()

})


$(document).on('click', '[data-target="#class-profile-data"]', function () {

    loadListElements('containerListTeacher', '/admin/gestao/turma/perfil-turma/turma-disciplina/professores-turma', '#formClassId')

})


$('[data-target="#students-list"]').on('click', function () {

    loadListElements('.modal containerListStudent', '/admin/aluno/lista/listagem')

})


$(document).on('click', '#buttonAddClassDiscipline', function () {


    if ($('#addClassDiscipline #discipline option').length == 0 || $('#addClassDiscipline #teacher option').length == 0) {

        $("#modalErrorDisciplineClass").modal("show")

    } else {

        addSinglePart('#addClassDiscipline', '/admin/gestao/turma/perfil-turma/turma-disciplina/inserir', 'Disciplina adicionada', false)

        loadListElements('containerSelectDiscipline', '/admin/gestao/turma/perfil-turma/turma-disciplina/select-disciplinas', '#addClassDiscipline')

        loadListElements('containerListDisciplineClass', '/admin/gestao/turma/perfil-turma/turma-disciplina/professores-disciplina-turma', '#formClassId')

    }

})


$('#collapseListClass').on('click', () => loadListElements('containerListClass', '/admin/gestao/turma/lista'))


$('#seekClass .custom-select').change(() => seekElement('#seekClass', 'containerListClass', '/admin/gestao/turma/buscar'))


$('#addClass .form-control').change(checkClass)


//---------------------------------------------------------------------------------------------------------------------------------


//? Show modal


$(document).on('click', '#discipline tr', function () {
    showModal(this.id, '/admin/gestao/disciplina/dados', 'containerModal', '#modalDiscipline')
})


$(document).on('click', '#student-table tbody tr', function () {
    showModal(this.id, '/admin/aluno/lista/perfil-aluno', 'containerStudentProfileModal', '#profileStudentModal', 'profile')
})


$(document).on('click', '#teacher-table tbody tr', function () {
    showModal(this.id, '/admin/professor/lista/perfil-professor', 'containerTeacherProfileModal', '#profileTeacherModal', 'profile')
})


$(document).on('click', '#classe-table tbody tr', function () {
    showModal(this.id, '/admin/gestao/turma/perfil-turma', 'containerClasseProfileModal', '#profileClasseModal', 'profile')
})


$(document).on('click', '#list-assessments tbody tr', function () {


    $('#profileClasseModal .modal-body').css("opacity", "0.5")

    showModal(this.id, '/admin/gestao/turma/perfil-turma/avaliacoes/dados', 'containerModalExam', '#modalExam')

})


$(document).on('hide.bs.modal', '#modalExam', function (event) {

    $('#profileClasseModal .modal-body').css("opacity", "1.0")

})


//? Upper Case


$('input[name="acronym"]').on('keyup', e => e.target.value = e.target.value.toUpperCase())


//? Add discipline


$('#buttonAddDiscipline').on('click', () => addSinglePart('#addDiscipline', '/admin/gestao/disciplina/inserir', 'Disciplina adicionada'))


//---------------------------------------------------------------------------------------------------------------------------------


// Edit , update and delete


$(document).on('click', '.edit-data-icon', function () {

    editElement($(this).attr('idElement'), $(this).attr('formGroup'))

})


$(document).on('click', '.update-data-icon', function () {

    updateElement($(this).attr('idElement'), $(this).attr('routeUpdate'), $(this).attr('toastData'))

    loadListElements($(this).attr('container'), $(this).attr('routeList'), $(this).attr('routeData'))

    $(`${$(this).attr('idElement')} .form-control`).prop('disabled', true)

})


$(document).on('click', '.delete-data-icon', function () {

    deleteElement($(this).attr('idElement'), $(this).attr('routeDelete'), $(this).attr('toastData'))

    loadListElements($(this).attr('container'), $(this).attr('routeList'), $(this).attr('routeData'))

})


//************************************************************************** */


//* Student 


$("#buttonAddStudent").click(() => addMultipleParts(this, '/admin/aluno/cadstro/inserir'))


$('#seekStudent input[name="name"]').keyup(function (e) {

    if (timeout) clearTimeout(timeout);

    timeout = setTimeout(() => seekElement('#seekStudent', 'containerListStudent', '/admin/aluno/lista/buscar'), 1500)

})


$('#seekStudent select').change(() => seekElement('#seekStudent', 'containerListStudent', '/admin/aluno/lista/buscar'))


//? Masks


$(document).on('keypress', '#cpf', e => $(e.target).mask('000.000.000-00'))

$(document).on('keypress', '#zipCode', e => $(e.target).mask('00000-000'))

$(document).on('keypress', '#telephone', e => $(e.target).mask(('(00) 00000-0000')))


$('#zipCode').on('blur', getLocation)


//* General


//? Side state


$("#bars").on("click", sideState)


$('.bars-xs').on('click', e => $('.container-fluid .row div:nth-child(1)').toggleClass('panel-side-xs panel-side'))


//? Validation


let validation = new Validation()
let commonElements = ['#name , #birthDate', '#naturalness', '#nationality', '#motherName', '#fatherName']
let address = ['#county', '#district', '#address', '#uf']


commonElements.forEach(element => $(element).on('blur', e => validation.validateByContent(e.target.id)))

address.forEach(element => $(element).on('blur', e => validation.validateByContent(e.target.id)))


$('#cpf').on('blur', e => validation.cpfState(e.target.value))

$('#telephone').on('blur', e => validation.validateBySize(e.target.id, 11, '#telephoneField', 'telephone-info'))


$('#profilePhoto').change(function () {
    validation.validateImage()
    validation.imagePreview(this)
})


$('[data-target="#student-registration-class"]').on('click', () => validation.checkAllFields('#addStudent', 18, '#buttonAddStudent'))
$('#teacherAddressOthers .form-control').on('blur', () => validation.checkAllFields('#addTeacher', 15, '#buttonAddTeacher'))



$(document).on('click', '#buttonAddExam', function (e) {

    let $form = $('#addExam').serialize()

    $.ajax({
        type: "GET",
        url: "/admin/gestao/turma/perfil-turma/avaliacoes/soma-notas-unidade",
        data: $form,
        dataType: 'json',
        success: response => {

            let sumNote = response[0].sum_notes || 0

            if (sumNote >= 10) {

                showToast('Limite de nota atigindo', 'bg-info')

            } else {

                addSinglePart('#addExam', '/admin/gestao/turma/perfil-turma/avaliacoes/inserir', 'Avaliação adicionada', false)

                $('#addExam #examValue').val('0.0')
                $('#addExam #examDescription').val('')
                $('#addExam #realizeDate').val('')

            }

        }
    })

})


$(document).on('click', '[data-target="#add-discipline"]', function (e) {

    loadListElements('containerSelectDiscipline', '/admin/gestao/turma/perfil-turma/turma-disciplina/select-disciplinas', '#addClassDiscipline')

})


$(document).on('click', "[data-target='#add-assessments']", function (e) {

    loadOptions([
        ['disciplineClassId', '/admin/gestao/turma/perfil-turma/turma-disciplina/disciplinas-adicionadas', 'clean', '#addExam', "#formClassId"]
    ])

})


$(document).on('click', '[data-target="#class-profile-assessments"]', function (e) {

    loadOptions([
        ['disciplineClassId', '/admin/gestao/turma/perfil-turma/turma-disciplina/disciplinas-adicionadas', 'clean', '#addExam', "#formClassId"],
        ['disciplineClassId', '/admin/gestao/turma/perfil-turma/turma-disciplina/disciplinas-adicionadas', 'clean', '#seekExam', "#formClassId"]
    ])

    $('#seekExam #disciplineClassId').append($('<option>', {
        value: 0,
        text: 'Todas'
    }));

    loadListElements('containerExamsList', '/admin/gestao/turma/perfil-turma/avaliacoes/lista', '#formClassId')


})


$(document).on('click', '[data-target="#list-assessments"]', function (e) {

    loadListElements('containerExamsList', '/admin/gestao/turma/perfil-turma/avaliacoes/lista', '#formClassId')

})


$(document).on('blur', '#addExam #disciplineClassId , #addExam #unity', function (e) {

    loadListElements('containerListExam', '/admin/gestao/turma/perfil-turma/avaliacoes/lista-recentes', '#addExam')

})


$(document).on('keyup', `#addExam #examValue`, function (e) {

    getSumNote(`#addExam`, this, e, false)

})


$(document).on('keyup', `#modalExam form #examValue`, function (e) {

    getSumNote($(this).attr('formId'), this, e, true, $(this).attr('initialValue'))

})


$(document).on('blur', '#seekExam #disciplineClassId , #seekExam #unity', function (e) {

    loadListElements('containerExamsList', '/admin/gestao/turma/perfil-turma/avaliacoes/buscar', '#seekExam')

})


$(document).on('keyup', '#addExam #examDescription', function (e) {

    validation.checkRedundantName('/admin/gestao/turma/perfil-turma/avaliacoes/verificar-nome', '#addExam', '#buttonAddExam')

})