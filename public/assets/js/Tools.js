class Tools {


    editElement(activeForm, formGroup) {

        $(`[${formGroup}] .form-control`).prop('disabled', true)
        $(`${activeForm} .form-control`).prop('disabled', false)

        $('.update-data-icon, .delete-data-icon').css("pointer-events", "none")
        $(`${activeForm} .update-data-icon, ${activeForm} .delete-data-icon`).css("pointer-events", "auto")

    }


    imagePreview(input, container) {

        if (input.files && input.files[0]) {

            var reader = new FileReader()

            reader.onload = function (e) {
                $(container).attr('src', e.target.result)
            };

            reader.readAsDataURL(input.files[0])
        }
    }


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

    showToast(description, background, delay = 3000) {

        $('.toast-data').text(description)

        $('.toast-header').removeClass('bg-success bg-danger bg-primary').addClass(background)

        $('#toastContainer').toast({
            'delay': delay
        }).toast('show')

    }

    automaticDate() {

        let $schoolYear = $('#addSchoolTerm select[name="schoolYear"]').find(":selected").text()
    
        $('#addSchoolTerm input[name="startDate"]').prop('value', `${$schoolYear}-02-01`)
        $('#addSchoolTerm input[name="endDate"]').prop('value', `${$schoolYear}-12-01`)
    }

    /* button(method, element, ...mycallback) {

        $(document).on(`${method}`, `${element}`, function (e) {
            mycallback()
        })

    } */

}