$(document).ready(function () {


    $('#example1').DataTable({
        "ordering": false
    });

    $(document).on('submit', '#add', function (event) {
        event.preventDefault();
        var file = $('#up_file').val();
        var title = $('#add_title').val();
        var detail = $('#add_detail').val();

        if (title != "" && file != "" && detail != "") {
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
                    if (data == "อัพโหลดสำเร็จ") {

                        $('#add_home').modal('hide');

                        $.notify({
                            title: "เรียบร้อย",
                            message: "บันทึกข้อมูลเรียบร้อย"
                        }, {

                                type: 'info'
                            });
                        setTimeout(
                            function () {
                                location.reload();
                            }, 1000);
                    } else {
                        $('#add_home').modal('hide');
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
        } else {
            $('#modal_form').modal('hide');
            $.notify({
                title: "Error",
                message: "กรุณากรอกข้อมูลให้ครบ"
            }, {
                    type: 'warning'
                });
        }
    });

    $(document).on('click', '.detail', function () {
        event.preventDefault();
        var detail_id = $(this).attr('id');
        var name = $(this).attr('name');

        if (name == "home") {
            var url = "Home/getDetail";
        }
        if (name == "Plan") {
            var url = "Plan/getDetail";
        }
        if (name == "pp") {
            var url = "Pp/getDetail";
        }
        if (name == "Insure") {
            var url = "Insure/getDetail";
        }
        if (name == "Drug") {
            var url = "Drug/getDetail";
        }
        if (name == "Pcu") {
            var url = "Pcu/getDetail";
        }
        if (name == "Ncd") {
            var url = "Ncd/getDetail";
        }
        if (name == "Lab") {
            var url = "Lab/getDetail";
        }
        if (name == "Opd") {
            var url = "Opd/getDetail";
        }
        if (name == "Pay") {
            var url = "Pay/getDetail";
        }
        if (name == "Dental") {
            var url = "Dental/getDetail";
        }
        if (name == "IT") {
            var url = "IT/getDetail";
        }


        console.log(detail_id);
        $.ajax({
            url: url,
            type: "POST",
            data: { id: detail_id },
            dataType: "JSON",
            cache: false,
            success: function (data) {
                console.log(data);
                var count = "ดาวน์โหลด " + data.c_cont + " ครั้ง";
                var fname = "./assets/File/1/" + data.d_path;

                var event_data = '<a href="' + fname + '" id=" ' + data.name_con + '"  class="btn btn-primary cout" >ดาวน์โหลด</a>';
                $('#detail_home').modal('show');
                $('#did').val(data.d_id);
                $('#deteil_title').html(data.d_title);
                $('#d_dtail').html(data.d_dtail);
                $('#timeline').html(event_data);
                $('#count').html(count);
                //$('#list').html(user_load);

                // $('#edit_url_pro_1').val(data.p_url);
                // $('#edit_id_pro_1').val(data.p_id);
            }
        });
    });
    $(document).on('click', '.edit_home', function () {
        //var BASE_URL = "<?php echo base_url() . " + index.php / Home / getDetail + ";?>";
        // console.log(BASE_URL + "");
        var id_edit = $(this).attr('id');
        var name = $(this).attr('name');
        if (name == "home") {
            var url = "Home/getDetail";
        }
        if (name == "Plan") {
            var url = "Plan/getDetail";
        }
        if (name == "pp") {
            var url = "Pp/getDetail";
        }
        if (name == "Insure") {
            var url = "Insure/getDetail";
        }
        if (name == "Drug") {
            var url = "Drug/getDetail";
        }
        if (name == "Pcu") {
            var url = "Pcu/getDetail";
        }
        if (name == "Ncd") {
            var url = "Ncd/getDetail";
        }
        if (name == "Lab") {
            var url = "Lab/getDetail";
        }
        if (name == "Opd") {
            var url = "Opd/getDetail";
        }
        if (name == "Pay") {
            var url = "Pay/getDetail";
        }
        if (name == "Dental") {
            var url = "Dental/getDetail";
        }
        if (name == "IT") {
            var url = "IT/getDetail";
        }
        console.log(url);
        $.ajax({
            url: url,
            type: "POST",
            data: { id: id_edit },
            dataType: "JSON",
            cache: false,
            success: function (data) {
                console.log(data);
                //var fname = "./assets/File/1/" + data.d_path;
                // var fname = "./assets/File/1/" + data.d_path;
                // console.log(fname);
                // var event_data = '<a href="' + fname + '"id="load" class="btn btn-primary" >ดาวน์โหลด</a>';
                $('#edit_home').modal('show');

                $('#edit_title').val(data.d_title);
                $('#edit_dtail').val(data.d_dtail);
                $('#file_name').html(data.d_path);
                $('#update_id').val(data.d_id);
                $('#las_file').val(data.d_path);
            }
        });
    });

    $(document).on('submit', '#update', function (event) {
        event.preventDefault();
        // var title = $('#edit_title').val();
        // var detail = $('#edit_dtail').val();
        // var file = $('#edit_file').val();
        // var file_name = document.getElementById('file_name').innerHTML;
        // var id_update = $('#update_id').val();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {

                if (data == "อัพโหลดสำเร็จ") {

                    $('#edit_home').modal('hide');

                    $.notify({
                        title: "เรียบร้อย",
                        message: "บันทึกข้อมูลเรียบร้อย"
                    }, {

                            type: 'info'
                        });
                } else {
                    $('#edit_home').modal('hide');
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





    });
    $(document).on('click', '.del_home', function () {
        var id = $(this).attr('id');
        var file_name = $(this).attr('name');
        var name = $(this).attr('name1');
        if (name == "home") {
            var url = "Home/del";
        }
        if (name == "Plan") {
            var url = "Plan/del";
        }
        if (name == "pp") {
            var url = "Pp/del";
        }
        if (name == "Insure") {
            var url = "Insure/del";
        }
        if (name == "Drug") {
            var url = "Drug/del";
        }
        if (name == "Pcu") {
            var url = "Pcu/del";
        }
        if (name == "Ncd") {
            var url = "Ncd/del";
        }
        if (name == "Lab") {
            var url = "Lab/del";
        }
        if (name == "Opd") {
            var url = "Opd/del";
        }
        if (name == "Pay") {
            var url = "Pay/del";
        }
        if (name == "Dental") {
            var url = "Dental/del";
        }
        if (name == "IT") {
            var url = "IT/del";
        }
        console.log(id);
        console.log(file_name);
        swal({
            title: "คุณต้องการลบข้อมูลหรือไม่?",
            text: "เมื้อคุณลบข้อมูลแล้วคุณจะไม่สามารถกู้ข้อมูลได้ !",
            icon: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "ตกลง",
            closeOnConfirm: false
        }, function () {
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    del_id: id,
                    del_name: file_name
                },
                cache: false,
                success: function (data) {
                    if (data) {
                        $.notify({
                            title: "เรียบร้อย",
                            message: "ลบข้อมูลเรียบร้อย"
                        }, {

                                type: 'info'
                            });

                    }
                    setTimeout(
                        function () {
                            location.reload();
                        }, 1000);

                }, error: function (data) {
                    console.log("error");
                    console.log(data);
                }
            });
        });

    });

    $(document).on('click', '.cout', function () {
        // var id = $(this).attr('id');
        var id_detail = $("#did").val();
        var name = $(this).attr('id');
        if (name == 0) {
            var url = "Home/cout_load";
        }
        if (name == 1) {
            var url = "Plan/cout_load";
        }
        if (name == 2) {
            var url = "Pp/cout_load";
        }
        if (name == 3) {
            var url = "Insure/cout_load";
        }
        if (name == 4) {
            var url = "Drug/cout_load";
        }
        if (name == 5) {
            var url = "Pcu/cout_load";
        }
        if (name == 6) {
            var url = "Ncd/cout_load";
        }
        if (name == 7) {
            var url = "Lab/cout_load";
        }
        if (name == 8) {
            var url = "Opd/cout_load";
        }
        if (name == 9) {
            var url = "Pay/cout_load";
        }
        if (name == 10) {
            var url = "Dental/cout_load";
        }
        if (name == 11) {
            var url = "IT/cout_load";
        }
        console.log(url);
        console.log(name);
        $.ajax({
            url: url,
            type: "POST",
            data: { id_detail: id_detail },
            dataType: "JSON",
            cache: false,
            success: function (data) {
                console.log(data);

            }
        });

    });
    $(document).on('click', '.show_user', function () {

        var id_detail = $("#did").val();
        var name = $(this).attr('name');
        if (name == "home") {
            var url = "Home/show_user";
        }
        if (name == "Plan") {
            var url = "Plan/show_user";
        }
        if (name == "pp") {
            var url = "Pp/show_user";
        }
        if (name == "Insure") {
            var url = "Insure/show_user";
        }
        if (name == "Drug") {
            var url = "Drug/show_user";
        }
        if (name == "Pcu") {
            var url = "Pcu/show_user";
        }
        if (name == "Ncd") {
            var url = "Ncd/show_user";
        }
        if (name == "Lab") {
            var url = "Lab/show_user";
        }
        if (name == "Opd") {
            var url = "Opd/show_user";
        }
        if (name == "Pay") {
            var url = "Pay/show_user";
        }
        if (name == "Dental") {
            var url = "Dental/show_user";
        }
        if (name == "IT") {
            var url = "IT/show_user";
        }
        $.ajax({
            url: url,
            type: "POST",
            data: { id_detail: id_detail },
            dataType: "JSON",
            cache: false,
            success: function (data) {
                console.log(data.u_FLname);
                var count_load = "<span class='label label-danger'>" + data.c_cont + "</span >";
                $('#list').html(data.u_FLname + " " + count_load);

            }
        });

    });

});