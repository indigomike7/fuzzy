<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Penyakit extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('penyakit_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Dashboard';
        
        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the user list
     */
    function penyakitListing($start=0)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->penyakit_model->penyakitListingCount($searchText);

			$returns = $this->paginationCompress ( "penyakitListing/", $count, 10 );
            
            $data['userRecords'] = $this->penyakit_model->penyakitListing($searchText, $start, 10);
            
            $this->global['pageTitle'] = 'CodeInsect : User Listing';
            
            $this->loadViews("penyakit", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function addPenyakit()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('penyakit_model');
            $this->load->model('diagnosa_model');
			$data=array();
            $data['diagnosa'] = $this->diagnosa_model->diagnosaListingAll();
            
            $this->global['pageTitle'] = 'CodeInsect : Add New User';

            $this->loadViews("addPenyakit", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to check whether email already exist or not
     */
    /**
     * This function is used to add new user to the system
     */
    function addNewPenyakit()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('penyakit','Nama Penyakit','trim|required|max_length[128]');
            $this->form_validation->set_rules('deskripsi','Deskripsi Penyakit','trim|required|max_length[128]');
            $this->form_validation->set_rules('diagnosa1','Diagnosa Penyakit 1','trim|required|max_length[128]');
/*            $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('password','Password','required|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
            $this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
 */           
            $this->load->model('diagnosa_model');
            if($this->form_validation->run() == FALSE)
            {
			$data=array();
            $data['diagnosa'] = $this->diagnosa_model->diagnosaListingAll();
                $this->addPenyakit();
            }
            else
            {
                $penyakit = ucwords(strtolower($this->security->xss_clean($this->input->post('penyakit'))));
                $deskripsi = ucwords(strtolower($this->security->xss_clean($this->input->post('deskripsi'))));
                $diagnosa1 = ucwords(strtolower($this->security->xss_clean($this->input->post('diagnosa1'))));
                $diagnosa2 = ucwords(strtolower($this->security->xss_clean($this->input->post('diagnosa2'))));
                $diagnosa3 = ucwords(strtolower($this->security->xss_clean($this->input->post('diagnosa3'))));
                $diagnosa4 = ucwords(strtolower($this->security->xss_clean($this->input->post('diagnosa4'))));
                $diagnosa5 = ucwords(strtolower($this->security->xss_clean($this->input->post('diagnosa5'))));
                $diagnosa6 = ucwords(strtolower($this->security->xss_clean($this->input->post('diagnosa6'))));
                $diagnosa7 = ucwords(strtolower($this->security->xss_clean($this->input->post('diagnosa7'))));
                $diagnosa8 = ucwords(strtolower($this->security->xss_clean($this->input->post('diagnosa8'))));
                $diagnosa9 = ucwords(strtolower($this->security->xss_clean($this->input->post('diagnosa9'))));
                $diagnosa10 = ucwords(strtolower($this->security->xss_clean($this->input->post('diagnosa10'))));
/*                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
                */
                $userInfo = array('penyakit'=>$penyakit
				,'deskripsi'=>$deskripsi
				,'diagnosa1'=>$diagnosa1
				,'diagnosa2'=>$diagnosa2
				,'diagnosa3'=>$diagnosa3
				,'diagnosa4'=>$diagnosa4
				,'diagnosa5'=>$diagnosa5
				,'diagnosa6'=>$diagnosa6
				,'diagnosa7'=>$diagnosa7
				,'diagnosa8'=>$diagnosa8
				,'diagnosa9'=>$diagnosa9
				,'diagnosa10'=>$diagnosa10
				);
                
                $this->load->model('penyakit_model');
                $result = $this->penyakit_model->addNewPenyakit($userInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Penyakit created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Penyakit creation failed');
                }
                
                redirect('addPenyakit');
            }
        }
    }

    
    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editPenyakit($userId = NULL)
    {
        if($this->isAdmin() == TRUE )
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('penyakitListing');
            }
            /*
            $data['roles'] = $this->user_model->getUserRoles();
            $data['userInfo'] = $this->user_model->getUserInfo($userId);
            
            $this->global['pageTitle'] = 'CodeInsect : Edit User';
            */
			$data=array();
            $this->load->model('diagnosa_model');
			$data['userInfo']=$this->penyakit_model->getUserInfo($userId);
			//die($data['userInfo']);
            $data['diagnosa'] = $this->diagnosa_model->diagnosaListingAll();
            $this->loadViews("editPenyakit", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * This function is used to edit the user information
     */
    function updatePenyakit()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $userId = $this->input->post('userId');
            
            $this->form_validation->set_rules('penyakit','Nama Penyakit','trim|required|max_length[128]');
            $this->form_validation->set_rules('deskripsi','Deskripsi Penyakit','trim|required|max_length[128]');
            $this->form_validation->set_rules('diagnosa1','Diagnosa Penyakit 1','trim|required|max_length[128]');
            
            if($this->form_validation->run() == FALSE)
            {
				$data=array();
			$data['userInfo']=$this->penyakit_model->getUserInfo($userId);
				$this->load->model('diagnosa_model');
				$data['diagnosa'] = $this->diagnosa_model->diagnosaListingAll();
                $this->editPenyakit($userId);
            }
            else
            {
			$data['userInfo']=$this->penyakit_model->getUserInfo($userId);
                $penyakit = ucwords(strtolower($this->security->xss_clean($this->input->post('penyakit'))));
                $deskripsi = ucwords(strtolower($this->security->xss_clean($this->input->post('deskripsi'))));
                $diagnosa1 = ucwords(strtolower($this->security->xss_clean($this->input->post('diagnosa1'))));
                $diagnosa2 = ucwords(strtolower($this->security->xss_clean($this->input->post('diagnosa2'))));
                $diagnosa3 = ucwords(strtolower($this->security->xss_clean($this->input->post('diagnosa3'))));
                $diagnosa4 = ucwords(strtolower($this->security->xss_clean($this->input->post('diagnosa4'))));
                $diagnosa5 = ucwords(strtolower($this->security->xss_clean($this->input->post('diagnosa5'))));
                $diagnosa6 = ucwords(strtolower($this->security->xss_clean($this->input->post('diagnosa6'))));
                $diagnosa7 = ucwords(strtolower($this->security->xss_clean($this->input->post('diagnosa7'))));
                $diagnosa8 = ucwords(strtolower($this->security->xss_clean($this->input->post('diagnosa8'))));
                $diagnosa9 = ucwords(strtolower($this->security->xss_clean($this->input->post('diagnosa9'))));
                $diagnosa10 = ucwords(strtolower($this->security->xss_clean($this->input->post('diagnosa10'))));
                
                $userInfo = array();
                
                    $userInfo = array('penyakit'=>$penyakit
				,'deskripsi'=>$deskripsi
				,'diagnosa1'=>$diagnosa1
				,'diagnosa2'=>$diagnosa2
				,'diagnosa3'=>$diagnosa3
				,'diagnosa4'=>$diagnosa4
				,'diagnosa5'=>$diagnosa5
				,'diagnosa6'=>$diagnosa6
				,'diagnosa7'=>$diagnosa7
				,'diagnosa8'=>$diagnosa8
				,'diagnosa9'=>$diagnosa9
				,'diagnosa10'=>$diagnosa10
				);

                
                $result = $this->penyakit_model->editPenyakit($userInfo, $userId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Penyakit updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Penyakit updation failed');
                }
                
                redirect('penyakitListing');
            }
        }
    }


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deletePenyakit()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $userId = $this->input->post('userId');
            $userInfo = array();
            
            $result = $this->penyakit_model->deletePenyakit($userId, $userInfo);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
    
    /**
     * Page not found : error 404
     */
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'CodeInsect : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }

}

?>