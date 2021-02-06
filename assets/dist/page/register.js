$(document).ready(function () {

    $(document).on('click', '#btn_register', function () {

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
        } else {
            if (pass != pass_1) {
                $.notify({
                    title: "Error",
                    message: "ยืนยันรหัสผ่าน ไม่ตรงกับรหัสผ่าน"
                }, {
                        type: 'warning'
                    });
            } else {
                $.ajax({
                    url: "Register/reg",
                    type: "POST",
                    data: {
                        fullnames: fullname,
                        n_names: n_name,
                        w_datas: w_data,
                        passs: pass,

                    },

                    cache: false,
                    success: function (data) {
                        if (data) {
                            $.notify({
                                title: "เรียบร้อย",
                                message: "บันทึกข้อมูลเรียบร้อย"
                            }, {

                                    type: 'info'
                                });
                            $('#fullname').val("");
                            $('#n_name').val("");
                            $('#pass').val("");
                            $('#pass_1').val("");
                        }

                    }
                });

            }
        }




    });



});