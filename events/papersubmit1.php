<?php
    echo 'Processing...';    
   // Configuration - Your Options
      $allowed_filetypes = array('.doc','.docx','.txt','.pdf'); // These will be the types of file that will pass the validation.
      $max_filesize = 1124288; // Maximum filesize in BYTES (currently 0.5MB).
      $upload_path = 'abstracts/'; // The place the files will be uploaded to (currently a 'files' directory).
 
   $filename = $_FILES['userfile']['name']; // Get the name of the file (including file extension).
   $ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.
   $ran = rand();
   $filename = $ran.$filename;
 
   // Check if the filetype is allowed, if not DIE and inform the user.
   if(!in_array($ext,$allowed_filetypes))
      die('The file you attempted to upload is not allowed.');
 
   // Now check the filesize, if it is too large then DIE and inform the user.
   if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
      die('The file you attempted to upload is too large.');
 
   // Check if we can upload to the specified path, if not DIE and inform the user.
   if(!is_writable($upload_path))
      die('You cannot upload to the specified directory, please CHMOD it to 777.');
 
   // Upload the file to your specified path.
   if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filename))
         echo 'Uploaded'; // It worked.
      else
         echo 'There was an error during the file upload.  Please try again.'; // It failed :(.
 
    $name = $_REQUEST["name"];
	$phone = $_REQUEST["phone"];
	$email = $_REQUEST["email"];
	$college = $_REQUEST["college"];
	$connection = mysql_connect("newsql.ascend2k9.com","ascend2k9","passis250")
		or die ("Couldn't connect to DB");
	$db = mysql_select_db("ascend2k9",$connection)
		or die("Couldn't select DB");
	$query = "INSERT INTO ppt(name,phone,email,college,abstract) VALUES ('$name','$phone','$email','$college','$filename')";
	
	$result  = mysql_query($query)
		or die("Query failed:".mysql_error());
	mysql_close($connection);
	$redirect = "Location: ../thanks.html";
	echo header($redirect);
	



?>