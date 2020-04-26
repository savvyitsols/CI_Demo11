<?php 

class NoDataFoundException extends Exception { }
class DatabaseException extends Exception { }
class NoImplException extends Exception { }

interface IDao {

	function exists($id);

	function upsert($baseDO);

	function get($id); 		// return row matching Id of this table/domain
	

	function getAll();		// return all rows of this table/domain
	

	function delete($id);		// delete row matching id of this table/domain

}

?>