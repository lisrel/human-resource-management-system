<?php
class anyEmployee extends CI_Controller
{

    public function index()
    {
        $this->load->model('Queries');
        $tasks =  $this->Queries->getAllTasks();

       // $this->load->view('viewTasks', ['tasks' => $tasks]);
        $this->load->view('anyEmployee', ['tasks' => $tasks]);
    }

    public function empNotices(){
        $this->load->model('Queries');
        $notices= $this->Queries->getAllNotices();

        $this->load->view('empNotices', ['notices'=>$notices]);
    }

    public function workDone(){
        $this->load->view('workDone');
    }

    public function uploadWorkDone(){
        $config=[
            'upload_path'=> './uploads',
            'allowed_types'=> 'gif|jpg|png|jpeg|doc|pdf|zip|rar'
        ];
        $this->load->library('upload', $config);
        $this->form_validation->set_rules('task_name', 'Task Name', 'required');

        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

        if ($this->form_validation->run() && $this->upload->do_upload('docs'))
        {
            $data = $this->input->post();
            $upload_info = $this->upload->data();
            $path = base_url("uploads/".$upload_info['raw_name'].$upload_info['file_ext']);
            $data['docs'] = $path;

            $this->load->model('Queries');
            if ($this->Queries->uploadWorkDone($data)){
                $this->session->set_flashdata('work_done_add','Your Work Has Been Successfully Uploaded');
            }else {
                $this->session->set_flashdata('work_done_add','Failed Uploading Your Work');
            }

            return redirect('anyEmployee');

        }else{
            // echo validation_errors();
            $upload_error = $this->upload->display_errors();
            $this->load->view('workDone', $upload_error);

        }
    }
}

