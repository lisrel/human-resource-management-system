<?php
/* *
 * Created by PhpStorm.
 * User: Deo
 * Date: 13/10/2018
 * Time: 14:34
 */
class Employee extends CI_Controller{
    public function createEmployee  ()
    {
        $this->load->model('Queries');
        $result = $this->Queries->getUserRole();

        $this->load->view('createEmployee', ['result'=>$result]);
    }
    public function insertEmployee()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|valid_email|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('user_role_id', 'User Role', 'required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

        if ($this->form_validation->run())
        {
               $data = $this->input->post();
               $this->load->model('Queries');
               if ($this->Queries->addEmployee($data)){
                    $this->session->set_flashdata('employee_add', 'Employee Successfully Added');
               }else{
                   $this->session->set_flashdata('employee_add', 'Failed Adding An Employee');
               }
               return  redirect('dashboard');

        }else{
           // echo validation_errors();
            $this->createEmployee();

        }
    }

    public function employeesList(){
        $this->load->model('Queries');
        $this->load->library('pagination');
        $config = [
            'base_url'=> base_url('employee/employeesList'),
            'per_page'=> 5,
            'total_rows'=> $this->Queries->get_employee_num_rows(),
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
        $result = $this->Queries->getEmployeeList($config['per_page'], $this->uri->segment(3));
        $this->load->view('employeesList',['result'=> $result]);
    }
    public function empPersonalDetails($employee_id){
        $this->load->model('Queries');
        $result = $this->Queries->getEmployeeRecords($employee_id);
        $records = $this->Queries->getEmpPersonalDetails($employee_id);
        $contacts = $this->Queries->getEmpContactDetails($employee_id);

        $this->load->view('empPersonalDetails', ['result'=>$result, 'records'=>$records, 'contacts'=>$contacts]);
    }

    public  function addPersonalDetails($employee_id){

        $config=[
            'upload_path'=> './uploads',
            'allowed_types'=> 'gif|jpg|png|jpeg'
        ];
        $this->load->library('upload', $config);
        $this->form_validation->set_rules('name', 'First Name(s)', 'required');
        $this->form_validation->set_rules('surname', 'Surname', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username|valid_email]');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('nationality', 'Nationality', 'required');
        $this->form_validation->set_rules('marital_status', 'Marital Status', 'required');
        $this->form_validation->set_rules('dob', 'Date Of Birth', 'required');
        //$this->form_validation->set_rules('avatar', 'Profile Image', 'required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

        if ($this->form_validation->run() && $this->upload->do_upload('avatar'))
        {
            $data = $this->input->post();
            $upload_info = $this->upload->data();
            $path = base_url("uploads/".$upload_info['raw_name'].$upload_info['file_ext']);
            $data['avatar'] = $path;
            $date = explode('/', $data['dob']);
            $data['dob'] = $date[2].'/'.$date[0].'/'.$date[1];
            $this->load->model('Queries');
            if ($this->Queries->insertEmployeeDetails($data)){
                    $this->session->set_flashdata('employee_add','Employee Successfully Added');
            }else {
                $this->session->set_flashdata('employee_add','Failed Adding An Employee');
            }

            return redirect('dashboard');

        }else{
           // echo validation_errors();
            $upload_error = $this->upload->display_errors();
           $this->empPersonalDetails($employee_id);

        }
    }

    public function empContactDetails($employee_id){
        $this->load->model('Queries');
        $result = $this->Queries->getEmployeeRecords($employee_id);
        $records = $this->Queries->getEmpPersonalDetails($employee_id);
        $contacts = $this->Queries->getEmpContactDetails($employee_id);


        $this->load->view('empContactDetails', ['result'=>$result, 'records'=>$records, 'contacts'=>$contacts]);
    }

    public function addContactDetails($employee_id){

        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

        if ($this->form_validation->run())
        {
            $data = $this->input->post();
            $this->load->model('Queries');
            if ($this->Queries->insertContactDetails($data)){
                $this->session->set_flashdata('employee_add','Employee Successfully Added');
            }else {
                $this->session->set_flashdata('employee_add','Failed Adding An Employee');
            }

            return redirect('dashboard');

        }else{
            // echo validation_errors();

            $this->empContactDetails($employee_id);

        }
    }

    public function empQualificationDetails($employee_id){
        $this->load->model('Queries');
        $result = $this->Queries->getEmployeeRecords($employee_id);
        $records = $this->Queries->getEmpPersonalDetails($employee_id);
        $contacts = $this->Queries->getEmpContactDetails($employee_id);
        $qualifications= $this->Queries->getEmpQualificationDetails($employee_id);

        $this->load->view('empQualificationDetails', ['result'=>$result, 'records'=>$records, 'contacts'=>$contacts, 'qualifications'=>$qualifications]);
    }

    public function addQualificationDetails($employee_id){

        $config=[
            'upload_path'=> './uploads',
            'allowed_types'=>'docx|pdf|jpeg|jpg'
        ];
        $this->load->library('upload', $config);
        $this->form_validation->set_rules('highest_level', 'Level of Qualification', 'required');
        $this->form_validation->set_rules('year_graduated', 'Year Graduated', 'required');
        $this->form_validation->set_rules('experience', 'Experience', 'required');

        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

        if ($this->form_validation->run() && $this->upload->do_upload('docs'))
        {
            $data = $this->input->post();
            $upload_info = $this->upload->data();
            $path = base_url("uploads/".$upload_info['raw_name'].$upload_info['file_ext']);
            $data['docs'] = $path;
            $this->load->model('Queries');
            if ($this->Queries->insertQualificationDetails($data)){
                $this->session->set_flashdata('employee_add','Employee Successfully Added');
            }else {
                $this->session->set_flashdata('employee_add','Failed Adding An Employee');
            }

            return redirect('dashboard');

        }else{

            // echo validation_errors();
            $upload_error = $this->upload->display_errors();
            $this->empQualificationDetails($employee_id, $upload_error);

        }
    }



    public function createTasks(){

        $this->load->model('Queries');
        $names = $this->Queries->getAllNames();

        $this->load->view('createTasks', ['names'=> $names]);
    }

    public function insertTask()
    {
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('notes', 'Notes', 'required');
        $this->form_validation->set_rules('assigned_to', 'Assigned To', 'required');
        $this->form_validation->set_rules('due_date', 'Due Date', 'required');
        $this->form_validation->set_rules('priority', 'Priority', 'required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

        if ($this->form_validation->run())
        {
            $data = $this->input->post();
            $date = explode('/', $data['due_date']);
            $data['due_date'] = $date[2].'/'.$date[0].'/'.$date[1];

            $this->load->model('Queries');
            if ($this->Queries->addTask($data)){
                $this->session->set_flashdata('task_add', 'Task Successfully Added');
            }else{
                $this->session->set_flashdata('task_add', 'Failed Adding A Task');
            }
            return  redirect('employee/viewTasks');

        }else{
            // echo validation_errors();
            $this->createTasks();

        }
    }

    public  function viewTasks(){

        $this->load->model('Queries');
        $tasks =  $this->Queries->getAllTasks();

        $this->load->view('viewTasks', ['tasks' => $tasks]);
    }


    public  function viewTaskDetails($task_id){

        $this->load->model('Queries');
        $tasks =  $this->Queries->getTaskDetails($task_id);

        $this->load->view('viewTaskDetails', ['tasks' => $tasks]);
    }

    public function search(){
        $this->form_validation->set_rules('query', 'Query', 'required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if ($this->form_validation->run()){
            $query = $this->input->post('query');
            $this->load->model('Queries');
            $tasks = $this->Queries->searchTask($query);
            $this->load->view('searchTask', ['tasks' => $tasks]);
        }else {
            return $this->index();
        }
    }

    public function createNotice(){

        $this->load->view('createNotice');
    }

    public function insertNotice()
    {
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('notice', 'Notice Details', 'required');

        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

        if ($this->form_validation->run())
        {
            $data = $this->input->post();

            $this->load->model('Queries');
            if ($this->Queries->addNotice($data)){
                $this->session->set_flashdata('notice_add', 'Notice Successfully Added');
            }else{
                $this->session->set_flashdata('notice_add', 'Notice Adding A Task');
            }
            return  redirect('employee/viewNotice');

        }else{
            // echo validation_errors();
            $this->createNotice();

        }
    }

    public function viewNotice(){

        $this->load->model('Queries');
        $notices= $this->Queries->getAllNotices();

        $this->load->view('viewNotice', ['notices'=>$notices]);
    }

    public  function viewNoticeDetails($notice_id){

        $this->load->model('Queries');
        $notices =  $this->Queries->getNoticeDetails($notice_id);
        $this->load->view('viewNoticeDetails', ['notices'=>$notices]);
    }

    public function uploadedWork(){

        $this->load->model('Queries');
        $work =  $this->Queries->getAllWork();
        $this->load->view('uploadedWork',['work'=>$work]);
    }

    public function deleteEmployee(){

        $this->load->model('Queries');
        foreach ($_POST['user_id'] as $userid){
            $this->Queries->deleteEmp($userid);
        }

        return redirect('dashboard');

    }

}