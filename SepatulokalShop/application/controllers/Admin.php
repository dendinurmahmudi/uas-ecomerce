<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Admin extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('ecomerce_models');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
     	$this->session->userdata('id_user')])->row_array();
     	$data['judul'] = 'Beranda Admin';
		  $data['kelas']='active';
      $data['kelas1']='';
      $data['kelas2']='';
      $data['kelas3']='';
     	if($this->session->userdata('id_user') != null){
       	$foto = $data['user']['photos'];
       	$id_user = $data['user']['id_user'];
     	}
     	else{
       	$foto = 'default.png';
       	$id_user ='0';
     	}
     	$data['foto'] = $foto;
     	$data['id_user'] = $id_user;
      $data['tgl'] = date('d M Y');
      $tgl = date('d M Y');
		$data['product']= $this->ecomerce_models->getrating();
    $data['pemesan']= $this->ecomerce_models->counttglpemesan($tgl);
    $data['testi']= $this->ecomerce_models->counttesti();
    $data['barang']= $this->ecomerce_models->countbarang();
    $data['pengguna']= $this->ecomerce_models->countpengguna();
		$this->load->view('templates/admin-header',$data);
		$this->load->view('admin/index',$data);
		$this->load->view('templates/admin-footer');
	}
	public function barang()
	{
		  $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
     	$this->session->userdata('id_user')])->row_array();
     	$data['judul'] = 'Barang';
		  $data['kelas']='';
      $data['kelas1']='active';
      $data['kelas2']='';
      $data['kelas3']='';
     	if($this->session->userdata('id_user') != null){
       	$foto = $data['user']['photos'];
       	$id_user = $data['user']['id_user'];
     	}
     	else{
       	$foto = 'default.png';
       	$id_user ='0';
     	}
     	$data['foto'] = $foto;
     	$data['id_user'] = $id_user;
      if($this->session->userdata('id_user') == null){
        $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Anda harus masuk terlebih dulu!</div');
        redirect('auth');
     }else{
		$data['barang']= $this->ecomerce_models->getdatabarang();
		$this->load->view('templates/admin-header',$data);
		$this->load->view('admin/barang',$data);
		$this->load->view('templates/admin-footer');
  }
	}
	public function getbarangbyid($id)
	{	
		$data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
     	$this->session->userdata('id_user')])->row_array();
     	if($this->session->userdata('id_user') != null){
       	$foto = $data['user']['photos'];
       	$id_user = $data['user']['id_user'];
     	}
     	else{
       	$foto = 'default.png';
       	$id_user ='0';
     	}
     	$data['foto'] = $foto;
     	$data['id_user'] = $id_user;
		$data['judul']='Edit Barang';
    $data['kelas']='';
    $data['kelas1']='active';
    $data['kelas2']='';
    $data['kelas3']='';
		$data['kategory']=$this->ecomerce_models->getkategori();
		$data['detail']=$this->ecomerce_models->getProductById($id);
		$this->load->view('templates/admin-header',$data);
		$this->load->view('admin/editbarang',$data);
		$this->load->view('templates/admin-footer');
	}
  public function getkategorid($id)
  { 
    $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      if($this->session->userdata('id_user') != null){
        $foto = $data['user']['photos'];
        $id_user = $data['user']['id_user'];
      }
      else{
        $foto = 'default.png';
        $id_user ='0';
      }
      $data['foto'] = $foto;
      $data['id_user'] = $id_user;
    $data['judul']='Edit Kategori';
    $data['kelas']='';
    $data['kelas1']='active';
    $data['kelas2']='';
    $data['kelas3']='';
    $data['kategory']=$this->ecomerce_models->getkategoriid($id);
    $this->load->view('templates/admin-header',$data);
    $this->load->view('admin/editkategori',$data);
    $this->load->view('templates/admin-footer');
  }
	public function editbarang(){
	   $idproduk = $this->input->post('id_produk',true);
     $nama = $this->input->post('nama',true);
     $harga = $this->input->post('harga',true);
     $stok = $this->input->post('stok',true);
     $status = $this->input->post('status',true);
     $kategori = $this->input->post('kategori',true);
     $deskripsi = $this->input->post('deskripsi',true);

     $upload_image = $_FILES['foto']['name'];
     if($upload_image){
       $config['upload_path']          = './Assets/img/product/product/';
       $config['allowed_types']        = 'jpeg|jpg|png';
       $config['max_size']             = 2048; // 2MB
       $this->load->library('upload', $config);
       if ($this->upload->do_upload('foto')) {
         $new_image = $this->upload->data('file_name');
         $this->db->set('foto',$new_image);
       }
     }

     $this->db->set('nama_product',$nama);
     $this->db->set('harga',$harga);
     $this->db->set('stok',$stok);
     $this->db->set('status',$status);
     $this->db->set('category',$kategori);
     $this->db->set('deskripsi',$deskripsi);
     $this->db->where('id_product',$idproduk);
     $this->db->update('tbl_product');
     $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      data '.$nama.' berhasil diprebarui
     </div');
     redirect('admin/barang');
   }
   public function tambahstok($idproduk){
     $nama = $this->input->post('nama',true);
     $stok = $this->input->post('stok',true);
     $tambahstok = $this->input->post('tambahstok',true);
     
     $this->db->query('update tbl_product set stok = '.$stok.' + '.$tambahstok.' where id_product='.$idproduk);
     $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      data '.$nama.' berhasil ditambah
     </div');
     redirect('admin/getbarangbyid/'.$idproduk);
   }
   public function hapusbarang($id)
	{
		$this->ecomerce_models->hapusbarang($id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Data berhasil dihapus
     </div');
	redirect('admin/barang');	
	}
  public function tambah()
  { 
    $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      if($this->session->userdata('id_user') != null){
        $foto = $data['user']['photos'];
        $id_user = $data['user']['id_user'];
      }
      else{
        $foto = 'default.png';
        $id_user ='0';
      }
      $data['foto'] = $foto;
      $data['id_user'] = $id_user;
      $data['judul']='Tambah Barang';
      $data['kelas']='';
      $data['kelas1']='active';
      $data['kelas2']='';
      $data['kelas3']='';
    $data['kategory']=$this->ecomerce_models->getkategori();
    $this->load->view('templates/admin-header',$data);
    $this->load->view('admin/tambahBarang',$data);
    $this->load->view('templates/admin-footer');
  }
  public function tambahbarang(){
     $data = [
              'id_product' => '',
              'nama_product' => $this->input->post('nama',true),
              'foto' => $this->_uploadImage(),
              'deskripsi' => $this->input->post('deskripsi',true),
              'status' => 'on',
              'harga' => $this->input->post('harga',true),
              'category' => $this->input->post('kategori',true),
              'stok' => $this->input->post('stok',true)
            ];

            $this->db->insert('tbl_product',$data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Berhasil menambah Data '.$this->input->post('nama',true).'
     </div');
            redirect('admin/barang');
   }
   private function _uploadImage()
   {
    $config['upload_path']          = './assets/img/product/product/';
    $config['allowed_types']        = 'jpeg|jpg|png|doc|docx|pdf';
    $config['max_size']             = 2048; // 2MB
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('foto')) {
        return $this->upload->data("file_name");
     }else{
        return 'gambardefault.png';
     }
    }
    public function kategori()
  {
      $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      $data['judul'] = 'Kategori';
      $data['kelas']='';
      $data['kelas1']='active';
      $data['kelas2']='';
      $data['kelas3']='';
      if($this->session->userdata('id_user') != null){
        $foto = $data['user']['photos'];
        $id_user = $data['user']['id_user'];
      }
      else{
        $foto = 'default.png';
        $id_user ='0';
      }
      $data['foto'] = $foto;
      $data['id_user'] = $id_user;
      if($this->session->userdata('id_user') == null){
        $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Anda harus masuk terlebih dulu!</div');
        redirect('auth');
     }else{
    $data['kategori']= $this->ecomerce_models->getkategori();
    $this->load->view('templates/admin-header',$data);
    $this->load->view('admin/kategori',$data);
    $this->load->view('templates/admin-footer');
  }
  }
  public function editkategori(){
     $idkategori = $this->input->post('idkategori',true);
     $nama = $this->input->post('nama',true);
     $this->db->set('nama_category',$nama);
     $this->db->where('id_category',$idkategori);
     $this->db->update('tbl_category');
     $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      data '.$nama.' berhasil diprebarui
     </div');
     redirect('admin/kategori');
   }
   public function tambahkategori(){
     $data = [
              'id_category' => '',
              'nama_category' => $this->input->post('nama',true)
            ];

            $this->db->insert('tbl_category',$data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Berhasil menambah Data '.$this->input->post('nama',true).'
     </div');
            redirect('admin/kategori');
   }
   public function hapuskategori($id)
  {
    $this->ecomerce_models->hapuskategori($id);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Data berhasil dihapus
     </div');
  redirect('admin/kategori'); 
  }
  public function profile()
  { 
    $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      if($this->session->userdata('id_user') != null){
        $foto = $data['user']['photos'];
        $id_user = $data['user']['id_user'];
      }
      else{
        $foto = 'default.png';
        $id_user ='0';
      }
      $data['foto'] = $foto;
      $data['id_user'] = $id_user;
      $data['judul']='Profile';
      $data['kelas']='';
      $data['kelas1']='';
      $data['kelas2']='';
      $data['kelas3']='';
    
    if($this->session->userdata('id_user') == null){
        $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Anda harus masuk terlebih dulu!</div');
        redirect('auth');
     }else{
    $this->load->view('templates/admin-header',$data);
    $this->load->view('admin/profile-admin',$data);
    $this->load->view('templates/footer');
  }
  }
  public function detailuser($id)
  { 
    $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      if($this->session->userdata('id_user') != null){
        $foto = $data['user']['photos'];
        $id_user = $data['user']['id_user'];
      }
      else{
        $foto = 'default.png';
        $id_user ='0';
      }
      $data['foto'] = $foto;
      $data['id_user'] = $id_user;
      $data['judul']='Profile';
      $data['kelas']='';
      $data['kelas1']='';
      $data['kelas2']='';
      $data['kelas3']='active';
    
    if($this->session->userdata('id_user') == null){
        $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Anda harus masuk terlebih dulu!</div');
        redirect('auth');
     }else{
    $data['customer']= $this->ecomerce_models->getuserid($id);
    $this->load->view('templates/admin-header',$data);
    $this->load->view('admin/detail-user',$data);
    $this->load->view('templates/footer');
  }
  }
  public function userdata()
  {
      $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      $data['judul'] = 'Pengguna';
      $data['kelas']='';
      $data['kelas1']='';
      $data['kelas2']='';
      $data['kelas3']='active';
      if($this->session->userdata('id_user') != null){
        $foto = $data['user']['photos'];
        $id_user = $data['user']['id_user'];
        $level = $data['user']['level'];
      }
      else{
        $foto = 'default.png';
        $id_user ='0';
      }
      $data['foto'] = $foto;
      $data['id_user'] = $id_user;
      if($this->session->userdata('id_user') == null){
        $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Anda harus masuk terlebih dulu!</div');
        redirect('auth');
     }else{
    $data['pengguna']= $this->ecomerce_models->getuser();
    $this->load->view('templates/admin-header',$data);
    $this->load->view('admin/datauser',$data);
    $this->load->view('templates/admin-footer');
  }
  }
  public function hapususer($id)
  {
    $this->ecomerce_models->hapususer($id);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Data berhasil dihapus
     </div');
  redirect('admin/userdata'); 
  }
  public function setAdmin($id_user){
     $this->db->set('level',2);
     $this->db->where('id_user',$id_user);
     $this->db->update('tbl_user');
     redirect('admin/userdata');
   }

   public function setCustomer($id_user){
     $this->db->set('level',1);
     $this->db->where('id_user',$id_user);
     $this->db->update('tbl_user');
     redirect('admin/userdata');
   }
   public function pesanan()
  {
      $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      $data['judul'] = 'Pesanan';
      $data['kelas']='';
      $data['kelas1']='';
      $data['kelas2']='active';
      $data['kelas3']='';
      if($this->session->userdata('id_user') != null){
        $foto = $data['user']['photos'];
        $id_user = $data['user']['id_user'];
        $level = $data['user']['level'];
      }
      else{
        $foto = 'default.png';
        $id_user ='0';
      }
      $data['foto'] = $foto;
      $data['id_user'] = $id_user;
      if($this->session->userdata('id_user') == null){
        $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Anda harus masuk terlebih dulu!</div');
        redirect('auth');
     }else{
    $data['pesanan']= $this->ecomerce_models->getpesanan();
    $this->load->view('templates/admin-header',$data);
    $this->load->view('admin/pesanan',$data);
    $this->load->view('templates/admin-footer');
  }
  }
  public function pesanandikemas()
  {
      $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      $data['judul'] = 'Pesanan';
      $data['kelas']='';
      $data['kelas1']='';
      $data['kelas2']='active';
      $data['kelas3']='';
      if($this->session->userdata('id_user') != null){
        $foto = $data['user']['photos'];
        $id_user = $data['user']['id_user'];
        $level = $data['user']['level'];
      }
      else{
        $foto = 'default.png';
        $id_user ='0';
      }
      $data['foto'] = $foto;
      $data['id_user'] = $id_user;
      if($this->session->userdata('id_user') == null){
        $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Anda harus masuk terlebih dulu!</div');
        redirect('auth');
     }else{
    $data['kemasan']= $this->ecomerce_models->getkemasan();
    $this->load->view('templates/admin-header',$data);
    $this->load->view('admin/pesanandikemas',$data);
    $this->load->view('templates/admin-footer');
  }
  }
  public function pesanandikirim()
  {
      $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      $data['judul'] = 'Pesanan';
      $data['kelas']='';
      $data['kelas1']='';
      $data['kelas2']='active';
      $data['kelas3']='';
      if($this->session->userdata('id_user') != null){
        $foto = $data['user']['photos'];
        $id_user = $data['user']['id_user'];
        $level = $data['user']['level'];
      }
      else{
        $foto = 'default.png';
        $id_user ='0';
      }
      $data['foto'] = $foto;
      $data['id_user'] = $id_user;
      if($this->session->userdata('id_user') == null){
        $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Anda harus masuk terlebih dulu!</div');
        redirect('auth');
     }else{
    $data['kiriman']= $this->ecomerce_models->getkiriman();
    $this->load->view('templates/admin-header',$data);
    $this->load->view('admin/pesanandikirim',$data);
    $this->load->view('templates/admin-footer');
  }
  }
  public function pesananselesai()
  {
      $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      $data['judul'] = 'Pesanan';
      $data['kelas']='';
      $data['kelas1']='';
      $data['kelas2']='active';
      $data['kelas3']='';
      if($this->session->userdata('id_user') != null){
        $foto = $data['user']['photos'];
        $id_user = $data['user']['id_user'];
        $level = $data['user']['level'];
      }
      else{
        $foto = 'default.png';
        $id_user ='0';
      }
      $data['foto'] = $foto;
      $data['id_user'] = $id_user;
      if($this->session->userdata('id_user') == null){
        $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Anda harus masuk terlebih dulu!</div');
        redirect('auth');
     }else{
    $data['selesai']= $this->ecomerce_models->getselesai();
    $this->load->view('templates/admin-header',$data);
    $this->load->view('admin/pesananselesai',$data);
    $this->load->view('templates/admin-footer');
  }
  }
  public function ubah_password(){
      $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>$this->session->userdata('id_user')])->row_array();
      $pwLama = $this->input->post('passwordLama');
      $pwBaru1 = $this->input->post('passwordBaru1');
      $pwBaru2 = $this->input->post('passwordBaru2');

      if(password_verify($pwLama,$data['user']['password'])){
        if ($pwBaru1 == $pwBaru2) {
          $password = password_hash($pwBaru1,PASSWORD_DEFAULT);
          $this->db->set('password',$password);
          $this->db->where('id_user',$data['user']['id_user']);
          $this->db->update('tbl_user');
          $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
           Password berhasil diprebarui
          </div');
          redirect('admin/profile/'.$data['user']['id_user']);
        }else if($pwBaru1 != $pwBaru2){
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
           Password tidak sama, mohon ulangi
          </div');
          redirect('admin/profile/'.$data['user']['id_user']);
        }
      }else{
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
           Password lama salah, mohon ulangi
          </div');
          redirect('admin/profile/'.$data['user']['id_user']);
      }
    }
    public function ubahnorek(){
      $data='';
      $norekening = $this->input->post('norekening');
      $nama = $this->input->post('nama');
          $this->db->set('norek',$norekening);
          $this->db->set('an',$nama);
          $this->db->where('level',2);
          $this->db->update('tbl_rekening');
          $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
           No rekening berhasil diprebarui
          </div');
          redirect('admin/profile/'.$data['user']['id_user']);
        }
    public function getstatusid($id)
  { 
    $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      if($this->session->userdata('id_user') != null){
        $foto = $data['user']['photos'];
        $id_user = $data['user']['id_user'];
      }
      else{
        $foto = 'default.png';
        $id_user ='0';
      }
      $data['foto'] = $foto;
      $data['id_user'] = $id_user;
    $data['judul']='Edit Kategori';
    $data['kelas']='';
    $data['kelas2']='active';
    $data['kelas1']='';
    $data['kelas3']='';
    $data['pesanan']=$this->ecomerce_models->getstatusid($id);
    $this->load->view('templates/admin-header',$data);
    $this->load->view('admin/editstatus',$data);
    $this->load->view('templates/admin-footer');
  }
  public function getstatusid1($id)
  { 
    $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      if($this->session->userdata('id_user') != null){
        $foto = $data['user']['photos'];
        $id_user = $data['user']['id_user'];
      }
      else{
        $foto = 'default.png';
        $id_user ='0';
      }
      $data['foto'] = $foto;
      $data['id_user'] = $id_user;
    $data['judul']='Edit Kategori';
    $data['kelas']='';
    $data['kelas2']='active';
    $data['kelas1']='';
    $data['kelas3']='';
    $data['pesanan']=$this->ecomerce_models->getstatusid($id);
    $this->load->view('templates/admin-header',$data);
    $this->load->view('admin/editstatus1',$data);
    $this->load->view('templates/admin-footer');
  }
  public function editstatus(){
     $idpemesan = $this->input->post('idpemesan',true);
     $status = $this->input->post('status',true);
     $noresi = $this->input->post('nomorresi',true);
     $this->db->set('no_resi',$noresi);
     $this->db->set('status_pesanan',$status);
     $this->db->where('id_pemesan',$idpemesan);
     $this->db->update('tbl_pemesan');
     $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      data berhasil diprebarui
     </div');
     redirect('admin/pesanandikemas');
   }
   public function detailpesanan($id)
  {
      $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      $data['judul'] = 'Pesanan';
      $data['kelas']='';
      $data['kelas1']='';
      $data['kelas2']='active';
      $data['kelas3']='';
      if($this->session->userdata('id_user') != null){
        $foto = $data['user']['photos'];
        $id_user = $data['user']['id_user'];
        $level = $data['user']['level'];
      }
      else{
        $foto = 'default.png';
        $id_user ='0';
      }
      $data['foto'] = $foto;
      $data['id_user'] = $id_user;
      if($this->session->userdata('id_user') == null){
        $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Anda harus masuk terlebih dulu!</div');
        redirect('auth');
     }else{
    $data['detailpesanan']= $this->ecomerce_models->getdetailpesanan($id);
    $this->load->view('templates/admin-header',$data);
    $this->load->view('admin/detailpesanan',$data);
    $this->load->view('templates/admin-footer');
  }
  }
  public function detailulasan($id)
  { 
    $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      if($this->session->userdata('id_user') != null){
        $foto = $data['user']['photos'];
        $id_user = $data['user']['id_user'];
      }
      else{
        $foto = 'default.png';
        $id_user ='0';
      }
      $data['foto'] = $foto;
      $data['id_user'] = $id_user;
    $data['judul'] = 'Detail ulasan';
      $data['kelas']='';
      $data['kelas1']='active';
      $data['kelas2']='';
      $data['kelas3']='';
    $data['detail']=$this->ecomerce_models->getProductById($id);
    $data['avg']=$this->ecomerce_models->avgrating($id);
    $data['count']=$this->ecomerce_models->countrating($id);
    $data['testi']=$this->ecomerce_models->gettestimoni($id);
    $this->load->view('templates/admin-header',$data);
    $this->load->view('admin/detail_ulasan',$data);
    $this->load->view('templates/admin-footer');
  }
  public function testimoni()
  {
    $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      $data['judul'] = 'Testimoni';
      $data['kelas']='';
      $data['kelas1']='active';
      $data['kelas2']='';
      $data['kelas3']='';
      if($this->session->userdata('id_user') != null){
        $foto = $data['user']['photos'];
        $id_user = $data['user']['id_user'];
      }
      else{
        $foto = 'default.png';
        $id_user ='0';
      }
      $data['foto'] = $foto;
      $data['id_user'] = $id_user;
      $data['tgl'] = date('d M Y');
      $tgl = date('d M Y');
    $data['product']= $this->ecomerce_models->getrating();
    $this->load->view('templates/admin-header',$data);
    $this->load->view('admin/testimoni',$data);
    $this->load->view('templates/admin-footer');
  }
  public function print($id)
  {
    $data['detailpesanan']= $this->ecomerce_models->getdetailpesanan($id);
    $this->load->view('admin/print',$data);
  }
  


}
 ?>
