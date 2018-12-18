<?php
/* *
 * Created by PhpStorm.
 * User: tbill
 * Date: 12-Oct-18
 * Time: 14:06
 */
class Queries extends CI_Model
{
    public function login_user($username, $password)
    {
        $query = $this->db->where(['username' => $username, 'password' => $password])
            ->get('users');
        if ($query->num_rows() > 0) {
            return $query->row()->user_id;
        }
    }

    public function getUserRole()
    {
        $query = $this->db->where(['role_name' => 'Employee'])
            ->get('user_role');
        if ($query->num_rows() > 0) {
            return $query->row()->id;
        }
    }

    public function addEmployee($data){
       return $this->db->insert('users', $data);
    }

    public function getAllUsers($limit, $offset){
        $this->db->select(['users.user_id', 'users.name','users.username','user_role.role_name', 'users.user_role_id']);
        $this->db->from('users');
        $this->db->join('user_role', 'user_role.id= users.user_role_id');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_num_rows(){
        $query = $this->db->get('users');
        return $query->num_rows();

    }

    public function getEmployeeList($limit, $offset){
        $this->db->select(['users.user_id', 'users.name','users.username','user_role.role_name', 'users.user_role_id']);
        $this->db->from('users');
        $this->db->join('user_role', 'user_role.id= users.user_role_id');
        $this->db->where(['users.user_role_id'=>'2']);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_employee_num_rows(){
        $this->db->select(['users.user_id', 'users.name','users.username','user_role.role_name', 'users.user_role_id']);
        $this->db->from('users');
        $this->db->join('user_role', 'user_role.id= users.user_role_id');
        $this->db->where(['users.user_role_id'=>'2']);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function searchRecord($query){
        $this->db->select(['users.user_id', 'users.name','users.username','user_role.role_name', 'users.user_role_id']);
        $this->db->from('users');
        $this->db->join('user_role', 'user_role.id= users.user_role_id');
        $this->db->like('name', $query);
        $query = $this->db->get();
        return $query->result();
    }

    public function getEmployeeRecords($employee_id){
        $query = $this->db->where(['user_id'=>$employee_id])
                        ->get('users');

        if($query->num_rows()>0){
            return $query->row();
        }
    }

    public function insertEmployeeDetails($data){
        return $this->db->insert('personal_detail', $data);
    }

    public function getEmpPersonalDetails($employee_id){
        $query= $this->db->where(['user_id'=>$employee_id])->get('personal_detail');
        if($query->num_rows()>0){
            return $query->row();
        }

    }

    public function insertContactDetails($data){
        return $this->db->insert('contact_details', $data);
    }

    public function getEmpContactDetails($employee_id){
        $query= $this->db->where(['user_id'=>$employee_id])->get('contact_details');
        if($query->num_rows()>0){
            return $query->row();
        }

    }

    public function insertQualificationDetails($data){
        return $this->db->insert('emp_qualifications', $data);
    }

    public function getEmpQualificationDetails($employee_id){
        $query= $this->db->where(['user_id'=>$employee_id])->get('emp_qualifications');
        if($query->num_rows()>0){
            return $query->row();
        }


    }

    public function getAllNames(){
        $this->db->select(['users.name']);
        $this->db->where(['users.user_role_id'=>'2']);
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result();
    }

    public function addTask($data){
        return $this->db->insert('tasks', $data);
    }

    public function getAllTasks(){
        $this->db->select(['tasks.description', 'tasks.notes','tasks.assigned_to','tasks.due_date', 'tasks.priority','tasks.added', 'tasks.id']);
        $this->db->from('tasks');
        $this->db->order_by("added", "desc");
        $query = $this->db->get();
        return $query->result();

    }


    public function getTaskDetails($task_id){
        $query= $this->db->where(['id'=>$task_id])->get('tasks');
        if($query->num_rows()>0){
            return $query->row();
        }


    }

    public function searchTask($query){
        $this->db->select(['tasks.description', 'tasks.notes','tasks.assigned_to','tasks.due_date', 'tasks.priority','tasks.added', 'tasks.id']);
        $this->db->from('tasks');
        $this->db->like('assigned_to', $query);
        $query = $this->db->get();
        return $query->result();

    }

    public function addNotice($data){
        return $this->db->insert('notices', $data);
    }

    public function getAllNotices(){
        $this->db->select(['notices.description', 'notices.notice','notices.added', 'notices.id']);
        $this->db->from('notices');
        $this->db->order_by("added", "desc");
        $query = $this->db->get();
        return $query->result();

    }

    public function uploadWorkDone($data){
        return $this->db->insert('work_done', $data);
    }

    public function getAllWork(){
        $this->db->select(['work_done.task_name', 'work_done.docs','work_done.date_uploaded', 'work_done.id']);
        $this->db->from('work_done');
        $this->db->order_by("date_uploaded", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function getNoticeDetails($notice_id){
        $query= $this->db->where(['id'=>$notice_id])->get('notices');
        if($query->num_rows()>0){
            return $query->row();
        }
    }

    public function deleteEmp($userid){
        $this->db->delete('users', ['user_id'=>$userid]);
        $this->db->delete('contact_details', ['user_id'=>$userid]);
        $this->db->delete('personal_detail', ['user_id'=>$userid]);
        $this->db->delete('emp_qualifications', ['user_id'=>$userid]);


    }

}

