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
  $salary = $employeeType = $Os = $gengo = $DB = $chkagree = "";
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
  // DB
  if (isset($_POST['DB'])) {
    $DB = implode(", ", $_POST["DB"]);
  }
  // 開発言語
  if (isset($_POST['gengo'])) {
    $gengo = implode(", ", $_POST["gengo"]);
  }
  // 備考
  $area = $_POST['area'];
  // 個人情報の取扱い
  if (isset($_POST['chkagree'])) {
    $chkagree = "同意済み";
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

      $recruit = 'htun.htun.win@star-se.co.jp';
      $custMail = $email;
      //$mailer = 'STAR-SE_info@star-se.co.jp';
      $mailer = 'htun.htun.win@star-se.co.jp';
      $thumb_name = $_SERVER['DOCUMENT_ROOT'].'/home-page/assets/vendor/php-email-form/php-email-form.php';

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
      $contact->subject = "[STAR SE Co., Ltd.] System Engineer_Career Recruitment Application";

      $sama = "様";
      $custNm = $name ;
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
        // 'host' => 'smtp.alpha-prm.jp',
        // 'username' => 'STAR-SE_info@star-se.co.jp',
        // //'password' => 'FYuiojk789*RED%',
        // 'password' => 'NhyujmKi987$#',
        // 'port' => '587'

        'host' => 'smtp.alpha-prm.jp',
        //'username' => 'STAR-SE_info@star-se.co.jp',
        'username' => 'htun.htun.win@star-se.co.jp',
        //'password' => 'FYuiojk789*RED%',
        'password' => 't@n202301SE',
        'port' => '587'
      );

      $contact->add_message($message1, '');
      $contact->add_message($name, 'Fullname');
      $contact->add_message($name2, 'Fullname（フリガナ）');
      $contact->add_message($selectYear, 'Date Of Birth');
      $contact->add_message($email, 'Mail Address');
      $contact->add_message($denwabangou, 'Phone Number');
      $contact->add_message($address, 'Address');
      $contact->add_message($salary, 'Desired monthly amount');
      $contact->add_message($employeeType, 'Desired contract type');
      $contact->add_message($Os, 'OS');
      $contact->add_message($gengo, 'Development Language');
      $contact->add_message($DB, 'DB');
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
      $contact2->subject = "System engineer_Career Recruitment Application" . "【" . $name . "】";

      $custNm2 = "My name is." .$name;
      $message2 = "
    
      This time, I would like to apply to STAR SE Co., Ltd.

      The following is the content of the system engineer_career recruitment application.
      *This email is ";
      $message3 = $name . "This is an automatic email that will be sent when your application information reaches our server.
  ----------------------------------------------------------
";
      $message4 = $custNm2 . $message2 . $message3;

      $contact2->smtp = array(
        // 'host' => 'smtp.alpha-prm.jp',
        // 'username' => 'STAR-SE_info@star-se.co.jp',
        // 'password' => 'NhyujmKi987$#',
        // 'port' => '587'
        'host' => 'smtp.alpha-prm.jp',
        //'username' => 'STAR-SE_info@star-se.co.jp',
        'username' => 'htun.htun.win@star-se.co.jp',
        //'password' => 'FYuiojk789*RED%',
        'password' => 't@n202301SE',
        'port' => '587'
      );

      $contact2->add_message($message4, '');
      $contact2->add_message($name, 'Fullname');
      $contact2->add_message($name2, 'Fullname（フリガナ）');
      $contact2->add_message($selectYear, 'Date Of Birth');
      $contact2->add_message($email, 'Mail Address');
      $contact2->add_message($denwabangou, 'Phone Number');
      $contact2->add_message($address, 'Address');
      $contact2->add_message($salary, 'Desired monthly amount');
      $contact2->add_message($employeeType, 'Desired contract type');
      $contact2->add_message($Os, 'OS');
      $contact2->add_message($gengo, 'Development Language');
      $contact2->add_message($DB, 'DB');
      $contact2->add_message($area, 'Remarks');
      $contact2->add_message($chkagree, 'Privacy Policy');
      $contact2->add_attachment('skillsheet');
      $contact2->add_message($messagefoot, '');

      echo $contact2->send();
    }
  } else {
    echo "人間承認を受けてください。";
  }
}
