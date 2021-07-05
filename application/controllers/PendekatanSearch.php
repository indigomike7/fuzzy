<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class PendekatanSearch extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('bagian_model');
        $this->load->model('penyakit_model');
        $this->load->model('diagnosa_model');
        $this->load->model('solusi_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
		$data=array();
		$keyword=array();
		if(isset($_POST))
		{
		$diagnosa1 = $this->security->xss_clean($this->input->post('diagnosa1'));
		$diagnosa2 = $this->security->xss_clean($this->input->post('diagnosa2'));
		$diagnosa3 = $this->security->xss_clean($this->input->post('diagnosa3'));
		$diagnosa4 = $this->security->xss_clean($this->input->post('diagnosa4'));
		$diagnosa5 = $this->security->xss_clean($this->input->post('diagnosa5'));
		$diagnosa6 = $this->security->xss_clean($this->input->post('diagnosa6'));
		$diagnosa7 = $this->security->xss_clean($this->input->post('diagnosa7'));
		$diagnosa8 = $this->security->xss_clean($this->input->post('diagnosa8'));
		$diagnosa9 = $this->security->xss_clean($this->input->post('diagnosa9'));
		$diagnosa10 = $this->security->xss_clean($this->input->post('diagnosa10'));
		if($diagnosa1!="0" && $diagnosa1!="" )
		{
			$keyword[]=$diagnosa1;
		}
		if($diagnosa2!="0" && $diagnosa2!="")
		{
			$keyword[]=$diagnosa2;
		}
		if($diagnosa3!="0" && $diagnosa3!="")
		{
			$keyword[]=$diagnosa3;
		}
		if($diagnosa4!="0" && $diagnosa4!="")
		{
			$keyword[]=$diagnosa4;
		}
		if($diagnosa5!="0" && $diagnosa5!="")
		{
			$keyword[]=$diagnosa5;
		}
		if($diagnosa6!="0" && $diagnosa6!="")
		{
			$keyword[]=$diagnosa6;
		}
		if($diagnosa7!="0" && $diagnosa7!="")
		{
			$keyword[]=$diagnosa7;
		}
		if($diagnosa8!="0" && $diagnosa8!="")
		{
			$keyword[]=$diagnosa8;
		}
		if($diagnosa9!="0" && $diagnosa9!="")
		{
			$keyword[]=$diagnosa9;
		}
		if($diagnosa10!="0" && $diagnosa10!="")
		{
			$keyword[]=$diagnosa10;
		}
		
		$data['results'] = $this->penyakit_model->penyakitSearch($diagnosa1,$diagnosa2,$diagnosa3,$diagnosa4,$diagnosa5,$diagnosa6,$diagnosa7,$diagnosa8,$diagnosa9,$diagnosa10);
		//echo "<pre>"; echo var_dump($data['results']); echo "</pre>";;
		
		}
		//echo(print_r($keyword));
		$data['diagnosa'] = $this->diagnosa_model->diagnosaListingAll();
		$data['keyword'] = $keyword;
		$this->loadViews("pendekatansearch", $this->global, $data, NULL);
    }
    
    /**
     * This function is used to load the user list
     */

}

?>