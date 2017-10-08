<?php
	class Sales_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function debug($array){
			echo "<pre>";
				print_r($array);
			echo "</pre>";
		}
		public function sales_total($id)
        {
            $this->db->where_in('sales_id',$id);
            $sales_item = $this->db->get('sales_item')->result();

            $total = 0;
            foreach($sales_item as $ap)
            {
                $ap->qty;		
                $ap->price;		
                $ap->qty * $ap->price; 
                $total += ($ap->qty * $ap->price);
            }
            return $total;

        }
	}
?>