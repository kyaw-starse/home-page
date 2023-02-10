<?php

/**
 * Requires the "PHP Email Form" library
 * The "PHP Email Form" library is available only in the pro version of the template
 * The library should be uploaded to: vendor/php-email-form/php-email-form.php
 * For more info and help: https://bootstrapmade.com/php-email-form/
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $errors = [];
  $name = "";
  $email =$selectYear = $denwabangou =  $address = "";
 
  // 姓名（漢字）
  $name = $_POST['hr-name'];
 // メールアドレス
  $email = $_POST['hr-email'];
  // 生年月日
  $selectYear = $_POST['hr-selectYear'];
 
  // 電話番号
  $denwabangou = $_POST['hr-denwabangou'];
  // 住所
  $address = $_POST['hr-area'];
  // 希望月額
  
  if (empty($name)) {
    $errors[] = "Please enter your Fullname .";
  }
  if (empty($email)) {
    $errors[] = "Please enter your E-mail Address.";
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "Please enter your E-mail Address correctly.";
    }
  }
  if (empty($selectYear)) {
    $errors[] = "Please enter your Date of Birth.";
  }
  if (empty($denwabangou)) {
    $errors[] = "Please enter your Phone Number.";
  }else{
    if(!filter_var($denwabangou, FILTER_SANITIZE_NUMBER_INT)){
      $errors[] = "Please enter the number correctly.";
    }
  }
    //添付ファイル
  if ($_FILES['hr-skillsheet']['size'] == 0) {
    $errors[] = "Please upload your CV Form.";
  }

  if (!empty($errors)) {
    echo "<br>";
    foreach ($errors as $error) {
      echo $error;
      echo "<br>";
    }
    return false;
  }

  // if ($_POST['g-recaptcha-response'] != "") {
  //   $secret = '6LdJInAiAAAAAKmVb1MZe7PdMVv_6JjQeu-2JONX';
  //   $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
  //   $responseData = json_decode($verifyResponse);

  //   if ($responseData->success) {

      $recruit = 'htun.htun.win@star-se.co.jp';
      $custMail = $email;
      //$mailer = 'STAR-SE_info@star-se.co.jp';
      $mailer = 'htun.htun.win@star-se.co.jp';
      $thumb_name = $_SERVER['DOCUMENT_ROOT'].'/home-page/mm/assets/vendor/php-email-form/php-email-form.php';

      if (file_exists($thumb_name)) {
        include($thumb_name);
      } else {
        die('Unable to load the "PHP Email Form" Library!');
      }

      // ------------------- お客様への送信 --------------------

      $contact = new PHP_Email_Form;
      $contact->ajax = true;

      $contact->to = $custMail;
      $contact->from_name = "STAR SE MYANMAR";
      $contact->from_email = $mailer;
      $contact->subject = "[STAR SE MYANMAR Co., Ltd.] HR Position Application";

      $sama = "様";
      $custNm = $name ;
      $message = "
      Thank you for your inquiry.
      Thank you for contacting STAR SE MYANMAR Co., Ltd.
    
      The following is the content of your inquiry.
      *This e-mail is an automatic delivery e-mail that is sent when the customer's inquiry information reaches our server.
    ----------------------------------------------------------
  ";
      $message1 = $custNm . $message;

      $messagefoot = "
    ----------------------------------------------------------
    Thank you very much.


    ※※※※※※※※※※※※※※※※※※※※※※※※
    ★　PYAY ROAD, ROOM NO.11/A, 11TH FLOOR
    ★　RED HILL TOWER (OR) KBZ TOWRE,SANCHAUNG TOWNSHIP, YANGON REGION
    ★　STAR SE MYANMAR Co., Ltd.
    ★　TEL: +959956932955
    ★　Contact: recruit@star-se.co.jp
    ★　URL: www.star-se-myanmar.com
    
    ※Privacy Mark No. 22000213
    ※※※※※※※※※※※※※※※※※※※※※※※※
  ";

      $contact->smtp = array(
        'host' => 'smtp.alpha-prm.jp',
        //'username' => 'STAR-SE_info@star-se.co.jp',
        'username' => 'htun.htun.win@star-se.co.jp',
        //'password' => 'FYuiojk789*RED%',
        'password' => 't@n202301SE',
        'port' => '587'
      );

      $contact->add_message($message1, '');
      $contact->add_message($name, 'Fullname ');
      $contact->add_message($email, 'Mail Address');
      $contact->add_message($selectYear, 'Date Of Birth');
      $contact->add_message($denwabangou, 'Phone Number');
      $contact->add_message($address, 'Address');
      $contact->add_attachment('hr-skillsheet');
      $contact->add_message($messagefoot, '');

      $contact->send();

      // ------------------- Recruitへの送信 --------------------

      $contact2 = new PHP_Email_Form;
      $contact2->ajax = true;
      $contact2->to = $recruit;
      $contact2->from_name = $name;
      $contact2->from_email = $mailer;
      $contact2->subject = "HR Position Application" . "【" . $name . "】";

      $custNm2 = " My name is ".$name . ".";
      $message2 = "
    
      This time, I would like to apply for STAR SE MYANMAR Co., Ltd.

      The following is the content of the HR Position Application.
      *This email is ";
      $message3 = "an automatic email that has been sent the application by ". $name ." .
  ----------------------------------------------------------
";
      $message4 = $custNm2 . $message2 . $message3;

      $contact2->smtp = array(
        'host' => 'smtp.alpha-prm.jp',
        //'username' => 'STAR-SE_info@star-se.co.jp',
        'username' => 'htun.htun.win@star-se.co.jp',
        //'password' => 'FYuiojk789*RED%',
        'password' => 't@n202301SE',
        'port' => '587'
      );

      $contact2->add_message($message4, '');
      $contact2->add_message($name, 'Fullname');
      $contact2->add_message($email, 'Mail Address');
      $contact2->add_message($selectYear, 'Date Of Birth');
      $contact2->add_message($denwabangou, 'Phone Number');
      $contact2->add_message($address, 'Address');
      $contact2->add_attachment('skillsheet');
      $contact2->add_message($messagefoot, '');

      echo $contact2->send();
    }
//   } else {
//     echo "Get human approval.";
//   }
// }
