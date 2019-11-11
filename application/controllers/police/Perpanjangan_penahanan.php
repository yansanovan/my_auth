 public function create_perpanjangan_penahanan()
    {
        $this->form_validation->set_rules('perpanjangan_penahanan', 'Perpanjangan penahanan', 'required');
        $this->form_validation->set_rules('file_perpanjangan_penahanan', 'file Perpanjangan penahanan', 'callback_file_check_perpanjangan_penahanan','trim|xss_clean');

        if ($this->form_validation->run() === FALSE)
        {
            $result = array('perpanjangan_penahanan' => form_error('perpanjangan_penahanan'), 
                           'file_perpanjangan_penahanan' => form_error('file_perpanjangan_penahanan'),
                           'hash' => $this->security->get_csrf_hash()      
                        );     
            $this->output->set_content_type('application/json')->set_output(json_encode($result));
        }
        else
        {
            $config['upload_path']   ="./assets/perpanjangan_penahanan";
            $config['allowed_types'] ='gif|jpg|png|jpeg';
            $config['encrypt_name']  = TRUE;
            $this->load->library('upload',$config);

            $result = array('hash' => $this->security->get_csrf_hash());       
            $post   = $this->input->post(NULL, TRUE);          

            if($this->upload->do_upload('file_perpanjangan_penahanan'))
            {
                $data = array('upload_data' => $this->upload->data('file_name'));
                $result = array('success' => 'Data has been inserted', 
                                'newToken' => $this->security->get_csrf_hash());
            }
            else
            {
               $result = array('file_perpanjangan_penahanan' => 'Opps, Something error');
            }
            $token = bin2hex(openssl_random_pseudo_bytes(32));
            $insert = array('perpanjangan_penahanan' => $post['perpanjangan_penahanan'], 
                            'file_perpanjangan_penahanan' => $data['upload_data'], 
                            'status'   => 'unread', 
                            'url'      => $token);
            $this->db->set('date', 'NOW()', FALSE);
            $this->db->insert('tbl_perpanjangan_penahanan', $insert);

            // insert notification
            $perpanjangan_penahanan = 'Perpanjangan Penahanan';


            $notification = array('id_users' => $this->session->userdata('id'), 
                                  'type'     => $perpanjangan_penahanan,
                                  'message'  => $post['perpanjangan_penahanan'],
                                  'url'      => $token, 
                                  'status'   => 'unread');
            $this->db->insert('notification', $notification);  

            $this->load->view('vendor/autoload.php');
            $options = array(
                'cluster' => 'ap1',
                'useTLS' => true
                );
                $pusher = new Pusher\Pusher(
                '30c7051b6b50d432b7b9',
                'a7448f51e726240fe5df',
                '779476',
                $options
            );
            $data['message'] = 'success';
            $pusher->trigger('my-channel', 'my-event', $data);
            $this->output->set_content_type('application/json')->set_output(json_encode($result));
        }
    }