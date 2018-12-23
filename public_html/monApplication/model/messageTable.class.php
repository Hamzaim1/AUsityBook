<?php
class messageTable
{
	public static function getMessages()
	//récuprer tous les messages
	{
		$connection = new dbconnection();
		$req2 = "select * from fredouil.message;";
		$res2 = $connection->doQuery( $req2 );
		return $res2;
	}
	public static function getMessagesByPage($debut,$fin,$id)
	//récuperer les messages envoyés à une personne par son id entre un début et une fin de page
	{
		$connection = new dbconnection();
		$req3 = "select * from filtreMessages('".$debut."','".$fin."','".$id."')";
		$res3 = $connection->doQuery( $req3 );
		return $res3;
	}
	public static function getAllMessagesByPage($debut, $fin)
	//récuperer tous les messages envoyés entre un début et fin de page
	{
		$connection = new dbconnection();
		$req3 = "select * from filtreTousMessages('".$debut."','".$fin."')";
		$res3 = $connection->doQuery( $req3 );
		return $res3;
	}   
	public static function getMessagesSentTo($id)
	//récuperer des messages envoyés à une personne par son id
    {
        $connection = new dbconnection() ;
        $req = "select * from fredouil.message where destinataire=".$id."order by id desc limit 10;";
        $res = $connection->doQueryObject($req,"message");
        return $res;
    }
	public static function getMessagesbyId($id)
	//récuperer des messages par son id
    {
        $connection = new dbconnection() ;
        $req = "select * from fredouil.message where id=".$id.";";
        $res = $connection->doQueryObject($req,"message");
        return $res;
    }
	public static function getNbMessagesSentTo($id)
	//récuperer un nombre précis des messages envoyés à une personne par son id
    {
        $connection = new dbconnection() ;
        $req = "select count(*) from fredouil.message where destinataire = ".$id;
        $res = $connection->doQuery($req);
        return $res;
    }
}



