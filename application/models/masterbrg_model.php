<?php
	class masterbrg_model extends DBModel{
		
		function __construct(){ 
			//parent::__construct('PemasokMaster','kd_supplier');	
			parent::__construct('barang','kd_brg');
		}
		
	}



