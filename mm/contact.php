<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-language" content="ja">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="star se,starse,star,it star se,star se japan,starse japan,スター,スターエスイー,STAR SE株式会社, star se myanmar, starse Myanmar, myanmar starse, starse contact">
    <meta name="description" content="弊社は、ソフトウェア開発からインフラ設計構築、システム運用支援までトータルなソリューションを提供する“ITソリューション”の拡充に加え、 IT業界の人材不足の課題対応策として“社員教育”の強化に取り組んでおります。">
    <meta name="google-site-verification" content="Dg_pvHrLYsE_PNW7oubm3Xw5aWYEPksmjpJwXLBG0Sk"/>
    <link rel="shortcut icon" href="/home-page/assets/img/common/favicon.png" type="image/x-icon">
    <link rel="icon" href="/home-page/assets/img/common/favicon.png" type="image/x-icon">
    <title>ContactUs</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/import.css">
    <link rel="stylesheet" href="./assets/css/pc_style.css">
    <link rel="stylesheet" href="./assets/css/sp_style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- Template Main CSS File -->
    <link href="./assets/css/style.css" rel="stylesheet">
    <link href="./assets/css/common.css" rel="stylesheet">
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/jquery2.2.4.min.js"></script>
    <style>
        .btn02{
            display: block;
            background: #E8B500;
            color: #fff;
            font-weight: bold;
            font-size: 14px;
            padding: 15px 15px;
            text-align: center;
            border-radius: 20px;
            width:100%;
            border :none !important:
        }
        .d-block, .sent-message{
            margin-bottom:20px;
        }
    </style>
</head>
<body id="top">
    <div id="wrapper">
        <header class="headerBlock">
            <div class="header">
                <h1 class="h-logo">
                    <a href="./">
                        <img src="./assets/img/common/h_logo.png" alt="">
                        <p>STAR SE<span>MYANMAR</span></p>
                    </a>
                </h1>
                <div class="h-right cFix">
                    <nav class="nav-pc">
                        <ul class="cFix">
                            <li><a href="aboutus.php"><span>About Us</span></a></li>
                            <li><a href="services.php"><span>Service</span></a></li>
                            <li><a href="recruit.php"><span>Recruit</span></a></li>
                            <li><a href="news.php"><span>News</span></a></li>
                            <li><a href="contact.php" class="navpc-active"><span>Contact Us</span></a></li>
                        </ul>
                    </nav>
                </div>
                <div class="gmenu">
                    <div class="menu">
						<span class="line line_01"></span>
                        <span class="line line_02"></span>
                        <span class="line line_03"></span>
                    </div>
                </div>
            </div>
        </header>
        <!-- globalNav -->
        <nav id="globalNav" class="globalNav">
            <div class="globalNav-inner">
                <ul class="nav-sp">
                    <li><a href="aboutus.php"><span>About Us</span></a></li>
                    <li><a href="services.php"><span>Service</span></a></li>
                    <li><a href="recruit.php"><span>Recruit</span></a></li>
                    <li><a href="news.php"><span>News</span></a></li>
                    <li><a href="contact.php"><span>Contact Us</span></a></li>
                </ul>
            </div>
        </nav>
        <div class="sub-banner">
            <img src="./assets/img/common/bnr_aboutus.jpg" alt="">
        </div>
        <div class="content">
            <section class="contact-page">
                <div class="c-w1100">
                    <h2 class="sec-ttl">Contact Us</h2>
                    <div class="form-block">
                        <form action="/home-page/mm/form/contactform.php" method="post"  role="form" class="php-email-form" id="contact-form">
                            <div class="form-row form-mb">
                                <div class="form-col2">
                                    <div class="form-inputText">
                                        <label for="name" class="form-label">Name<span class="require">*</span></label>
                                        <input type="text" class="inputType" name="name" id="name" placeholder="Please enter name">
                                    </div>
                                </div>
                                <div class="form-col2">
                                    <div class="form-inputText">
                                        <label for="email" class="form-label">E-mail<span class="require">*</span></label>
                                        <input type="text" class="inputType" name="email" id="email" placeholder="Please enter E-mail">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row form-mb">
                                <div class="form-col1">
                                    <div class="form-inputText">
                                        <label for="denwa" class="form-label">Phone<span class="require">*</span></label>
                                        <input type="tel" class="inputType" name="denwa" id="denwa" placeholder="Please enter Phone">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row form-mb">
                                <div class="form-col1">
                                    <div class="form-inputText">
                                        <label for="subj" class="form-label">Subject<span class="require">*</span></label>
                                        <input type="text" class="inputType" name="subj" id="subj" placeholder="Please enter Subject">
                                    </div>
                                </div>
                            </div>                            
                            <div class="form-row form-mb">
                                <div class="form-col1">
                                    <div class="form-textarea">
                                    <label for="area" class="form-label">Contents about inquiry<span class="require">*</span></label>
                                    <p class="show_message"><span class="" id=""></span></p>
                                    <textarea name="area" cols="50" rows="5" placeholder="※Please enter within 200 characters." class="inquiry_area" id="inquiry_area"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="my-3">
                                <div class="loading"></div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your email is already sent. Thank you very much for your inquiry.</div>
                            </div>
                            <div class="form-row">
                                <div class="form-col1">
                                    <div class="sec-btn02 sendBtn">
                                        <button type="submit" class="btn02 g-recaptcha" id="send_mail" style="border:none">Send</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        <div class="footerLogo">
            <div class="c-w1100 cFix">
                <span class="footerLogoImg"><a href="https://www.star-se.co.jp/"><img src="./assets/img/common/footer_logo.png" alt="STAR SE株式会社"></a></span>
            </div> 
        </div>
        <footer>
            <div class="footerBlock bg-green">
                <div class="ftInner c-w1100 cFix">
                    <div class="ftDesp">
                        <p class="ftLogoText">STAR SE MYANMAR</p>
                        <div class="ftAddress">
                            <ul>
                                <li>
                                    <p class="ft-mm-address">
                                        Room No.11/A, 11th floor, Pyay Road, Red Hill Tower (or) KBZ Tower, Sanchaung Township, Yangon
                                    </p>
                                </li>
                                <li>
                                    <p class="ftAddress-info"><span>PH</span>: <a href="tel:+9594949933" class="tel">+959956932955</a></p>
                                </li>
                                <li>
                                    <p class="ftAddress-info"><span>Mail</span>: recruit@star-se.co.jp</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="ftFacebook">
                    <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v15.0" nonce="lJdOBtia"></script>
                        <div class="fb-page" data-href="https://www.facebook.com/profile.php?id=100069089106285" data-tabs="timeline" data-width="500" data-height="250" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/profile.php?id=100069089106285" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/profile.php?id=100069089106285">STAR SE 株式会社</a></blockquote></div>
                    </div>
                </div>
            </div>
            <p id="page-top"><a href="javascript:void(0)">&#8593;</a></p> 
            <div class="copyRight">
                <p>&copy; Copyright STAR SE Co., LTD. All Rights Reserved</p>
            </div>
        </footer>
        <!-- footer -->
    </div>
    <script>    
     jQuery("#inquiry_area").keyup(function(){
            var $this, wordcount;
            $this = jQuery(this);
            wordcount = $this.val().length;//split(/\b[\s,\.-:;]*/).
            if (wordcount > 10) {
            jQuery("#send_mail").prop("disabled",true);
            jQuery(".show_message span").text("※Please enter within 200 characters.");
            jQuery('.show_message span').css('color','#ed3c0d');
            jQuery('.show_message span').css('font-size','13px');        
            return false;
        } else {
            jQuery("#send_mail").prop("disabled",false);
            jQuery(".show_message span").text("");
        }
        });   
        function onSubmit(token) {
                document.getElementById("contact-form").submit();
            }
    </script>
    <!-- wrapper -->
    <script src="./assets/js/common.js"></script>
    <script src="./assets/vendor/php-email-form/validate.js"></script>
</body>
</html>