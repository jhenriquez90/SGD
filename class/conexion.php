<?php
date_default_timezone_set('America/Tegucigalpa');
class Conectar
	{
		public static function con()
			{
				$con = mysql_connect("localhost","root","");
				if(!$con)
					{
						echo "Error conexión";
						exit();
					}
				mysql_query("SET NAMES 'utf8'");
				mysql_select_db("sgd");
				return $con;
			}
	}
?>