<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kucing_controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public function __construct(){
		
		parent::__construct();
		$this->load->helper(array('url','form', 'html'));
		$this->load->model('account/Kucing_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		
		
	}
	
	//Fungsi ini menampilkan halaman default aplikasi, yang berisi form data kucing.
	public function index()
	{

		$this->load->view('layout/landing');
		
		
	}

	public function formkucing() 
	{
		$data['daftar_gejala'] = $this->Kucing_model->get_pertanyaan()->result();
		$data['ras'] = $this->Kucing_model->get_ras_kucing()->result();
		$this->load->view('layout/header');
		// $this->load->view('layout/	navbar');
		$this->load->view('content/user/form_kucing',$data);
		// $this->load->view('layout/footer');
			
	}
	public function formgejala($id_kucing)
	{	
		
		$data['daftar_gejala'] = $this->Kucing_model->get_pertanyaan_gejala($id_kucing)->result();
		$data['id_kucing'] = $id_kucing;
		//var_dump($data['daftar_gejala']);die;
		$this->load->view('layout/header');		
		$this->load->view('content/user/form_gejala', $data);
	}
	public function proses_simpan_perhitungan_sementara()
	{	
		$id_kucing = $this->input->post('id_kucing');
		$gejala = $this->Kucing_model->get_pertanyaan_gejala($id_kucing)->result();
		foreach($gejala as $a){
			$this->Kucing_model->save_nilai_sementara($id_kucing, $a->id_gejala, $this->input->post('optradio'.$a->id_gejala));
			//echo $a->id_gejala.'='.$this->input->post('optradio'.$a->id_gejala)."<br>";
		}
		
		$data['penyakit_kucing'] = $this->Kucing_model->get_last_id_4($id_kucing)->result();
		$data['data_kucing'] = $this->Kucing_model->get_data_kucingg($id_kucing);
		$data['id_kucing'] = $id_kucing;
		//var_dump($data['penyakit_kucing']); die;
		$this->load->view('layout/header');		
		$this->load->view('content/user/form_hasil_diagnosa', $data);
	}
	
	

	//Fungsi yang menampilkan data pasien yang pernah diperiksa menggunakan aplikasi ini.
	public function data_pasien_sebelumnya()
	{

		$data['daftar_pasien'] = $this->Kucing_model->get_data_kucing()->result();
		$this->load->view('daftar_pasien', $data);
		
	}
	
	//Data kucing yang telah dimasukan akan diproses disini & akan dimasukan ke dalam DB. Setelah itu pertanyaan pertama akan ditampilkan.
	public function proses_tambah_data_kucing()
	{
		if(!$this->input->post('id_kucing')){
		$namaKucing		  = $this->input->post('namaKucing');
		$umur  		      = $this->input->post('umur');
		$ras  		      = $this->input->post('ras');
		$warna_bulu  	  = $this->input->post('warna_bulu');
		$jenis_kelamin    = $this->input->post('optradio1');
		$optradio		  = $this->input->post('optradio2');
		$optradio2		  = $this->input->post('optradio3');
		
		$this->Kucing_model->save_data_kucing($namaKucing, $umur, $ras, $warna_bulu, $jenis_kelamin, $optradio);
		
		$id_kucing = $this->Kucing_model->get_last_id2();
		
		}else{
			$id_kucing = $this->input->post('id_kucing');
		}
		$this->formgejala($id_kucing);
	}
	
	public function cek_gejala_umum_penyakit($id_gejala_umum, $id_kucing){
		
		$data['gejala_umum'] = $this->Kucing_model->gejala_umum($id_gejala_umum)->result();
		$data['id_kucing']   = $this->Kucing_model->get_last_id3()->result();
		//$data['id_kucing'] = $id_kucing;
		
		//var_dump($data['id_kucing']); die;
		
		$this->load->view('form_kucing_1', $data);
	}
	
	public function cek_detail_gejala1($id_gejala_umum, $id_kucing, $id_urutan){
		
		//echo "Masuk"; die;
		//echo $id_urutan;
		
		$data['baskom']		 = $this->Kucing_model->select_gejala_umum($id_gejala_umum, $id_urutan)->result();
		//var_dump($data['baskom']);
		//var_dump($data['baskom']); die;
		$data['title']       = $this->Kucing_model->gejala_umum($id_gejala_umum)->result();
		//$data['data_kucing'] = $this->Kucing_model->select_data_kucing($id_kucing)->result();
		$data['id_kucing']   = $this->Kucing_model->get_last_id3()->result();
	
		/* echo $id_gejala_umum; 
		echo '<br/>';
		echo $id_kucing;
		echo '<br/>';
		echo $id_urutan;
		echo '<br/>'; */
			
		
		$this->load->view('form_kucing_1_1', $data);
		
	}
	
	public function proses_tambah_data_kucing_1(){
		
		$id_gejala_umum = $this->input->post('id_gejala_umum');
		$id_kucing 		= $this->input->post('id_kucing');
		$optradio  		= $this->input->post('optradio2');
		
		$id_penyakit_umum = 1;
		
		//Bila Iya
		if($id_gejala_umum==1){
			if($optradio==1){	
			
			//Select data sesuai dengan gejala umum yang sesuai 
			$id_gejala_umum_insert = $this->Kucing_model->gejala_umum($id_gejala_umum)->result();
			
			//var_dump($id_kucing); die;
			
			//insert data nilai sementara untuk gejala umum.
			foreach($id_gejala_umum_insert as $nilai_gejala_umum){
				$this->Kucing_model->save_nilai_sementara($id_kucing, $nilai_gejala_umum->id_gejala, $id_gejala_umum, $optradio);
			}
			
			$this->cek_detail_gejala1($id_gejala_umum, $id_kucing, 1);
			
			}else{
				
				$this->cek_gejala_umum_penyakit(2, $id_kucing);
			}
	
		}else if($id_gejala_umum==2){
			if($optradio==1){	
			
			//Select data sesuai dengan gejala umum yang sesuai 
			$id_gejala_umum_insert = $this->Kucing_model->gejala_umum($id_gejala_umum)->result();
			
			//var_dump($id_kucing); die;
			
			//insert data nilai sementara untuk gejala umum.
			foreach($id_gejala_umum_insert as $nilai_gejala_umum){
				$this->Kucing_model->save_nilai_sementara($id_kucing, $nilai_gejala_umum->id_gejala, $id_gejala_umum, $optradio);
			}
			
			//var_dump($id_kucing); die;
			$this->cek_detail_gejala1($id_gejala_umum, $id_kucing, 1);
			
			}else{
				
				$this->cek_gejala_umum_penyakit(3, $id_kucing);
			}
		
		}else if($id_gejala_umum==3){
			if($optradio==1){	
			
			//Select data sesuai dengan gejala umum yang sesuai 
			$id_gejala_umum_insert = $this->Kucing_model->gejala_umum($id_gejala_umum)->result();
			
			//var_dump($id_kucing); die;
			
			//insert data nilai sementara untuk gejala umum.
			foreach($id_gejala_umum_insert as $nilai_gejala_umum){
				$this->Kucing_model->save_nilai_sementara($id_kucing, $nilai_gejala_umum->id_gejala, $id_gejala_umum, $optradio);
			}
			
			$this->cek_detail_gejala1($id_gejala_umum, $id_kucing, 1);
			
			}else{
				
				//$this->cek_gejala_umum_penyakit(3, $id_kucing);
			}
		}
	}
	
	
		//Bila terdapat gejala umum penyakit pada pertanyaan yang pertama,maka akan langsung diarahkan pada pertanyaan gejala spesifik yang pertama.
		public function proses_tambah_data_kucing_1_1()
		{
			$id_kucing		  = $this->input->post('id_kucing');
			$id_gejala_umum	  = $this->input->post('id_gejala_umum');
			$id_gejala		  = $this->input->post('id_gejala');
			$id_urutan		  = $this->input->post('urutan');
			$optradio		  = $this->input->post('optradio2');
			
			//var_dump($id_gejala);die;
			$this->Kucing_model->save_nilai_sementara($id_kucing, $id_gejala, $id_gejala_umum, $optradio);
			
			$ambil_id['total']	  		= $this->Kucing_model->select_gejala_khusus($id_gejala_umum);
			$ambil_id['gejala']	  		= $this->Kucing_model->select_gejala_khusus($id_gejala_umum);
			$ambil_id['jumlah_gejala']	= $this->Kucing_model->select_gejala_khusus($id_gejala_umum);
					
		
			if($id_urutan<$ambil_id['jumlah_gejala']){
				
				/* echo 'urutan ke = ', $id_urutan;
				echo '<br/>';
				
				echo 'total gejala = ', $ambil_id['total']; */
				
				$id_urutan++;
				
				/* echo '<br/>';
				
				echo 'Id gejala umum = ', $id_gejala_umum;
							
				echo '<br/>';
				
				echo 'Id gejala khusus = ', $ambil_id['gejala'];
				
				echo '<br/>'; */
				
				$this->cek_detail_gejala1($id_gejala_umum, $id_kucing, $id_urutan++);
				
			}else{
				
				//$data['id_kucing']   = $this->Kucing_model->get_last_id3();
				
				$data['penyakit_kucing'] = $this->Kucing_model->get_last_id_4($id_kucing)->result();
				//var_dump($data['penyakit_kucing']); die;
				
				$data['data_kucing'] = $this->Kucing_model->get_data_kucingg($id_kucing);
				$data['id_kucing'] = $id_kucing;
				//var_dump($data['penyakit_kucing']); die;
				$this->load->view('form_hasil_diagnosa', $data);
				
			}
		
		}
		
	public function penghitungan_cf()
	{
		$id_kucing = $this->input->post('id_kucing');
		$penyakit = $this->Kucing_model->get_last_id_4($id_kucing)->result();
		$data['data_kucing'] = $this->Kucing_model->get_data_kucingg($id_kucing);
	
		$this->menentukan_penyakit_cf($id_kucing);
	}
	
	public function menentukan_penyakit_cf($id_kucing)
	{
		$daftar_penyakit = $this->Kucing_model->get_id_gejala_umum($id_kucing)->result();
		//membuat array untuk perhitungan CF kedua
		$array_hasil = array();
		$temp_id_pernyakit = 0;
		$temp_nama_pernyakit;
		/* var_dump($daftar_penyakit);
		die;
		 */
		$index = 0;
		$prev_cf = 0;
		//proses perhitungan CF pertama
		
		//var_dump($daftar_penyakit); die;
		
		foreach ($daftar_penyakit as $a){
			//echo $a->id_pernyakit." ".$a->nilai_cf ." ". $a->nilai_sementara."<br/>";
		}
		
		
		
		//var_dump(count($daftar_penyakit));
		foreach ($daftar_penyakit as $a){
			if($temp_id_pernyakit!=$a->id_pernyakit){
				if($index==0){
					$temp_id_pernyakit=$a->id_pernyakit;
					$temp_nama_pernyakit=$a->nama_penyakit;
					$prev_cf = $a->nilai_cf * $a->nilai_sementara;
				} else{
					$array = array($temp_id_pernyakit, $temp_nama_pernyakit, $prev_cf);	
					array_push($array_hasil, $array);
					$temp_id_pernyakit=$a->id_pernyakit;
					$temp_nama_pernyakit=$a->nama_penyakit;
					$prev_cf = $a->nilai_cf * $a->nilai_sementara;
					if($index+1 == count($daftar_penyakit)){
						$array = array($temp_id_pernyakit, $temp_nama_pernyakit, $prev_cf);	
						array_push($array_hasil, $array);
					}
				}
				
			}else{
				$tf = $prev_cf+(($a->nilai_cf * $a->nilai_sementara)*(1-$prev_cf));
				$prev_cf = $tf;
				if($index+1 == count($daftar_penyakit)){
						$array = array($temp_id_pernyakit, $temp_nama_pernyakit, $prev_cf);	
						array_push($array_hasil, $array);
					}
			}			
			
			$index++;
			//echo $a->nama_penyakit. " ".$a->nilai_cf * $a->nilai_sementara. "<br/>";
		}
		
		$this->metode_nb($id_kucing,$array_hasil);
	}

	//Hasil Perhitungan
	public function metode_nb($id_kucing,$data_hasil_cf)
	{
		$jumlah_penyakit_nb = $this->Kucing_model->get_jumlah_penyakit_nb()->result();
			$jumlah_gejala = $this->Kucing_model->get_jumlah_gejala()->row();
			
			//return gejala kucing yg mempunyai poin 1 (ada)
			$nama_gejala_kucing_nb = $this->Kucing_model->get_nama_gejala($id_kucing)->result();
			
			//var_dump($nama_gejala_kucing_nb); die;
			//var_dump($jumlah_gejala->Jumlah); die;
			//var_dump($jumlah_penyakit_nb); die;
			
			//nilai n = 1
			//nilai m = jumlah gejala
			//nilai p = 1 / jumlah penyakit
			
			// proses nc
			$n = 1;
			$m = $jumlah_gejala->Jumlah;
			 //echo $m;
			$temp_nama_penyakit_nb = 0;
			$i = count($jumlah_penyakit_nb);
			
			/* foreach($daftar_penyakit_nb as $nb){
				if($temp_nama_penyakit_nb!=$nb->id_pernyakit){
					$temp_nama_penyakit_nb = $nb->id_pernyakit;
					$i++;
				}
			} */
			
			//echo $i;
			$p = 1/$i;
			/* echo 'm = '. $m. '<br/>' ;*/
			//echo 'p = '. $p. '<br/>' ; 
			
			$string_gejala = "(";
			$j = 0;
			//loop gejala penyakit kucing
			foreach($nama_gejala_kucing_nb as $gejala){
				if($j == 0){
					$string_gejala = $string_gejala.$gejala->id_gejala;
				}else{
					$string_gejala = $string_gejala.",".$gejala->id_gejala;
				}
				
				$j++;
			}
			$string_gejala = $string_gejala.")";
			//var_dump($string_gejala); die;
			
			//proses kedua
			$nilai_ada = (1 + ($m * $p))/(1+$m);
			$nilai_tidak_ada = (0 + ($m * $p))/(1+$m);
			
			// echo $nilai_tidak_ada;
			$hasil = array();
			//return jumlah penyakit
			foreach ($jumlah_penyakit_nb as $penyakit){
				$gejala_penyakit = $this->Kucing_model->get_gejala_penyakit_nb($penyakit->id_pernyakit, $string_gejala)->row();
				//var_dump($gejala_penyakit); die;
				$pangkat_nilai_ada = pow($nilai_ada, $gejala_penyakit->Jumlah);
				$pangkat_nilai_tidak_ada = pow($nilai_tidak_ada,$m-$gejala_penyakit->Jumlah);
				$nilai_akhir = $p*$pangkat_nilai_ada*$pangkat_nilai_tidak_ada;
				
				/* echo $pangkat_nilai_ada;
				echo '<br>'; */
				/* var_dump($nilai_ada);
				var_dump($nilai_tidak_ada);
				var_dump($pangkat_nilai_ada);
				var_dump($pangkat_nilai_tidak_ada);
				var_dump($nilai_akhir); die; */
				
				$array = array($penyakit->id_pernyakit, $penyakit->nama_penyakit, $nilai_akhir);
				array_push($hasil, $array);
			}
			
		
			//echo '<pre>'; var_dump($hasil); echo '</pre>'; die;
			
			//return $hasil;
			$data['array'] = $hasil;
			$data['array_hasil'] = $data_hasil_cf;
			$data['data_kucing'] = $this->Kucing_model->get_data_kucingg($id_kucing);
			$data['id_kucing'] = $id_kucing;
			$this->load->view('layout/header');
			$this->load->view('content/user/form_hasil_dua_metode', $data);
		
	}
	
	//Hasil Perhitungan
	public function hasil_perhitungan()
	{
		
		$this->load->view('form_kucing');
		
	}
	
	
	public function tes_fungsi($namaKucing)
	{
		echo $namaKucing;
		
	}
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */