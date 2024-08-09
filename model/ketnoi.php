<?php
class ketnoi
{
	function ketnoidl($conn)
    {
		$conn=mysqli_connect('localhost','ayayatoe','tP94l7nyXH(9#B','ayayatoe_toeic');
		mysqli_set_charset($conn ,'utf8');
		if($conn)
		{
			return mysqli_select_db($conn ,'ayayatoe');
		}
		else
		{
			return false;
		}
		
	}
    function ngatketnoi($conn)
    {
        mysqli_close($conn);
    }
}


?>