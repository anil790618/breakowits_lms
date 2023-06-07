<?php

namespace App\Controllers;
use App\Models\AdminModel; 
use App\Models\Main_model; 
use CodeIgniter\Controller;
// use CodeIgniter\Models\Main_model;

// $modelMain = new \App\Models\Main_model();
$this->main_model = new Main_model();
class Home extends BaseController
{
    public function __construct(){
    }
    public function index()
    {
        if($this->request->getMethod()=='post'){
            // $model = new AdminModel();
            $session = session();
            $email = $this->request->getVar('username');
            $password = $this->request->getVar('password');  
            
            $model = new AdminModel();
            // $data['userdata'] = $model->findAll();
            $data= $model->where('email',$email)->first();
            //  print_r($data);
            // $pass = $data;
            // echo $pass;
            // exit;
            if($data){
                $pass  = $data['password']; 
                $verify_pass = password_verify($password, $pass);
                // echo $verify_pass;
                
                if($verify_pass){
                    echo"Logged in";
                    $ses_data = [
                        'id'       => $data['id'],
                        'userid'       => $data['user_role_id'],
                        'firstname'     => $data['first_name'],
                        'lastname'    => $data['last_name'],
                        'email'    => $data['email'],
                        'logged_in'     => TRUE
                    ];
                    $session->set($ses_data);
                    return redirect()->to('/dashboard');
                }else{
                    $session->setFlashdata('msg', 'Wrong Password');
                    // echo'Wrong Password';
                    return redirect()->to('/');
                }
            }else{
                $session->setFlashdata('msg', 'Email not Found');
                //   echo'Wrong email';
                return redirect()->to('/');
            }
        }
        return view('index');
    }
    // public function login(){
    //     if($this->request->getMethod()=='post'){
    //         $email = $this->input->post('username');
    //         $password = $this->input->post('password');
    //         $que = $this->db->query("select * from tbl_users where email='$email' and pass='$password'");
    //         $row = $que->num_rows();
    //         if($count($row)>0){
    //             echo "Welcome to dashboard";
    //         }
    //         else{
    //             echo "not logged in";
    //         }
    //     }
    // }
    public function signup()
    {
        helper(['form']);
        $data=[];
        if($this->request->getMethod()=='post'){
            // echo 222 ;
            // exit;
            $rules = [
                'firstname' => 'required',
                'lastname' => 'required',
                'password' => 'required|min_length[2]',
                'passconf' => 'required|matches[password]',
                'email'    => 'required|valid_email',
            ];
            if($this->validate($rules)){
                echo " validate";
                 $model = new AdminModel();

                $data = array(
                    'first_name'=>$this->request->getVar('firstname'),
                    'last_name'=>$this->request->getVar('lastname'),
                    'email'=>$this->request->getVar('email'),
                    'password'=>password_hash($this->request->getVar('password'),PASSWORD_DEFAULT),
                );
                $model ->save($data);
                return redirect()->to('signup'); 
               
            }else{ 
                $data['validation']=$this->validator;
            }
        }
        return view('signup',$data);
    }
    public function dashboard()
    { 
       
        return view('header')
        . view('sidemenu')
        . view('view_assests/dashboard')
        . view('footer');
    }
    public function userlist()
    { 
        $model = new AdminModel();
        $data['userdata'] = $model->findAll();
        // print_r($data);
       
        return view('header')
        . view('sidemenu')
        . view('view_assests/userlist',$data)
        . view('footer');
    }
    public function instructor()
    {  
        $model = new AdminModel();
        $data['userdata'] = $model->findAll(); 
        return view('header')
        . view('sidemenu')
        . view('view_assests/instructor',$data)
        . view('footer');
    }
    public function instructor_data()
    {   
            $data['instructor'] = $this->main_model->getAllRowsData("tbl_users", "id,user_role_id,first_name,last_name,email", "user_role_id = 2");
           //$data='poja';
            //    print_r(json_encode($data)); 
               return json_encode($data); 
    
    }
    public function admin_data()
    {   
            $data['admin'] = $this->main_model->getAllRowsData("tbl_users", "id,user_role_id,first_name,last_name,email", "user_role_id = 1");
           
             return json_encode($data); 
    
    }
    public function student_data()
    {   
            $data['student'] = $this->main_model->getAllRowsData("tbl_users", "id,user_role_id,first_name,last_name,email", "user_role_id = 3");
           
             return json_encode($data); 
    
    }
   public function instructor_save(){
        $data =  $this->request->getVar(); 
        echo $data['password']=md5($data['password']); 
            $result = $this->main_model->insert_table('tbl_users',$data);
            if($result){
                echo 1;
            }
            else{
                echo 0;
            }
   }
   public function student_save(){
        $data =  $this->request->getVar(); 
        echo $data['password']=md5($data['password']); 
            $result = $this->main_model->insert_table('tbl_users',$data);
            if($result){
                echo 1;
            }
            else{
                echo 0;
            }
   }
    public function student()
    {  
        return view('header')
        . view('sidemenu')
        . view('view_assests/student')
        . view('footer');
    }
    public function student_profile()
    {  
        return view('header')
        . view('sidemenu')
        . view('view_assests/student_profile')
        . view('footer');
    }
    public function courselist()
    {  
        return view('header')
        . view('sidemenu')
        . view('view_assests/courselist')
        . view('footer');
    }


    public function logout(){
        $session = session();
        $session->destroy();
        // redirect('/');
        // echo  "logout ";
        return redirect()->to('/'); 
    }


}