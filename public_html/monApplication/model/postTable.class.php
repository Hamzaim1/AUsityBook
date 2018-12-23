<?php

class postTable
{
  public static function getPostById($id)
  {
	$connection = new dbconnection() ;
	$req = "select * from fredouil.post where id=".$id;
	$res = $connection->doQueryObject( $req,"post");
	return $res;
  }
}