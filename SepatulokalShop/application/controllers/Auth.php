<?php
defined('BASEPATH') or exit('No direct script access allowed');

 class Auth extends CI_Controller{

   public function __construct(){
     parent::__construct();
     // $this->load->model('Login_model');
     $this->load->library('form_validation');
   }

   public function index(){
      $data['user'] = $this->db->get_where('tbl_user', ['username'=>
      $this->session->userdata('username')])->row_array();
      if($this->session->userdata('username') != null){
        $foto = $data['user']['photos'];
        $id_user = $data['user']['id_user'];
      }
      else{
        $foto = 'default.png';
        $id_user ='0';
      }
      $data['foto'] = $foto;
      $data['id_user'] = $id_user;
     if($this->session->userdata('username')){
       redirect('auth/logout');
     }
     $this->form_validation->set_rules('username','Username','required|trim',['required'=>'Username belum diisi!']);
     $this->form_validation->set_rules('password','Password','required|trim',['required'=>'Password belum diisi!']);

     if($this->form_validation->run() == false){
       $data['judul'] = 'Log In';
       $data['kelas']='';
       $data['kelas1']='';
       $this->load->view('templates/header', $data);
       $this->load->view('auth/login');
     }
     else{
       $this->_cekLogin();
     }
   }

   public function pendaftaran(){

     $this->form_validation->set_rules('nama','Nama','required|trim',['required'=>'Nama belum diisi!']);
     $this->form_validation->set_rules('username','Username','required|trim|is_unique[tbl_user.username]',['required'=>'Username belum diisi!','is_unique'=>'Username ini sudah digunakan']);
     $this->form_validation->set_rules('email','Email','required|trim|valid_email',['required'=>'Email belum diisi!','valid_email'=>'Format email salah!']);
     $this->form_validation->set_rules('password1','Password','required|trim|min_length[6]',['required'=>'Password belum diisi!','min_length'=>'Password minimal 6 karakter']);
     $this->form_validation->set_rules('password2','Password Repeat','required|trim|matches[password1]',['required'=>'Ulangi password!','matches'=>'Password tidak sama!']);

     $data['user'] = $this->db->get_where('tbl_user', ['username'=>
      $this->session->userdata('username')])->row_array();
      if($this->session->userdata('username') != null){
        $foto = $data['user']['photos'];
        $id_user = $data['user']['id_user'];
      }
      else{
        $foto = 'default.png';
        $id_user = '0';
      }
      $data['foto'] = $foto;
      $data['id_user'] = $id_user;

     if($this->form_validation->run() == false){
       $data['judul'] = 'Pendaftaran';
       $data['kelas']='';
       $data['kelas1']='';
       $this->load->view('templates/header', $data);
       $this->load->view('auth/register');
     }
     else{
       $data =[
         'id_user' => date('ymdhis'),
         'nama' => htmlspecialchars($this->input->post('nama',true)),
         'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
         'username' => htmlspecialchars($this->input->post('username',true)),
         'photos' => 'default.png',
         'email' => htmlspecialchars($this->input->post('email',true)),
         'notlp' => '',
         'alamat' => '',
         'level' => '1',
         'status_aktif' => '1'
       ];

       $this->db->insert('tbl_user',$data);
       $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
  Selamat! Akun anda berhasil dibuat, Silahkan Log In
</div');
       redirect('auth/index');
     }
   }

  private function _cekLogin(){
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $user = $this->db->get_where('tbl_user',['username'=>$username])->row_array();

    if($user){
      if($user['status_aktif'] ==1 ){
        if(password_verify($password, $user['password'])){
          if($user['level'] == 1){
            $data = [
              'id_user' => $user['id_user'],
              'level' => $user['level']
            ];
            $this->session->set_userdata($data);
            redirect('Ecomerce');
          }
          if($user['level'] == 2){
            $data = [
              'id_user' => $user['id_user'],
              'level' => $user['level']
            ];
            $this->session->set_userdata($data);
            redirect('Admin');
          }
        }
        else{
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
     Maaf! username atau password yang anda masukan salah
    </div');
          redirect('auth');
        }
      }
      else{
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
         Username ini belum melakukan aktivasi
        </div');
        redirect('auth');
      }
    }
    else{
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
       Maaf! username atau password yang anda masukan salah
      </div');
      redirect('auth');
    }
  }

  public function logout(){
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('id_user');
    $this->session->unset_userdata('hak_akses');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
     Anda sudah keluar
    </div');
    redirect('Ecomerce');
  }

  

 }

?>
