$(document).ready(function () {

    $(document).on('click', '#btn_sea', function () {
        var name = $("#name_sea").val();
        console.log(name);
        $.ajax({
            url: "Reset/getuser",
            type: "POST",
            data: { names: name },
            dataType: "JSON",
            cache: false,
            success: function (data) {
                console.log(data.u_id);
                if (data.u_id) {
                    $('#reset').modal('show');
                    $('#n_name').val(data.u_name);
                    $('#fullname').val(data.u_FLname);
                    $('#id').val(data.u_id);
                } else {
                    $.notify({
                        title: "Error",
                        message: "ไม่พบข้อมูล"
                    }, {
                            type: 'warning'
                        });
                }

            }
        });



    });

    $(document).on('submit', '#update_reset', function (event) {
        event.preventDefault();
        var fullname = $('#fullname').val();
        var n_name = $('#n_name').val();
        var w_data = $('#w_data').val();
        var pass = $('#pass').val();
        var pass_1 = $('#pass_1').val();
        if (fullname == "" || n_name == "" || w_data == "" || pass == "" || pass_1 == "") {
            $.notify({
                title: "Error",
                message: "กรุณากรอกข้อมูลให้ครบ"
            }, {
                    type: 'warning'
                });
            $('#reset').modal('hide');
        } else {
            if (pass != pass_1) {
                $.notify({
                    title: "Error",
                    message: "ยืนยันรหัสผ่าน ไม่ตรงกับรหัสผ่าน"
                }, {
                        type: 'warning'
                    });
                $('#reset').modal('hide');
            } else {
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {

                        if (data) {

                            $('#reset').modal('hide');

                            $.notify({
                                title: "เรียบร้อย",
                                message: "บันทึกข้อมูลเรียบร้อย"
                            }, {

                                    type: 'info'
                                });
                        } else {
                            $('#reset').modal('hide');
                            $.notify({
                                title: "Error",
                                message: "กรุณาเลือกชนิดไฟล์ภาพให้ถูกต้อง"
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



            }
        }


    });

});