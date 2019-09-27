<?php
class Upload_model extends CI_Model
{
 
     function save_upload($title, $image1, $image2){
        $data = array(
                'title'  => $title,
                'file_1' => $image1,
                'file_2' => $image2
            );  
        $result = $this->db->insert('gallery',$data);
        return $result;
    }
 	function upload($post, $image, $image2){
        $data = array(
                'title'     => $post['title'],
                'name'		=> $post['name'],
                'email'		=> $post['email'],
                'message'	=> $post['message'],
                'file' 		=> $image,
                'file2'      => $image2
            );  
        $result = $this->db->insert('students',$data);
        return $result;
    }

    function update($post){
        $data = array(
                'title'     => $post['title'],
                'name'      => $post['name'],
                'email'     => $post['email'],
                'message'   => $post['message']
            );  
        $this->db->where('id', $post['id']);
        $result = $this->db->update('students',$data);
        return $result;
    }

    function delete($id)  
    {  
        $this->db->where("id", $id);  
        $this->db->delete("students");  
    }  

    function fetch_data_delete($id)
    {
        $this->db->select("*");
        $this->db->from("students");
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    function check_unique_user_email($id = '', $email) {
        $this->db->where('email', $email);
        if($id) 
        {
            $this->db->where_not_in('id', $id);
        }
        return $this->db->get('students')->num_rows();
    }

    function count_all()
    {
        $query = $this->db->get("students");
        return $query->num_rows();
    }

    function fetch_details($limit, $start, $query)
    {
        $output = '';
        $this->db->select("*");
        $this->db->from("students");
       if($query != '')
        {
            $this->db->like('id', $query);
            $this->db->or_like('title', $query);
            $this->db->or_like('name', $query);
            $this->db->or_like('email', $query);
            $this->db->or_like('message', $query);
        }
        $this->db->order_by("id", "ASC");
        $this->db->limit($limit, $start);
        $data = $this->db->get();

        if($data->num_rows() > 0)
        {
            foreach($data->result() as $row)
            {
                $output .= '
                    <tr>
                        <td>'.$row->id.'</td>
                        <td>'.$row->title.'</td>
                        <td>'.$row->name.'</td>
                        <td>'.$row->email.'</td>
                        <td>'.$row->message.'</td>
                        <td> <i class="fa fa-calendar"> </i> '. date('d-m-Y H:i:s', strtotime($row->created_at)).'</td>
                        <td><img src="'.base_url('asset/images/'.$row->file).'" class="img-responsive" height="30px" width="50px" /></td>     
                        <td> 
                            <button type="button"  class="btn btn-warning btn-xs update" data-id="'.$row->id.'" data-title="'.$row->title.'"  data-name="'.$row->name.'" data-email="'.$row->email.'" data-message="'.$row->message.'" data-file="'.$row->file.'"  data-toggle="modal" data-target="#modal_update" data-whatever="@mdo"><i class="fa fa-edit" aria-hidden="true"> </i> Update</button>
                            <button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete">
                                <i class="fa fa-remove" aria-hidden="true"> </i> Delete
                            </button>
                        </td>          
                    </tr>';
            }
        }
        else
        {
            $output .= '<tr>
            <td colspan="7" align="center">No Data Found</td>
            </tr>';
        }
                $output .= '</table>';
                return $output;
    }
}