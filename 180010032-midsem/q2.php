<?php
function customError($errno, $errstr)
      {
        echo "\nError: $errstr";
        echo "Please check\n\n";
        die();
      }

      set_error_handler("customError");
      $file = fopen("out.txt","w");
      fclose($file);
      $a = array();
      if($argc < 4)
      {
      	trigger_error("More files needed\n");
      }

      for($i =1;$i<$argc;$i++)
      {
        $file_name = $argv[$i];
        $str = "";
        array_push($a,$file_name);
        $index = $i;
        $ext = substr($file_name, -3);
        if($ext != "txt")
        {
        	trigger_error("File ".$index." is not a txt.\n");
        }
        $file = fopen($file_name,"r");
        for($j=0;$j<$index;$j++)
        {
        	$str = fgets($file);
        	if(!$str)
        	{
        		$str = "\n";
        	}
        }
        // echo $str;
	  	$out = fopen("out.txt","a");
	  	fwrite($out, $str);
     	fclose($out);
      }
      $out = fopen("out.txt","a");
	  fwrite($out, "180010032\n");
?>