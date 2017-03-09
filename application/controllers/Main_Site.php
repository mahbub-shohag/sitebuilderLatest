<?php
class Main_Site extends My_Admin_Controller {
    function __construct() {
parent::__construct();
$this->load->library('session');
$this->load->model('Main_Template_Model');
include_once ("Upload.php");
//$this->load->library('uri');
    }
function get_menus()
{
    return $this->Main_Template_Model->get_menu();
}
function dashboard()
{
   $data['menus'] = $this->get_menus();
   //print_r($data['menus']);exit();
   $this->render_main('main_template/index',$data); 
   
}
function login()
{
    //do login with the information posted
    if($_POST)
    {
       $login_info = $_POST;
       $login_info['password']=md5($login_info['password']); 
       //print_r($login_info);exit();
       $result = $this->Main_Template_Model->login($login_info);
       if(is_array($result))
       {
           $user_data = $result[0];
           $this->session->set_userdata($user_data);
           redirect('OAdmin_Panel/dashboard');
       }
       else
       {
           //$data['menus'] = $this->get_menus();
           if(isset($result))
           {
             $data['message'] = $result; 
           }
           //redirect('Main_Site/login',$data);
           $data['menus'] = $this->get_menus();
           $this->render_main('main_template/login',$data); 
       }
       //print_r($result);exit();
       //if($result)
    }
    //new login page
    else
    {
       $data['menus'] = $this->get_menus();
       $this->render_main('main_template/login',$data); 
    }
    
}

function logout()
{
    $user_data = array('user_name','email','password','profile_picture','id','user_level','name');
    $this->session->unset_userdata($user_data);
    redirect('Main_Site/login');
}
        function registration()
{
 if($_POST)
    {
           $images = array();
           $profile_picture = new Upload($_FILES['profile_picture']);
           $profile_picture = $this->upload_original($profile_picture);
           $user_info = $_POST;
           $hash_password = md5($_POST['password']);
           unset($_POST['password']);
           $user_info['password']=$hash_password;
           $user_info['profile_picture']=$profile_picture;
           if($this->Main_Template_Model->if_user_unique($user_info)>0)
              {
                  echo "User Name Or password is exists";
                  return;
              }
           
          
           $this->Main_Template_Model->insert_data('user',$user_info);
           redirect('Main_Site/login');
    }
 else
    {
       $data['menus'] = $this->get_menus();
       $this->render_main('main_template/registration',$data); 
    }
       
}

function upload_original($foo)
{   
$folder ="image/profile/";
       $images['profile_picture'] = $folder.$foo->file_src_name_body.".jpg";
if ($foo->uploaded) {
       
   // save uploaded image with no changes
   $foo->Process($folder);
   if ($foo->processed) {
     return $images['profile_picture'];
   } else {
     echo 'error : ' . $foo->error;
   }
}
}

function index()
{
    $data['menus'] = $this->get_menus();
    $this->render_main('main_template/index',$data);   
}
    
}
