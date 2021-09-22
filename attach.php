<?php

        $title = array('Title', 'Mr.', 'Ms.', 'Mrs.');
         $selected_key = $_POST['title'];
         $selected_val = $title[$_POST['title']]; 
            
            $first_name = $_POST['first_name']; // required
            $last_name = $_POST['last_name']; // required
            $email_from = $_POST['email']; // required
            $telephone = $_POST['telephone']; // not required
            $comments = $_POST['comments']; // required
         
            if(($selected_key==0))
           echo "<script> alert('Please enter your title')</script>";
    echo $first_name;
    echo $last_name;
    echo $email_from;
      echo $telephone;
       echo $comments;
     
 
    function clean_string($string)
 {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
         
         $email_message .="Title: ".$selected_val."\n";
         $email_message .= "First Name: ".clean_string($first_name)."\n";
            $email_message .= "Last Name: ".clean_string($last_name)."\n";
            $email_message .= "Email: ".clean_string($email_from)."\n";
            $email_message .= "Telephone: ".clean_string($telephone)."\n";
            $email_message .= "Comments: ".clean_string($comments)."\n";
        echo "1st---------------";
         echo $email_message;
         
        $email_to = "er.shilpaguleria@gmail.com"; // The email you are sending to (example)
        //$email_from = "sendfrom@email.com"; // The email you are sending from (example)
        $email_subject = "hii"; // The Subject of the email
        //$email_txt = "text body of message"; // Message that the email has in it
        $destination=$_FILES["file"]["name"];
       $attachment = chunk_split(base64_encode(file_get_contents('attachment.zip')));
        move_uploaded_file($_FILES["file"]["name"], $destination);
        $fileatt = fopen($_FILES['file']['name'],'r'); // Path to the file (example)
        $fileatt_type = "application/vnd.openxmlformats-officedocument.wordprocessingml.document"; // File Type
        $fileatt_name = "Details.docx"; // Filename that will be used for the file as the attachment
        $file = fopen($fileatt,'r');
        $data = fread($file,filesize($fileatt));
        fclose($file);
        $semi_rand = md5(time());
        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
        $headers="From: $email_from"; // Who the email is from (example)
        $headers .= "\nMIME-Version: 1.0\n" .
        "Content-Type: multipart/mixed;\n" .
        " boundary=\"{$mime_boundary}\"";
        $email_message .= "This is a multi-part message in MIME format.\n\n" .

        "--{$mime_boundary}\n" .
        "Content-Type:text/html; charset=\"iso-8859-1\"\n" .
        "Content-Transfer-Encoding: 7bit\n\n" . $email_txt;
        $email_message .= "\n\n";
        $data = chunk_split(base64_encode($data));
        $email_message .= "--{$mime_boundary}\n" .
        "Content-Type: {$fileatt_type};\n" .
        " name=\"{$fileatt_name}\"\n" .
        "Content-Transfer-Encoding: base64\n\n" .
        $data . "\n\n" .
        "--{$mime_boundary}--\n";
         echo "2nd ---------------";
         echo  $email_message;
        mail($email_to,$email_subject,$email_message,$headers);
        ?>