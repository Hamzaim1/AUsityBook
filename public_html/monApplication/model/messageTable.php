<?php
class messageTable
{
	public static function getMessages()
	{
		$connection = new dbconnection();
		$req2 = "select * from fredouil.message;";
		$res2 = $connection->doQuery( $req2 );
		return $res2;
	}
	public static function getMessagesSendTo($id)
	{
		$connection = new dbconnection();
		$req2 = "select * from fredouil.message;";
		$res2 = $connection->doQueryObjectqq($req2,"message");
		return $res2;
	}
}
