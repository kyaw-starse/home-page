<?php
    //session_start();
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

    // 会社名
    if (!empty($syameyi) && strlen($syameyi) > 100) {
      $errors[] = "会社名を100文字内に入力してください。";
    }

  // 担当者名
  if (empty($name)) {
    $errors[] = "担当者名を入力してください。";
  }else {
    // 担当者名の最大文字数チェック
    if(strlen($name) > 100) {
      $errors[] = "担当者名を100文字内に入力してください。";
    }
  }

  // メール
  if (empty($email)) {
    $errors[] = "メールアドレスを入力してください。";
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "メールアドレスは＠で正しく入力してください。";
    }
  }

  // 電話番号
  if (empty($denwa)) {
    $errors[] = "電話番号を入力してください。";
  }else{
    if(strlen($denwa) > 15){
      $errors[] = "電話番号を15数字以内で入力してください。";
    }
  }

  // 郵便番号最大文字数チェック
  if(!empty($yubinn) && strlen($yubinn) > 10) {
    $errors[] = "郵便番号を10数字以内で入力してください。";
  }
  
  // 住所
  if (empty($adress)) {
    $errors[] = "住所を入力してください。";
  } else {
    if(strlen($adress) > 100) {
      $errors[] = "住所を100文字内に入力してください。";
    }
  }

  // 問い合わせ内容
  if (empty($area)) {
    $errors[] = "お問合せ内容を入力してください。";
  } else {
    if(strlen($area) > 200) {
      $errors[] = "問合せを200文字内に入力してください。";
    }
  }

  // 個人情報保護方針
  if (empty($chkagree)) {
    $errors[] = "個人情報の取り扱い同意してください。";
  }

  if (!empty($errors)) {
    echo "<br>";
    foreach ($errors as $error) {
      echo $error;
      echo "<br>";      
    }
    $_SESSION[ 'errors' ] = $errors;
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

      //$php_email_form = '/home-page/assets/vendor/php-email-form/php-email-form.php';

      if (file_exists($php_email_form)) {
       include($php_email_form);
      } else {
        echo $php_email_form;
        echo "<br>";
        die('Unable to load the "PHP Email Form" Library!');
      }

      // ------------------- お客様への送信 --------------------

      $contact = new PHP_Email_Form;
      $contact->ajax = true;

      $contact->to = $custMail;
      $contact->from_name = "STAR SE";
      $contact->from_email = $mailer;
      $contact->subject = "【STAR SE株式会社】お問い合わせ";

      $sama = "様";
      $custNm = $name . $sama;
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
      if (isset($chkagree)) {
        $chkagree = "同意済み";
      }

      $contact->smtp = array(
        'host' => 'smtp.alpha-prm.jp',
        'username' => 'STAR-SE_info@star-se.co.jp',
        'password' => 'NhyujmKi987$#',
        'port' => '587'
      );

      $contact->add_message($message1, '');
      $contact->add_message($syameyi, '会社名');
      $contact->add_message($name, '担当者名');
      $contact->add_message($email, 'メールアドレス');
      $contact->add_message($denwa, '電話番号');
      $contact->add_message($yubinn, '郵便番号');
      $contact->add_message($adress, '住所');
      $contact->add_message($area, 'お問い合わせ内容', 10);
      $contact->add_message($chkagree, '個人情報保護方針');
      $contact->add_message($messagefoot, '');

      $contact->send();

      // ------------------- Recruitへの送信 --------------------

      $contact2 = new PHP_Email_Form;
      $contact2->ajax = true;

      $contact2->to = $recruit;
      $contact2->from_name = $_POST['name'];
      $contact2->from_email = $mailer;
      $contact2->subject = "【STAR SE株式会社】お問い合わせ";

      $sama2 = "様";
      $custNm2 = $_POST['name'] . $sama;
      $message2 = " から問い合わせがございます。
    以下、お問い合わせの内容となります。
    ----------------------------------------------------------
  ";
      $message3 = $custNm2 . $message2;

      $contact2->smtp = array(
        'host' => 'smtp.alpha-prm.jp',
        'username' => 'STAR-SE_info@star-se.co.jp',
        'password' => 'NhyujmKi987$#',
        'port' => '587'
      );

      $contact2->add_message($message3, '');
      $contact2->add_message($syameyi, '会社名');
      $contact2->add_message($name, '担当者名');
      $contact2->add_message($email, 'メールアドレス');
      $contact2->add_message($denwa, '電話番号');
      $contact2->add_message($yubinn, '郵便番号');
      $contact2->add_message($adress, '住所');
      $contact2->add_message($area, 'お問い合わせ内容', 10);
      $contact2->add_message($chkagree, '個人情報保護方針');
      $contact2->add_message($messagefoot, '');

      echo $contact2->send();
    }
  }else{
    echo "人間承認を受けてください。";
    return false;
  }
} else {
  echo "人間承認を受けてください。";
  return false;
}
