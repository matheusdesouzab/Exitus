
// Declaration of required objects

const validation = new Validation()
const application = new Application()
const tools = new Tools()
const management = new Management()

$("#teacherLogin #accessCode").on("keypress", e => $(e.target).mask("000.000"))

$("#teacherPortal #class tbody tr").on('click', function(e){

    application.showModal(this.id, "/admin/gestao/turma/perfil-turma", "containerClasseProfileModal", "#profileClassModal")

})

$("#teacherPortal #seekClass .custom-select").change(() => application.seekElement("#seekClass", "containerListClass", "/portal-docente/turmas/buscar"))