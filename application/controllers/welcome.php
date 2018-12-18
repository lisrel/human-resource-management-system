<?php

class Welcome extends CI_Controller {


    public function index(){
  //      if ($this->session->userdata('user_id')){
   //         return redirect('dashboard');
  //      }

            $this->load->view('welcome_message');


	}

    /**
     * @return mixed
     */
    public function user_login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

        if ($this->form_validation->run())
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->load->model('Queries');
           $user_id =  $this->Queries->login_user( $username, $password);

           if ($user_id) {
               $this->session->set_userdata(['user_id'=>$user_id]);

               if ($this->session->userdata('user_id') == '1'){



                   return redirect('dashboard');
               }else{




                  return redirect('anyEmployee', $user_id);
               }

           }else{

               $this->session->set_flashdata('login_response', 'Invalid Username and or Password');
               return redirect('welcome');

           }
        }
        else
        {
            $this->load->view('welcome_message');
        }

    }

    public function logout(){
        $this->session->unset_userdata('user_id');
        $this->load->view('welcome_message');
    }
    }


