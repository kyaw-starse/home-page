<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  //$receiving_email_address = 'info@star-se.co.jp';
  $receiving_email_address = 'htun.htun.win@star-se.co.jp';
  

  if( file_exists($php_email_form = $_SERVER['DOCUMENT_ROOT'].'home-page/assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;    
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = "【STAR SE株式会社】お問い合わせ";

  $message = "
    お問い合わせ、ありがとうございます。
    この度は、STAR SE株式会社へのお問い合わせを頂きまして、誠にありがとうございます。
    
    以下、お問い合わせの内容となります。
    ※本メールはお客様のお問い合わせの情報が当社のサーバに到達した時点で送信される、自動配信メールです。
    ----------------------------------------------------------
  ";

  $messagefoot ="
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
  if( isset($_POST['chkagree']) ){
    $_POST['chkagree'] = "同意済み";
  }
 
  $contact->add_message( $message, '');
  $contact->add_message( $_POST['syameyi'], '会社名');
  $contact->add_message( $_POST['name'], '担当者名');
  $contact->add_message( $_POST['email'], 'メールアドレス');
  $contact->add_message( $_POST['denwa'], '電話番号');
  $contact->add_message( $_POST['yubinn'], '郵便番号');
  $contact->add_message( $_POST['adress'], '住所');
  $contact->add_message( $_POST['area'], 'お問い合わせ内容', 10);
  $contact->add_message( $_POST['chkagree'], '個人情報保護方針');
  $contact->add_message( $messagefoot, '');

  echo $contact->send();
?>
