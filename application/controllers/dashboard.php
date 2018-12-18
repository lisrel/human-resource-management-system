<?php
/* *
 * Created by PhpStorm.
 * User: Deo
 * Date: 12/10/2018
 * Time: 17:24
 */
class Dashboard extends CI_Controller{
    public function index() {
        if (!$this->session->userdata('user_id')){
            return redirect('welcome');
        }else {
            $this->load->model('Queries');
            $this->load->library('pagination');
            $config = [
                 'base_url'=> base_url('dashboard/index'),
                 'per_page'=> 5,
                 'total_rows'=> $this->Queries->get_num_rows(),
                 'uri_segment'=>3,
                 'full_tag_open'=> "<ul class='pagination'>",
                 'full_tag_close' => "</ul>",
                 'next_tag_open'=> '<li>',
                 'next_tag_close'=> '</li>',
                 'prev_tag_open'=> '<li>',
                 'prev_tag_close'=> '</li>',
                 'num_tag_open'=> '<li>',
                 'num_tag_close'=> '</li>',
                 'cur_tag_open'=> "<li class='active'><a>",
                 'cur_tag_close'=> '</a></li>',
            ];
            $this->pagination->initialize($config);
            $result = $this->Queries->getAllusers($config['per_page'], $this->uri->segment(3));
            $this->load->view('dashboard', ['result'=>$result]);
        }

    }
    public function search(){
        $this->form_validation->set_rules('query', 'Query', 'required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if ($this->form_validation->run()){
            $query = $this->input->post('query');
            $this->load->model('Queries');
            $record = $this->Queries->searchRecord($query);
            $this->load->view('searchUser', ['record'=> $record]);
        }else {
            return $this->index();
        }
    }
    public function logout(){
        $this->session->unset_userdata('user_id');
        $this->load->view('welcome_message');
    }
}