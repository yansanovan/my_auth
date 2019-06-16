<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_pesan extends CI_Model 
{
    function generatePesan($type, $pesan) 
    {
        if ($type == "berhasil") 
        {
            $str = '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                    '.$pesan.'</div>';
        
        } 
        elseif($type == "cek") 
        {
            $str = '<div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Opps!</h4>'.$pesan.
                    '</div> ';
        }
        elseif($type == "salah") 
        {
            $str = '<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="fa fa-times" aria-hidden="true"></i> Opps!</h4>'.$pesan.
                    '</div> ';
        }

        elseif($type == "blokir") 
        {
            $str = '<div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Opps!</h4>'.$pesan.
                    '</div> ';
        }
        
        $this->session->set_flashdata('msgbox',$str);
        
        return $str;
    }
}

