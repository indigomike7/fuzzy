<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Diagnosa extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('diagnosa_model');
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
    function diagnosaListing()
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
            
            $count = $this->diagnosa_model->diagnosaListingCount($searchText);

			$returns = $this->paginationCompress ( "diagnosaListing/", $count, 10 );
            
            $data['userRecords'] = $this->diagnosa_model->diagnosaListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'CodeInsect : User Listing';
            
            $this->loadViews("diagnosa", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function addDiagnosa()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('diagnosa_model');
            $this->load->model('bagian_model');
			$data=array();
            $data['bagian'] = $this->bagian_model->bagianListingAll();
            
            $this->global['pageTitle'] = 'CodeInsect : Add New User';

            $this->loadViews("addDiagnosa", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to check whether email already exist or not
     */
    /**
     * This function is used to add new user to the system
     */
    function addNewDiagnosa()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('gejala','Diagnosa','trim|required|max_length[128]');
/*            $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('password','Password','required|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
            $this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
 */           
            if($this->form_validation->run() == FALSE)
            {
			$data=array();
            $data['bagian'] = $this->bagian_model->bagianListingAll();
                $this->addDiagnosa();
            }
            else
            {
                $gejala = ucwords(strtolower($this->security->xss_clean($this->input->post('gejala'))));
                $bagian_id = ucwords(strtolower($this->security->xss_clean($this->input->post('bagian_id'))));
/*                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
                */
                $userInfo = array('gejala'=>$gejala,'bagian_id'=>$bagian_id);
                
                $this->load->model('diagnosa_model');
                $result = $this->diagnosa_model->addNewDiagnosa($userInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Diagnosa created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Diagnosa creation failed');
                }
                
                redirect('addDiagnosa');
            }
        }
    }

    
    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editDiagnosa($userId = NULL)
    {
        if($this->isAdmin() == TRUE )
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('diagnosaListing');
            }
            /*
            $data['roles'] = $this->user_model->getUserRoles();
            $data['userInfo'] = $this->user_model->getUserInfo($userId);
            
            $this->global['pageTitle'] = 'CodeInsect : Edit User';
            */
			$data=array();
            $this->load->model('bagian_model');
			$data['userInfo']=$this->diagnosa_model->getUserInfo($userId);
			//die($data['userInfo']);
            $data['bagian'] = $this->bagian_model->bagianListingAll();
            $this->loadViews("editDiagnosa", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * This function is used to edit the user information
     */
    function updateDiagnosa()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $userId = $this->input->post('userId');
            
            $this->form_validation->set_rules('gejala','Diagnosa','trim|required|max_length[128]');
            
            if($this->form_validation->run() == FALSE)
            {
				$data=array();
			$data['userInfo']=$this->diagnosa_model->getUserInfo($userId);
				$this->load->model('bagian_model');
				$data['bagian'] = $this->bagian_model->bagianListingAll();
                $this->editDiagnosa($userId);
            }
            else
            {
			$data['userInfo']=$this->diagnosa_model->getUserInfo($userId);
                $gejala = ucwords(strtolower($this->security->xss_clean($this->input->post('gejala'))));
                $bagian_id = ucwords(strtolower($this->security->xss_clean($this->input->post('bagian_id'))));
                
                $userInfo = array();
                
                    $userInfo = array('gejala'=>$gejala,'bagian_id'=>$bagian_id);
                
                $result = $this->diagnosa_model->editDiagnosa($userInfo, $userId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Diagnosa updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Diagnosa updation failed');
                }
                
                redirect('diagnosaListing');
            }
        }
    }


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteDiagnosa()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $userId = $this->input->post('userId');
            $userInfo = array();
            
            $result = $this->diagnosa_model->deleteDiagnosa($userId, $userInfo);
            
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