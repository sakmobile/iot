<!-- Detail -->
<div class="modal fade modal fade bd-example-modal-lg" id="detail_home" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">รายละเอียด</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">

                    <div class="card-body">
                        <div class="alert alert-info" role="alert">
                            <h4 id="deteil_title"></h4>
                        </div>
                        <p id='d_dtail'>
                        </p>
                        <div class="row">
                            <div class="col-md-2">
                                <div id="timeline"></div>
                            </div>
                            <input type="hidden" id='did'>
                            <div class="col-md-2">
                                <button class="btn btn-primary show_user" type="button" data-toggle="collapse"
                                    id="count" name="<?php echo $name_con; ?>" data-target="#collapsehome"
                                    aria-expanded="false" aria-controls="collapseExample">
                                </button>
                            </div>

                        </div>
                        <br />
                        <div class="collapse" id="collapsehome">
                            <div class="card card-body">

                                <span class="badge badge-secondary" id="list"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!-- Detail -->
<!-- Add -->
<div class="modal fade modal fade bd-example-modal-lg" id="add_home" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="add" id="add" enctype="multipart/form-data" action="<?php echo $action_add; ?>"
                    method="post">


                    <div class="form-group">
                        <label for="exampleFormControlInput1">ชื่อเรื่อง</label>
                        <input type="text" class="form-control" id="add_title" name='add_title'>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">รายละเอียด</label>
                        <textarea class="form-control" id="add_detail" name="add_detail" rows="3"></textarea>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="up_file" name="up_file" multiple>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Add -->

<!-- Edit -->
<div class="modal fade modal fade bd-example-modal-lg" id="edit_home" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">แก้ไขข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="update" id="update" enctype="multipart/form-data" action="<?php echo $action_update; ?>"
                    method="post">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">ชื่อเรื่อง</label>
                        <input type="text" class="form-control" id="edit_title" name='edit_title'>
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">รายละเอียด</label>
                        <textarea class="form-control" id="edit_dtail" name='edit_dtail' rows="3"></textarea>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="edit_file" name="update_file" multiple>
                        <p id="file_name"></P>

                    </div>
                    <input type="hidden" id="las_file" name="las_file">
                    <input type="hidden" id="update_id" name="update_id">



            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary ">บันทึกข้อมูล</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>

            </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit -->
<div class="modal fade modal fade bd-example-modal-lg" id="reset" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">แก้ไขรหัสผ่าน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="update_reset" id="update_reset" enctype="multipart/form-data"
                    action="<?php echo base_url(); ?>Reset/update_pass" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" id="n_name" placeholder="ชื่อเข้าระบบ">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" id="fullname" placeholder="ชื่อ - สกุล">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" id="pass" placeholder="รหัสผ่าน">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="pass_1" id="pass_1" placeholder="ยืนยันรหัสผ่าน">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <input type="hidden" id="id" name="id">



            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary ">บันทึกข้อมูล</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>

            </div>
            </form>
        </div>
    </div>
</div>