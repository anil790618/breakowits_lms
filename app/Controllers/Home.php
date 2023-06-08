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
                    if($session->get('userid')==2){
                        return redirect()->to('/instructor_dashboard'); 
                    }
                    if($session->get('userid')==3){
                        return redirect()->to('/dashboard_student'); 
                    }
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
    public function dashboard_student()
    { 
       
        return view('header')
        . view('sidemenu')
        . view('view_assests/dashboard_student')
        . view('footer');
    }
    public function instructor_dashboard()
    { 
       
        return view('header')
        . view('sidemenu')
        . view('view_assests/instructor_dashboard')
        . view('footer');
    }
    public function instructor_profile()
    { 
       
        return view('header')
        . view('sidemenu')
        . view('view_assests/instructor_profile')
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
        $data['category'] = $this->main_model->getAllRowsData("course_category", "c_id,c_name,c_desc,image", "c_id > 0");
        return view('header')
        . view('sidemenu')
        . view('view_assests/courselist',$data)
        . view('footer');
    }

// =================================course Details ==========================================
public function course_cat()
{    $data['category'] = $this->main_model->getAllRowsData("course_category", "c_id,c_name,c_desc,image", "c_id > 0");
    
    return view('header')
    . view('sidemenu')
    . view('view_assests/course_category',$data)
    . view('footer');
}
public function course_view($id) 
{  
     $data['topic'] = $this->main_model->getAllRowsData("topic", "*", "t_id=$id");
    return view('new_as/c_header')
    . view('sidemenu')
    . view('view_assests/course-view',$data)
    . view('new_as/c_footer');
}
// public function course_cat_data()
// {  
//     $data['category'] = $this->main_model->getAllRowsData("course_category", "c_id,c_name,c_desc,image", "c_id > 0");
//     return json_encode($data); 
// }
// category_form_data
public function category_form_data(){
    $data =  $this->request->getVar(); 
        $result = $this->main_model->insert_table('course_category',$data);
        if($result){
            echo 1;
        }
        else{
            echo 0;
        }
}
// course_add
public function course_add()
{   
    $data['creator'] = $this->main_model->getAllRowsData("tbl_users", "id,user_role_id,first_name,last_name,email", "user_role_id = 1 or user_role_id = 2");
    $data['category'] = $this->main_model->getAllRowsData("course_category", "c_id,c_name,c_desc,image", "c_id > 0");
    $data['topic'] = $this->main_model->getAllRowsData("topic", "`t_id`, `c_id`, `creater_id`, `t_heading`, `t_desc`, `t_list`, `t_requirement`, `image`, `price`, `created_at`", "t_id > 0");
    
    return view('header')
    . view('sidemenu')
    . view('view_assests/course_list' , $data)
    . view('footer');
}


// course_list_load
// public function course_list_load()
// {  
//     $data['topic'] = $this->main_model->getAllRowsData("topic", "`t_id`, `c_id`, `creater_id`, `t_heading`, `t_desc`, `t_list`, `t_requirement`, `image`, `price`, `created_at`", "t_id > 0");
//     return json_encode($data); 
// }course_list_insert
 
public function course_list_insert(){
    $data =  $this->request->getVar(); 
    $data['image'] = $_FILES['image']['name'];
    print_r($data);
    $folder ="./media/course/"; 

    // if(!empty($_FILES['image']['name']))
    // { 
    //     $i = 0;
    //     while($i < count($_FILES['image']['name']))
    //     {
    //         $fname = $_FILES['image']['name'][$i];
    //         $file_path = $_FILES['image']['tmp_name'][$i];
    //         $i++;
    //     }
    // }
    $fname = $_FILES['image']['name'];
    $file_path = $_FILES['image']['tmp_name'];
    
    $ext = strtolower(pathinfo($fname, PATHINFO_EXTENSION));

    $file_name = "IMG_".time()."_".rand(11,99).".".$ext;

    if(move_uploaded_file($file_path,$folder.$file_name)){
        // echo "file uploaded";

        image_handler('./media/course/'.$file_name, './media/course/thumb/'.$file_name, "200", "200", "85");

        $data['image']= $file_name ;
        $result = $this->main_model->insert_table('topic',$data);
        if($result){
            echo 1;
        }
        else{
            echo 0;
        }
    }else{
        echo "file not uploaded";
    }
    // $data['image'] = $_FILES['image']['name'];
    // print_r($data);
    // exit;
   
}
// =================================Logout Details ==========================================
    public function logout(){
        $session = session();
        $session->destroy();
        // redirect('/');
        // echo  "logout ";
        return redirect()->to('/'); 
    }


}