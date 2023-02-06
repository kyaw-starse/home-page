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
    $errors[] = "姓名（漢字）を入力してください。";
  }
  if (empty($_POST['lastName2']) && empty($_POST['firstName2'])) {
    $errors[] = "姓名（カタカナ）を入力してください。";
  }
  if (empty($email)) {
    $errors[] = "メールアドレスを入力してください。";
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "メールアドレスを正しく入力してください。";
    }
  }
  if (empty($denwabangou)) {
    $errors[] = "電話番号を入力してください。";
  }
  if (empty($address)) {
    $errors[] = "住所を入力してください。";
  }
  if (empty($chkagree)) {
    $errors[] = "個人情報の取り扱い同意してください。";
  }
  if (empty($area)) {
    $errors[] = "備考を入力してください。";
  }
  //添付ファイル
  // if ($_FILES['skillsheet']['size'] == 0) {
  //   $errors[] = "スキルシートをアップロードしてください。";
  // }
  if ($_FILES['skillsheet']['size'] == 0) {
    $errors[] = "スキルシートをアップロードしてください。";
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
    // $secret = '6LdJInAiAAAAAKmVb1MZe7PdMVv_6JjQeu-2JONX';
    // $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    // $responseData = json_decode($verifyResponse);

    // if ($responseData->success) {

      $recruit = 'sdsds@star-se.co.jp';
      $custMail = $email;
      $mailer = 'suyeephyo.it@gmail.com';
      // $mailer = 'STAR-SE_info@star-se.co.jp';

      if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
        include($php_email_form);
        print_r($php_email_form);
        die();
      } else {
        die('Unable to load the "PHP Email Form" Library!');
      }

      // ------------------- お客様への送信 --------------------

      $contact = new PHP_Email_Form;
      $contact->ajax = true;

      $contact->to = $custMail;
      $contact->from_name = "STAR SE";
      $contact->from_email = $mailer;
      $contact->subject = "【STAR SE株式会社】システムエンジニア_キャリア採用応募";

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
    ★　〒103-0011
    ★　東京都中央区日本橋大伝馬町17-6 日本橋小谷商事ビル２F
    ★　STAR SE株式会社
    ★　TEL 03-5207-2955
    ★　FAX 03-5207-2956
    ★　お問い合わせ：kanri@star-se.co.jp
    ★　URL www.star-se.co.jp
    
    ※プライバシーマーク 第22000213号
    ※※※※※※※※※※※※※※※※※※※※※※※※
  ";

      $contact->smtp = array(
        'host' => 'smtp.alpha-prm.jp',
        'username' => 'STAR-SE_info@star-se.co.jp',
        //'password' => 'FYuiojk789*RED%',
        'password' => 'NhyujmKi987$#',
        'port' => '587'
      );

      $contact->add_message($message1, '');
      $contact->add_message($name, '姓名');
      $contact->add_message($name2, '姓名（フリガナ）');
      $contact->add_message($selectYear, '生年月日');
      $contact->add_message($email, 'メールアドレス');
      $contact->add_message($denwabangou, '電話番号');
      $contact->add_message($address, '住所');
      $contact->add_message($salary, '希望月額');
      $contact->add_message($employeeType, '希望の契約形態');
      $contact->add_message($Os, 'OS');
      $contact->add_message($gengo, '開発言語');
      $contact->add_message($DB, 'DB');
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
      $contact2->subject = "システムエンジニア_キャリア採用応募" . "【" . $name . "】";

      $custNm2 = $name . "と申します。";
      $message2 = "
    
    この度は、STAR SE 株式会社へ応募をさせていただきます。

    以下、システムエンジニア_キャリア採用応募の内容となります。
    ※本メールは";
      $message3 = $name . "様からの応募の情報が当社のサーバーに到達した時点で送信される、自動配信メールです。
  ----------------------------------------------------------
";
      $message4 = $custNm2 . $message2 . $message3;

      $contact2->smtp = array(
        'host' => 'smtp.alpha-prm.jp',
        'username' => 'STAR-SE_info@star-se.co.jp',
        'password' => 'NhyujmKi987$#',
        'port' => '587'
      );

      $contact2->add_message($message4, '');
      $contact2->add_message($name, '姓名');
      $contact2->add_message($name2, '姓名（フリガナ）');
      $contact2->add_message($selectYear, '生年月日');
      $contact2->add_message($email, 'メールアドレス');
      $contact2->add_message($denwabangou, '電話番号');
      $contact2->add_message($address, '住所');
      $contact2->add_message($salary, '希望月額');
      $contact2->add_message($employeeType, '希望の契約形態');
      $contact2->add_message($Os, 'OS');
      $contact2->add_message($gengo, '開発言語');
      $contact2->add_message($DB, 'DB');
      $contact2->add_message($area, '備考');
      $contact2->add_message($chkagree, '個人情報保護方針');
      $contact2->add_attachment('skillsheet');
      $contact2->add_message($messagefoot, '');

      echo $contact2->send();
    // }
  // } else {
  //   echo "人間承認を受けてください。";
  // }
}