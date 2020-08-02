<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Ecomerce extends CI_Controller
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
     	$data['judul'] = 'Beranda';
		  $data['kelas']='active';
      $data['kelas1']='';
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
    $data['product']= $this->ecomerce_models->getalldatalimit();
		$data['kategori']= $this->ecomerce_models->getalldatakategori();
    $data['baru']= $this->ecomerce_models->getprodukbaru();
		$this->load->view('templates/header',$data);
		$this->load->view('user/index',$data);
		$this->load->view('templates/footer');
	}
	public function detail($id)
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
		$data['judul']='Detail Product';
		$data['kelas']='active';
    $data['kelas1']='';
		$data['detail']=$this->ecomerce_models->getProductById($id);
    $data['avg']=$this->ecomerce_models->avgrating($id);
    $data['count']=$this->ecomerce_models->countrating($id);
    $data['testi']=$this->ecomerce_models->gettestimoni($id);
		$this->load->view('templates/header',$data);
		$this->load->view('user/product_detail',$data);
		$this->load->view('templates/footer');
	}
  public function alldataproduk()
  {
    $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      $data['judul'] = 'Beranda';
      $data['kelas']='active';
      $data['kelas1']='';
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
    $data['product']= $this->ecomerce_models->getalldata();
    $this->load->view('templates/header',$data);
    $this->load->view('user/indexalldata',$data);
    $this->load->view('templates/footer');
  }
	public function keranjang($id)
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
     	$data['id_user'] = $id_user;
     	$data['foto'] = $foto;
		  $data['judul']='Keranjang';
		  $data['kelas']='';
      $data['kelas1']='';
     	if($this->session->userdata('id_user') == null){
       	$this->session->set_flashdata('pesa','<div class="alert alert-danger" role="alert">Masih kosong nih, Ayo login dan mulai berbelanja.</div');
       	$data['keranjang']=$this->ecomerce_models->getKeranjang($id);
       	$this->load->view('templates/header',$data);
		$this->load->view('user/keranjang',$data);
		$this->load->view('templates/footer');
     }else{
		$data['keranjang']=$this->ecomerce_models->getKeranjang($id);
		$this->load->view('templates/header',$data);
		$this->load->view('user/keranjang',$data);
		$this->load->view('templates/footer');
	}
	}

	public function Insertkeranjang($id)
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
     	$data['id_user'] = $id_user;
     	$data['foto'] = $foto;
		  $data['judul']='Keranjang';
		  $data['kelas']='';
      $data['kelas1']='';
		if($this->session->userdata('id_user') == null){
       	$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Anda harus masuk terlebih dulu!</div');
        redirect('auth');
     }else{
		$data=[
			"id_user" => $id_user,
			"id_product" => $id,
			"qty" => $this->input->post('qty', true),
		];
		$this->db->insert('tbl_keranjang',$data);
		redirect('ecomerce/detail/'.$id);
		}
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
		if($this->session->userdata('id_user') == null){
       	$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Anda harus masuk terlebih dulu!</div');
        redirect('auth');
     }else{
		$this->load->view('templates/header',$data);
		$this->load->view('user/profile',$data);
		$this->load->view('templates/footer');
	}
	}
	public function ubah_profile(){
	 $iduser = $this->input->post('id_user',true);
     $nama = $this->input->post('nama',true);
     $username = $this->input->post('username',true);
     $notlp = $this->input->post('notlp',true);
     $email = $this->input->post('email',true);
     $alamat = $this->input->post('alamat',true);

     $upload_image = $_FILES['foto']['name'];
     if($upload_image){
       $config['upload_path']          = './Assets/img/profile/';
       $config['allowed_types']        = 'jpeg|jpg|png';
       $config['max_size']             = 2048; // 2MB
       $this->load->library('upload', $config);
       if ($this->upload->do_upload('foto')) {
         $new_image = $this->upload->data('file_name');
         $this->db->set('photos',$new_image);
       }
     }

     $this->db->set('nama',$nama);
     $this->db->set('username',$username);
     $this->db->set('notlp',$notlp);
     $this->db->set('email',$email);
     $this->db->set('alamat',$alamat);
     $this->db->where('id_user',$iduser);
     $this->db->update('tbl_user');
     $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      data '.$username.' berhasil diprebarui
     </div');
     redirect('ecomerce/profile/'.$username);
   }
   public function checkout($id)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
     	$this->session->userdata('id_user')])->row_array();
     	$data['judul'] = 'checkout';
		  $data['kelas']='';
      $data['kelas1']='';
     	if($this->session->userdata('id_user') != null){
       	$foto = $data['user']['photos'];
       	$id_user = $data['user']['id_user'];
     	}
     	else{
       	$foto = 'default.png';
       	$id_user ='0';
     	}
     	if($this->session->userdata('id_user') == null){
       	$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Anda harus masuk terlebih dulu!</div');
        redirect('auth');
        }else{
     	$data['foto'] = $foto;
     	$data['id_user'] = $id_user;
		$data['keranjang']=$this->ecomerce_models->getKeranjang($id);
    $data['berat'] = $this->db->query('select count(qty)berat from tbl_keranjang where id_user='.$id)->row_array();
		$this->load->view('templates/header',$data);
		$this->load->view('user/checkout',$data);
		$this->load->view('templates/footer');
		}
	}
  public function setprovinsi(){
    $provinsi = $this->rajaongkir->province(9);
    $this->output->set_content_type('application/json')->set_output($provinsi);
  }
  public function setkota($id,$prov){
    $kotasal = $this->rajaongkir->city($id,$prov);
    $this->output->set_content_type('application/json')->set_output($kotasal);
  }
  public function getprovinsi(){
    $provinsi = $this->rajaongkir->province();
    $this->output->set_content_type('application/json')->set_output($provinsi);
  }
  public function getkota($id_provinsi){
    $kota = $this->rajaongkir->city($id_provinsi);
    $this->output->set_content_type('application/json')->set_output($kota);
  }
  public function getongkir($asal,$tujuan,$berat,$kurir){
    $ongkir = $this->rajaongkir->cost($asal,$tujuan,$berat,$kurir);
    $this->output->set_content_type('application/json')->set_output($ongkir);
  }
	public function singlecheckout($barang)
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
     	if($this->session->userdata('id_user') == null){
       	$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Anda harus masuk terlebih dulu!</div');
        redirect('auth');
        }else{
          $this->form_validation->set_rules('email','Email','required|trim|valid_email',['required'=>'Email belum diisi!','valid_email'=>'Format email salah!']);

          if ($this->form_validation->run() == false) {  
          $data['judul'] = 'checkout';
          $data['kelas']='';
          $data['kelas1']='';
          $data['foto'] = $foto;
          $data['id_user'] = $id_user;
          $data['qty'] = $this->input->post('jumlah', true);
          $data['produk']=$this->ecomerce_models->getProductById($barang);          
		      $this->load->view('templates/header',$data);
		      $this->load->view('user/singlecheckout',$data);
		      $this->load->view('templates/footer');
      }else{

      }
		}
	}
	public function konfirmasi($id)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
     	$this->session->userdata('id_user')])->row_array();
     	$data['judul'] = 'checkout';
	   	$data['kelas']='';
      $data['kelas1']='';
     	if($this->session->userdata('id_user') != null){
       	$foto = $data['user']['photos'];
       	$id_user = $data['user']['id_user'];
       	$username = $data['user']['username'];
       	$nama = $data['user']['nama'];
       	$nohp = $data['user']['notlp'];
     	}
     	else{
       	$foto = 'default.png';
       	$id_user ='0';
     	}
     	$data['foto'] = $foto;
      $data['id_user'] = $id_user;
      $data['username'] = $username;
      $data['nama'] = $nama;
      $data['nohp'] = $nohp;
      $data['id_transaksi'] = date('ymdhis');
      $data['namapenerima'] = $this->input->post('nama', true);
      $data['nohp1'] = $this->input->post('nohp', true);
      $data['kecamatan'] = $this->input->post('kecamatan', true);
      $data['paket'] = $this->input->post('paket', true);
      $data['qty'] = $this->input->post('jumlah', true);
      $data['alamat'] = $this->input->post('alamatpenerima', true);
      $data['pembayaran'] = $this->input->post('pembayaran', true);
      $data['provinsi'] = $this->input->post('provinsi', true);
      $data['Kabupatenkota'] = $this->input->post('Kabupatenkota', true);
      $data['desa'] = $this->input->post('desa', true);
      $data['kodepos'] = $this->input->post('kodepos', true);
      $data['ongkos'] = $this->input->post('ongkos', true);
		  $data['keranjang']=$this->ecomerce_models->getKeranjang($id);
      $data['rekening']=$this->ecomerce_models->getrekening();
      
		$this->load->view('templates/header',$data);
		$this->load->view('user/confirmation',$data);
		$this->load->view('templates/footer');
	}
	public function singlekonfirmasi($barang)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
     	$this->session->userdata('id_user')])->row_array();
     	$data['judul'] = 'checkout';
		  $data['kelas']='';
      $data['kelas1']='';
     	if($this->session->userdata('id_user') != null){
       	$foto = $data['user']['photos'];
       	$id_user = $data['user']['id_user'];
       	$username = $data['user']['username'];
       	$nama = $data['user']['nama'];
       	$nohp = $data['user']['notlp'];
     	}
     	else{
       	$foto = 'default.png';
       	$id_user ='0';
     	}
     	$data['foto'] = $foto;
     	$data['id_user'] = $id_user;
     	$data['username'] = $username;
     	$data['nama'] = $nama;
     	$data['nohp'] = $nohp;
     	$data['id_transaksi'] = date('ymdhis');
     	$data['namapenerima'] = $this->input->post('nama', true);
     	$data['nohp1'] = $this->input->post('nohp', true);
     	$data['kecamatan'] = $this->input->post('kecamatan', true);
     	$data['paket'] = $this->input->post('paket', true);
     	$data['qty'] = $this->input->post('jumlah', true);
      $data['alamat'] = $this->input->post('alamatpenerima', true);
     	$data['pembayaran'] = $this->input->post('pembayaran', true);
     	$data['provinsi'] = $this->input->post('provinsi', true);
      $data['Kabupatenkota'] = $this->input->post('Kabupatenkota', true);
      $data['desa'] = $this->input->post('desa', true);
     	$data['kodepos'] = $this->input->post('kodepos', true);
     	$data['ongkos'] = $this->input->post('ongkos', true);
		$data['produk']=$this->ecomerce_models->getProductById($barang);
    $data['rekening']=$this->ecomerce_models->getrekening();
		$this->load->view('templates/header',$data);
		$this->load->view('user/singleconfirmation',$data);
		$this->load->view('templates/footer');
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
          redirect('ecomerce/profile/'.$data['user']['id_user']);
        }else if($pwBaru1 != $pwBaru2){
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
           Password tidak sama, mohon ulangi
          </div');
          redirect('ecomerce/profile/'.$data['user']['id_user']);
        }
      }else{
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
           Password lama salah, mohon ulangi
          </div');
          redirect('ecomerce/profile/'.$data['user']['id_user']);
      }
    }
    public function uploadTF(){
     $iduser = $this->input->post('id_user',true);
     $nama = $this->input->post('nama',true);
     $username = $this->input->post('username',true);
     $notlp = $this->input->post('notlp',true);
     $email = $this->input->post('email',true);
     $alamat = $this->input->post('alamat',true);

     $upload_image = $_FILES['foto']['name'];
     if($upload_image){
       $config['upload_path']          = './Assets/img/profile/';
       $config['allowed_types']        = 'jpeg|jpg|png';
       $config['max_size']             = 2048; // 2MB
       $this->load->library('upload', $config);
       if ($this->upload->do_upload('foto')) {
         $new_image = $this->upload->data('file_name');
         $this->db->set('photos',$new_image);
       }
     }

     $this->db->set('nama',$nama);
     $this->db->set('username',$username);
     $this->db->set('notlp',$notlp);
     $this->db->set('email',$email);
     $this->db->set('alamat',$alamat);
     $this->db->where('id_user',$iduser);
     $this->db->update('tbl_user');
     $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      data '.$username.' berhasil diprebarui
     </div');
     redirect('ecomerce/profile/'.$username);
   }
   public function kategori($id)
  {
    $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      $data['judul'] = 'Beranda';
      $data['kelas']='active';
      $data['kelas1']='';
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
    $data['kategoriproduct']= $this->ecomerce_models->getdatakategori($id);
    $data['kategori']= $this->ecomerce_models->getalldatakategori();
    $data['ktgr']= $this->ecomerce_models->getnamakategori($id);
    $data['baru']= $this->ecomerce_models->getprodukbaru();
    $this->load->view('templates/header',$data);
    $this->load->view('user/indexkategori',$data);
    $this->load->view('templates/footer');
  }
  public function editkeranjang($id,$idk)
  {
    $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      $data['judul'] = 'Beranda';
      $data['kelas']='active';
      $data['kelas1']='';
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
    $data['keranjang1']= $this->ecomerce_models->getKeranjangid($id,$idk);
    $this->load->view('templates/header',$data);
    $this->load->view('user/editkeranjang',$data);
    $this->load->view('templates/footer');
  }
  public function edit_keranjang($idu,$idp){
     $jumlah = $this->input->post('jumlahprod', true);
     $this->db->query('update tbl_keranjang set qty=qty + 1 where id_user='.$idu.' and id_product='.$idp.' and qty='.$jumlah);
     redirect('ecomerce/keranjang/'.$idu);
   }
   public function insertPesanan()
  {
    $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      $data['judul'] = 'checkout';
      $data['kelas']='';
      $data['kelas1']='';
      if($this->session->userdata('id_user') != null){
        $foto = $data['user']['photos'];
        $id_user = $data['user']['id_user'];
        $username = $data['user']['username'];
        $nama = $data['user']['nama'];
        $nohp = $data['user']['notlp'];
      }
      else{
        $foto = 'default.png';
        $id_user ='0';
      }
      $data['foto'] = $foto;
      $id_user = $id_user;
      $username = $username;
      $nama = $nama;
      $nohp = $nohp;
      $id_transaksi = $this->input->post('idpesanan', true);
      $namapenerima = $this->input->post('namapenerima', true);
      $nohp1 = $this->input->post('nohp1', true);
      $kecamatan = $this->input->post('kecamatan', true);
      $paket = $this->input->post('paket', true);
      $qty = $this->input->post('jumlah', true);
      $alamat = $this->input->post('alamat', true);
      $pembayaran = $this->input->post('pembayaran', true);
      $provinsi = $this->input->post('provinsi', true);
      $kabupaten = $this->input->post('kabupaten', true);
      $desa = $this->input->post('desa', true);
      $tgl = $this->input->post('tanggal', true);
      $kodepos = $this->input->post('kodepos', true);
      $ongkos = $this->input->post('ongkos', true);
      $idproduct = $this->input->post('idproduct', true);
      $jumlah = $this->input->post('qty', true);
      $total = $this->input->post('total', true);
      $harga = $this->input->post('harga', true);
      $subtotal = $this->input->post('subtotal', true);

      $data=[
      "id_pemesan" => $id_transaksi,
      "id_user" => $id_user,
      "nama_penerima" => $namapenerima,
      "no_hp" => $nohp1,
      "tgl" => $tgl,
      "alamat" => $alamat,
      "provinsi" => $provinsi,
      "kab_kota" => $kabupaten,
      "kecamatan" => $kecamatan,
      "desa" => $desa,
      "kodepos" => $kodepos,
      "subtotal" => $subtotal,
      "pembayaran" => $pembayaran,
      "jasa" => $paket,
      "ongkir" => $ongkos,
      "status_pesanan" => 1,
      "buktitf" => $this->_uploadImage()
    ];
    $this->db->insert('tbl_pemesan',$data);
    $data=[
      "id_pesanan" => $id_transaksi,
      "id_userpesan" => $id_user,
      "id_barang" => $idproduct,
      "jumlahcheck" => $jumlah,
      "harga" => $harga,
      "subtotal" => $total,
      "jumlahxharga" => $subtotal,
    ];
    $this->db->query('update tbl_product set stok=stok-'.$jumlah.' where id_product='.$idproduct);
    $this->db->insert('tbl_pesanan',$data);
    redirect('ecomerce/detail/'.$idproduct);
  }
  public function multiinsertpesanan(){
    $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      $data['judul'] = 'checkout';
      $data['kelas']='';
      $data['kelas1']='';
      if($this->session->userdata('id_user') != null){
        $foto = $data['user']['photos'];
        $id_user = $data['user']['id_user'];
        $username = $data['user']['username'];
        $nama = $data['user']['nama'];
        $nohp = $data['user']['notlp'];
      }
      else{
        $foto = 'default.png';
        $id_user ='0';
      }
      $data['foto'] = $foto;
      $id_user = $id_user;
      $username = $username;
      $nama = $nama;
      $nohp = $nohp;
      $id_transaksi = $this->input->post('idpesanan', true);
      $namapenerima = $this->input->post('namapenerima', true);
      $nohp1 = $this->input->post('nohp1', true);
      $kecamatan = $this->input->post('kecamatan', true);
      $paket = $this->input->post('paket', true);
      $qty = $this->input->post('jumlah', true);
      $alamat = $this->input->post('alamat', true);
      $pembayaran = $this->input->post('pembayaran', true);
      $provinsi = $this->input->post('provinsi', true);
      $kabupaten = $this->input->post('kabupaten', true);
      $desa = $this->input->post('desa', true);
      $tgl = $this->input->post('tanggal', true);
      $kodepos = $this->input->post('kodepos', true);
      $ongkos = $this->input->post('ongkos', true);
      $idproduct = $this->input->post('idproduct', true);
      $jumlah = $this->input->post('qty', true);
      $total = $this->input->post('hargaxjumlah', true);
      $harga = $this->input->post('harga', true);
      $subtotal = $this->input->post('subtotal', true);

      $data=[
      "id_pemesan" => $id_transaksi,
      "id_user" => $id_user,
      "nama_penerima" => $namapenerima,
      "no_hp" => $nohp1,
      "tgl" => $tgl,
      "alamat" => $alamat,
      "provinsi" => $provinsi,
      "kab_kota" => $kabupaten,
      "kecamatan" => $kecamatan,
      "desa" => $desa,
      "kodepos" => $kodepos,
      "subtotal" => $subtotal,
      "pembayaran" => $pembayaran,
      "jasa" => $paket,
      "ongkir" => $ongkos,
      "status_pesanan" => 1,
      "buktitf" => $this->_uploadImage()
    ];
    $this->db->insert('tbl_pemesan',$data);
    
    $data = array();
    $index = 0; 
    foreach ($idproduct as $dataid) {
      array_push($data, array(
      "id_pesanan" => $id_transaksi,
      "id_userpesan" => $id_user,
      "id_barang" => $dataid,
      "jumlahcheck" => $jumlah[$index],
      "harga" => $harga[$index],
      "subtotal" => $subtotal,
      "jumlahxharga" => $total[$index],
      )); 
      $this->db->query('update tbl_product set stok=stok-'.$jumlah[$index].' where id_product='.$dataid);
      $index++;
    }
    $sql = $this->ecomerce_models->save_batch($data);
    $this->db->query('delete from tbl_keranjang where id_user='.$id_user);
    redirect('ecomerce/pesanan/'.$id_user);
  }
  public function insertPesanan2()
  {
    $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      $data['judul'] = 'checkout';
      $data['kelas']='';
      $data['kelas1']='';
      if($this->session->userdata('id_user') != null){
        $foto = $data['user']['photos'];
        $id_user = $data['user']['id_user'];
        $username = $data['user']['username'];
        $nama = $data['user']['nama'];
        $nohp = $data['user']['notlp'];
      }
      else{
        $foto = 'default.png';
        $id_user ='0';
      }
      $data['foto'] = $foto;
      $id_user = $id_user;
      $username = $username;
      $nama = $nama;
      $nohp = $nohp;
      $id_transaksi = $this->input->post('idpesanan', true);
      $namapenerima = $this->input->post('namapenerima', true);
      $nohp1 = $this->input->post('nohp1', true);
      $kecamatan = $this->input->post('kecamatan', true);
      $paket = $this->input->post('paket', true);
      $qty = $this->input->post('jumlah', true);
      $alamat = $this->input->post('alamat', true);
      $pembayaran = $this->input->post('pembayaran', true);
      $provinsi = $this->input->post('provinsi', true);
      $kabupaten = $this->input->post('kabupaten', true);
      $desa = $this->input->post('desa', true);
      $tgl = $this->input->post('tanggal', true);
      $kodepos = $this->input->post('kodepos', true);
      $ongkos = $this->input->post('ongkos', true);
      $idproduct = $this->input->post('idproduct', true);
      $jumlah = $this->input->post('qty', true);
      $total = $this->input->post('total', true);
      $harga = $this->input->post('harga', true);
      $subtotal = $this->input->post('subtotal', true);

      $data=[
      "id_pemesan" => $id_transaksi,
      "id_user" => $id_user,
      "nama_penerima" => $namapenerima,
      "no_hp" => $nohp1,
      "tgl" => $tgl,
      "alamat" => $alamat,
      "provinsi" => $provinsi,
      "kab_kota" => $kabupaten,
      "kecamatan" => $kecamatan,
      "desa" => $desa,
      "kodepos" => $kodepos,
      "subtotal" => $subtotal,
      "pembayaran" => $pembayaran,
      "jasa" => $paket,
      "ongkir" => $ongkos,
      "status_pesanan" => 1,
      "buktitf" => $this->_uploadImage()
    ];
    $this->db->insert('tbl_pemesan',$data);
    $data=[
      "id_pesanan" => $id_transaksi,
      "id_userpesan" => $id_user,
      "id_barang" => $idproduct,
      "jumlahcheck" => $jumlah,
      "harga" => $harga,
      "subtotal" => $total,
      "jumlahxharga" => $subtotal,
    ];
    $this->db->query('update tbl_product set stok=stok-'.$jumlah.' where id_product='.$idproduct);
    $this->db->insert('tbl_pesanan',$data);
    redirect('ecomerce/detail/'.$idproduct);
  }
  private function _uploadImage()
   {
    $config['upload_path']          = './assets/img/buktiTF/';
    $config['allowed_types']        = 'jpeg|jpg|png';
    $config['max_size']             = 2048; // 2MB
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('buktitf')) {
        return $this->upload->data("file_name");
     }
    }
  public function pesanan($id)
  {
      $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      $data['judul'] = 'Pesanan';
      $data['kelas']='';
      $data['kelas1']='active';
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
    $data['pesanan']= $this->ecomerce_models->getpesanancs($id);
    $this->load->view('templates/header',$data);
    $this->load->view('user/pesanancs',$data);
    $this->load->view('templates/footer');
  }
  }
  public function pesanandikemas($id)
  {
      $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      $data['judul'] = 'Pesanan';
      $data['kelas']='';
      $data['kelas1']='active';
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
    $data['kemasan']= $this->ecomerce_models->getkemasancs($id);
    $this->load->view('templates/header',$data);
    $this->load->view('user/pesanandikemascs',$data);
    $this->load->view('templates/footer');
  }
  }
  public function pesanandikirim($id)
  {
      $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      $data['judul'] = 'Pesanan';
      $data['kelas']='';
      $data['kelas1']='active';
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
    $data['kemasan']= $this->ecomerce_models->getkirimancs($id);
    $this->load->view('templates/header',$data);
    $this->load->view('user/pesanandikirimcs',$data);
    $this->load->view('templates/footer');
  }
  }
  public function pesananselesai($id)
  {
      $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      $data['judul'] = 'Selesai';
      $data['kelas']='';
      $data['kelas1']='active';
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
    $data['selesai']= $this->ecomerce_models->getselesaics($id);
    $this->load->view('templates/header',$data);
    $this->load->view('user/pesananselesaics',$data);
    $this->load->view('templates/footer');
  }
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
    $this->load->view('templates/header',$data);
    $this->load->view('user/pesanan_detail',$data);
    $this->load->view('templates/footer');
  }
  }
  public function pesananditerima($id){
    $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      if($this->session->userdata('id_user') != null){
        $id_user = $data['user']['id_user'];
      }
      $data['id_user'] = $id_user;
     $this->db->set('status_pesanan',4);
     $this->db->set('tglterima',date('d M Y'));
     $this->db->where('id_pemesan',$id);
     $this->db->update('tbl_pemesan');
     $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      data berhasil diprebarui
     </div');
     redirect('ecomerce/pesananselesai/'.$id_user);
   }
   public function search(){
      $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      $data['judul'] = 'Beranda';
      $data['kelas']='active';
      $data['kelas1']='';
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
    $keyword = $this->input->post('search');
    $data['key'] = $keyword;
    $data['pencarian']= $this->ecomerce_models->getsearch($keyword);
    $this->load->view('templates/header',$data);
    $this->load->view('user/indexsearch',$data);
    $this->load->view('templates/footer');
    }
  public function ulasan($id)
  {
    $data['user'] = $this->db->get_where('tbl_user', ['id_user'=>
      $this->session->userdata('id_user')])->row_array();
      $data['judul'] = 'Beranda';
      $data['kelas']='active';
      $data['kelas1']='';
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
    $keyword = $this->input->post('search');
    $data['penilaian']= $this->ecomerce_models->penilaian($id);
    $this->load->view('templates/header',$data);
    $this->load->view('user/testimoni',$data);
    $this->load->view('templates/footer');   
  }
  public function tambahUlasan(){
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
      $data['id_user'] = $id_user;
      $data['foto'] = $foto;
      $id = $this->input->post('idpesan');
       if(!$this->input->post('rating')){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Mohon isi Rating terlebih dulu!</div');
          redirect('ecomerce/ulasan/'.$id);
       }
       else{
            $data = [
              'id_user' => $id_user,
              'id_barang' => $this->input->post('testi',true),
              'rating' => $this->input->post('rating',true),
              'deskripsi' => $this->input->post('deskripsi',true),
              'foto' => $this->_uploadImage2(),
              'tgl' => date('d M Y'),
            ];
            $this->db->insert('tbl_testimoni',$data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Ulasan dikirim
     </div');
            redirect('ecomerce/pesananselesai/'.$id_user);
       }
     }
    private function _uploadImage2()
      {
    $config['upload_path']          = './assets/img/testimoni/';
    $config['allowed_types']        = 'jpeg|jpg|png';
    $config['max_size']             = 2048; // 2MB
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('foto')) {
        return $this->upload->data("file_name");
    }
  }
 
}