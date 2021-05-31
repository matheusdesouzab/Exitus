// * Management


// School Term


//? List school term using collapseroute


$('#collapseListSchoolTerm').on('click', () => loadListElements('containerListSchoolTerm', '/admin/gestao/periodo-letivo/lista'))

$(document).on('click', '[data-target="#class-profile-data"]' , function(){ 
    loadListElements('containerListTeacher', '/admin/gestao/turma/perfil-turma/turma-disciplina/professores-turma', '#formClassId')
})


//? Group of elements available using collapse


$('#collapseAddSchoolTerm').on('click', function () {
    loadOptions([
        ['schoolYear', '/admin/gestao/periodo-letivo/lista-anos-disponiveis', 'clean', '']
    ])
})

$('[data-target="#students-list"]').on('click', function () {
    loadListElements('.modal containerListStudent', '/admin/aluno/lista/listagem')
})


//? Add school year


$('#buttonAddSchoolTerm').on('click', function () {

    automaticDate()

    addSinglePart('#addSchoolTerm', '/admin/gestao/periodo-letivo/inserir', 'Período letivo adicionado')

    loadOptions([
        ['schoolYear', '/admin/gestao/periodo-letivo/lista-anos-disponiveis', 'clean', '']
    ])

})



// ClassRoom



//? List classroom using collapse


$('#collapseListClassRoom').on('click', () => loadListElements('containerListClassRoom', '/admin/gestao/sala/lista'))


//? Group of elements available using collapse


$('#collapseAddClassRoom').on('click', function () {
    loadOptions([
        ['classroomNumber', '/admin/gestao/sala/lista-numeros-disponiveis', 'clean' , '']
    ])
})


//? Button to add classroom


$('#buttonAddClassRoom').on('click', function () {

    addElement('#addClassRoom', '/admin/gestao/sala/inserir', 'Sala de aula adicionada')

    loadOptions([
        ['classroomNumber', '/admin/gestao/sala/lista-numeros-disponiveis', 'clean', '']
    ])

})


// Course


//? List classroom using collapse


$('#collapseListCourse').on('click', () => loadListElements('containerListCourse', '/admin/gestao/curso/lista'))


//? Add Course


$('#buttonAddCourse').on('click', () => addElement('#addCourse', '/admin/gestao/curso/inserir', 'Curso adicionado'))


// Discipline


//? List classroom using collapse


$('#collapseListDiscipline').on('click', () => loadListElements('containerListDiscipline', '/admin/gestao/disciplina/lista'))


//? Seek discipline


$('select[name="seekModality"]').change(() => seekElement('#seekDiscipline', 'containerListDiscipline', '/admin/gestao/disciplina/buscar'))


let timeout = null

$('input[name="seekName"]').keyup(function (e) {

    if (timeout) clearTimeout(timeout);

    timeout = setTimeout(() => seekElement('#seekDiscipline', 'containerListDiscipline', '/admin/gestao/disciplina/buscar'), 2000)

})


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


//? Upper Case


$('input[name="acronym"]').on('keyup', e => e.target.value = e.target.value.toUpperCase())


//? Add discipline


$('#buttonAddDiscipline').on('click', () => addElement('#addDiscipline', '/admin/gestao/disciplina/inserir', 'Disciplina adicionada'))


// Class


//? Add class


$('#buttonAddClass').on('click', function () {

    addElement('#addClass', '/admin/gestao/turma/inserir', 'Turma adicionada')

    checkClass()

})


$(document).on('click', '#buttonAddClassDiscipline', function () {

    if ($('#addClassDiscipline #discipline option').length == 0 || $('#addClassDiscipline #teacher option').length == 0) {

        $("#modalErrorDisciplineClass").modal("show")

    } else {

        addElement('#addClassDiscipline', '/admin/gestao/turma/perfil-turma/turma-disciplina/inserir', 'Disciplina adicionada', 'normal', false)

        loadOptions([
            ['discipline', '/admin/gestao/disciplina/disponiveis', 'clean' , '#addClassDiscipline']
        ])

        loadListElements('containerListDisciplineClass', '/admin/gestao/turma/perfil-turma/turma-disciplina/professores-disciplina-turma', '#formClassId')

    }

})


$(document).on('click', '#class-discipline-accordion [data-target="#add-discipline"] ' , function(){

    loadOptions([
        ['discipline', '/admin/gestao/disciplina/disponiveis', 'clean' , '#addClassDiscipline']
    ])
    
})



//? List class using collapse


$('#collapseListClass').on('click', () => loadListElements('containerListClass', '/admin/gestao/turma/lista'))


//? Seek class


$('#seekClass .custom-select').change(() => seekElement('#seekClass', 'containerListClass', '/admin/gestao/turma/buscar'))


//? Check class


$('#addClass .form-control').change(checkClass)


//---------------------------------------------------------------------------------------------------------------------------------


// Edit , update and delete


//? Edit element


$(document).on('click', '.edit-data-icon', function () {
    editElement($(this).attr('idElement'), $(this).attr('formGroup'))
})


//? Update element


$(document).on('click', '.update-data-icon', function () {

    updateElement($(this).attr('idElement'), $(this).attr('routeUpdate'), $(this).attr('toastData'))

    loadListElements($(this).attr('container'), $(this).attr('routeList'), $(this).attr('routeData'))

    $(`${$(this).attr('idElement')} .form-control`).prop('disabled', true)
})


//? Delete element


$(document).on('click', '.delete-data-icon', function () {

    deleteElement($(this).attr('idElement'), $(this).attr('routeDelete'), $(this).attr('toastData'))

    loadListElements($(this).attr('container'), $(this).attr('routeList'))
})


//************************************************************************** */


//* Student 


//? Add student


$("#buttonAddStudent").click(() => addMultipleParts(this, '/admin/aluno/cadstro/inserir'))


$('#seekStudent input[name="name"]').keyup(function (e) {

    if (timeout) clearTimeout(timeout);

    timeout = setTimeout(() => seekElement('#seekStudent', 'containerListStudent', '/admin/aluno/lista/buscar'), 1500)

})


$('#seekStudent select').change(() => seekElement('#seekStudent', 'containerListStudent', '/admin/aluno/lista/buscar'))


//? Masks


$(document).on('keypress', '#cpf' , e => $(e.target).mask('000.000.000-00'))

$('#zipCode').on('keypress', e => $(e.target).mask('00000-000'))

$("#telephone").on('keypress', e => $(e.target).mask(('(00) 00000-0000')))


//? Automatic cep


$('#zipCode').on('blur', getLocation)


//************************************************************************** */



//* General


//? Side state


$("#bars").on("click", sideState)


$('.bars-xs').on('click', e => $('.container-fluid .row div:nth-child(1)').toggleClass('panel-side-xs panel-side'))


//? Validation


let validation = new Validation()


// Applying validation


$('#cpf').on('blur', e => validation.cpfState(e.target.value))

$('#telephone').on('blur', e => validation.validateBySize(e.target.id, 11, '#telephoneField', 'telephone-info'))

let commonElements = ['#name , #birthDate', '#naturalness', '#nationality', '#motherName', '#fatherName']

commonElements.forEach(element => $(element).on('blur', e => validation.validateByContent(e.target.id)))

let address = ['#county', '#district', '#address', '#uf']

address.forEach(element => $(element).on('blur', e => validation.validateByContent(e.target.id)))

$('#profilePhoto').change(function () {
    validation.validateImage()
    validation.imagePreview(this)
})


$('[data-target="#student-registration-class"]').on('click', () => validation.checkAllFields('#addStudent', 18, '#buttonAddStudent'))
$('#teacherAddressOthers .form-control').on('blur', () => validation.checkAllFields('#addTeacher', 15, '#buttonAddTeacher'))