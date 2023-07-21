<?php



if( isset($_POST["name"]) &&
    isset($_POST["email"]) &&
    isset($_POST["subject"]) &&
    isset($_POST["message"]) ){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    require 'mail.php';

    $mail->setFrom($mySendAbleEmail, 'LORDSBOX');
    $mail->addAddress($myEmail);
    $mail->Subject = "LORDSBOX Message";
    $mail->Body    = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
        <title>Mail</title>
        <style>
            * {
                font-family: "Rubik", sans-serif;
    
            }
            .container{
                display: grid;
                margin: 40px;
                gap: 20px
            }
            .grid-container {
                display: grid;
                grid-template-columns: 1fr 3fr;
            }
            .grid-container .content{
                display: grid;
                align-content: center;
                margin: 20px;
                position: relative;
            }
            .grid-container .content::before{
                content: "";
                background-color: #585be6;
                width: 40px;
                height: 40px;
                position: absolute;
                left: -55px;
                top: 10px;
            }
            .grid-container .content .title{
                font-size: 20px;
                margin: 0px 0px 10px;
            }
            .grid-container .content .value{
                font-size: 22px;
                margin: 0px;
                color: #585be6;
            }
            .box{
                display: grid;
                justify-items: center;
                margin: 20px 0px;
            }
            .box .title{
                color: #585be6;
                font-size: 20px;
                font-weight: 600;
                margin: 10px;
            }
            .box .message{
                font-size: 16px;
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">
                <div class="grid-container">
                    <div class="content">
                        <h5 class="title">Name</h5>
                        <h5 class="value">'.$name.'</h5>
                    </div>
                  </div>
        
                  <div class="grid-container">
                    <div class="content">
                        <h5 class="title">Email</h5>
                        <h5 class="value">'.$email.'</h5>
                    </div>
                  </div>
    
            <div class="box">
                <div class="title">'.$subject.'</div>
                <div class="message">'.$message.'.</div>
            </div>
        </div>
    </body>
    </html>';
    
    $mail->send();


    
    $mail->setFrom($mySendAbleEmail, 'LORDSBOX');
    $mail->addAddress($email);
    $mail->Subject = "LORDSBOX Auto Reply";
    $mail->Body    = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        
        <style>
            .container{
                font-family: "Rubik", sans-serif;
                margin: 40px;
                text-align: center;
            }
            .my-p{
                font-size: 1rem;
                font-weight: 600;
                line-height: 2;
            }
            .my-p span{
                color: #585be6;
                font-weight: bold;
            }
            .website{
                margin: 60px;
            }
            .website a{
                text-decoration: none;
                background-color: #585be6;
                color: white;
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">

            <p class="my-p">
                Thank You <span>'.$name.'</span> For Contacting Us
            </p>  
            <p class="my-p">
                We Will Consider Your Message And Reply Soon
            </p>
            
            <div class="website">
                
                <a href="https://lordsbox.com/">
                    LORDSBOX
                </a>
            </div>
        </div>
       </body>
    </html>';
    
    $mail->send();

    echo "<script>
             window.location.href = '../contact.html';
    </script>";
}
?>
