<?php
	class tblkaryappchief_model extends DBModel{
		
		function __construct(){ 
			parent::__construct('db_approval','id_transaksi');
			$this->set_join('db_kary','kary_id = id_kary');
			$this->set_join('db_modul','modul_id = id_modul');	
				
				
		}
		
		
		protected function before_fetch(){
			$CI =& get_instance();
			$CI->load->model('userlogin','user');
			$session_id = $CI->user->isLogin();
			$level = $session_id['level_id'];	
			$nip = $session_id['kary_id'];
			$idchief = $session_id['id_chief'];	
			$this->db->select('id_transaksi,modul_nm,nama,tgl_aju,no_link,id_kary,tgl_join');	
			$this->db->where('id_approval =','1');
			$this->db->where('chief_id =',$idchief);
			#$this->db->where('flag_id !=',10);
			parent::before_fetch();
		}
		
		function namadiv($divisi){
			$this->db->where('id_divisi',$divisi);
			$this->db->order_by('nama','asc');			 
			return $this->db->get('db_kary')->result();
		}


		function karycutipar(){
			return $this->db->get('db_karycutipar')->row_array();
			
		}
		
		function approv_id(){
			$this->db->order_by('id_transaksi','DESC');
			return $this->db->get('db_approval')->row_array();
		}
		
		function flowapp(){
			$this->db->join('db_karylvl','karylvl_id = id_flowapp');
			return $this->db->get('db_flowapp')->result();
		}
		
		
		function joinall_table($id){

			$this->db->join('db_kary','kary_id = id_kary');
			$this->db->join('db_karyjab','karyjab_id = id_karyjab');
			$this->db->join('db_karylvl','karylvl_id = id_karylvl');
			$this->db->join('db_karycuti','id_transaksi = transaksi_id');
			$this->db->join('db_karycutipar','karycutipar_id = id_karycutipar');
			$this->db->join('db_karycutijns','karycutijns_id = jns_cuti');
			$this->db->join('db_karycutials','karycutials_id = id_karycutials');
			$this->db->where('id_transaksi',$id);
			return $this->db->get('db_approval')->row_array();
		}
		function viewkary($id){
								
			$this->db->join('db_karycutipar','id_kary = karyawan_id');
			$this->db->join('db_kary','db_kary.id_kary = db_karycuti.kary_id');
			$this->db->join('db_divisi','db_divisi.divisi_id = db_karycuti.id_divisi');
			$this->db->join('db_karycutijns','karycutijns_id = jns_cuti');
			$this->db->join('db_karyjab','karyjab_id = id_karyjab');
			$this->db->where('transaksi_id',$id);
			return $this->db->get('db_karycuti')->row_array();
		}
		
		
		
}
