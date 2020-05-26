<?php
if(isset($_POST['contactFrmSubmit']) && !empty($_POST['name']) && !empty($_POST['email']) && (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) && !empty($_POST['message'])){
    
    // Submitted form data
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $message= $_POST['message'];
    
    /*
     * Send email to admin
     */
    $to     = 'ferchucorinaldesi@gmail.com';
    $subject= 'Inscripcion a curso';
    
    $htmlContent = '
    La siguiente persona se ha inscripto
        
            Nombre:'.$name.'
       
            Email:'.$email.'
        
            Curso:'.$message.'
      ';
    
    // Set content-type header for sending HTML email
    $headers = "MIME-Version: 1.0" . "rn";
    $headers .= "Content-type:text/html;charset=UTF-8" . "rn";
    
    // Additional headers
    $headers .= 'From: CodexWorld<sender@example.com>' . "rn";
    
    // Send email
    if(mail($to,$subject,$htmlContent,$headers)){
        $status = 'ok';
    }else{
        $status = 'err';
    }
    
    // Output status
    echo $status;die;
}