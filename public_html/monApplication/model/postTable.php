<?php

abstract class postTable
{	
	
	public static function getPostbyId($id){
		
		$connection = new dbconnection() ;
		$sql = "select * from fredouil.post where identifiant=".$id ;
		$res = $connection->doQuery( $sql );
		return $res;
		
		}
		
		

}
