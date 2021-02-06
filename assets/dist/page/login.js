$(document).ready(function () {


    $(document).on('submit', '#form_login', function (event) {
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
                if (data != 0) {

                    window.location.replace(data);




                } else {
                    $.notify({
                        title: "Error",
                        message: "ชื่อหรือรหัสผ่านไม่ถูกต้อง"
                    }, {

                            type: 'warning'
                        });
                }
            },
            error: function (data) {
                console.log("error");
                console.log(data);
            }
        });



    });



});