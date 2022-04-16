class Tools {

    // Torna ativo os campos de input de um elemento 

    editElement(activeForm, formGroup = 'X') {

        $(`[${formGroup}] .form-control`).prop('disabled', true)
        $(`${activeForm} .form-control`).prop('disabled', false)
        $(`${activeForm} .custom-control-input`).prop('disabled', false)

        $('.update-data-icon, .delete-data-icon').css("pointer-events", "none")
        $(`${activeForm} .update-data-icon, ${activeForm} .delete-data-icon`).css("pointer-events", "auto")

    }

    // Carregar prévia da imagem

    imagePreview(input, img) {

        if (input.files && input.files[0]) {

            var reader = new FileReader()

            reader.onload = function (e) {
                $(img).attr('src', e.target.result)
            };

            reader.readAsDataURL(input.files[0])
        }
    }

    // Arredondar valor

    round(num, places) {

        if (!("" + num).includes("e")) {

            return +(Math.round(num + "e+" + places) + "e-" + places)

        } else {

            let arr = ("" + num).split("e");

            let sig = ""

            if (+arr[1] + places > 0) {
                sig = "+";
            }

            return +(Math.round(+arr[0] + "e" + sig + (+arr[1] + places)) + "e-" + places);
        }
    }

    // Carregar Toast

    showToast(description, background, delay = 3000) {

        $('.icon-toast i').removeClass('fa-edit fa-check-circle fa-trash-alt fa-info-circle')

        if (background == 'bg-success') $('.icon-toast i').addClass('fa-check-circle')
        if (background == 'bg-primary') $('.icon-toast i').addClass('fa-edit')
        if (background == 'bg-danger') $('.icon-toast i').addClass('fa-trash-alt')
        if (background == 'bg-info') $('.icon-toast i').addClass('fa-info-circle')


        $('.toast-data').text(description)

        $('.toast-header').removeClass('bg-success bg-danger bg-primary bg-info').addClass(background)

        $('#toastContainer').toast({
            'delay': delay
        }).toast('show')

    }

    // Caso nenhuma data de início ou de fim seja preenchida na criação de um ano letivo, essa função vai definir de forma automática 

    automaticDate() {

        let $schoolYear = $('#addSchoolTerm select[name="schoolYear"]').find(":selected").text()

        $('#addSchoolTerm input[name="startDate"]').prop('value', `${$schoolYear}-02-01`)
        $('#addSchoolTerm input[name="endDate"]').prop('value', `${$schoolYear}-12-01`)
    }

}