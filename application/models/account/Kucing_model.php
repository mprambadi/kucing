<?php
	class Kucing_model extends CI_Model{
		
		function __construct(){
			
				parent::__construct();
		}
		
		//Select gejala penyakit
		function get_gejala(){
			
			$this->db->select('*');
			$this->db->from('gejala');
			$this->db->order_by('id_gejala');
			
			return $this->db->get();
		}
		
		//Select gejala penyakit
		function get_pertanyaan_gejala($id_kucing){
			
			$sql = "SELECT gejala.id_gejala,gejala.id_gejala_umum,gejala.is_umum,gejala.daftar_pertanyaan,perhitungan_sementara.nilai_sementara FROM `perhitungan_sementara` RIGHT JOIN gejala ON gejala.id_gejala = perhitungan_sementara.id_gejala AND perhitungan_sementara.id_kucing = $id_kucing order by gejala.id_gejala_umum ASC,gejala.is_umum ASC, gejala.id_gejala ASC";
			$query = $this->db->query($sql);
			return $query;
			
		}
		
		//Select data kucing
		function get_data_kucing(){
			
			$this->db->select('*');
			$this->db->from('data_kucing');
			$this->db->order_by('id_kucing');
			
			return $this->db->get();
		}
		
		//Mengambil ras kucing
		function get_ras_kucing(){
			
			$this->db->select('*');
			$this->db->from('ras');
			$this->db->order_by('ras', 'asc');
			
			return $this->db->get();
		}

			function insert_ras_kucing($data)
			{
					$this->db->insert('ras', $data);
			}
			function update_ras_kucing($data, $id)
			{
					$this->db->where('id_ras', $id);
					$this->db->update('ras', $data);
			}	
			function delete_ras_kucing($id)
			{
					$this->db->where('id_ras', $id);
					$this->db->delete('ras');
			}
		
		//mengambil data penyakit
		function get_penyakit_kucing(){
			
			$this->db->select('*');
			$this->db->from('penyakit');
			$this->db->order_by('nama_penyakit', 'asc');
			
			return $this->db->get();
		}

		function insert_penyakit_kucing($data){
			$this->db->insert('penyakit', $data);
		}
		
		function update_penyakit_kucing($data,$id){
			$this->db->where('id_pernyakit', $id);
			$this->db->update('penyakit', $data);
		}
		function delete_penyakit_kucing($id){
			$this->db->where('id_pernyakit', $id);
			$this->db->delete('penyakit');
		}
		//Mengambil ras kucing
		function get_gejala_kucing(){
			
			$this->db->select('*');
			$this->db->from('gejala');
			$this->db->order_by('nama_gejala', 'asc');
			
			return $this->db->get();
		}
		//mengambil data user tertentu
		function get_data_user(){
			
			$this->db->select('*');
			$this->db->from('user');
			$this->db->order_by('username', 'asc');
			return $this->db->get();
		}
		
		function insert_user($data)
		{
				$this->db->insert('user', $data);
		}
		function update_user($data, $id)
		{
				$this->db->where('id_user', $id);
				$this->db->update('user', $data);
		}
		function delete_user($id)
		{
				$this->db->where('id_user', $id);
				$this->db->delete('user');
		}
		
		//Select data kucing berdasarkan id_kucing
		function gejala_umum($id_gejala_umum){
			
			/* $this->db->select('*');
			$this->db->from('gejala_umum');
			$this->db->where('id_gejala_umum', $id_gejala_umum);
			
			return $this->db->get(); */
			
			$query = $this->db->query("SELECT gejala.id_gejala_umum, gejala.daftar_pertanyaan, gejala.id_gejala FROM gejala_umum JOIN gejala ON gejala.id_gejala_umum = gejala_umum.id_gejala_umum WHERE gejala_umum.id_gejala_umum = '$id_gejala_umum' AND gejala.is_umum = 1 Order By urutan ASC");
		
			/* $query = $this->db->get(); 
			
			return $result=$query->row(); */
			
			return $query;
		}
		
		// Mendapatkan id terakhir dalam database
		function get_last_id(){
			
			$this->db->select('*');
			$this->db->from('data_kucing');
			$this->db->order_by('id_kucing', 'desc');
			$this->db->limit(1);
			
			return $this->db->get();
			
		}
		
		function get_last_id2(){
		
			$query = $this->db->query("SELECT * FROM data_kucing ORDER BY id_kucing desc limit 1"); 
			
			$ret = $query->row();
			return $ret->id_kucing;
		
		}
		
		function get_last_id3(){
		
			$this->db->select('*');
			$this->db->from('data_kucing');
			$this->db->order_by('id_kucing', 'desc');
			$this->db->limit(1);
			
			$query = $this->db->get(); 
			
			return $query;
		
		}
		
		function get_last_id_4($id_kucing){
			
			$query = $this->db->query("SELECT gejala.nama_gejala, perhitungan_sementara.nilai_sementara FROM gejala LEFT JOIN perhitungan_sementara ON gejala.id_gejala = perhitungan_sementara.id_gejala AND perhitungan_sementara.id_kucing = '$id_kucing' order by gejala.nama_gejala ASC");
		
			/* $query = $this->db->get(); 
			
			return $result=$query->row(); */
			
			return $query;
		}
		
		function get_last_id_5($id_kucing){
			
			$query = $this->db->query("SELECT DISTINCT (gejala_umum.id_gejala_umum) FROM perhitungan_sementara JOIN gejala ON gejala.id_gejala = perhitungan_sementara.id_gejala AND perhitungan_sementara.id_kucing = '$id_kucing' JOIN gejala_umum ON gejala_umum.id_gejala_umum = gejala.id_gejala_umum ORDER BY gejala.nama_gejala ASC");
		
			//$query = $this->db->get(); 
			
			return $result=$query->row();
			
			/* return $query; */
		}
		
		function get_id_gejala_umum($id_kucing){
			
			
			/* $query = $this->db->query("SELECT penyakit.nama_penyakit, tabel_relasi.nilai_cf FROM penyakit JOIN tabel_relasi ON tabel_relasi.id_pernyakit = penyakit.id_pernyakit WHERE penyakit.id_gejala_umum = '$id_gejala_umum'"); */
			
			$query = $this->db->query("SELECT penyakit.id_pernyakit, penyakit.nama_penyakit, gejala.nama_gejala, tabel_relasi.nilai_cf , perhitungan_sementara.nilai_sementara FROM penyakit JOIN tabel_relasi ON tabel_relasi.id_pernyakit = penyakit.id_pernyakit JOIN gejala ON tabel_relasi.id_gejala = gejala.id_gejala JOIN perhitungan_sementara ON perhitungan_sementara.id_gejala = gejala.id_gejala AND id_kucing = '$id_kucing' ORDER BY penyakit.id_pernyakit");
		
		
			/* var_dump($query->result());
			die; */
			//return $result=$query->row();
			
			return $query;
		}
		
		//select pertanyaan yang belum ditanyakan
		function get_pertanyaansisa_nb($id_kucing){
			$query = $this->db->query("SELECT gejala.id_gejala_umum, gejala.id_gejala, gejala.daftar_pertanyaan from gejala LEFT JOIN perhitungan_sementara ON gejala.id_gejala = perhitungan_sementara.id_gejala AND id_kucing = '$id_kucing' WHERE perhitungan_sementara.id_gejala IS NULL LIMIT 1");
			
			return $query;
		}
		
		function get_id_gejala_umum_nb($id_kucing){
			
			
			/* $query = $this->db->query("SELECT penyakit.nama_penyakit, tabel_relasi.nilai_cf FROM penyakit JOIN tabel_relasi ON tabel_relasi.id_pernyakit = penyakit.id_pernyakit WHERE penyakit.id_gejala_umum = '$id_gejala_umum'"); */
			
			$query = $this->db->query("SELECT penyakit.id_pernyakit, penyakit.nama_penyakit, gejala.nama_gejala, tabel_relasi.nilai_cf , perhitungan_sementara.nilai_sementara FROM penyakit JOIN tabel_relasi ON tabel_relasi.id_pernyakit = penyakit.id_pernyakit JOIN gejala ON tabel_relasi.id_gejala = gejala.id_gejala LEFT JOIN perhitungan_sementara ON perhitungan_sementara.id_gejala = gejala.id_gejala AND id_kucing = '$id_kucing' ORDER BY penyakit.id_pernyakit");
		
		
			/* var_dump($query->result());
			die; */
			//return $result=$query->row();
			
			return $query;
		}
		
		function get_jumlah_gejala(){
			$query = $this->db->query("SELECT COUNT(*) as Jumlah FROM gejala"); 
			
			return $result=$query;
		}
		
		function get_jumlah_penyakit_nb(){
			$query = $this->db->query("SELECT * FROM penyakit"); 
			
			return $result=$query;
		}
		
		function get_nama_gejala($id_kucing){
			
			$query = $this->db->query("SELECT * FROM perhitungan_sementara JOIN gejala ON gejala.id_gejala = perhitungan_sementara.id_gejala WHERE perhitungan_sementara.id_kucing = '$id_kucing' AND perhitungan_sementara.nilai_sementara = 1"); 
			
			return $result=$query;
		}
		
		function get_gejala_penyakit_nb($id_penyakit, $gejala){
			
			$query = $this->db->query("SELECT COUNT(*) as Jumlah FROM tabel_relasi WHERE id_pernyakit = '$id_penyakit' AND id_gejala IN $gejala"); 
			
			return $result=$query;
		}
		
		function get_data_kucingg($id_kucing){
			
			$query = $this->db->query("SELECT * FROM data_kucing where id_kucing = '$id_kucing' ORDER BY id_kucing desc limit 1"); 
			
			return $result=$query->row();
			
		}

		function get_data_penyakit($id_penyakit){
			
			$query = $this->db->query("SELECT * FROM penyakit where id_pernyakit = '$id_penyakit' "); 
			
			return $result=$query->row();
			
		}
		
		function select_data_urutan($id_gejala_umum, $id_urutan){
			
			$this->db->select('*');
			$this->db->from('gejala');
			$this->db->where('id_gejala_umum', $id_gejala_umum);
			$this->db->where('urutan', $id_urutan);

			return $this->db->get();
		}
		
		function save_nilai_sementara($id_kucing, $id_gejala, $optradio){
			$query = $this->db->query("SELECT id_hitung FROM perhitungan_sementara WHERE id_kucing = $id_kucing AND id_gejala = $id_gejala");
			$id_hitung = $query->row();
			if($id_hitung){
				$query = $this->db->query("UPDATE perhitungan_sementara SET nilai_sementara = '$optradio' WHERE id_hitung = '$id_hitung->id_hitung'");
			}else{
				$query = $this->db->query("INSERT INTO perhitungan_sementara VALUE (null, '$id_kucing', '$id_gejala', '$optradio')");
			}
			//return $query;
		}
		
		
		function select_gejala_umum($id_gejala_umum, $id_urutan){
			$a = "select * from gejala where id_gejala_umum = '$id_gejala_umum' and urutan = '$id_urutan' and is_umum = 0";
			//var_dump($a);
			$query = $this->db->query("select * from gejala where id_gejala_umum = '$id_gejala_umum' and urutan = '$id_urutan' and is_umum = 0");	
			return $query;
		}
		
		//Mengambil nilai pertanyaan
		function select_gejala_khusus($id_gejala_umum){
			
			$this->db->select('*');
			$this->db->from('gejala');
			$this->db->where('id_gejala_umum', $id_gejala_umum);
			$this->db->where('is_umum', 0);
			$this->db->order_by('id_gejala', 'asc');
			
			/* $query = $this->db->query("select * from gejala where id_gejala_umum = '$id_gejala_umum' order by id_gejala asc");
			
			$query2 = $this->db->query("select id_gejala from gejala where id_gejala_umum = '$id_gejala_umum' order by id_gejala desc limit 1"); */
			
			$query3 = $this->db->get();
			$rowcount = $query3->num_rows();
			
			/* $ret2 = $query2->row();
			return $ret2->id_gejala; */
			
			return $rowcount;
		}
		
		function select_gejala($id_gejala_umum){
				
			$query = $this->db->query("select * from gejala where id_gejala_umum = '$id_gejala_umum' order by id_gejala asc");
	
			$ret = $query->row();
			return $ret->id_gejala;
		
		}
		
		function get_jumlah_pernafasan($id_penyakit_umum){
			
			$query = $this->db->query("select daftar_pertanyaan from gejala where id_gejala_umum = '$id_penyakit_umum' order by id_gejala");
			
			$ret = $query->row();
			return $ret->daftar_pertanyaan;
		}
		
		//Select pertanyaan umum penyakit pernafasan
		function get_pertanyaan(){
			
			$this->db->select('daftar_pertanyaan');
			$this->db->from('gejala_umum');
			$this->db->order_by('id_gejala_umum');
			$this->db->limit(1);
			
			return $this->db->get();
		}
		
		//Select gejala penyakit sistem pernafasan 2
		function get_pertanyaan_1_1($id_penyakit_umum){
			
			
			$this->db->select('*');
			$this->db->from('gejala');
			$this->db->where('id_gejala_umum', $id_penyakit_umum);
			$this->db->limit(1);
			
			return $this->db->get();
		}
		
		//Insert data kucing secara total
		function insert_data_total(){
			
			$query = $this->db->query("UPDATE data_kucing SET gejala_khusus_1 = '$optradio'");
			
			return $query;
			
		}
		
		//Select gejala penyakit sistem pernafasan
		function penyakit_pernafasan(){
			
			$this->db->select('*');
			$this->db->from('sistem_pernafasan');
			$this->db->order_by('id_sistem_pernafasan');
			
			return $this->db->get();
		}
		
		//Menghitung jumlah penyakit pada sistem pernafasan
		function count_penyakit_sistem_pernafasan(){
			
			$this->db->from('sistem_pernafasan');
			$query = $this->db->get();
			$rowcount = $query->num_rows();
			
			echo $rowcount;
			return $query;
	
		}
		
		//save data
		function save_data_kucing($namaUser, $namaKucing, $umur, $ras, $warna_bulu, $jenis_kelamin){
			
			$query = $this->db->query("INSERT INTO data_kucing (id_kucing, 	nama_user, nama_kucing, umur, ras, warna_bulu, jenis_kelamin) VALUES (null, '$namaUser', '$namaKucing', '$umur', '$ras', '$warna_bulu', '$jenis_kelamin')");
			
			return $query;
		}
		
		//update data kucing, gejala per gejala dimasukan kesini
		//Bila kucing mengalami gejala umum, maka field gejala umum pada kucing akan berubah menjadi 1.
		function update_data_kucing_gejalaUmum1($optradio){
			
			
			$query = $this->db->query("UPDATE data_kucing SET sesak_nafas = '$optradio', lendir = '$optradio'");
			
			return $query;
		}
			//Bila kucing mengalami gejala umum 1, maka akan masuk ke gejala khusus 1 yang berhubungan dengan gejal umum 1.
			function update_data_kucing_gejalaKhusus1($optradio){
			
			
			$query = $this->db->query("UPDATE data_kucing SET demam = '$optradio'");
			
			return $query;
			}
			
			function update_data_kucing_gejalaKhusus2($optradio){
			
			$query = $this->db->query("UPDATE data_kucing SET radang_gusi = '$optradio'");
			
			return $query;
			}
			
			function update_data_kucing_gejalaKhusus3($optradio){
			
			$query = $this->db->query("UPDATE data_kucing SET selaput_mata = '$optradio'");
			
			return $query;
			}
		
		//Bila kucing mengalami gejala umum kedua.
		function update_data_kucing_gejalaUmum2($optradio){
			
			
			$query = $this->db->query("UPDATE data_kucing SET tidak_mau_makan = '$optradio', muntah = '$optradio', mencret = '$optradio'");
			
			return $query;
		}
			//Bila kucing mengalami gejala umum kedua.
			function update_data_kucing_gejalaKhusus2_1($optradio){
			
			
			$query = $this->db->query("UPDATE data_kucing SET muntah_kuning = '$optradio'");
			
			return $query;
			}
			
			function update_data_kucing_gejalaKhusus2_2($optradio){
			
			$query = $this->db->query("UPDATE data_kucing SET demam_2 = '$optradio'");
			
			return $query;
			}
			
			function update_data_kucing_gejalaKhusus2_3($optradio){
			
			$query = $this->db->query("UPDATE data_kucing SET mencret_kuning = '$optradio'");
			
			return $query;
			}
			
			function update_data_kucing_gejalaKhusus2_4($optradio){
			
			$query = $this->db->query("UPDATE data_kucing SET bulu_rontok_kusam = '$optradio'");
			
			return $query;
			}
			
			function update_data_kucing_gejalaKhusus2_5($optradio){
			
			$query = $this->db->query("UPDATE data_kucing SET anemia = '$optradio'");
			
			return $query;
			}
			
			function update_data_kucing_gejalaKhusus2_6($optradio){
			
			$query = $this->db->query("UPDATE data_kucing SET cacing = '$optradio'");
			
			return $query;
			}
			
			function update_data_kucing_gejalaKhusus2_7($optradio){
			
			$query = $this->db->query("UPDATE data_kucing SET mencret_encer = '$optradio'");
			
			return $query;
			}
			
			function update_data_kucing_gejalaKhusus2_8($optradio){
			
			$query = $this->db->query("UPDATE data_kucing SET abortus = '$optradio'");
			
			return $query;
			}
			
			function update_data_kucing_gejalaKhusus2_9($optradio){
			
			$query = $this->db->query("UPDATE data_kucing SET mencret_berdarah = '$optradio'");
			
			return $query;
			}
			
			function update_data_kucing_gejalaKhusus2_10($optradio){
			
			$query = $this->db->query("UPDATE data_kucing SET malnutrisi = '$optradio'");
			
			return $query;
			}
			
			function update_data_kucing_gejalaKhusus2_11($optradio){
			
			$query = $this->db->query("UPDATE data_kucing SET dehidrasi = '$optradio'");
			
			return $query;
			}
			
			function update_data_kucing_gejalaKhusus2_12($optradio){
			
			$query = $this->db->query("UPDATE data_kucing SET lemas = '$optradio'");
			
			return $query;
			}
			
			function update_data_kucing_gejalaKhusus2_13($optradio){
			
			$query = $this->db->query("UPDATE data_kucing SET kotoran_mencret_berlendir = '$optradio'");
			
			return $query;
			}
		
		//Bila kucing mengalami gejala umum ketiga.
		function update_data_kucing_gejalaUmum3($optradio){
			
			
			$query = $this->db->query("UPDATE data_kucing SET bulu_rontok = '$optradio', sering_menggaruk = '$optradio'");
			
			return $query;
		}
			//Bila kucing mengalami gejala khusus ketiga.
			function update_data_kucing_gejalaKhusus3_1($optradio){
			
			$query = $this->db->query("UPDATE data_kucing SET luka_bulat = '$optradio'");
			
			return $query;
			}
			
			function update_data_kucing_gejalaKhusus3_2($optradio){
			
			$query = $this->db->query("UPDATE data_kucing SET keropeng_kepala_leher = '$optradio'");
			
			return $query;
			}
			
			function update_data_kucing_gejalaKhusus3_3($optradio){
			
			$query = $this->db->query("UPDATE data_kucing SET garuk_punggung = '$optradio'");
			
			return $query;
			}
			
			function update_data_kucing_gejalaKhusus3_4($optradio){
			
			$query = $this->db->query("UPDATE data_kucing SET garuk_telinga = '$optradio'");
			
			return $query;
			}
		
		
		//cek user
		
		function check_user_account($username, $password){
			
			$this->db->select('*');
			$this->db->from('admin');
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			
			return $this->db->get();
		}
		
		//mengambil data user tertentu
		function get_user($id_user){
			
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('id_user', $id_user);
			
			return $this->db->get();
		}
		
	}
?>