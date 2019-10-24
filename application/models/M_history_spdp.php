<?php
 
class M_history_spdp extends CI_Model 
{
    var $table = 'tbl_police'; //nama tabel dari database
    var $column_order = array(null, 'nama_tersangka','date','file'); //field yang ada di table user
    var $column_search = array('nama_tersangka','date','file'); //field yang diizin untuk pencarian 
    var $order = array('id' => 'asc'); // default order 

    private function _get_datatables_query()
    {
        if($this->input->post('nama_tersangka'))
        {
            $this->db->like('nama_tersangka', $this->input->post('nama_tersangka'));
        }
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // looping awal
        {
            if($this->input->post('search')['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $this->input->post('search')['value']);
                }
                else
                {
                    $this->db->or_like($item, $this->input->post('search')['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if($this->input->post('order')) 
        {
            $this->db->order_by($this->column_order[$this->input->post('order')['0']['column']], $this->input->post('order')['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($this->input->post('length') != -1)
        $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}