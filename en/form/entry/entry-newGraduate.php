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

  // if ($_POST['g-recaptcha-response'] != "") {
  //   $secret = '6LdJInAiAAAAAKmVb1MZe7PdMVv_6JjQeu-2JONX';
  //   $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
  //   $responseData = json_decode($verifyResponse);

  //   if ($responseData->success) {

    
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
    お問い合わせ、ありがとうございます。
    この度は、STAR SE株式会社へのお問い合わせを頂きまして、誠にありがとうございます。
    
    以下、お問い合わせの内容となります。
    ※本メールはお客様のお問い合わせの情報が当社のサーバに到達した時点で送信される、自動配信メールです。
    ----------------------------------------------------------
  ";
      $message1 = $custNm . $message;

      $messagefoot = "
    ----------------------------------------------------------
    以上、宜しくお願い致します。


    ※※※※※※※※※※※※※※※※※※※※※※※※
    ★　〒104-0043
    ★　東京都中央区湊2-4-1　TOMACビル５階
    ★　STAR SE株式会社
    ★　TEL 03-5207-2955
    ★　FAX 03-5207-2956
    ★　お問い合わせ：kanri@star-se.co.jp
    ★　URL www.star-se.co.jp
    
    ※プライバシーマーク 第22000213号
    ※※※※※※※※※※※※※※※※※※※※※※※※
  ";

      $contact->smtp = array(
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

      $contact->add_message($message1, '');
      $contact->add_message($name, '姓名');
      $contact->add_message($name2, '姓名（フリガナ）');
      $contact->add_message($selectYear, '生年月日');
      $contact->add_message($email, 'メールアドレス');
      $contact->add_message($denwabangou, '電話番号');
      $contact->add_message($address, '住所');
      $contact->add_message($schoolname, '大学名');
      $contact->add_message($department1, '学部学科');
      $contact->add_message($department2, '情報学科');
      $contact->add_message($area, '備考');
      $contact->add_message($chkagree, '個人情報保護方針');
      $contact->add_attachment('skillsheet');
      $contact->add_message($messagefoot, '');

      $contact->send();

      // ------------------- Recruitへの送信 --------------------

      $contact2 = new PHP_Email_Form;
      $contact2->ajax = true;
      $contact2->to = $recruit;
      $contact2->from_name = $name;
      $contact2->from_email = $mailer;
      $contact2->subject = "新卒採用応募" . "【" . $name . "】";

      $custNm2 = $name . "と申します。";
      $message2 = "
    
    この度は、STAR SE 株式会社へ応募をさせていただきます。

    以下、新卒採用応募の内容となります。
    ※本メールは";
      $message3 = $name . "様からの応募の情報が当社のサーバーに到達した時点で送信される、自動配信メールです。
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
      $contact2->add_message($name, '姓名');
      $contact2->add_message($name2, '姓名（フリガナ）');
      $contact2->add_message($selectYear, '生年月日');
      $contact2->add_message($email, 'メールアドレス');
      $contact2->add_message($denwabangou, '電話番号');
      $contact2->add_message($address, '住所');
      $contact2->add_message($schoolname, '大学名');
      $contact2->add_message($department1, '学部学科');
      $contact2->add_message($department2, '情報学科');
      $contact2->add_message($area, '備考');
      $contact2->add_message($chkagree, '個人情報保護方針');
      $contact2->add_attachment('skillsheet');
      $contact2->add_message($messagefoot, '');

      echo $contact2->send();
    }
  } else {
    echo "人間承認を受けてください。";
  }
}
