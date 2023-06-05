<?php
namespace App\Controllers;
use App\Models\AdminModel;
class User extends BaseController
{
public function __construct()
{
parent::__construct();
$this->load->database();
$this->load->helper('url');
}
public function login()
{
if($this->input->post('login'))
{
$email=$this->input->post('username');
$password=$this->input->post('password');
$que=$this->db->query("select * from tbl_users where email='$email' and password='$password'");
$row = $que->num_rows();
if(count($row)>0)
{
redirect('User/dashboard');
}
else
{
$data['error']="<h3 style='color:red'>Invalid userid or password !</h3>";
}
}
$this->load->view('login',@$data);
}
function dashboard()
{
$this->load->view('dashboard');
}
}
?>