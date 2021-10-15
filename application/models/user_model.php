<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('image_lib');

    }
    
    // อ่านข้อมูลในตาราง tb_member 
    public function read_user()
    {
        $query = $this->db->query('SELECT * FROM tb_member ');
        return $query->result();
    }
    // อ่านข้อมูลในตาราง tb_member

    // เพิ่มสมาชิก
    public function insert_user($data)
    {
        $val = array(
            'm_user' => $data['username'],
            'm_pass' => md5($data['password']),
            'm_email' => $data['email'],
            'm_fname' => $data['fname'],
            'm_lname' => $data['lname'],
            'm_status' => $data['status'],
        );
        $this->db->insert('tb_member', $val);
        redirect('admin');
    }
    // เพิ่มสมาชิก

    // รับข้อมูล
    public function get_user($id)
    {
        $query = $this->db->query('SELECT * FROM tb_member WHERE m_id=' . $id);
        return $query->result();

    }
    // รับข้อมูล

    // แก้ไขข้อมูล
    public function update_user($data)
    {
        $query = $this->db->get_where('tb_member', array('m_id' => $data['id'], 'm_pass' => $data['password']));
        $check = $query->result();
        if ($check) {                  // เช็คว่ามีการแก้ไขหรือไม่
            $val = array(
                'm_user' => $data['username'],
                'm_email' => $data['email'],
                'm_fname' => $data['fname'],
                'm_lname' => $data['lname'],

            );
        } else {
            $val = array(
                'm_user' => $data['username'],
                'm_pass' => md5($data['pass']),
                'm_email' => $data['email'],
                'm_fname' => $data['fname'],
                'm_lname' => $data['lname'],
                'm_img' => $data['img'],

            );
        }
        $this->db->where('m_id', $data['id']);
        $this->db->update('tb_member', $val);
        redirect('admin');
    }
    // แก้ไขข้อมูล

    // ลบข้อมูล สำหรับ Admin
    public function delete_user($del)
    {
        $this->db->where('m_id', $del);
        $this->db->delete('tb_member');
        redirect('admin');
    }
    // ลบข้อมูล สำหรับ Admin
    
    // ลบบัญชีผู้ใช้
    public function delete_account($del)
    {
        $this->db->where('m_id', $del);
        $this->db->delete('tb_member');
        redirect('logout');
    }
    // ลบลัญชี

    // เข้าสู่ระบบ
    public function login($username, $password)
    {
        //$this->load->library('session');
        $query = $this->db->get_where('tb_member', array('m_user' => $username, 'm_pass' => md5($password), 'm_status' => 1));
        $data = $query->result();
        if ($data) {
            $val = array(
                "username" => $data[0]->m_user,
                "user_id" => $data[0]->m_id,
                "password" => $data[0]->m_pass,
                "email" => $data[0]->m_email,
                "fname" => $data[0]->m_fname,
                "lname" => $data[0]->m_lname,
                "img" => $data[0]->m_img,
                "status" => $data[0]->m_status,
            );

            $this->session->set_userdata($val);
            return $query->row_array();
        } else {
            $query_admin = $this->db->get_where('admin', array('username' => $username, 'password' => $password, 'status' => 2));
            $data_admin = $query_admin->result();
            if ($data_admin) {
                $admin = array(
                    "admin_id" => $data_admin[0]->admin_id,
                    "admin_user" => $data_admin[0]->username,
                    "admin_password" => $data_admin[0]->password,
                    "admin_status" => $data_admin[0]->status,
                );
                $this->session->set_userdata($admin);
                return $query_admin->row_array();
            }
        }

    }
    // เข้าสู่ระบบ

    // อ่านข้อมูลสมาชิก
    public function read_member()
    {
        $query = $this->db->query('SELECT * FROM tb_member');
        return $query->result();
    }
    // อ่านข้อมูลสมาชิก

    //  สมัครสมาชิก
    public function register($data)
    {

        $val = array(
            'm_user' => $data['username'],
            'm_pass' => md5($data['password']),
            'm_email' => $data['email'],
            'm_fname' => $data['fname'],
            'm_lname' => $data['lname'],
            'm_status' => $data['status'],

        );

        $this->db->insert('tb_member', $val);
        redirect('home');
    }
    // สมัครสมาชิก

    // อัพโหลดรูปภาพ
    public function upload_img($data)
    {

        $config['upload_path'] = './uploads/'; // โฟลเดอร์ ตำแหน่งเดียวกับ root ของโปรเจ็ค
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; // ปรเเภทไฟล์
        $config['max_size'] = '2000'; // ขนาดไฟล์ (kb)  0 คือไม่จำกัด ขึ้นกับกำหนดใน php.ini ปกติไม่เกิน 2MB
        $config['max_width'] = '3000'; // ความกว้างรูปไม่เกิน
        $config['max_height'] = '2000'; // ความสูงรูปไม่เกิน
        // $config['encrypt_name']  = FALSE; //กำหนดเป็น true ให้ระบบ เปลียนชื่อ ไฟล์  อัตโนมัติ  ป้องกันกรณีชื่อไฟล์ซ้ำกัน
        $new_name = date('dmYHis');
        $config['file_name'] = $new_name;
        $this->upload->initialize($config); // กำหนดค่าเริ่มต้น
        $this->upload->do_upload('img'); // ทำการอัพโหลดไฟล์
        // ลดขนาดรูปภาพ
        $picture_name = $this->upload->data();
        $file_name = $picture_name['file_name'];
        $resize['image_library'] = 'gd2';
        $resize['source_image'] = 'uploads/' . $file_name;
        $resize['create_thumb'] = false;
        $resize['maintain_ratio'] = true; //ยึดขนาดตามไฟล์ต้นฉบับ
        $resize['width'] = 300;
        $resize['height'] = 300;

        $this->image_lib->initialize($resize);

        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors(); //ตรสจสอบการอัพโหลด
        } else {
            // echo "upload ok";
        }
        // ลดขนาดรูปภาพ
        $val = array(

            'm_img' => $file_name,
            // 'm_img' => $new

        );
        // print_r($picture_name);
        //    exit;
        $this->db->where('m_id', $data['id_img']);

        $this->db->update('tb_member', $val);
        unlink("uploads/" . $data['img_old']); // ลบภาพใน Directory
        redirect('profile');

    }
    // อัพโหลดรูปภาพ

    // โปรไฟล์สมาชิก
    public function profile_user1($user_id)
    {
        // $query = $this->db->query('SELECT * FROM `member` WHERE m_id='.$user_id);
        // return $query->result();
        $query = $this->db->where('m_id', $this->session->userdata('user_id'))->get('tb_member')->result();
        return $query;
    }
    // โปรไฟล์สมาชิก

    // ข้อมูลสมาชิก
    public function get_member($id)
    {
        $query = $this->db->query('SELECT * FROM tb_member WHERE m_id=' . $id);
        return $query->result();
    }
    // ข้อมูลสมาชิก

    public function edit_member($data)
    {
        $query = $this->db->get_where('member', array('m_id' => $data['id'], 'm_pass' => $data['password']));
        $check = $query->result();
        if ($check) {
            $val = array(
                'm_user' => $data['username'],
                'm_email' => $data['email'],
                'm_fname' => $data['fname'],
                'm_lname' => $data['lname'],
            );
        } else {                  //เช็คถ้าไม่มีการแก้ไข ไม่ต้องอัพเดทข้อมูลในแถวนั้น
            $val = array(
                'm_user' => $data['username'],
                'm_pass' => md5($data['password']),
                'm_email' => $data['email'],
                'm_fname' => $data['fname'],
                'm_lname' => $data['lname'],
                'm_img' => $data['img'],

            );
        }
        $this->db->where('m_id', $data['id']);
        $this->db->update('member', $val);
        redirect('profile');
    }

    public function chk_user($user)
    {
        $query = $this->db->get_where('tb_member', array('m_user' => $user));
        return $query->num_rows();

    }

    public function check_fname($fname)
    {
        $query = $this->db->get_where('tb_member', array('m_fname' => $fname));
        return $query->num_rows();

    }

    public function check_lname($lname)
    {
        $query = $this->db->get_where('tb_member', array('m_lname' => $lname));
        return $query->num_rows();

    }

    public function chk_email($email)
    {
        $query = $this->db->get_where('tb_member', array('m_email' => $email));
        return $query->num_rows();

    }

    public function chke_email($e_email)
    {
        $query = $this->db->get_where('member', array('m_email' => $e_email));
        return $query->num_rows();

    }

    public function alert_login($user, $pass)
    {
        $query = $this->db->get_where('tb_member', array('m_user' => $user, 'm_pass' => md5($pass), 'm_status' => 1));
        $check = $query->result();
        if (!empty($check)) {
            $num = 1;
            return $num;
        } else {
            $query = $this->db->get_where('admin', array('username' => $user, 'password' => $pass, 'status' => 2));
            $admin = $query->result();
            if (!empty($admin)) {
                $num = 2;
                return $num;
            }
        }
    }

    public function serch_data()
    {
        $find = $_POST['serch'];
        $query = $this->db->query("SELECT * FROM tb_member WHERE m_fname LIKE '%$find%'");
        return $query->result();
    }
}
