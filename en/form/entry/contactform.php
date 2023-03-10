<?php

/**
 * Requires the "PHP Email Form" library
 * The "PHP Email Form" library is available only in the pro version of the template
 * The library should be uploaded to: vendor/php-email-form/php-email-form.php
 * For more info and help: https://bootstrapmade.com/php-email-form/
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $errors = [];
  $syameyi = $name = $email = $denwa = $yubinn = $adress = $area = $chkagree = "";

  $syameyi = $_POST['syameyi'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $denwa = $_POST['denwa'];
  $yubinn = $_POST['yubinn'];
  $adress = $_POST['adress'];
  $area = $_POST['area'];
  if (empty($_POST['chkagree'])) {
    $chkagree = "";
  } else {
    $chkagree = $_POST['chkagree'];
  }

  // 担当者名
  if (empty($name)) {
    $errors[] = "Please enter the name of the person in charge.";//担当者名を入力してください。
  }

  // メール
  if (empty($email)) {
    $errors[] = "Please enter your e-mail address.";//メールアドレスを入力してください。
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "Please enter e-mail address correctly.";//メールアドレスを正しく入力してください。
    }
  }

  // 電話番号
  if (empty($denwa)) {
    $errors[] = "Please enter phone number.";//電話番号を入力してください。
  }

  // 住所
  if (empty($adress)) {
    $errors[] = "Please enter address.";//住所を入力してください。
  }

  // 問い合わせ内容
  if (empty($area)) {
    $errors[] = "Please enter contents of inquiry.";//お問合せ内容を入力してください。
  }

  // 個人情報保護方針
  if (empty($chkagree)) {
    $errors[] = "Please agree to the handling of personal information.";//個人情報の取り扱い同意してください。
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

      $recruit = 'info@star-se.co.jp';
      $custMail = $email;
      $mailer = 'STAR-SE_info@star-se.co.jp';
      $php_email_form = $_SERVER['DOCUMENT_ROOT'].'/home-page/assets/vendor/php-email-form/php-email-form.php';
      if (file_exists($php_email_form)) {
        include($php_email_form);
      } else {
        die('Unable to load the "PHP Email Form" Library!');
      }

      // ------------------- お客様への送信 --------------------

      $contact = new PHP_Email_Form;
      $contact->ajax = true;

      $contact->to = $custMail;
      $contact->from_name = "STAR SE";
      $contact->from_email = $mailer;
      $contact->subject = "【STAR SE Co., Ltd.】Inquiry";

      $sama = "様";
      $custNm = $name;
      $message = "
    Thank you for your inquiry.
    Thank you for contacting STAR SE Co., Ltd.
    
    The following is the contents of your inquiry.
    ※This e-mail is an automatic delivery email that is sent when the information of your inquiry reaches our server.
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
    ★　Contact：kanri@star-se.co.jp
    ★　URL www.star-se.co.jp
    
    ※Privacy Mark No. 22000213
    ※※※※※※※※※※※※※※※※※※※※※※※※
  ";////プライバシーマーク 第22000213号
      if (isset($chkagree)) {
        $chkagree = "Agreed";//同意済み
      }

      $contact->smtp = array(
        'host' => 'smtp.alpha-prm.jp',
        'username' => 'STAR-SE_info@star-se.co.jp',
        'password' => 'NhyujmKi987$#',
        'port' => '587'
      );

      $contact->add_message($message1, '');
      $contact->add_message($syameyi, 'Company Name');//会社名
      $contact->add_message($name, 'Person in charge');//担当者名
      $contact->add_message($email, 'E-mail');//メールアドレス
      $contact->add_message($denwa, 'Phone number');//電話番号
      $contact->add_message($yubinn, 'Postal code');//郵便番号
      $contact->add_message($adress, 'Address');//住所
      $contact->add_message($area, 'Contents of inquiry', 10);//お問い合わせ内容
      $contact->add_message($chkagree, '');//
      $contact->add_message($messagefoot, '');

      $contact->send();

      // ------------------- Recruitへの送信 --------------------

      $contact2 = new PHP_Email_Form;
      $contact2->ajax = true;

      $contact2->to = $recruit;
      $contact2->from_name = $_POST['name'];
      $contact2->from_email = $mailer;
      $contact2->subject = "【STAR SE Co., Ltd.】Inquiry";

      $sama2 = "様";
      $custNm2 = $_POST['name'];
      $message2 = "The following is the contents of inquiry from
    ----------------------------------------------------------
  ";
      $message3 = $message2.$custNm2;

      $contact2->smtp = array(
        'host' => 'smtp.alpha-prm.jp',
        'username' => 'STAR-SE_info@star-se.co.jp',
        'password' => 'NhyujmKi987$#',
        'port' => '587'
      );

      $contact2->add_message($message3, '');
      $contact2->add_message($syameyi, 'Company name');//会社名
      $contact2->add_message($name, 'Person in charge');//担当者名
      $contact2->add_message($email, 'E-mail');//メールアドレス
      $contact2->add_message($denwa, 'Phone number');//電話番号
      $contact2->add_message($yubinn, 'Postal');//郵便番号
      $contact2->add_message($adress, 'Address');//住所
      $contact2->add_message($area, 'Contents of inquiry', 10);//お問い合わせ内容
      $contact2->add_message($chkagree, 'Personal information policy agree');//個人情報保護方針
      $contact2->add_message($messagefoot, '');

      echo $contact2->send();
   }
  }else{
    echo "Get human approval.";
    return false;
  }
} else {
  echo "Get human approval.";//人間承認を受けてください。
  return false;
}
