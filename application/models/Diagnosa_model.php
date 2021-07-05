<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Diagnosa_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function diagnosaListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.*,BaseTbl2.bagian');
        $this->db->from('diagnosa as BaseTbl');
        $this->db->join('bagian_tanaman as BaseTbl2', 'BaseTbl2.id = BaseTbl.bagian_id','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.id  LIKE '%".$searchText."%'
                            OR  BaseTbl.bagian  LIKE '%".$searchText."%')";
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
    function diagnosaListing($searchText = '', $segment, $page)
    {
        $this->db->select('BaseTbl.*,BaseTbl2.bagian');
        $this->db->from('diagnosa as BaseTbl');
        $this->db->join('bagian_tanaman as BaseTbl2', 'BaseTbl2.id = BaseTbl.bagian_id','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.id  LIKE '%".$searchText."%'
                            OR  BaseTbl.bagian  LIKE '%".$searchText."%')";
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
    
    function diagnosaListingAll($searchText = '')
    {
        $this->db->select('BaseTbl.*, Tbl2.bagian');
        $this->db->from('diagnosa as BaseTbl');
        $this->db->join('bagian_tanaman as Tbl2', 'Tbl2.id = BaseTbl.bagian_id','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.id  LIKE '%".$searchText."%'
                            OR  BaseTbl.gejala  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
//        $this->db->where('BaseTbl.isDeleted', 0);
//        $this->db->where('BaseTbl.roleId !=', 1);
        $query = $this->db->get();
        
        return $query->result();
    }
    /**
     * This function is used to get the user roles information
     * @return array $result : This is result of the query
     */
    
    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewDiagnosa($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('diagnosa', $userInfo);
        
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
        $this->db->from('diagnosa');
        $this->db->where('id', $userId);
        $query = $this->db->get();
        
        return $query->row();
    }
    
    
    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editdiagnosa($userInfo, $userId)
    {
        $this->db->where('id', $userId);
        $this->db->update('diagnosa', $userInfo);
        
        return TRUE;
    }
    
    
    
    /**
     * This function is used to delete the user information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteDiagnosa($userId, $userInfo)
    {
        $this->db->where('id', $userId);
        $this->db->delete('diagnosa');
        
        return $this->db->affected_rows();
    }

}

  