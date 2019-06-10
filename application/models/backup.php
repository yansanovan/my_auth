if ($_FILES['spdp']['name']) 
            {
                if ($this->upload->do_upload('spdp'))
                {
                    $spdp = $this->upload->data('file_name');
                    $this->db->set('spdp_kj', $spdp);
                    @unlink('./uploads/kepolisian/kejaksaan/'. $post['old_spdp']);
                }   
            }

            if ($_FILES['narkotika']['name']) 
            {
                if ($this->upload->do_upload('narkotika'))
                {
                    $narkotika_kj = $this->upload->data('file_name');
                    $this->db->set('narkotika_kj', $narkotika_kj);
                    @unlink('./uploads/kepolisian/kejaksaan/'. $post['old_narkotikan']);
                }
            }

            if ($_FILES['kejaksaan']['name']) 
            {
                if ($this->upload->do_upload('kejaksaan'))
                {
                    $kejaksaan = $this->upload->data('file_name');
                    $this->db->set('kejaksaan_kj', $kejaksaan);
                    @unlink('./uploads/kepolisian/kejaksaan/'. $post['old_kejaksaan']);
                }
            }

            if ($_FILES['p_18']['name']) 
            {
                if ($this->upload->do_upload('p_18'))
                {
                    $p_18 = $this->upload->data('file_name');
                    $this->db->set('p_18_kj', $p_18);
                    @unlink('./uploads/kepolisian/kejaksaan/'. $post['old_p_18']);
                }
            }

            if ($_FILES['p_21']['name']) 
            {
                if ($this->upload->do_upload('p_21'))
                {
                    $p_21 = $this->upload->data('file_name');
                    $this->db->set('p_21_kj', $p_21);
                    @unlink('./uploads/kepolisian/kejaksaan/'. $post['old_p_21']);
                }
            }

            if ($_FILES['pelimpahan']['name']) 
            {
                if ($this->upload->do_upload('pelimpahan'))
                {
                    $pelimpahan = $this->upload->data('file_name');
                    $this->db->set('pelimpahan_kj', $pelimpahan);
                    @unlink('./uploads/kepolisian/kejaksaan/'. $post['old_pelimpahan']);
                }
            }

            if ($_FILES['p_17']['name']) 
            {
                if ($this->upload->do_upload('p_17'))
                {
                    $p_17 = $this->upload->data('file_name');
                    $this->db->set('p_17_kj', $p_17);
                    @unlink('./uploads/kepolisian/kejaksaan/'. $post['old_p_17']);
                }
            }