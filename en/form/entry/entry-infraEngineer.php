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
  $salary = $employeeType = $Os = $infra = $chkagree = "";
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
  // 希望月額
  $salary = $_POST['salaryfrom'] . "～" . $_POST['salaryto'] . "円";
  // 希望の契約形態
  $employeeType = $_POST['employeeType'];
  // OS
  if (isset($_POST['Os'])) {
    $Os = implode(", ", $_POST["Os"]);
  }
  // infra
  if (isset($_POST['infra'])) {
    $infra = implode(", ", $_POST["infra"]);
  }
  // 備考
  $area = $_POST['area'];
  // 個人情報の取扱い
  if (isset($_POST['chkagree'])) {
    $chkagree = "Agreed";  //同意済み
    
  }

  $lastName1 = $_POST['lastName1'];
  $firstName1 = $_POST['firstName1'];
  if (empty($lastName1) && empty($firstName1)) {
    $errors[] = "Please enter your first and last name (Kanji).";
  } else if(strlen($lastName1) > 100 || strlen($firstName1) > 100 ) {
    $errors[] = "Please enter the first and last name (Kanji) within 100 length.";
  }
  $lastName2 = $_POST['lastName2'];
  $firstName2 = $_POST['firstName2'];
  if (empty($lastName2) && empty($firstName2)) {
    $errors[] = "Please enter your first and last name (katakana).";
  } else if(strlen($lastName2) > 100 || strlen($firstName2) > 100 ) {
    $errors[] = "Please enter the first and last name (katakana) within 100 length.";
  }
  if (empty($email)) {
    $errors[] = "Please enter your e-mail address.";
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "Please enter your e-mail address correctly.";
    } else if (strlen($email) > 100) {
      $errors[] = "Please enter the e-mail address within 100 length.";
    }
  }
  if (empty($denwabangou)) {
    $errors[] = "Please enter your phone number.";
  }else{
    if(strlen($denwabangou) > 15){
      $errors[] = "Please enter phone number correctly.";//電話番号を正しく入力してください。
    }
  }
  if (empty($address)) {
    $errors[] = "Please enter your address.";
  } else {
    if(strlen($adress) > 100) {
      $errors[] = "Please enter address correctly.";//住所を100文字内に入力してください。
    }
  }
  $salaryfrom = $_POST['salaryfrom'];
  $salaryto = $_POST['salaryto'];
  if((strlen($salaryfrom) > 10) || (strlen($salaryto) > 10)){
    $errors[] = "Enter Desired Monthly Amount as number.";
  } else if ( $salaryfrom >  $salaryto) {
    $errors[] = "Enter the below your salaryto.";
  }
    //添付ファイル
  if ($_FILES['skillsheet']['size'] == 0) {
    $errors[] = "Please upload your skill sheet.";
  }
  if (empty($area)) {
    $errors[] = "Please enter your remarks.";
  } else {
    if(strlen($area) > 200) {
      $errors[] = "Please enter contents within 200 length.";//備考を200文字内に入力してください。
    }
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

      $recruit = 'recruit@star-se.co.jp';
      $custMail = $_POST['email'];
      $mailer = 'STAR-SE_info@star-se.co.jp';
      $thumb_name = $_SERVER['DOCUMENT_ROOT'].'/home-page/assets/vendor/php-email-form/php-email-form.php';

      // if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
      if (file_exists($thumb_name)) {
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
      $contact->subject = "[STAR SE Co., Ltd.] Infrastructure engineer_Career recruitment application";

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
        'username' => 'STAR-SE_info@star-se.co.jp',
        // 'password' => 'FYuiojk789*RED%',
        'password' => 'NhyujmKi987$#',
        'port' => '587'
      );

      $contact->add_message($message1, '');
      $contact->add_message($name, 'Fullname (Kanji)');
      $contact->add_message($name2, 'Fullname（Katakana）');
      $contact->add_message($selectYear, 'Date Of Birth');
      $contact->add_message($email, 'Mail Address');
      $contact->add_message($denwabangou, 'Phone Number');
      $contact->add_message($address, 'Address');
      $contact->add_message($salary, 'Desired monthly amount');
      $contact->add_message($employeeType, 'Desired contract type');
      $contact->add_message($Os, 'OS');
      $contact->add_message($infra, 'Infrastructure Classification');
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
      $contact2->subject = "Infrastructure engineer_Career recruitment application" . "【" . $name . "】";  //$_POST['name']

      $custNm2 = "My name is ".$name . ".";
      $message2 = "

      This time, I would like to apply to STAR SE Co., Ltd.

      The following is the content of the infrastructure engineer_career recruitment application.
      *This email is ";
      $message3 = " an automatic email that has been sent the application by ". $name ." .
  ----------------------------------------------------------
  ";

      $message4 = $custNm2 . $message2 . $message3;

      $contact2->smtp = array(
        'host' => 'smtp.alpha-prm.jp',
        'username' => 'STAR-SE_info@star-se.co.jp',
        // 'password' => 'FYuiojk789*RED%',
        'password' => 'NhyujmKi987$#',
        'port' => '587'
      );

      $contact2->add_message($message4, '');
      $contact2->add_message($name, 'Fullname (Kanji)');
      $contact2->add_message($name2, 'Fullname（Katakana）');
      $contact2->add_message($selectYear, 'Date Of Birth');
      $contact2->add_message($email, 'Mail Address');
      $contact2->add_message($denwabangou, 'Phone Number');
      $contact2->add_message($address, 'Address');
      $contact2->add_message($salary, 'Desired monthly amount');
      $contact2->add_message($employeeType, 'Desired contract type');
      $contact2->add_message($Os, 'OS');
      $contact2->add_message($infra, 'Infrastructure Classification');
      $contact2->add_message($area, 'Remarks');
      $contact2->add_message($chkagree, 'Privacy Policy');
      $contact2->add_attachment('skillsheet');
      $contact2->add_message($messagefoot, '');

      echo $contact2->send();
    }
  }
} else {
  echo "Get human approval.";
}
