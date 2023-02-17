<?php

/**
 * Requires the "PHP Email Form" library
 * The "PHP Email Form" library is available only in the pro version of the template
 * The library should be uploaded to: vendor/php-email-form/php-email-form.php
 * For more info and help: https://bootstrapmade.com/php-email-form/
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $errors = [];
  $name = $name2 = "";
  $schoolname = $department1 = $department2 = $chkagree = "";
  $selectYear = $denwabangou = $address = $salary = $area = "";
  if (empty($_POST['chkagree'])) {
    $chkagree = "";
  } else {
    $chkagree = $_POST['chkagree'];
  }
  // 姓名（漢字）
  $name = $_POST['lastName1'] . ' ' . $_POST['firstName1'];
  // 姓名（カタカナ）
  $name2 = $_POST['lastName2'] . ' ' . $_POST['firstName2'];
  // 生年月日
  $selectYear = $_POST['selectYear'];
  // メールアドレス
  $email = $_POST['email'];
  // 電話番号
  $denwabangou = $_POST['denwabangou'];
  // 住所
  $address = $_POST['address'];
  // 大学名
  $schoolname = $_POST['schoolname'];
  // 大学名
  $department1 = $_POST['department1'];
  // 大学名
  $department2 = $_POST['department2'];
  // 備考
  $area = $_POST['area'];
  // 個人情報の取扱い
  if (isset($_POST['chkagree'])) {
    $chkagree = "Agreed";
  }

  if (empty($_POST['lastName1']) && empty($_POST['firstName1'])) {
    $errors[] = "Please enter your first and last name (Kanji).";
  }
  if (empty($_POST['lastName2']) && empty($_POST['firstName2'])) {
    $errors[] = "Please enter your first and last name (katakana).";
  }
  if (empty($email)) {
    $errors[] = "Please enter your e-mail address.";
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "Please enter your e-mail address correctly.";
    }
  }
  if (empty($denwabangou)) {
    $errors[] = "Please enter your phone number.";
  }else{
    if(!filter_var($denwabangou, FILTER_SANITIZE_NUMBER_INT)){
      $errors[] = "Please enter your Phone Number correctly.";
    }
  }
    
  if (empty($address)) {
    $errors[] = "Please enter your address.";
  }
    //添付ファイル
  if ($_FILES['skillsheet']['size'] == 0) {
    $errors[] = "Please upload your skill sheet.";
  }
  if (empty($area)) {
    $errors[] = "Please enter your remarks.";
  }
  if (empty($chkagree)) {
    $errors[] = "Please agree to the handling of personal information.";
  }

  if (!empty($errors)) {
    echo "<br>";
    foreach ($errors as $error) {
      echo $error;
      echo "<br>";
    }
    return false;
  }

  if ($_POST['g-recaptcha-response'] != "") {
    $secret = '6LdJInAiAAAAAKmVb1MZe7PdMVv_6JjQeu-2JONX';
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);

    if ($responseData->success) {

    
      // $recruit = 'recruit@star-se.co.jp';
      $recruit = 'htun.htun.win@star-se.co.jp';
      $custMail = $_POST['email'];
      $mailer = 'htun.htun.win@star-se.co.jp';
      // $mailer = 'STAR-SE_info@star-se.co.jp';
      
      $thumb_name = $_SERVER['DOCUMENT_ROOT'].'/home-page/assets/vendor/php-email-form/php-email-form.php';
      if (file_exists($thumb_name)) {
        // if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
        include($thumb_name);
      } else {
        die('Unable to load the "PHP Email Form" Library!');
      }

      // ------------------- お客様への送信 --------------------

      $contact = new PHP_Email_Form;
      $contact->ajax = true;

      $contact->to = $custMail;
      $contact->from_name = "STAR SE";
      $contact->from_email = $mailer;
      $contact->subject = "[STAR SE Co., Ltd.] New graduate recruitment application";

      $sama = "様";
      $custNm = $name;
      $message = "
      Thank you for your inquiry.
      Thank you for contacting STAR SE Co., Ltd.
     
      The following is the content of your inquiry.
      *This e-mail is an automatic delivery e-mail that is sent when the customer's inquiry information reaches our server.
    ----------------------------------------------------------
  ";
      $message1 = $custNm . $message;

      $messagefoot = "
    ----------------------------------------------------------
    Thank you very much.


    ※※※※※※※※※※※※※※※※※※※※※※※※
    ★　〒104-0043
    ★　5th floor, TOMAC Building, 2-4-1 Minato, Chuo-ku, Tokyo
    ★　STAR SE Co., Ltd.
    ★　TEL 03-5207-2955
    ★　FAX 03-5207-2956
    ★　Contact: kanri@star-se.co.jp
    ★　URL www.star-se.co.jp
    
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
      $contact->add_message($name, 'Fullname (Kanji)');
      $contact->add_message($name2, 'Fullname（Katakana）');
      $contact->add_message($selectYear, 'Date Of Birth');
      $contact->add_message($email, 'Mail Address');
      $contact->add_message($denwabangou, 'Phone Number');
      $contact->add_message($address, 'Address');
      $contact->add_message($schoolname, 'University name');
      $contact->add_message($department1, 'Faculty Department');
      $contact->add_message($department2, 'Department of Informatics');
      $contact->add_message($area, 'Remarks');
      $contact->add_message($chkagree, 'Privacy Policy');
      $contact->add_attachment('skillsheet');
      $contact->add_message($messagefoot, '');
      $contact->send();

      // ------------------- Recruitへの送信 --------------------

      $contact2 = new PHP_Email_Form;
      $contact2->ajax = true;
      $contact2->to = $recruit;
      $contact2->from_name = $name;
      $contact2->from_email = $mailer;
      $contact2->subject = "New graduate recruitment application" . "【" . $name . "】";

      $custNm2 = "My name is " . $name .".";
      $message2 = "
    
      This time, I would like to apply to STAR SE Co., Ltd.

      The following is the content of the new graduate recruitment application.
      *This email is ";
      $message3 =  " an automatic email that has been sent the application by ". $name ." .
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
      $contact2->add_message($name, 'Fullname (Kanji)');
      $contact2->add_message($name2, 'Fullname（Katakana）');
      $contact2->add_message($selectYear, 'Date Of Birth');
      $contact2->add_message($email, 'Mail Address');
      $contact2->add_message($denwabangou, 'Phone Number');
      $contact2->add_message($address, 'Address');
      $contact2->add_message($schoolname, 'University name');
      $contact2->add_message($department1, 'Faculty Department');
      $contact2->add_message($department2, 'Department of Informatics');
      $contact2->add_message($area, 'Remarks');
      $contact2->add_message($chkagree, 'Privacy Policy');
      $contact2->add_attachment('skillsheet');
      $contact2->add_message($messagefoot, '');

      echo $contact2->send();
    }
  } else {
    echo "Get human approval.";
  }
}
