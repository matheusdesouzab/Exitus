// * Management


// School Term


//? Load list school term and group available element


$('#schoolTerm').ready(function () {
    listElement('containerListSchoolTerm', '/admin/gestao/periodo-letivo/lista'), availableElement([
        ['schoolYear', '/admin/gestao/periodo-letivo/lista-anos-disponiveis'],
        ['schoolTermSituation', '/admin/gestao/periodo-letivo/lista-situacao-periodo-letivo'],
        ['schoolTermSituationAdd', '/admin/gestao/periodo-letivo/lista-situacao-periodo-letivo']
    ])
})


//? List school term using collapse


$('#collapseListSchoolTerm').on('click', () => listElement('containerListSchoolTerm', '/admin/gestao/periodo-letivo/lista'))


//? Group of elements available using collapse


$('#collapseAddSchoolTerm').on('click', () => availableElement([
    ['schoolYear', '/admin/gestao/periodo-letivo/lista-anos-disponiveis'],
    ['schoolTermSituation', '/admin/gestao/periodo-letivo/lista-situacao-periodo-letivo'],
    ['schoolTermSituationAdd', '/admin/gestao/periodo-letivo/lista-situacao-periodo-letivo']
]))


//? Button to add school year


$('#buttonAddSchoolTerm').on('click', () => [automaticDate(), addElement('#addSchoolTerm', '/admin/gestao/periodo-letivo/inserir', 'Período letivo adicionado', false),
    availableElement([
        ['schoolYear', '/admin/gestao/periodo-letivo/lista-anos-disponiveis']
    ])
])


// ClassRoom


//? Load list classroom and group available element


$('#classRoom').ready(function () {
    [listElement('containerListClassRoom', '/admin/gestao/sala/lista'),
        availableElement([
            ['classroomNumber', '/admin/gestao/sala/lista-numeros-disponiveis']
        ])
    ]
})


//? List classroom using collapse


$('#collapseListClassRoom').on('click', () => listElement('containerListClassRoom', '/admin/gestao/sala/lista'))


//? Group of elements available using collapse


$('#collapseAddClassRoom').on('click', availableElement([
    ['classroomNumberAdd', '/admin/gestao/sala/lista-numeros-disponiveis']
]))


//? Button to add classroom


$('#buttonAddClassRoom')
    .on('click', () => [addElement('#addClassRoom', '/admin/gestao/sala/inserir', 'Sala de aula adicionada'),
        availableElement([
            ['classroomNumber', '/admin/gestao/sala/lista-numeros-disponiveis']
        ])
    ])


// Course


//? Load list school term and group available element


$('#course').ready(function () {
    listElement('containerListCourse', '/admin/gestao/curso/lista')
})


//? List classroom using collapse


$('#collapseListCourse').on('click', () => listElement('containerListCourse', '/admin/gestao/curso/lista'))


//? Button to add Course


$('#buttonAddCourse')
    .on('click', () => addElement('#addCourse', '/admin/gestao/curso/inserir', 'Curso adicionado'))


// Discipline


//? Load list element and group element available


$('#discipline').ready(function () {
    [listElement('containerListDiscipline', '/admin/gestao/disciplina/lista'), availableElement([
        ['modalityAdd', '/admin/gestao/disciplina/lista-modalidades'],
        ['seekModality', '/admin/gestao/disciplina/lista-modalidades']
    ])]
})


//? List classroom using collapse


$('#collapseListDiscipline').on('click', () => listElement('containerListDiscipline', '/admin/gestao/disciplina/lista'))


//? Seek discipline


$('select[name="seekModality"]').change(() => seekElement('#seekDiscipline', 'containerListDiscipline', '/admin/gestao/disciplina/buscar'))


$('input[name="seekName"]').keyup(function (e) {

    if (timeout) clearTimeout(timeout);

    timeout = setTimeout(() => seekElement('#seekDiscipline', 'containerListDiscipline', '/admin/gestao/disciplina/buscar'), 1500)

})


//? Show modal


$(document).on('click', '#discipline tr', function () {
    showModal(this.id, '/admin/gestao/disciplina/dados', 'containerModal', '#modalDiscipline')
})


//? Upper Case


$('input[name="acronym"]').on('keyup', e => e.target.value = e.target.value.toUpperCase())


//? Button add discipline


$('#buttonAddDiscipline')
    .on('click', () => addElement('#addDiscipline', '/admin/gestao/disciplina/inserir', 'Disciplina adicionada'))



// Class


//? Load list class and group available elements


$('#class').ready(function () {
    [availableElement([
        ['shift', '/admin/gestao/turma/lista-turnos'],
        ['ballot', '/admin/gestao/turma/lista-cedulas'],
        ['series', '/admin/gestao/turma/lista-series'],
        ['course', '/admin/gestao/turma/lista-cursos'],
        ['classRoom', '/admin/gestao/turma/lista-salas'],
        ['schoolTerm', '/admin/gestao/periodo-letivo/ativado']
    ]), listElement('containerListClass', '/admin/gestao/turma/lista')]
})


//? Button add class


$('#buttonAddClass')
    .on('click', () => [addElement('#addClass', '/admin/gestao/turma/inserir', 'Turma adicionada'), checkClass()])


//? List class using collapse


$('#collapseListClass').on('click', () => listElement('containerListClass', '/admin/gestao/turma/lista'))


//? Seek class


$('#seekClass .custom-select').change(() => seekElement('#seekClass', 'containerListClass', '/admin/gestao/turma/buscar'))


//? Check class


$('#addClass .form-control').change(checkClass)


//---------------------------------------------------------------------------------------------------------------------------------


// Edit , update and delete


//? Edit element


$(document).on('click', '.edit-data-icon', function () {
    editElement($(this).attr('idElement'))
})


//? Update element


$(document).on('click', '.update-data-icon', function () {

    updateElement($(this).attr('idElement'), $(this).attr('routeUpdate'), $(this).attr('toastData'))

    listElement($(this).attr('container'), $(this).attr('routeList'))
})


//? Delete element


$(document).on('click', '.delete-data-icon', function () {

    deleteElement($(this).attr('idElement'), $(this).attr('routeDelete'), $(this).attr('toastData'))

    listElement($(this).attr('container'), $(this).attr('routeList'))
})


//************************************************************************** */


//* Student 


//? Load group of element available


$('#student').ready(function () {
    [availableElement([
        ['sex', '/dados-gerais/lista-sexo'],
        ['pcd', '/dados-gerais/lista-pcd'],
        ['bloodType', '/dados-gerais/lista-tipo-sanguineo'],
        ['schoolTerm', '/admin/gestao/periodo-letivo/ativado']
    ]), listElement('class4', '/admin/gestao/turma/lista-turmas-disponiveis')]
})


//? Button add student


$("#buttonAddStudent").click(function () {

    let formData = new FormData(this)

    $.ajax({
        url: '/admin/aluno/cadastro/inserir',
        type: 'POST',
        data: formData,
        success: data => console.log(data),
        cache: false,
        contentType: false,
        processData: false,
    });

})


//? Masks


$('#cpf').on('keypress', e => $(e.target).mask('000.000.000-00'))


$("#telephone").on('keypress', e => $(e.target).mask(('(00) 00000-0000')))


//? Automatic cep


$('#zipCode').on('blur', getLocation)


//************************************************************************** */


//* General


//? Side state


$("#bars").on("click", sideState)


$('.bars-xs').on('click', e => $('.container-fluid .row div:nth-child(1)').toggleClass('panel-side-xs panel-side'))