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
  $name = $email = $denwa = $subj = $area = "";

  $name = $_POST['name'];
  $email = $_POST['email'];
  $denwa = $_POST['denwa'];
  $subj = $_POST['subj'];
  $area = $_POST['area'];

  // 担当者名
  if (empty($name)) {
    $errors[] = "Please enter name.";
  }
  // メール
  if (empty($email)) {
    $errors[] = "Please enter e-mail.";
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "Please enter correct email including with @ sign.";
    }
  }
  // 電話番号
  if (empty($denwa)) {
    $errors[] = "Please enter phone number.";
  }
  // 案件
  if (empty($subj)) {
    $errors[] = "Please enter subject for inquiry.";
  }
  // 問い合わせ内容
  if (empty($area)) {
    $errors[] = "Please enter contents about inquiry.";
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

  // if ($_POST['g-recaptcha-response'] != "") {
  //   $secret = '6LdJInAiAAAAAKmVb1MZe7PdMVv_6JjQeu-2JONX';
  //   $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
  //   $responseData = json_decode($verifyResponse);

  //   if ($responseData->success) { 

      //$recruit = 'recruit@star-se.co.jp';
      $recruit = 'htun.htun.win@star-se.co.jp';
      $custMail = $email;
      //$mailer = 'STAR-SE_info@star-se.co.jp';
      $mailer = 'htun.htun.win@star-se.co.jp';
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
      $contact->from_name = "STAR SE MYANMR";
      $contact->from_email = $mailer;
      $contact->subject = "【STAR SE MYANMAR Co., Ltd.】Inquiry";

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
    ★　STAR SE MYANMAR
    ★　PYAY ROAD, ROOM NO.11/A, 11TH FLOOR,
    ★　RED HILL TOWER (OR) KBZ TOWRE,SANCHAUNG TOWNSHIP, YANGON REGION
    ★　TEL : 03-5207-2955
    ★　FAX : 03-5207-2956
    ★　Contact : kanri@star-se.co.jp
    ★　URL: https://www.star-se-myanmar.com/
    
    ※Privacy Mark No. 22000213
    ※※※※※※※※※※※※※※※※※※※※※※※※
  ";
      $contact->smtp = array(
        'host' => 'smtp.alpha-prm.jp',
        //'username' => 'STAR-SE_info@star-se.co.jp',
        'username' => 'htun.htun.win@star-se.co.jp',
        //'password' => 'FYuiojk789*RED%',
        //'password' => 'NhyujmKi987$#',
        'password' => 't@n202301SE',
        'port' => '587'
      );

      $contact->add_message($message1, '');
      $contact->add_message($name, 'Person in charge');
      $contact->add_message($email, 'E-mail');
      $contact->add_message($denwa, 'Phone number');
      $contact->add_message($subj, 'Subject');
      $contact->add_message($area, 'Contents of inquiry', 10);
      $contact->add_message($messagefoot, '');

      $contact->send();

      // ------------------- Recruitへの送信 --------------------

      $contact2 = new PHP_Email_Form;
      $contact2->ajax = true;

      $contact2->to = $recruit;
      $contact2->from_name = $_POST['name'];
      $contact2->from_email = $mailer;
      $contact2->subject = "【STAR SE Co., Ltd.】Inquiry";
      
      $custNm2 = $_POST['name'];
      $message2 = "The following is the contents of inquiry from
    ----------------------------------------------------------
  ";
      $message3 = $message2.$custNm2;

      $contact2->smtp = array(
        'host' => 'smtp.alpha-prm.jp',
        //'username' => 'STAR-SE_info@star-se.co.jp',
        'username' => 'htun.htun.win@star-se.co.jp',
        //'password' => 'NhyujmKi987$#',
        'password' => 't@n202301SE',
        'port' => '587'
      );

      $contact2->add_message($message3, '');
      $contact2->add_message($name, 'Name');//担当者名
      $contact2->add_message($email, 'E-mail');//メールアドレス
      $contact2->add_message($denwa, 'Phone number');//電話番号
      $contact2->add_message($subj, 'Subject');//案件
      $contact2->add_message($area, 'Contents of inquiry', 10);//お問い合わせ内容
      $contact2->add_message($messagefoot, '');

      echo $contact2->send();
   //}
  //}
} else {
  echo "Get human approval.";
  return false;
}
