<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-language" content="ja">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="star se,starse,star,it star se,star se japan,starse japan,スター,スターエスイー,STAR SE株式会社">
    <meta name="description" content="弊社は、ソフトウェア開発からインフラ設計構築、システム運用支援までトータルなソリューションを提供する“ITソリューション”の拡充に加え、 IT業界の人材不足の課題対応策として“社員教育”の強化に取り組んでおります。">
    <meta name="google-site-verification" content="Dg_pvHrLYsE_PNW7oubm3Xw5aWYEPksmjpJwXLBG0Sk"/>
    <link rel="shortcut icon" href="./assets/img/common/favicon.png" type="image/x-icon">
    <link rel="icon" href="./assets/img/common/favicon.png" type="image/x-icon">
    <title>Recruit</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/import.css">
    <link rel="stylesheet" href="./assets/css/import.css">

    <link rel="stylesheet" href="./assets/css/pc_style.css">
    <link rel="stylesheet" href="./assets/css/sp_style.css">
    <script src="./assets/js/jquery.min.js"></script>
    <link href="./assets/css/style.css" rel="stylesheet">
    <!-- <script>
        function test1(){
            // document.getElementById('hr-err-success').innerHTML = " ";
            document.getElementById('hr-success').innerHTML = " ";
            document.getElementById('hr-success').innerHTML = " ";
            
        }
        function test2(){
            // alert("engineer err");

            // document.getElementById('engineer-err-success').innerHTML = " ";
            document.getElementById('engineer-err').innerHTML = " ";
            document.getElementById('engineer-success').innerHTML = " ";
            
        }
    </script> -->
    
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
                            <li><a href="recruit.php" class="navpc-active"><span>Recruit</span></a></li>
                            <li><a href="news.php"><span>News</span></a></li>
                            <li><a href="contact.php"><span>Contact Us</span></a></li>
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
            <section class="recruit-page" id="recruit">
                <div class="c-w1100">
                    <h2 class="sec-ttl">Recruit</h2>
                    <?php if(isset($_GET['recruit'])) : ?>
                    <div class="tab-block">
                        <ul class="tabs col-wrap tabs-ls">
                            <li class="col2 tab <?php if($_GET['recruit']=="engineer"): echo "active"; else: echo ""; endif; ?>">
                                <a href="#engineer" class="tabs-btnLink" onclick="test1()"><div class="tabs-btn">Engineer Position</div></a>
                            </li>
                            <li class="col2 tab <?php if($_GET['recruit']=="HR"): echo "active"; else: echo ""; endif;?>">
                                <a href="#HR" class="tabs-btnLink" onclick="test2()"><div class="tabs-btn">HR Position</div></a>
                            </li>
                        </ul>
                    </div>
                    <div class="form-block panels">
                        <div id="engineer" class="panel  <?php if($_GET['recruit']=="engineer"): echo "active";else: echo ""; endif; ?>">A
                            <form action="form/engineer-position.php" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
                                <div class="form-row form-mb">
                                    <div class="form-col2">
                                        <label for="" class="form-label">Full Name<span class="require">*</span></label>
                                        <div class="form-inputText">
                                            <input type="text" class="inputType" name="name" id="name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-col2">
                                        <label for="" class="form-label">E-mail Address<span class="require">*</span></label>
                                        <div class="form-inputText">
                                            <input type="email" class="inputType" name="email" id="email" placeholder="Mail">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row form-mb">
                                    <div class="form-col2">
                                        <label for="" class="form-label">Date of Birth<span class="require">*</span></label>
                                        <div class="form-inputText">
                                            <input type="date" class="inputType" name="selectYear" id="selectYear" placeholder="Date of Birth">
                                        </div>
                                    </div>
                                    <div class="form-col2">
                                        <label for="" class="form-label">Phone Number<span class="require">*</span></label>
                                        <div class="form-inputText">
                                            <input type="text" class="inputType" name="denwabangou" id="denwabangou" placeholder="Phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row form-mb">
                                    <div class="form-col1">
                                        <label for="" class="form-label">Address</label>
                                        <div class="form-textarea">
                                            <textarea name="area" cols="50" rows="5" placeholder="Address"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row form-mb">
                                    <div class="form-col1">
                                        <label for="skillsheet" class="form-label">CV Form<span class="require">*</span></label>
                                        <div class="form-row form-inputFile">
                                            <div class="form-col2">
                                                <input type="file" name="skillsheet" id="skillsheet" accept=".xlsx,.xls,.csv,.docx,.word,.pdf">
                                            </div>
                                            <p class="file-para" style="font-size: 13px;color:grey;">※Supported Format：「xlsx、xls、csv、docx、word、pdf」</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="my-3">
                                    <div class="loading"></div> 
                                    <div class="error-message" id="engineer-err error-message d-block"></div> 
                                    <div class="sent-message" id="engineer-success">Your email has been sent. Thank you very much!</div> 
                                </div>
                                <div class="form-row">
                                    <div class="form-col1">
                                        <div class="sendBtn">
                                            <button type="submit" class="send-btn" style="width: 640px;margin-top: 33px;border:none">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="HR" class="panel <?php if($_GET['recruit']=="HR"): echo "active"; else: echo ""; endif;?>">B
                            <form action="form/hr-position.php" method="post" role="form" class="php-email-form" enctype="multipart/form-data"> 
                                <div class="form-row form-mb">
                                    <div class="form-col2">
                                        <label for="" class="form-label">Full Name<span class="require">*</span></label>
                                        <div class="form-inputText">
                                            <input type="text" class="inputType" name="hr-name" id="hr-name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-col2">
                                        <label for="" class="form-label">E-mail Address<span class="require">*</span></label>
                                        <div class="form-inputText">
                                            <input type="email" class="inputType" name="hr-email" id="hr-email" placeholder="Mail">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row form-mb">
                                    <div class="form-col2">
                                        <label for="hr-selectYear" class="form-label">Date of Birth<span class="require">*</span></label>
                                        <div class="form-inputText">
                                            <input type="date" class="inputType" name="hr-selectYear" id="hr-selectYear" placeholder="Date of Birth">
                                        </div>
                                    </div>
                                    <div class="form-col2">
                                        <label for="hr-denwabangou" class="form-label">Phone Number<span class="require">*</span></label>
                                        <div class="form-inputText">
                                            <input type="text" class="inputType" name="hr-denwabangou" id="hr-denwabangou" placeholder="Phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row form-mb">
                                    <div class="form-col1">
                                        <label for="hr-area" class="form-label">Address</label>
                                        <div class="form-textarea">
                                            <textarea name="hr-area" cols="50" rows="5" placeholder="Address"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row form-mb">
                                    <div class="form-col1">
                                        <label for="hr-skillsheet" class="form-label">CV Form<span class="require">*</span></label>
                                        <div class="form-row form-inputFile">
                                            <div class="form-col2">
                                                <input type="file" name="hr-skillsheet" id="hr-skillsheet" accept=".xlsx,.xls,.csv,.docx,.word,.pdf">
                                            </div>
                                            <p class="file-para" style="font-size: 13px;color:grey;">※Supported Format：「xlsx、xls、csv、docx、word、pdf」</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="my-3" id="hr-err-success">
                                    <div class="loading"></div> 
                                    <div class="error-message" id="hr-err error-message d-block"></div> 
                                    <div class="sent-message" id="hr-success">Your email has been sent. Thank you very much!</div> 
                                </div>
                                <div class="form-row">
                                    <div class="form-col1">
                                        <div class="sendBtn">
                                            <button type="submit" class="send-btn" style="width: 640px;margin-top: 33px;border:none">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php else: ?>
                        <div class="tab-block">
                        <ul class="tabs col-wrap tabs-ls">
                            <li class="col2 tab active">
                                <a href="#engineer" class="tabs-btnLink" onclick="test1()"><div class="tabs-btn">Engineer Position</div></a>
                            </li>
                            <li class="col2 tab">
                                <a href="#HR" class="tabs-btnLink" onclick="test2()"><div class="tabs-btn">HR Position</div></a>
                            </li>
                        </ul>
                    </div>
                    <div class="form-block panels">
                        <div id="engineer" class="panel active">A
                            <form action="form/engineer-position.php" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
                                <div class="form-row form-mb">
                                    <div class="form-col2">
                                        <label for="" class="form-label">Full Name<span class="require">*</span></label>
                                        <div class="form-inputText">
                                            <input type="text" class="inputType" name="name" id="name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-col2">
                                        <label for="" class="form-label">E-mail Address<span class="require">*</span></label>
                                        <div class="form-inputText">
                                            <input type="email" class="inputType" name="email" id="email" placeholder="Mail">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row form-mb">
                                    <div class="form-col2">
                                        <label for="" class="form-label">Date of Birth<span class="require">*</span></label>
                                        <div class="form-inputText">
                                            <input type="date" class="inputType" name="selectYear" id="selectYear" placeholder="Date of Birth">
                                        </div>
                                    </div>
                                    <div class="form-col2">
                                        <label for="" class="form-label">Phone Number<span class="require">*</span></label>
                                        <div class="form-inputText">
                                            <input type="text" class="inputType" name="denwabangou" id="denwabangou" placeholder="Phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row form-mb">
                                    <div class="form-col1">
                                        <label for="" class="form-label">Address</label>
                                        <div class="form-textarea">
                                            <textarea name="area" cols="50" rows="5" placeholder="Address"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row form-mb">
                                    <div class="form-col1">
                                        <label for="skillsheet" class="form-label">CV Form<span class="require">*</span></label>
                                        <div class="form-row form-inputFile">
                                            <div class="form-col2">
                                                <input type="file" name="skillsheet" id="skillsheet" accept=".xlsx,.xls,.csv,.docx,.word,.pdf">
                                            </div>
                                            <p class="file-para" style="font-size: 13px;color:grey;">※Supported Format：「xlsx、xls、csv、docx、word、pdf」</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="my-3">
                                    <div class="loading"></div> 
                                    <div class="error-message" id="engineer-err error-message d-block"></div> 
                                    <div class="sent-message" id="engineer-success">Your email has been sent. Thank you very much!</div> 
                                </div>
                                <div class="form-row">
                                    <div class="form-col1">
                                        <div class="sendBtn">
                                            <button type="submit" class="send-btn" style="width: 640px;margin-top: 33px;border:none">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="HR" class="panel">B
                            <form action="form/hr-position.php" method="post" role="form" class="php-email-form" enctype="multipart/form-data"> 
                                <div class="form-row form-mb">
                                    <div class="form-col2">
                                        <label for="" class="form-label">Full Name<span class="require">*</span></label>
                                        <div class="form-inputText">
                                            <input type="text" class="inputType" name="hr-name" id="hr-name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-col2">
                                        <label for="" class="form-label">E-mail Address<span class="require">*</span></label>
                                        <div class="form-inputText">
                                            <input type="email" class="inputType" name="hr-email" id="hr-email" placeholder="Mail">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row form-mb">
                                    <div class="form-col2">
                                        <label for="hr-selectYear" class="form-label">Date of Birth<span class="require">*</span></label>
                                        <div class="form-inputText">
                                            <input type="date" class="inputType" name="hr-selectYear" id="hr-selectYear" placeholder="Date of Birth">
                                        </div>
                                    </div>
                                    <div class="form-col2">
                                        <label for="hr-denwabangou" class="form-label">Phone Number<span class="require">*</span></label>
                                        <div class="form-inputText">
                                            <input type="text" class="inputType" name="hr-denwabangou" id="hr-denwabangou" placeholder="Phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row form-mb">
                                    <div class="form-col1">
                                        <label for="hr-area" class="form-label">Address</label>
                                        <div class="form-textarea">
                                            <textarea name="hr-area" cols="50" rows="5" placeholder="Address"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row form-mb">
                                    <div class="form-col1">
                                        <label for="hr-skillsheet" class="form-label">CV Form<span class="require">*</span></label>
                                        <div class="form-row form-inputFile">
                                            <div class="form-col2">
                                                <input type="file" name="hr-skillsheet" id="hr-skillsheet" accept=".xlsx,.xls,.csv,.docx,.word,.pdf">
                                            </div>
                                            <p class="file-para" style="font-size: 13px;color:grey;">※Supported Format：「xlsx、xls、csv、docx、word、pdf」</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="my-3" id="hr-err-success">
                                    <div class="loading"></div> 
                                    <div class="error-message" id="hr-err error-message d-block"></div> 
                                    <div class="sent-message" id="hr-success">Your email has been sent. Thank you very much!</div> 
                                </div>
                                <div class="form-row">
                                    <div class="form-col1">
                                        <div class="sendBtn">
                                            <button type="submit" class="send-btn" style="width: 640px;margin-top: 33px;border:none">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php endif; ?>
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
        function onSubmit(token) {
            document.getElementById("engineer-position").submit();
        }
        function onSubmit(token) {
            document.getElementById("hr-position").submit();
        }
    </script>
    <!-- wrapper -->
    <script src="./assets/js/common.js"></script>
    <script src="/home-page/assets/vendor/php-email-form/validate.js"></script>
</body>
</html>