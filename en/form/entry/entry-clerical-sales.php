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
  $salary = $employeeType = $syokusyu = $chkagree = "";
  $selectYear = $denwabangou = $address = $area = "";
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
  //$employeeType = $_POST['employeeType'];
  if (isset($_POST['employeeType'])){    
    $employeeType = $_POST['employeeType'];
  }
  // 職種
  if (isset($_POST['syokusyu'])) {
    $syokusyu = implode(", ", $_POST["syokusyu"]);
  }
  // 備考
  $area = $_POST['area'];
  // 個人情報の取扱い
  if (isset($_POST['chkagree'])) {
    $chkagree = "Agreed";//同意済み
  }

  if (empty($_POST['lastName1']) && empty($_POST['firstName1'])) {
    $errors[] = "Please enter first and last name (Kanji).";//姓名（漢字）を入力してください。
  } else if(strlen($name) > 100) {
    $errors[] = "Please enter first and last name within 100 length.";//姓名（漢字）を100文字以内に入力してください。
  }
  if (empty($_POST['lastName2']) && empty($_POST['firstName2'])) {
    $errors[] = "Please enter first and last name (furigana).";//姓名（カタカナ）を入力してください。
  } else if(strlen($name2) > 100) {
    $errors[] = "Please enter first and last name (furigana) within 100 length.";//姓名（カタカナ）を100文字以内に入力してください。
  }
  if (empty($email)) {
    $errors[] = "Please enter e-mail address.";//メールアドレスを入力してください。
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "Please enter e-mail address correctly.";//メールアドレスを正しく入力してください。
    }
  }
  if (empty($denwabangou)) {
    $errors[] = "Please enter phone number.";//電話番号を入力してください。
  }else{
    if(strlen($denwabangou) > 15) {
      $errors[] = "Please enter your Phone Number between 15 number.";//電話番号を入力してください。
    }
  }
  if (empty($address)) {
    $errors[] = "Please enter address.";//住所を入力してください。
  } else {
    if(strlen($address) > 100) {
      $errors[] = "Please enter address within 100 length.";//住所を100文字内に入力してください。
    }
  }
  if (empty($chkagree)) {
    $errors[] = "Please agree to the handling of personal information.";//個人情報の取り扱い同意してください。
  }
  if (empty($area)) {
    $errors[] = "Please enter in remarks.";//備考を入力してください。
  } else {
    if(strlen($area) > 200) {
      $errors[] = "Please enter contents of inquiry within 200 length.";//お問合せを200文字内に入力してください。
    }
  }
  $salaryfrom = $_POST['salaryfrom'];
  $salaryto = $_POST['salaryto'];
  if((strlen($salaryfrom) > 10) || (strlen( $salaryto) > 10)){
    $errors[] = "Enter Desired Monthly Amount as number.";
  } else if ( $salaryfrom >  $salaryto) {
    $errors[] = "Enter the below your salaryto.";
  }
  //添付ファイル
  if($_FILES['skillsheet']['size'] == 0) {
    $errors[] = "Please upload skill sheet.";//スキルシートをアップロードしてください。
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

      if (file_exists($php_email_form = $_SERVER['DOCUMENT_ROOT'].'/home-page/assets/vendor/php-email-form/php-email-form.php')) {
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
      $contact->subject = "【STAR SE Co., Ltd.】Office work / sales _ Career recruitment application";

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
    ★　Contact：kanri@star-se.co.jp
    ★　URL www.star-se.co.jp
    
    ※Privacy Mark No. 22000213
    ※※※※※※※※※※※※※※※※※※※※※※※※
  ";
      $contact->smtp = array(
        'host' => 'smtp.alpha-prm.jp',
        'username' => 'STAR-SE_info@star-se.co.jp',
        'password' => 'NhyujmKi987$#',
        'port' => '587'
      );
      $contact->add_message($message1, '');
      $contact->add_message($name, 'Fullname(Kanji)');//姓名
      $contact->add_message($name2, 'Fullname（Katankana）');//姓名
      $contact->add_message($selectYear, 'DOB'); //生年月日
      $contact->add_message($email, 'E-mail');//メールアドレス
      $contact->add_message($denwabangou, 'Phone number');//電話番号
      $contact->add_message($address, 'Address');//住所
      $contact->add_message($salary, 'Desired Monthly salary');//希望月額
      $contact->add_message($employeeType, 'Desired Contract Form');//希望の契約形態
      $contact->add_message($syokusyu, 'Profession');//職種
      $contact->add_message($area, 'Remarks');//備考
      $contact->add_message($chkagree, 'Personal information agree');//個人情報保護方針
      $contact->add_attachment('skillsheet');
      $contact->add_message($messagefoot, '');

      $contact->send();

      // ------------------- Recruitへの送信 --------------------

      $contact2 = new PHP_Email_Form;
      $contact2->ajax = true;
      $contact2->to = $recruit;
      $contact2->from_name = $name;
      $contact2->from_email = $mailer;
      $contact2->subject = "Office work / sales _ Career recruitment application" . "【" . $name . "】";

      $custNm2 = "My name is ".$name;
      $message2 = "

      This time, I would like to apply for STAR SE Co., Ltd.

      The following is the content of the application for clerical work/sales_career recruitment.      
      ※This email is";
      $message3 = "an automatic email that has been sent the appliation by ".$name ."
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
      $contact2->add_message($name, 'Fullname(Kanji)');
      $contact2->add_message($name2, 'Fullname（Katakana）');
      $contact2->add_message($selectYear, 'DOB');
      $contact2->add_message($email, 'E-mail');
      $contact2->add_message($denwabangou, 'Phone number');
      $contact2->add_message($address, 'Address');
      $contact2->add_message($salary, 'Desired monthly salary');
      $contact2->add_message($employeeType, 'Desired Contract Form');
      $contact2->add_message($syokusyu, 'Profession');
      $contact2->add_message($area, 'Remarks');
      $contact2->add_message($chkagree, 'Personal information agree');
      $contact2->add_attachment('skillsheet');
      $contact2->add_message($messagefoot, '');

      echo $contact2->send();
    }
}else{
  echo "Get human approval.";
  return false;
}
} else {
  echo "Get human approval";  //echo "人間承認を受けてください。";
  return false;
}

