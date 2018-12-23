<?php
class chatTable
{
	public static function getChat()
	{
		$connection = new dbconnection();
		$req4 = "select * from fredouil.chat";
		$res4 = $connection->doQueryObject($req4,"chat");
		return $res3;
	}
	public static function getLastChat()
	{
		$connection = new dbconnection();
		$req5= "select * from fredouil.chat order by id desc limit 1;";
		$res5 = $connection->doQueryObject($req5,"chat");
		return $res5;
	}
		public static function getLast10Chat()
	{
		$connection = new dbconnection();
		$req5= "select * from fredouil.chat order by id desc limit 10;";
		$res5 = $connection->doQueryObject($req5,"chat");
		return $res5;
	}
}
