<?php
include("globals.inc.php");

class mainlib
{
	var $ocn;
	
	function createrandomvalue($min=null,$max=null) {
		static $seeded;
	
		if (!isset($seeded)) {
			mt_srand((double)microtime()*1000000);
			$seeded = true;
		}
		if (isset($min) && isset($max)) {
			if ($min >= $max) {
				return $min;
			} else {
				return mt_rand($min, $max);
			}
		} else {
			return mt_rand();
		}
	}
	
	function getrandomstring($length,$type='mixed') {
		if ( ($type != 'mixed') && ($type != 'chars') && ($type != 'digits')) return false;
	
		$rand_value = '';
		while (strlen($rand_value) < $length) {
			if($type == 'digits')
			{
				$char = $this->createrandomvalue(0,9);
			}else{
				$char = chr($this->createrandomvalue(0,255));
			}
	
			if($type == 'mixed')
			{
				if(eregi('^[a-z0-9]$', $char)) $rand_value .= $char;
			}elseif($type == 'chars'){
				if(eregi('^[a-z]$', $char)) $rand_value .= $char;
			}elseif($type == 'digits'){
				if(ereg('^[0-9]$', $char)) $rand_value .= $char;
			}
		}
		return $rand_value;
	}

	function dbconnect($server,$username,$password,$database) 
	{
		$retval = mysql_connect($server,$username,$password,true);
		if($retval)
		{
			mysql_select_db($database,$retval);
		}else{
			die('Could not connect: ' . mysql_error());
		}
		return $retval;
	}

	function opendb()
	{
		$this->ocn = $this->dbconnect(MYSQL_SERVER,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DB) or die("Cannot connect to main database");
	}

	function closedb()
	{
		mysql_close($this->ocn);
	}
	
	function dbquery($query,$cn) {
		$result = mysql_query($query, $cn) or die("Invalid query: " . mysql_error());
		return $result;
	}
	
	function dbfetcharray($dbquery) {
		return mysql_fetch_array($dbquery, MYSQL_ASSOC);
	}
	
	function countrows($sql,$cn)
	{
		$retval = 0;
		$rs = $this->dbquery($sql,$cn);
		$retval = mysql_num_rows($rs);
		mysql_free_result($rs);
		return $retval;
	}

	function keyvalue($CRYPT_KEY){
		$keyvalue = "";
		$keyvalue[1] = "0";
		$keyvalue[2] = "0";
		for ($i=1; $i<strlen($CRYPT_KEY); $i++) {
			$curchr = ord(substr($CRYPT_KEY, $i, 1));
			$keyvalue[1] = $keyvalue[1] + $curchr;
			$keyvalue[2] = strlen($CRYPT_KEY);
		}
		return $keyvalue;
	}

	function encrypt($txt,$CRYPT_KEY){
		if (!$txt && $txt != "0"){
			return false;
			exit;
		}
		
		if (!$CRYPT_KEY){
			return false;
			exit;
		}
		
		$kv = $this->keyvalue($CRYPT_KEY);
		$estr = "";
		$enc = "";
	
		for ($i=0; $i<strlen($txt); $i++) {
			$e = ord(substr($txt, $i, 1));
			$e = $e + $kv[1];
			$e = $e * $kv[2];
			(double)microtime()*1000000;
			$rstr = chr(rand(65, 90));
			$estr .= "$rstr$e";
		}
	
		return $estr;
	}
	
	function decrypt($txt, $CRYPT_KEY){
		if (!$txt && $txt != "0"){
			return false;
			exit;
		}
		
		if (!$CRYPT_KEY){
			return false;
			exit;
		}
		
		$kv = $this->keyvalue($CRYPT_KEY);
		$estr = "";
		$tmp = "";
	
		for ($i=0; $i<strlen($txt); $i++) {
			if ( ord(substr($txt, $i, 1)) > 64 && ord(substr($txt, $i, 1)) < 91 ) {
				if ($tmp != "") {
					$tmp = $tmp / $kv[2];
					$tmp = $tmp - $kv[1];
					$estr .= chr($tmp);
					$tmp = "";
				}
			} else {
				$tmp .= substr($txt, $i, 1);
			}
		}
	
					$tmp = $tmp / $kv[2];
					$tmp = $tmp - $kv[1];
		$estr .= chr($tmp);
	
		return $estr;
	}
	
	function getfilename($path)
	{
		$retval = $path;
		$i = strrpos($path,"/");
		if($i!==false)
		{
			$retval = substr($path,$i+1);
		}
		return $retval;
	}

	function removedir($path)
	{
		$handle = opendir($path);
		while (false!==($item = readdir($handle)))
		{
			if($item != '.' && $item != '..')
			{
				if(is_dir($path.'/'.$item)) 
				{
					$this->remove_dir($path.'/'.$item);
				}else{
					unlink($path.'/'.$item);
				}
			}
		}
		closedir($handle);
		if(rmdir($path))
		{
			$success = true;
		}
		return $success;
	}
	
	function removefile($filepath)
	{
		if(file_exists($filepath))
		{
			unlink($filepath);
		}
	}

	function rowexists($sql,$ocn)
	{
		return $this->dbfetcharray($this->dbquery($sql,$ocn));
	}
	
	function changedateformat($dateval,$curformat,$newformat)
	{
		$retval = '';
		$curformat = strtolower($curformat);
		$newformat = strtolower($newformat);

		$ar_delimiters = array('-','/');
		$delimiter = '';
		for($i=0;$i<count($ar_delimiters);$i++)
		{
			if(strpos($newformat,$ar_delimiters[$i]))
			{
				$delimiter = $ar_delimiters[$i];
				break;
			}
		}

		if($delimiter!='')
		{
			$dateparts = split('[/.-]',$dateval);
			
			$dpos = strpos($curformat,'d');
			$mpos = strpos($curformat,'m');
			if(!$mpos) $mpos = strpos($curformat,'n');
			$ypos = strpos($curformat,'y');
	
			if($dpos<$mpos && $mpos<$ypos)
			{
				$d = $dateparts[0];
				$m = $dateparts[1];
				$y = $dateparts[2];
			}else{
				if($mpos<$dpos && $dpos<$ypos)
				{
					$m = $dateparts[0];
					$d = $dateparts[1];
					$y = $dateparts[2];
				}else{
					if($ypos<$mpos && $mpos<$dpos)
					{
						$y = $dateparts[0];
						$m = $dateparts[1];
						$d = $dateparts[2];
					}
				}
			}
	
			if(strlen($y)<4)
			{
				if($y<51)
				{
					$y = '20'.$y;
				}else{
					$y = '19'.$y;
				}
			}
	
			$dpos = strpos($newformat,'d');
			$mpos = strpos($newformat,'m');
			if(!$mpos) $mpos = strpos($newformat,'n');
			$ypos = strpos($newformat,'y');
			
			if($dpos<$mpos && $mpos<$ypos)
			{
				$retval = $d.$delimiter.$m.$delimiter.$y;
			}else{
				if($mpos<$dpos && $dpos<$ypos)
				{
					$retval = $m.$delimiter.$d.$delimiter.$y;
				}else{
					if($ypos<$mpos && $mpos<$dpos)
					{
						$retval = $y.$delimiter.$m.$delimiter.$d;
					}
				}
			}
		}

		return $retval;
	}
	
	function getpost($request_name)
	{
		$retval = '';
		if(isset($_POST[$request_name]))
		{
			if(trim($_POST[$request_name])!='')
			{
				$retval = $_POST[$request_name];
			}
		}
		return $retval;
	}

	function getreq($request_name)
	{
		$retval = '';
		if(isset($_REQUEST[$request_name]))
		{
			if(trim($_REQUEST[$request_name])!='')
			{
				$retval = $_REQUEST[$request_name];
			}
		}
		return $retval;
	}

	function getsession($session_name)
	{
		$retval = '';
		if(isset($_SESSION[$session_name]))
		{
			if(trim($_SESSION[$session_name])!='')
			{
				$retval = $_SESSION[$session_name];
			}
		}
		return $retval;
	}
	
	function redirect($url)
	{
		header("Location: ".$url);
		exit;
	}
	
	function getfileextension($filename)
	{
		$retval = "";
		$found = false;
		for($i=strlen($filename)-1;$i>=0;$i--)
		{
			if(substr($filename,$i,1)==".")
			{
				$found = true;
				break;
			}
		}
		if($found)
		{
			$retval = substr($filename,$i+1);
		}
		return $retval;
	}
	
	function erase_non_alphanumeric_chars($value)
	{
		return ereg_replace("[^a-z,A-Z,0-9,_,-,.,;, ]","",$value);
	}
	
	function http_post($host,$path,$data_to_send)
	{ 
		$retval = "";
		$fp = fsockopen($host,80);
		fputs($fp, "POST $path HTTP/1.1\r\n");
		fputs($fp, "Host: $host\r\n");
		fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n");
		fputs($fp, "Content-length: ".strlen($data_to_send)."\r\n");
		fputs($fp, "Connection: close\r\n\r\n");
		fputs($fp, $data_to_send);
		while(!feof($fp))
		{ 
			$retval .= fgets($fp, 128);
		}
		fclose($fp);
		return $retval;
	}
	
	function http_open($host,$path)
	{
		$retval = "";
	
		$fp = fsockopen($host,80);
		fputs($fp, "GET $path HTTP/1.1\r\n");
		fputs($fp, "Host: $host\r\n");
		fputs($fp, "Connection: close\r\n\r\n");
		while(!feof($fp))
		{ 
			$retval .= fgets($fp, 128);
		}
		fclose($fp);
		return $retval;
	}
	
	function get_first_words($text,$num_words)
	{
		$ar_text = split(' ',$text);
		$n = 0;
		$retval = "";
		for($i=0;$i<count($ar_text);$i++)
		{
			if(trim($ar_text[$i])!="")
			{
				if($retval=="")
				{
					$retval .= $ar_text[$i];
					$n++;
				}else{
					$retval .= " ".$ar_text[$i];
					$n++;
				}
				if($n>=$num_words)
				{
					break;
				}
			}
		}
		return $retval;
	}
}

//Outside mainlib class function library
//**************************************
function sessions()
{
	session_start();
	/*
	session_register("userid");
	session_register("companyid");
	session_register("listpageno");
	session_register("listorder");
	session_register("listfiltercol");
	session_register("listfiltertext");
	session_register("listpageno2");
	session_register("listorder2");
	session_register("listfiltercol2");
	session_register("listfiltertext2");
	*/
}

function sessionchk()
{
	if(isset($_SESSION["userid"]))
	{
		if(trim($_SESSION["userid"])=="")
		{
			print "<script language=JavaScript>";
			print "top.window.location='".ROOT_URL."index.php';";
			print "</script>";
			exit();
		}
	}else{
		print "<script language=JavaScript>";
		print "top.window.location='".ROOT_URL."index.php';";
		print "</script>";
		exit();
	}
}

function rewrite_url($url)
{
	$retval = $url;
	if(REWRITE_URL=="1")
	{
		$retval = str_replace(".php","",$retval);
		$retval = str_replace("?","-",$retval);
		$retval = str_replace("&","-",$retval);
		$retval = str_replace("=","-",$retval);
		$retval = $retval.".html";
	}
	return $retval;
}

error_reporting(2047 ^ 8); //E_ALL ^ E_NOTICE
?>