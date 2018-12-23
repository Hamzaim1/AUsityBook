<?php

class utilisateurTable
{
  public static function getUserByLoginAndPass($login,$pass)
  {
	$connection = new dbconnection();

    $sql = "select * from fredouil.utilisateur where identifiant='".$login."' and pass='".sha1($pass)."'" ;
    $res = $connection->doQuery( $sql );
    
    if($res === false)
    return false ;

    return $res;
  }
  public static function getUserById($id)
  {
	  $connection = new dbconnection();
	$req = "select * from fredouil.utilisateur where id=".$id;
	$res2 = $connection->doQueryObject($req,"utilisateur"); 
	return $res2;
  }

  public static function getUsers()
  {
	$connection = new dbconnection();
	$req = "select * from fredouil.utilisateur";
	$res = $connection->doQueryObject($req,"utilisateur");
	return $res;
	}
	
	
	  public static function getUsersCount($cnt)
  {
    if (!is_numeric($cnt) || $cnt<=0) {
      return false;
    }
    $connection = new dbconnection() ;
    $sql = "select * from fredouil.utilisateur LIMIT ".$cnt."" ;
    $res = $connection->doQuery( $sql );
    return $res;
  
  }
}
