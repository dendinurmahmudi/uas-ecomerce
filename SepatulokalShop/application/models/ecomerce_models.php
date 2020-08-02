<?php 
/**
  * 
  */
 class ecomerce_models extends CI_Model
 {
 	public function getalldata(){
		return $this->db->get('tbl_product join tbl_category on tbl_product.category=tbl_category.id_category where status="on" ORDER BY rand() DESC')->result_array();
	}
	public function getalldatalimit(){
		return $this->db->get('tbl_product join tbl_category on tbl_product.category=tbl_category.id_category where status="on" ORDER BY rand() DESC limit 15')->result_array();
	}
	public function getalldatakategori(){
		return $this->db->get('tbl_product join tbl_category on tbl_product.category=tbl_category.id_category where status="on" GROUP BY tbl_category.nama_category ORDER BY rand() DESC limit 4')->result_array();
	}
	public function getdatakategori($id){
		return $this->db->get('tbl_product join tbl_category on tbl_product.category=tbl_category.id_category where status="on" and id_category='.$id.' ORDER BY rand() DESC')->result_array();
	}
	public function getnamakategori($id){
		return $this->db->get('tbl_product join tbl_category on tbl_product.category=tbl_category.id_category where status="on" and id_category='.$id.' ORDER BY rand() DESC')->row_array();
	}
	public function rupiah($nilai = 0){
      $string = "Rp." . number_format($nilai).".-";
      return $string;
   }
   public function getProductById($id)
	{
		return $this->db->query('select * from tbl_product join tbl_category on tbl_product.category=tbl_category.id_category where id_product='.$id)->row_array();
	}
 	public function getKeranjang($id)
	{
		return $this->db->query("select *,sum(qty)jumlah from tbl_product join tbl_keranjang on tbl_product.id_product=tbl_keranjang.id_product join tbl_category on tbl_product.category=tbl_category.id_category join tbl_user on tbl_keranjang.id_user=tbl_user.id_user where tbl_keranjang.id_user=".$id." group by tbl_keranjang.id_product")->result_array();
	}
	public function getKeranjangid($id,$idk)
	{
		return $this->db->query("select *,sum(qty)jumlah from tbl_product join tbl_keranjang on tbl_product.id_product=tbl_keranjang.id_product join tbl_category on tbl_product.category=tbl_category.id_category join tbl_user on tbl_keranjang.id_user=tbl_user.id_user where tbl_keranjang.id_user=".$id." and tbl_product.id_product=".$idk." group by tbl_keranjang.id_product;")->row_array();
	}
	public function getstatusid($id)
	{
		return $this->db->query("select * from tbl_pemesan where  id_pemesan=".$id)->row_array();
	}
	public function getdatabarang(){
		return $this->db->query('select * from tbl_product join tbl_category on tbl_product.category=tbl_category.id_category ORDER BY tbl_product.nama_product asc')->result_array();
	}
	public function getkategori(){
		return $this->db->query('select * from tbl_category')->result_array();
	}
	public function hapusbarang($id)
	{
		$this->db->where('id_product',$id);
		$this->db->delete('tbl_product');
	}
	public function getkategoriid($id){
		return $this->db->query('select * from tbl_category where id_category='.$id)->row_array();
	}
	public function hapuskategori($id)
	{
		$this->db->where('id_category',$id);
		$this->db->delete('tbl_category');
	}
	public function getuser(){
		return $this->db->query('select * from tbl_user order by nama')->result_array();
	}
	public function countuser(){
		return $this->db->query('select * from tbl_user order by nama')->num_rows();
	}
	public function getuserid($id){
		return $this->db->query('select * from tbl_user where id_user='.$id)->row_array();
	}
	public function hapususer($id)
	{
		$this->db->where('id_user',$id);
		$this->db->delete('tbl_user');
	}
	public function getpesanan(){
		return $this->db->query('select * from tbl_pemesan join tbl_pesanan on tbl_pemesan.id_pemesan=tbl_pesanan.id_pesanan join tbl_user on tbl_pemesan.id_user=tbl_user.id_user join tbl_product on tbl_pesanan.id_barang=tbl_product.id_product where tbl_pemesan.status_pesanan="0" or tbl_pemesan.status_pesanan="1" group by tbl_pesanan.id_pesanan order by tbl_pesanan.id_pesanan desc;')->result_array();
	}
	public function getkemasan(){
		return $this->db->query('select * from tbl_pemesan join tbl_pesanan on tbl_pemesan.id_pemesan=tbl_pesanan.id_pesanan join tbl_user on tbl_pemesan.id_user=tbl_user.id_user join tbl_product on tbl_pesanan.id_barang=tbl_product.id_product where tbl_pemesan.status_pesanan="2" group by tbl_pesanan.id_pesanan order by tbl_pemesan.tgl desc;')->result_array();
	}
	public function getkiriman(){
		return $this->db->query('select * from tbl_pemesan join tbl_pesanan on tbl_pemesan.id_pemesan=tbl_pesanan.id_pesanan join tbl_user on tbl_pemesan.id_user=tbl_user.id_user join tbl_product on tbl_pesanan.id_barang=tbl_product.id_product where tbl_pemesan.status_pesanan="3" group by tbl_pesanan.id_pesanan order by tbl_pesanan.id_pesanan desc;')->result_array();
	}
	public function getselesai(){
		return $this->db->query('select * from tbl_pemesan join tbl_pesanan on tbl_pemesan.id_pemesan=tbl_pesanan.id_pesanan join tbl_user on tbl_pemesan.id_user=tbl_user.id_user join tbl_product on tbl_pesanan.id_barang=tbl_product.id_product where tbl_pemesan.status_pesanan="4" group by tbl_pesanan.id_pesanan order by tbl_pesanan.id_pesanan desc;')->result_array();
	}
	public function getpesananid($id){
		return $this->db->query('select * from tbl_pemesan join tbl_pesanan on tbl_pemesan.id_pemesan=tbl_pesanan.id_pesanan join tbl_user on tbl_pemesan.id_user=tbl_user.id_user join tbl_product on tbl_pesanan.id_barang=tbl_product.id_product group by 
			tbl_pesanan.id_pesanan where tbl_pemesan.id_pemesan='.$id)->row_array();
	}
	public function countallpesanan(){
		return $this->db->query('select * from tbl_pemesan join tbl_pesanan on tbl_pemesan.id_pemesan=tbl_pesanan.id_pesanan join tbl_user on tbl_pemesan.id_user=tbl_user.id_user join tbl_product on tbl_pesanan.id_barang=tbl_product.id_product group by 
			tbl_pesanan.id_pesanan order by tbl_pesanan.id_pesanan desc')->num_rows();
	}
	public function countpesanan(){
		return $this->db->query('select * from tbl_pemesan join tbl_pesanan on tbl_pemesan.id_pemesan=tbl_pesanan.id_pesanan join tbl_user on tbl_pemesan.id_user=tbl_user.id_user join tbl_product on tbl_pesanan.id_barang=tbl_product.id_product where tbl_pemesan.status_pesanan="0" or tbl_pemesan.status_pesanan="1" group by 
			tbl_pesanan.id_pesanan order by tbl_pesanan.id_pesanan desc')->num_rows();
	}
	public function countkemasan(){
		return $this->db->query('select * from tbl_pemesan join tbl_pesanan on tbl_pemesan.id_pemesan=tbl_pesanan.id_pesanan join tbl_user on tbl_pemesan.id_user=tbl_user.id_user join tbl_product on tbl_pesanan.id_barang=tbl_product.id_product where tbl_pemesan.status_pesanan="2" group by 
			tbl_pesanan.id_pesanan order by tbl_pesanan.id_pesanan desc')->num_rows();
	}
	public function countkiriman(){
		return $this->db->query('select * from tbl_pemesan join tbl_pesanan on tbl_pemesan.id_pemesan=tbl_pesanan.id_pesanan join tbl_user on tbl_pemesan.id_user=tbl_user.id_user join tbl_product on tbl_pesanan.id_barang=tbl_product.id_product where tbl_pemesan.status_pesanan="3" group by 
			tbl_pesanan.id_pesanan order by tbl_pesanan.id_pesanan desc')->num_rows();
	}
	public function countselesai(){
		return $this->db->query('select * from tbl_pemesan join tbl_pesanan on tbl_pemesan.id_pemesan=tbl_pesanan.id_pesanan join tbl_user on tbl_pemesan.id_user=tbl_user.id_user join tbl_product on tbl_pesanan.id_barang=tbl_product.id_product where tbl_pemesan.status_pesanan="4" group by 
			tbl_pesanan.id_pesanan order by tbl_pesanan.id_pesanan desc')->num_rows();
	}
	public function getpesanancs($id){
		return $this->db->query('select * from tbl_pemesan join tbl_pesanan on tbl_pemesan.id_pemesan=tbl_pesanan.id_pesanan join tbl_user on tbl_pemesan.id_user=tbl_user.id_user join tbl_product on tbl_pesanan.id_barang=tbl_product.id_product where tbl_pemesan.status_pesanan="0" or tbl_pemesan.status_pesanan="1" and tbl_pemesan.id_user='.$id.' group by tbl_pesanan.id_pesanan order by tbl_pesanan.id_pesanan desc;')->result_array();
	}
	public function getkemasancs($id){
		return $this->db->query('select * from tbl_pemesan join tbl_pesanan on tbl_pemesan.id_pemesan=tbl_pesanan.id_pesanan join tbl_user on tbl_pemesan.id_user=tbl_user.id_user join tbl_product on tbl_pesanan.id_barang=tbl_product.id_product where tbl_pemesan.status_pesanan="2" and tbl_pemesan.id_user='.$id.' group by tbl_pesanan.id_pesanan order by tbl_pesanan.id_pesanan desc;')->result_array();
	}
	public function getkirimancs($id){
		return $this->db->query('select * from tbl_pemesan join tbl_pesanan on tbl_pemesan.id_pemesan=tbl_pesanan.id_pesanan join tbl_user on tbl_pemesan.id_user=tbl_user.id_user join tbl_product on tbl_pesanan.id_barang=tbl_product.id_product where tbl_pemesan.status_pesanan="3" and tbl_pemesan.id_user='.$id.' group by tbl_pesanan.id_pesanan order by tbl_pesanan.id_pesanan desc;')->result_array();
	}
	public function getselesaics($id){
		return $this->db->query('select * from tbl_pemesan join tbl_pesanan on tbl_pemesan.id_pemesan=tbl_pesanan.id_pesanan join tbl_user on tbl_pemesan.id_user=tbl_user.id_user join tbl_product on tbl_pesanan.id_barang=tbl_product.id_product where tbl_pemesan.status_pesanan="4" and tbl_pemesan.id_user='.$id.' group by tbl_pesanan.id_pesanan order by tbl_pesanan.id_pesanan desc;')->result_array();
	}
	public function getdetailpesanan($id){
		return $this->db->query('select *,tbl_pemesan.alamat from tbl_pemesan join tbl_pesanan on tbl_pemesan.id_pemesan=tbl_pesanan.id_pesanan join tbl_user on tbl_pemesan.id_user=tbl_user.id_user join tbl_product on tbl_pesanan.id_barang=tbl_product.id_product where tbl_pesanan.id_pesanan='.$id)->result_array();
	}
 	public function arrayPesanan($id){
      $pesanan=["Belum Transfer","Menunggu konfirmasi penjual","Pesanan sedang Dikemas","Pesanan Dikirim","Pesanan telah sampai"];
      return $pesanan[$id];
  	}
  	public function arrayPesananadm($id){
      $pesanan=["Belum Transfer","Sudah Transfer","Pesanan sedang Dikemas","Pesanan Dikirim","Pesanan telah sampai"];
      return $pesanan[$id];
  	}
  	public function arraystatus(){
      $pesanan=["Pesanan sedang Dikemas","Pesanan Dikirim"];
      return $pesanan;
  	}
  	public function arraystatus1(){
      $pesanan=["Pesanan Dikirim"];
      return $pesanan;
  	}
  	public function getrekening(){
		return $this->db->query('select * from tbl_rekening')->result_array();
	}
	public function save_batch($data){
    	return $this->db->insert_batch('tbl_pesanan', $data);
  	}
  	public function getsearch($key){
		return $this->db->query('select * from tbl_product join tbl_category on tbl_product.category=tbl_category.id_category where tbl_product.nama_product like "%'.$key.'%" or tbl_category.nama_category like "%'.$key.'%";')->result_array();
	}
	public function penilaian($id){
		return $this->db->query('select * from tbl_pemesan join tbl_pesanan on tbl_pesanan.id_pesanan=tbl_pemesan.id_pemesan join tbl_product on tbl_pesanan.id_barang=tbl_product.id_product where id_pesanan='.$id)->result_array();	
	}
	public function avgrating($id){
		return $this->db->query('select round(avg(rating))rating from tbl_testimoni where id_barang='.$id)->row_array();	
	}
	public function countrating($id){
		return $this->db->query('select count(id_barang)jumlah from tbl_testimoni where id_barang='.$id)->row_array();
	}
	public function gettestimoni($id){
		return $this->db->query('select * from tbl_testimoni join tbl_user on tbl_user.id_user=tbl_testimoni.id_user where tbl_testimoni.id_barang='.$id)->result_array();
	}
	public function getprodukbaru(){
		return $this->db->query('select * from tbl_product join tbl_category on tbl_product.category=tbl_category.id_category order by id_product desc limit 2;')->result_array();	
	}
	public function getrating(){
		return $this->db->query('select tbl_product.id_product,tbl_product.foto,tbl_product.nama_product,tbl_product.harga,tbl_category.nama_category, round(avg(rating))rating from tbl_product join tbl_testimoni on tbl_product.id_product=tbl_testimoni.id_barang join tbl_category on tbl_product.category=tbl_category.id_category group by id_barang;')->result_array();	
	}
	public function counttglpemesan($id){
		return $this->db->query('select count(id_pemesan)jumlah from tbl_pemesan where tgl="'.$id.'"')->row_array();
	}
	public function counttesti(){
		return $this->db->query('select * from tbl_testimoni group by id_barang')->num_rows();
	}
	public function countbarang(){
		return $this->db->query('select * from tbl_product')->num_rows();
	}
	public function countpengguna(){
		return $this->db->query('select * from tbl_user')->num_rows();
	}

 } ?>