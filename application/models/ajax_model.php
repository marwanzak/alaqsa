<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Eye View Design CMS module Ajax Model
 *
 * PHP version 5
 *
 * @category  CodeIgniter
 * @package   EVD CMS
 * @author    Frederico Carvalho
 * @copyright 2008 Mentes 100Limites
 * @version   0.1
*/

class Ajax_model extends CI_Model 
{
	/**
	* Instanciar o CI
	*/
	public function __construct()
    {
        parent::__construct();
	//$this->CI =& get_instance();
    }
	
	public function get_select_countries()
	{
		//Select table name
		$table_name = "country";
		
		//Build contents query
		$separator = (string) ',';
		//$this->db->select('concat(iso3, concat('. addcslashes($separator) .', iso3))')->from($table_name);
		
		$query = $this->db->query("select concat(iso3, concat(':', iso3)) as name from country where iso3 is not null");
		//Get contents
		return $query->result_array();
	}
	
	public function get_countries() 
	{
		//Select table name
		$table_name = "country";
		
		//Build contents query
		$this->db->select('id,iso,name,printable_name,iso3,numcode')->from($table_name);
		$this->flexigrid->build_query();
		
		//Get contents
		$return['records'] = $this->db->get();
		//echo $this->db->last_query();
		//Build count query
		$this->db->select('count(id) as record_count')->from($table_name);
		$this->flexigrid->build_query(FALSE);
		$record_count = $this->db->get();
		$row = $record_count->row();
		
		//Get Record Count
		$return['record_count'] = $row->record_count;
	
		//Return all
		return $return;
	}
	
	/**
	* Remove country
	* @param int country id
	* @return boolean
	*/
	public function delete_country($country_id) 
	{
		$delete_country = $this->db->query('DELETE FROM country WHERE id='.$country_id);
		
		return TRUE;
	}
}
?>