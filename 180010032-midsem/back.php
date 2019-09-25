<html>
<head>
	<title>Frequency Counter</title>
</head>
<body>
	<?php
		$uploadOk = 1;
		

		function customerror($errno, $errstr)
		{
			echo "\nError: ".$errstr."\n";
			echo "<script type=\"text/javascript\">
		setTimeout(function ()
		{
   			window.location.href= 'q2.php';
		},3000);
	</script>";
			die();
		}

		set_error_handler("customerror");
		 if ($uploadOk == 0)
		 {
		    trigger_error("Sorry, your file was not uploaded.\n");
		 }
		 else
		 {
		 	$total = count($_FILES['upload']['name']);

			// Loop through each file
			for( $i=0 ; $i < $total ; $i++ )
			{

			  //Get the temp file path
			  $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
			  if ($_FILES["upload"]["size"][$i] > 200)
		 		{
		    		trigger_error("Sorry, your file is too large.\n");
		    		$uploadOk = 0;
		 		}
			  //Make sure we have a file path
			  if ($tmpFilePath != ""){
			    //Setup our new file path
			    $newFilePath = "./uploads/" . $_FILES['upload']['name'][$i];

			    //Upload the file into the temp dir
		    if (move_uploaded_file($tmpFilePath, $newFilePath))
			    {
			      $ext = pathinfo($newFilePath, PATHINFO_EXTENSION);
			      $arr = array();
			      if($ext != 'txt')
			      {
			  		 trigger_error("Oops, wrong file extension\n");
			      }
			  //     if (file_exists($target_file))
				 // {
				 //    unlink($target_file);
				 // }
			     $file = file($newFilePath);
				$file = array_reverse($file);
				foreach($file as $f){
				    echo $f."<br />";
}
			      
				}
			else
		    {
		        trigger_error("Sorry, there was an error uploading your file.\n");
		    }
		}
	}
			
		 }
?>
</body>
</html>
