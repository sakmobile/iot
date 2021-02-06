<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
       
    
        $data['name_con'] = "home";
        $data['title'] ='';
        $data['page'] = '';
        $data['active'] = 'active treeview menu-open';
        $data['view_list'] = 'home';
        $this->load->view("layout/template", $data);
    
        
    }

    public function add()
    {
        $title = $this->input->post('add_title');
        $detail = $this->input->post('add_detail');

        $config['upload_path'] = './assets/File/1'; // โฟลเดอร์ ตำแหน่งเดียวกับ root ของโปรเจ็ค
        $config['allowed_types'] = 'doc|docx|xlsx|xls|pdf|rar|zip|ppt|pptx'; // ปรเเภทไฟล์
        $config['max_size'] = '0'; // ขนาดไฟล์ (kb)  0 คือไม่จำกัด ขึ้นกับกำหนดใน php.ini ปกติไม่เกิน 2MB
        $rand = rand(1111, 9999);
        $date = date("m-d-Y");
        $time = date('H-i');
        $config['file_name'] = $date . $time . "_" . $rand; // ชื่อไฟล์ ถ้าไม่กำหนดจะเป็นตามชื่อเพิม
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("up_file")) {
            echo $this->upload->display_errors();
            $fname = '';
            echo "อัพโหลดไม่สำเร็จ";
        } else {
            $data_upload = $this->upload->data();
            $fname = $data_upload['file_name'];
            echo 'อัพโหลดสำเร็จ';
        }
        $table = 'dtail';
        $data_detail = array(
            'd_title' => $title,
            'd_dtail' => $detail,
            'd_path' => $fname,
            'd_date' => date("Y-m-d H:i:s"),
            'f_name' => $fname,
            'u_id' => $this->session->id,
            'w_id' => 1,
        );

        $this->M_manager->add($table, $data_detail);

    }
    
    public function getDetail()
    {

        $post = $this->input->post('id');

        $dtail = "dtail a";
        $user = "user b";
        $workgroup = "workgroup c";
        $userB = 'b.u_id = a.u_id';
        $workgroupC = 'c.w_id = a.w_id';
        $where = "c.w_id";
        $where_s = "a.d_id";
        $w_id = 1;
      $tablecount = "count";
        $data = $this->M_manager->getdetail($dtail, $user, $workgroup, $userB, $workgroupC, $where, $where_s, $post, $w_id);
        $count = $this->M_manager->getcount($tablecount,$post);

        $output = array();

        foreach ($data as $row) {
            $output['d_id'] = $row->d_id;
            $output['d_title'] = $row->d_title;
            $output['d_dtail'] = $row->d_dtail;
            $output['d_date'] = $row->d_date;
            $output['w_id'] = $row->w_id;
            $output['d_path'] = $row->d_path;
            $output['f_name'] = $row->f_name;
            $output['u_name'] = $row->u_name;
            $output['name_con'] = 0;

        }
        foreach ($count as $row) {
    $output['c_cont'] = $row->c_cont;
    

}


        echo json_encode($output);
    }
    public function update()
    {
        $title = $this->input->post('edit_title');
        $detail = $this->input->post('edit_dtail');

        $id = $this->input->post('update_id');
        $file_las = $this->input->post('las_file');
        $file = $_FILES['update_file']['name'];
        if ($file) {
            if (file_exists('./assets/File/1/' . $file_las)) {
                unlink("./assets/File/1/" . $file_las);
            }
            $config['upload_path'] = './assets/File/1'; // โฟลเดอร์ ตำแหน่งเดียวกับ root ของโปรเจ็ค
            $config['allowed_types'] = 'doc|docx|xlsx|xls|pdf|rar|zip|ppt|pptx'; // ปรเเภทไฟล์
            $config['max_size'] = '0'; // ขนาดไฟล์ (kb)  0 คือไม่จำกัด ขึ้นกับกำหนดใน php.ini ปกติไม่เกิน 2MB
            $rand = rand(1111, 9999);
            $date = date("m-d-Y");
            $time = date('H-i');
            $config['file_name'] = $date . $time . "_" . $rand;// ชื่อไฟล์ ถ้าไม่กำหนดจะเป็นตามชื่อเพิม
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload("update_file")) {
                echo $this->upload->display_errors();
                $fname = '';
                echo "อัพโหลดไม่สำเร็จ";
            } else {
                $data_upload = $this->upload->data();
                $fname = $data_upload['file_name'];
                echo 'อัพโหลดสำเร็จ';
            }
            $table = 'dtail';
            $data_detail = array(
                'd_title' => $title,
                'd_dtail' => $detail,
                'd_path' => $fname,
                'd_date' => date("Y-m-d H:i:s"),
                'f_name' => $fname,
                'u_id' => $this->session->id,
                'w_id' => 1,
            );
            $d_id = 'd_id';

            $this->M_manager->update($table, $data_detail, $id, $d_id);

        } else {
            $table = 'dtail';
            $data_detail = array(
                'd_title' => $title,
                'd_dtail' => $detail,
                'd_date' => date("Y-m-d H:i:s"),
                'u_id' => $this->session->id,
                'w_id' => 1,
            );
            $d_id = 'd_id';

            $this->M_manager->update($table, $data_detail, $id, $d_id);
            echo 'อัพโหลดสำเร็จ';

        }

    }
    public function del()
    {
        $id = $this->input->post('del_id');
        $filename = $this->input->post('del_name');
        if (file_exists('./assets/File/1/' . $filename)) {
            unlink("./assets/File/1/" . $filename);
        }
        $d_id = 'd_id';
        $table = 'dtail';
        $table1 = "count";
       $this->M_manager->delcount($id, $d_id, $table1);
        $this->M_manager->del($id, $d_id, $table);
        echo "ลบข้อมูลเรียบร้อย";
    }

    public function cout_load(){
        $count = "count";
        $detail = "dtail";
        $user = "user";
        $detailB = 'b.d_id = a.d_id';
        $userc = 'c.u_id = a.u_id';

        $id_file = $this->input->post('id_detail');
        $id_user = $this->session->id;

        $data = $this->M_manager->get_count($count, $id_file, $id_user);
       
        if ($data) {
            $table = "count";
            $this->M_manager->update_count($table, $id_user, $id_file);
        }else {
            $table = "count";
            $data_count = array(
                'c_cont' => 1,
                'u_id' => $id_user,
                'd_id' => $id_file,
            );
            $this->M_manager->add_count($table, $data_count);

        }




    }
     public function show_user()
    {
  
       $count = "count a";
        $detail = "dtail b";
        $user = "user c";
        $detailB = 'b.d_id = a.d_id';
        $userc = 'c.u_id = a.u_id';
        $id_file = $this->input->post('id_detail');
        $id_user = $this->session->id;
       $data =  $this->M_manager->show_user($count,$detail,$user,$detailB,$userc,$id_file);

                $output = array();

                foreach ($data as $row) {
                    $output['c_id'] = $row->c_id;
                    $output['c_cont'] = $row->c_cont;
                    $output['u_id'] = $row->u_id;
                    $output['d_id'] = $row->d_id;
                    $output['u_FLname'] = $row->u_FLname;
                }


                echo json_encode($output);
       
    }

}