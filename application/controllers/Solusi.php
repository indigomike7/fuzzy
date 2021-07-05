<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Solusi extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('solusi_model');
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
    function solusiListing($start=0)
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
            
            $count = $this->solusi_model->solusiListingCount($searchText);

			$returns = $this->paginationCompress ( "solusiListing/", $count, 10 );
            
            $data['userRecords'] = $this->solusi_model->solusiListing($searchText, $start, 10);
            
            $this->global['pageTitle'] = 'CodeInsect : User Listing';
            
            $this->loadViews("solusi", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function addSolusi()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('solusi_model');
            $this->load->model('penyakit_model');
			$data=array();
            $data['penyakit'] = $this->penyakit_model->penyakitListingAll();
            
            $this->global['pageTitle'] = 'CodeInsect : Add New User';

            $this->loadViews("addSolusi", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to check whether email already exist or not
     */
    /**
     * This function is used to add new user to the system
     */
    function addNewSolusi()
    {
                $this->load->model('solusi_model');
                $this->load->model('penyakit_model');
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('deskripsi','Deskripsi Solusi','trim|required');
            $this->form_validation->set_rules('penyakit_id','Penyakit','trim|required');
            if($this->form_validation->run() == FALSE)
            {
			$data=array();
            $data['penyakit'] = $this->penyakit_model->penyakitListingAll();
                $this->addSolusi();
            }
            else
            {
                $deskripsi = ucwords(strtolower($this->security->xss_clean($this->input->post('deskripsi'))));
                $penyakit_id = ucwords(strtolower($this->security->xss_clean($this->input->post('penyakit_id'))));
/*                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
                */
                $userInfo = array('deskripsi'=>$deskripsi,'penyakit_id'=>$penyakit_id);
                
                $result = $this->solusi_model->addNewSolusi($userInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Solusi created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Solusi creation failed');
                }
                
                redirect('addSolusi');
            }
        }
    }

    
    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editSolusi($userId = NULL)
    {
        if($this->isAdmin() == TRUE )
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('solusiListing');
            }
            /*
            $data['roles'] = $this->user_model->getUserRoles();
            $data['userInfo'] = $this->user_model->getUserInfo($userId);
            
            $this->global['pageTitle'] = 'CodeInsect : Edit User';
            */
			$data=array();
            $this->load->model('penyakit_model');
			$data['userInfo']=$this->solusi_model->getUserInfo($userId);
			//die($data['userInfo']);
            $data['penyakit'] = $this->penyakit_model->penyakitListingAll();
            $this->loadViews("editSolusi", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * This function is used to edit the user information
     */
    function updateSolusi()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $userId = $this->input->post('userId');
            
            $this->form_validation->set_rules('deskripsi','Deskripsi Solusi','trim|required');
            
            if($this->form_validation->run() == FALSE)
            {
				$data=array();
			$data['userInfo']=$this->solusi_model->getUserInfo($userId);
				$this->load->model('penyakit_model');
				$data['penyakit'] = $this->penyakit_model->penyakitListingAll();
                $this->editSolusi($userId);
            }
            else
            {
			$data['userInfo']=$this->solusi_model->getUserInfo($userId);
                $deskripsi = ucwords(strtolower($this->security->xss_clean($this->input->post('deskripsi'))));
                $penyakit_id = ucwords(strtolower($this->security->xss_clean($this->input->post('penyakit_id'))));
                
                $userInfo = array();
                
                    $userInfo = array('deskripsi'=>$deskripsi,'penyakit_id'=>$penyakit_id);
                
                $result = $this->solusi_model->editSolusi($userInfo, $userId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Solusi updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Solusi updation failed');
                }
                
                redirect('solusiListing');
            }
        }
    }


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteSolusi()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $userId = $this->input->post('userId');
            $userInfo = array();
            
            $result = $this->solusi_model->deleteSolusi($userId, $userInfo);
            
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