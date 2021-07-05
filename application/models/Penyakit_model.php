<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Penyakit_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function penyakitListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.*,BaseTbl2.gejala,BaseTbl3.bagian');
        $this->db->from('penyakit as BaseTbl');
        $this->db->join('diagnosa as BaseTbl2', 'BaseTbl2.id = BaseTbl.diagnosa1','left');
        $this->db->join('bagian_tanaman as BaseTbl3', 'BaseTbl3.id = BaseTbl2.bagian_id','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.id  LIKE '%".$searchText."%'
                            OR  BaseTbl.penyakit  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
//        $this->db->where('BaseTbl.isDeleted', 0);
//        $this->db->where('BaseTbl.roleId !=', 1);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function penyakitListing($searchText = '', $segment, $page)
    {
        $this->db->select('BaseTbl.*,BaseTbl2.gejala,BaseTbl3.bagian');
        $this->db->from('penyakit as BaseTbl');
        $this->db->join('diagnosa as BaseTbl2', 'BaseTbl2.id = BaseTbl.diagnosa1','left');
        $this->db->join('bagian_tanaman as BaseTbl3', 'BaseTbl3.id = BaseTbl2.bagian_id','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.id  LIKE '%".$searchText."%'
                            OR  BaseTbl.penyakit  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
//        $this->db->where('BaseTbl.isDeleted', 0);
//        $this->db->where('BaseTbl.roleId !=', 1);
        $this->db->order_by('BaseTbl.id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    function penyakitListingAll($searchText = '')
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('penyakit as BaseTbl');
//        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.id  LIKE '%".$searchText."%'
                            OR  BaseTbl.penyakit  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
//        $this->db->where('BaseTbl.isDeleted', 0);
//        $this->db->where('BaseTbl.roleId !=', 1);
        $query = $this->db->get();
        
        return $query->result();
    }

    function penyakitSearch($diagnosa1=0,$diagnosa2=0,$diagnosa3=0,$diagnosa4=0,$diagnosa5=0,$diagnosa6=0,$diagnosa7=0,$diagnosa8=0,$diagnosa9=0,$diagnosa10=0)
    {
		$key=array();
		$statusExact = false;
		$reached = array();
		$data=array();
		$exact=array();
		$index=0;
		$sum=0;
		for($counter=1;$counter<11;$counter++)
		{
			$val="diagnosa".$counter;
			if($$val!="0" )
			{
				$key[$index]=$$val;
				$sum++;
				$index++;
			}
		}
		if($sum>2)
		{
			//EXACT SEARCH
			$statusExact = true;
		}
		for($i=0;$i<count($key);$i++)
		{
			for($j=1;$j<11;$j++)
			{
				$val2="diagnosa".$j;
				$this->db->select('BaseTbl.*, Tbl2.gejala,Tbl3.bagian, Tbl2.bagian_id as sum');
				$this->db->from('penyakit as BaseTbl');
				$this->db->join('diagnosa as Tbl2', 'BaseTbl.'.$val2.' = Tbl2.id','left');
				$this->db->join('bagian_tanaman as Tbl3', 'Tbl2.bagian_id= Tbl3.id','left');
				$this->db->where("Tbl2.id = '".$key[$i]."'");
				$query = $this->db->get();
				
				if($query->result())
				{
					$result=$query->result();
					for($k=0;$k<count($result);$k++)
					{
						$data[]=$result[$k];
					}

				}
			}
		}
		$results=array();
		for($i=0;$i<count($data);$i++)
		{

			if(count($results)>0)
			{
				$found =false;
				for($k=0;$k<count($results);$k++)
				{
					if($results[$k]->id == $data[$i]->id)
					{
						$found = true;
					}
				}
				if($found==false)
				{
					$results[]=$data[$i];
				}
				
			}
			else
			{
				$results[]=$data[$i];
				
			}
		}
		
		if(count($results)>0)
		{
			$found =false;
			
			for($k=0;$k<count($results);$k++)
			{
				$sum=0;
/*				for($i=0;$i<count($reached);$i++)
				{
					*/for($j=0;$j<count($data);$j++)
					{
						if($results[$k]->id == $data[$j]->id)
						{
							$sum++;
						}
					}/*
				}*/
				$results[$k]->sum=$sum;
			}
			
		}
		
		krsort($results);
		return $results;
    }

    function penyakitSearchFuzzyCBR($diagnosa1=0,$diagnosa2=0,$diagnosa3=0,$diagnosa4=0,$diagnosa5=0,$diagnosa6=0,$diagnosa7=0,$diagnosa8=0,$diagnosa9=0,$diagnosa10=0)
    {
		$key=array();
		$results2=array();
		$statusExact = false;
		$reached = array();
		$data=array();
		$exact=array();
		$index=0;
		$sum=0;
		for($counter=1;$counter<11;$counter++)
		{
			$val="diagnosa".$counter;
			if($$val!="0" )
			{
				$key[$index]=$$val;
				$sum++;
				$index++;
			}
		}
		if($sum>2)
		{
			//EXACT SEARCH
			$statusExact = true;
		}
		$this->db->select('Tblx.*');
		$this->db->from('cbr_table as BaseTbl');
		$this->db->join('penyakit as Tblx', 'BaseTbl.penyakit_id = Tblx.id ','left');
			for($j=1;$j<11;$j++)
			{
				$val2="diagnosa".$j;
				$this->db->join('diagnosa Tbl'.$j, 'BaseTbl.'.$val2.' =  Tbl'.$j.'.id ','left');
			}
			$j=1;
		for($i=0;$i<count($key);$i++)
		{
				$val2="diagnosa".$j;
				$this->db->where("BaseTbl.".$val2." = '".$key[$i]."'",'left');
				$j++;
		}
		
		$query = $this->db->get();
		if($query->result())
		{
			$result=$query->result();
			for($k=0;$k<count($result);$k++)
			{
				$results2[]=$result[$k];
			}

		}
		for($i=0;$i<count($key);$i++)
		{
			for($j=1;$j<11;$j++)
			{
				$val2="diagnosa".$j;
				$this->db->select('BaseTbl.*, Tbl2.gejala,Tbl3.bagian, Tbl2.bagian_id as sum');
				$this->db->from('penyakit as BaseTbl');
				$this->db->join('diagnosa as Tbl2', 'BaseTbl.'.$val2.' = Tbl2.id','left');
				$this->db->join('bagian_tanaman as Tbl3', 'Tbl2.bagian_id= Tbl3.id','left');
				$this->db->where("Tbl2.id = '".$key[$i]."'");
				$query = $this->db->get();
				
				if($query->result())
				{
					$result=$query->result();
					for($k=0;$k<count($result);$k++)
					{
						$data[]=$result[$k];
					}

				}
			}
		}
		$results=array();
		for($i=0;$i<count($data);$i++)
		{

			if(count($results)>0)
			{
				$found =false;
				for($k=0;$k<count($results);$k++)
				{
					if($results[$k]->id == $data[$i]->id)
					{
						$found = true;
					}
				}
				if($found==false)
				{
					$results[]=$data[$i];
				}
				
			}
			else
			{
				$results[]=$data[$i];
				
			}
		}
		
		if(count($results)>0)
		{
			$found =false;
			
			for($k=0;$k<count($results);$k++)
			{
				$sum=0;
/*				for($i=0;$i<count($reached);$i++)
				{
					*/for($j=0;$j<count($data);$j++)
					{
						if($results[$k]->id == $data[$j]->id)
						{
							$sum++;
						}
					}/*
				}*/
				$results[$k]->sum=$sum;
			}
			
		}
		krsort($results);
		$data['key']=$key;
		$data['results']=$results;
		$data['results2']=$results2;
		return $data;
    }

    /**
     * This function is used to get the user roles information
     * @return array $result : This is result of the query
     */
    
    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewPenyakit($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('penyakit', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function addExact($penyakit_id,$diagnosa1,$diagnosa2,$diagnosa3,$diagnosa4,$diagnosa5,$diagnosa6,$diagnosa7,$diagnosa8,$diagnosa9,$diagnosa10)
    {
        $this->db->trans_start();
		$userInfo=array(
			'penyakit_id'=>$penyakit_id
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
        $this->db->insert('cbr_table', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getUserInfo($userId)
    {
        $this->db->select('*');
        $this->db->from('penyakit');
        $this->db->where('id', $userId);
        $query = $this->db->get();
        
        return $query->row();
    }
    
    
    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editPenyakit($userInfo, $userId)
    {
        $this->db->where('id', $userId);
        $this->db->update('penyakit', $userInfo);
        
        return TRUE;
    }
    
    
    
    /**
     * This function is used to delete the user information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    function deletePenyakit($userId, $userInfo)
    {
        $this->db->where('id', $userId);
        $this->db->delete('penyakit');
        
        return $this->db->affected_rows();
    }

}

  