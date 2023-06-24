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
            $data= $model->where('email',$email)->first(); 
            if($data){
                $pass  = $data['password']; 
                $verify_pass = password_verify($password, $pass); 
                
                if($verify_pass){ 
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


    // student login details 
    public function studentLogin()
    {
        if($this->request->getMethod()=='post'){
        //   echo "form submitted";
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
                // echo " validate";
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
    public function mcq_quiz($id)
    {   
         $data['id']=$id;
         $data['quiz_question'] = $this->main_model->getAllRowsData("quiz_question", "*", "m_id=$id");
        return view('header')
        . view('sidemenu')
        . view('view_assests/mcq_quiz',$data)
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
            $data['student'] = $this->main_model->getAllRowsData("student", "id,user_role_id,name,email,phone,address", "user_role_id = 3");
           
             return json_encode($data); 
    
    }
   public function instructor_save(){
        $data =  $this->request->getVar(); 
          $data['password']=md5($data['password']); 
            $result = $this->main_model->insert_table('tbl_users',$data);
            if($result){
                echo 1;
            }
            else{
                echo 0;
            }
   }
   public function category_update_data(){
        $data =  $this->request->getVar();   
        $id= $data['c_id']; 
            $result = $this->main_model->update_table('course_category',$data,"c_id=$id");
            if($result){
                echo 1;
            }
            else{
                echo 0;
            }
   }
   public function what_you_learn_list_update(){
        $data =  $this->request->getVar();    
        $id= $data['t_id'];
        print_r($data); 
            $result = $this->main_model->update_table('course',$data,"t_id=$id");
            if($result){
                echo 1;
            }
            else{
                echo 0;
            }
   }
   public function details_Requirements_update(){
        $data =  $this->request->getVar();    
        $id= $data['t_id'];
        print_r($data); 
            $result = $this->main_model->update_table('course',$data,"t_id=$id");
            if($result){
                echo 1;
            }
            else{
                echo 0;
            }
   }
   public function heading_desc_update(){
        $data =  $this->request->getVar();   
        $id= $data['t_id']; 
            $result = $this->main_model->update_table('course',$data,"t_id=$id");
            if($result){
                echo 1;
            }
            else{
                echo 0;
            }
   }
   public function course_update_data(){
        $data =  $this->request->getVar();   
        // print_r($data);
        // exit;
        $id= $data['c_id'];
        
            $result = $this->main_model->update_table('course',$data,"t_id=$id");
            if($result){
                echo 1;
            }
            else{
                echo 0;
            }
   }
   public function module_update_data(){
        $data =  $this->request->getVar();  
        $id= $data['id']; 

        // print_r($data);

            $result = $this->main_model->update_table('course_module',$data,"id=$id");
            if($result){
                echo 1;
            }
            else{
                echo 0;
            }
   }
   public function course_module_form_update(){
        $data =  $this->request->getVar();  
        $id= $data['id'];  
        print_r($data);
            $result = $this->main_model->update_table('module',$data,"id=$id");
            if($result){
                echo 1;
            }
            else{
                echo 0;
            }
   }
   public function details_lession_update(){
        $data =  $this->request->getVar();  
        $id= $data['id'];   
            $result = $this->main_model->update_table('module_lession',$data,"id=$id");
            if($result){
                echo 1;
            }
            else{
                echo 0;
            }
   }
   public function course_update($uid){
        // echo $id;
    $data['updateData'] = $this->main_model->getAllRowsData("course", "`t_id`, `c_id`, `creater_id`, `t_heading`, `t_desc`, `t_list`, `t_requirement`, `image`, `price`, `created_at`", "t_id=$uid");
    return json_encode($data); 
   }
   public function heading_and_desc($uid){ 
    $data['topic'] = $this->main_model->getAllRowsData("course", "`t_id`, `c_id`, `creater_id`, `t_heading`, `t_desc`, `t_list`", "t_id=$uid");
    return json_encode($data); 
   }
   public function details_module_view($uid){ 
    $data['topic1'] = $this->main_model->getAllRowsData("module", "`id`,`t_id`, `name`", "id=$uid");
    return json_encode($data); 
   }
   public function details_lession_view($uid){ 
    $data['lession'] = $this->main_model->getAllRowsData("module_lession", "`id`,`name`, `description`,`video_url`", "id=$uid");
    return json_encode($data); 
   }
 
   public function student_save(){
        $data =  $this->request->getVar(); 
          $data['password']=md5($data['password']); 
            $result = $this->main_model->insert_table('tbl_users',$data);
            if($result){
                echo 1;
            }
            else{
                echo 0;
            }
   }
   public function course_module_save(){
        $data =  $this->request->getVar(); 
        // print_r($data);
        // exit;
            $result = $this->main_model->insert_table('course_module',$data);
            if($result){
                echo 1;
            }
            else{
                echo 0;
            }
   }
   public function lession_save(){
        $data =  $this->request->getVar(); 
        // print_r($data);
        // exit;
            $result = $this->main_model->insert_table('module_lession',$data);
            if($result){
                echo 1;
            }
            else{
                echo 0;
            }
   }
   public function details_add_module(){
        $data =  $this->request->getVar();  
        print_r($data);
            $result = $this->main_model->insert_table('module',$data);
            if($result){
                echo 1;
            }
            else{
                echo 0;
            }
   }
   public function details_add_lession_save(){
        $data =  $this->request->getVar();
        print_r($data);
        // exit; 
            $result = $this->main_model->insert_table('module_lession',$data);
            if($result){
                echo 1;
            }
            else{
                echo 0;
            }
   }
   public function category_details_save(){
    $data =  $this->request->getVar(); 
    $data['image'] = $_FILES['image']['name'];
    print_r($data);
    $folder ="./media/course/";  
    $fname = $_FILES['image']['name'];
    $file_path = $_FILES['image']['tmp_name'];
    
    $ext = strtolower(pathinfo($fname, PATHINFO_EXTENSION));

    $file_name = "IMG_".time()."_".rand(11,99).".".$ext;

    if(move_uploaded_file($file_path,$folder.$file_name)){
        // echo "file uploaded";

        image_handler('./media/course/'.$file_name, './media/course/thumb/'.$file_name, "200", "200", "85");

        $data['image']= $file_name ;
        $result = $this->main_model->insert_table('course',$data);
        if($result){
            echo 1;
        }
        else{
            echo 0;
        }
    }else{
        echo "file not uploaded";
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
        $data['category'] = $this->main_model->getAllRowsData("course", "*", "t_id > 0");
        return view('header')
        . view('sidemenu')  
        . view('view_assests/courselist',$data)
        . view('footer');
    }

// =================================course Details ==========================================
public function course_cat()
{    $data['category'] = $this->main_model->getAllRowsData("course_category", "c_id,c_name,c_desc,image", "status=1");
    
    return view('header')
    . view('sidemenu')
    . view('view_assests/course_category',$data)
    . view('footer');
}
public function category_delete($id){ 
    $data['status']=0;
    $data['delete'] = $this->main_model->update_table('course_category',$data,"c_id=$id");
    return redirect()->to( base_url('course_cat') );

}
public function course_delete($id){ 
    $data['course_status']=0;
    $data['delete'] = $this->main_model->update_table('course',$data,"t_id=$id");
    return redirect()->to( base_url('course_add') );
    
}
public function module_delete($id){ 
    $data['deleted_status']=0;
    $data['delete'] = $this->main_model->update_table('course_module',$data,"id=$id");
    return redirect()->to( base_url('course-subcategory') );

}
 
public function course_view($id) 
{  
    $data['topic'] = $this->main_model->getAllRowsData("course", "*", "t_id=$id");
    $data['module'] = $this->main_model->getAllRowsData("module", "*", "t_id=$id");
    $data['moduel_count'] = $this->main_model->getNumRow("module", "*", "t_id=$id");
    $data['lession_count'] = $this->main_model->getNumRow("module", "*", "t_id=$id");
    $data['stu_count'] = $this->main_model->getNumRow("student", "*", "id>0");
    return view('new_as/c_header')
    . view('sidemenu')
    . view('view_assests/course-view',$data)
    . view('new_as/c_footer');
}
public function course_cat_data()
{  
    $data['category'] = $this->main_model->getAllRowsData("course_category", "c_id,c_name,c_desc,image", "status=1");
     return json_encode($data); 
}
public function category_details_select($id)
{   
    $data['cat_details'] = $this->main_model->getAllRowsData("course_category", "c_id,c_name,c_desc,image", "c_id=$id and status=1");
     return json_encode($data); 
}
public function category_update($id)
{  
    // echo $id;
    $data['updateData'] = $this->main_model->getAllRowsData("course_category", "c_id,c_name,c_desc,image", "c_id=$id");
     return json_encode($data); 
}
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
// $data['image'] = $_FILES['image']['name'];
// print_r($data); 
// $folder ="./media/course/";  
// $fname = $_FILES['image']['name'];
// $file_path = $_FILES['image']['tmp_name'];

// $ext = strtolower(pathinfo($fname, PATHINFO_EXTENSION));

// $file_name = "IMG_".time()."_".rand(11,99).".".$ext;

// if(move_uploaded_file($file_path,$folder.$file_name)){
//     // echo "file uploaded";

//     image_handler('./media/course/'.$file_name, './media/course/thumb/'.$file_name, "200", "200", "85");

//     $data['image']= $file_name ;
//     $result = $this->main_model->insert_table('course_category',$data);
//     if($result){
//         echo 1;
//     }
//     else{
//         echo 0;
//     }
// }else{
//     echo "file not uploaded";
// }
 
}

 
public function course_add()
{   
    $data['creator'] = $this->main_model->getAllRowsData("tbl_users", "id,user_role_id,first_name,last_name,email", "user_role_id = 1 or user_role_id = 2");
    $data['category'] = $this->main_model->getAllRowsData("course_category", "c_id,c_name,c_desc,image", "c_id > 0");
    $data['topic'] = $this->main_model->getAllRowsData("course", "`t_id`, `c_id`, `creater_id`, `t_heading`, `t_desc`, `t_list`, `t_requirement`, `image`, `price`, `created_at`", "t_id > 0");
    
    return view('header')
    . view('sidemenu')
    . view('view_assests/course_list' , $data)
    . view('footer');
}
public function course_details($id)
{   
    $data['topic'] = $this->main_model->getAllRowsData("course", "*", "t_id=$id");
    $data['module'] = $this->main_model->getAllRowsData("module", "*", "t_id=$id");
    $data['moduel_count'] = $this->main_model->getNumRow("module", "*", "t_id=$id");
    $data['lession_count'] = $this->main_model->getNumRow("module", "*", "t_id=$id");
    $data['stu_count'] = $this->main_model->getNumRow("student", "*", "id>0");

    // print_r($data);
   return view('new_as/c_header')
   . view('sidemenu')
   . view('view_assests/course_details',$data)
   . view('new_as/c_footer');
}
public function course_list_load()
{   
    $data['creator'] = $this->main_model->getAllRowsData("tbl_users", "id,user_role_id,first_name,last_name,email", "user_role_id = 1 or user_role_id = 2");
    $data['category'] = $this->main_model->getAllRowsData("course_category", "c_id,c_name,c_desc,image", "c_id > 0");
    // $data['topic'] = $this->main_model->getAllRowsData("topic", "`t_id`, `c_id`, `creater_id`, `t_heading`, `t_desc`, `t_list`, `t_requirement`, `image`, `price`, `created_at`", "course_status=1");
    $data['topic_join'] = $this->main_model->user_topic_course_category_innerjoin();
    // $data['topic'] = $this->main_model->getAllRowsData("topic", "`t_id`, `c_id`, `creater_id`, `t_heading`, `t_desc`, `t_list`, `t_requirement`, `image`, `price`, `created_at`", "t_id > 0");
    return json_encode($data);
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
        $result = $this->main_model->insert_table('course',$data);
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



public function course_module()
{  
    $data['module'] = $this->main_model->getAllRowsData("course_module", "id,c_cat_id,name", "id > 0");
    $data['category'] = $this->main_model->getAllRowsData("course_category", "c_id,c_name,c_desc,image", "c_id > 0");
      
    return view('header')
    . view('sidemenu')
    . view('view_assests/course_module',$data)
    . view('footer');
}

public function course_category_lession($cv)
{   
    $data['module'] = $this->main_model->getAllRowsData("course_module", "id,c_cat_id,name", "c_cat_id=$cv");
      
    return json_encode($data);
    // return $data;
}
public function module_update_show($cv)
{  
    $data['module'] = $this->main_model->getAllRowsData("course_module", "id,c_cat_id,name", "id=$cv");
    return json_encode($data);
}
public function module_lession()
{  
    $data['lession'] = $this->main_model->getAllRowsData("module_lession", "id,c_cat_id,m_id,name,video_url,description", "id > 0");
    $data['category'] = $this->main_model->getAllRowsData("course_category", "c_id,c_name,c_desc,image", "c_id > 0");
    $data['module'] = $this->main_model->getAllRowsData("course_module", "id,c_cat_id,name", "id > 0");
    return view('header')
    . view('sidemenu')
    . view('view_assests/module_lession',$data)
    . view('footer');
}
// =================================Logout Details ==========================================
    public function logout(){
        $session = session();
        $session->destroy();
        // redirect('/');
        // echo  "logout ";
        return redirect()->to('/'); 
    }


    public function lession($id){   
    $data['lession'] = $this->main_model->getAllRowsData("module_lession", "`id`,`name`, `description`,`video_url`", "id=$id");
    return view('header')
    . view('sidemenu')
    . view('view_assests/lession',$data)
    . view('footer');
}

public function autoload_data()
{  
    $data['topic'] = $this->main_model->innerJoinTable(); 
    return json_encode($data);
}
public function course_module_load()
{  
    $data['module'] = $this->main_model->courseInnerJoinCourseModule(); 
    return json_encode($data);
}
// public function course_module_load()
// {  
//     $data['module'] = $this->main_model->getAllRowsData("course_module", "id,c_cat_id,name", "deleted_status=1");
//     $data['category'] = $this->main_model->getAllRowsData("course_category", "c_id,c_name,c_desc,image", "c_id > 0");
//     //   print_r($data);
//     return json_encode($data);
// }
function studentRegister(){ 
    return view('studentRegister');
}
// 'password'=>password_hash($this->request->getVar('password'),PASSWORD_DEFAULT),
public function studentRegisterSave(){
    $data =  $this->request->getVar();
    $data['password']=password_hash( $data['password'],PASSWORD_DEFAULT);
    // print_r($data);
    // exit; 
        $result = $this->main_model->insert_table('student',$data);
        if($result){
            echo 1;
            return redirect()->to('studentRegister'); 
        }
        else{
            echo 0;
        }
}


public function quiz_data_save(){
    $data =  $this->request->getVar();  
print_r($data);
        $result = $this->main_model->insert_table('quiz_question',$data);
        if($result){
            echo 1;
        }
        else{
            echo 0;
        }
}



public function module_quiz_start($uid){ 
    $session = session();
    $data['quiz_question'] = $this->main_model->getAllRowsData("quiz_question", "*", "m_id=$uid"); 
    $sid = $session->get('id');
    $data['quiz_attempt'] = $this->main_model->getNumRow("quiz_result", "*", "student_id=$sid and m_id=$uid"); 
    // echo"row no is ". $data['quiz_attempt'];
    $data1['m_id']=$uid;
    $data1['stu_id']=$sid;
    date_default_timezone_set("asia/kolkata"); 
    $data1['time']= date("H:i:s"); 
    $data1['endtime']= date("H:i:s",strtotime('+30 minutes')); 
    $getqdata = $this->main_model->getRowData("quiz_time", "*", "stu_id=$sid and  m_id  = $uid"); 
    if($getqdata){
        $data['quiztime'] = $getqdata;
    }
    else{
        $result = $this->main_model->insert_table('quiz_time',$data1);
    }
    
    // exit;
    $module_id =  $data['quiz_question'][0]['m_id'];
    if($data['quiz_attempt']>0){
        return redirect()->to("/module_quiz_result/$module_id"); 
       } 
    return view('header')
    . view('sidemenu')  
    . view('view_assests/module_quiz_start',$data)
    . view('new_as/quiz_footer');
   }

   public function quiz_answer_form_save(){
    $data =  $this->request->getVar();  
    $dt['quiz_question'] = $this->main_model->getAllRowsData("quiz_question", "m_id,question,correct_ans", "m_id>0");
   $t['st'] =$this->main_model->getNumRow("student", "*", "id>0");
    // print_r($data);
    $no =0;
    $correct_question=0; 
   
    if( $data['question1']== $dt['quiz_question'][0]['correct_ans']){
        $correct_question+=1;
        $no+=1;
    }else{
        $no-=0;
    }
    if( $data['question2']== $dt['quiz_question'][1]['correct_ans']){
        $correct_question+=1;
        $no+=1;
    }else{
        $no-=0;
    }
    if( $data['question3']== $dt['quiz_question'][2]['correct_ans']){
        $correct_question+=1;
        $no+=1;
    }else{
        $no-=0;
    }
    if( $data['question4']== $dt['quiz_question'][3]['correct_ans']){
        $correct_question+=1;
        $no+=1;
    }else{
        $no-=0;
    }
    if( $data['question5']== $dt['quiz_question'][4]['correct_ans']){
        $correct_question+=1;
        $no+=1;
    }else{
        $no-=0;
    }
    if( $data['question6']== $dt['quiz_question'][5]['correct_ans']){
        $correct_question+=1;
        $no+=1;
    }else{
        $no-=0;
    }
    if( $data['question7']== $dt['quiz_question'][6]['correct_ans']){
        $correct_question+=1;
        $no+=1;
    }else{
        $no-=0;
    }
    if( $data['question8']== $dt['quiz_question'][7]['correct_ans']){
        $correct_question+=1;
        $no+=1;
    }else{
        $no-=0;
    }
    if( $data['question9']== $dt['quiz_question'][8]['correct_ans']){
        $correct_question+=1;
        $no+=1;
    }else{
        $no-=0;
    }
    if( $data['question10']== $dt['quiz_question'][9]['correct_ans']){
        $correct_question+=1;
        $no+=1;
    }else{
        $no-=0;
    } 
    $data['marks']=$no;
    $data['correct_question']=$correct_question;
    $module_id =  $dt['quiz_question'][0]['m_id'];
        $result = $this->main_model->insert_table('quiz_result',$data);
        if($result){
            echo "/module_quiz_result/$module_id";
            // return redirect()->to("/module_quiz_result/$module_id"); 
        }
        else{
            echo 0;
        }
}


public function module_quiz_result($module_id){  
    $session = session();  
    
    $sid = $session->get('id');
    // $module_id = $session->get('module_id');
    // echo "module id is".$module_id;
    $data['result'] = $this->main_model->getAllRowsData("quiz_result", "*", "student_id=$sid and m_id=$module_id");
    // $data['result'] = $this->main_model->getAllRowsData("quiz_result", "*", "student_id=$sid ");
    // echo "<pre>";
    // print_r($data);
    return view('header')
    . view('sidemenu')
    . view('view_assests/module_quiz_result',$data)
    . view('footer');
}
// startquizFun_save

public function startquizFun_save($id){ 
    $session = session();  
    $sid = $session->get('id');
    $data['m_id']=$id;
    $data['stu_id']=$sid;
    date_default_timezone_set("asia/kolkata"); 
    $data['time']= date("h:i:s"); 
     $result = $this->main_model->insert_table('quiz_time',$data);
        return redirect()->to("/module-quiz-start/$id"); 
        if($result){
            echo 1;
        }
        else{
            echo 0;
        }
}



public function show_all_quises($id)
{   
    //  $data['id']=$id;
    echo $id;
     $data['quises'] = $this->main_model->getAllRowsData("quiz_question", "*", "m_id>0");
    return view('header')
    . view('sidemenu')
    . view('quiz_assets/show_all_quises',$data)
    . view('footer');
}
}