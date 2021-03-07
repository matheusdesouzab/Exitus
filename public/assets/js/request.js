function addSchoolTerm() {

    let form = $('#addSchoolTerm').serialize()

    $.ajax({
        url: '/addSchoolTerm',
        dataType: 'html',
        type: 'POST',
        data: form,
        success: data => {

            $('#addSchoolTermModal').modal('show')
            $('#addSchoolTermModal .modal-title').text('Periodo letivo adicionado')
            $('#addSchoolTermModal .container-icon').addClass('modal-registration-success').html('<i class="fas fa-check-circle">')

        },
        error: function (error) {

        }
    });
}

$('#buttonAddSchoolTerm').on('click', addSchoolTerm)