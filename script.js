// Отправка данных ajax
$(document).ready(function () {
    $('#form-feedback').submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            dataType: 'html', // новое
            contentType: false,
            cache: false,
            processData: false,
            success: function (result) {
                let arrForm = $('#form-feedback').serializeArray();
                let fieldEmpty = 0;
                $.each(arrForm, function (index, value){
                    if(value.value !== '') {
                         fieldEmpty++;
                    }
                });
                $("#formPicture").html("<b>" + result + "</b>");
                if (! (fieldEmpty < arrForm.length)) {
                $("#form-feedback").hide();

                }
            }
        });
    });
});
