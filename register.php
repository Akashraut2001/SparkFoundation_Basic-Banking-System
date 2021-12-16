<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Create user!</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Gabriela&display=swap" rel="stylesheet">
    <style>
       *{
            
            box-sizing:border-box ;
        }
        .row{
            background: white;
            border-radius: 30px;
            box-shadow: 12px 12px 12px;
        }
        .login img{
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
        }
        .login h1{
            font-size: 3rem;
            font-weight: 400;
            font-family: 'Anton', sans-serif;
            font-family: 'Gabriela', serif;
        }
        .inp{
            height:50px;
            width: 70%;
            border: none;
            outline: none;
            border-radius:60px;
            -webkit-box-shadow: -1px 1px 30px -11px rgb(248, 248, 248);
            -moz-box-shadow: -1px 1px 30px -11px rgb(255, 255, 255);
            box-shadow: -1px 1px 30px -11px rgb(192, 109, 157);
        }
        .btn1{
            height:50px;
            width:50%;
            border:none;
            outline: none;
            border-radius: 60px;
            font-weight: 600;
            background: rgb(223,56,56);
            color: white;
        }
        .btn1:hover{
            background: rgb(143, 61, 61);
            transition:0.5s;
        }
        

        #sideNav{
            width: 250px;
            height: 100vh;
            position: fixed;
            right: -250px;
            top:0;
            background:	#9370db;
            z-index: 2;
            transition: .5s;
        }
        nav ul li{
            list-style: none;
            margin: 50px 20px;
        }
        nav ul li a{
            text-decoration: none;
            color: #fff;
        }
        #menuBtn{
            width: 50px;
            position: fixed;
            right: 65px;
            top: 35px;
            z-index: 2;
            cursor: pointer;
        }
 </style>
  </head>
  <body >
	<?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $gender = $_POST['gender'];
                    $balance=$_POST['balance'];
                
                // Connecting to the Database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "shubham";

                // Create a connection
                $conn = mysqli_connect($servername, $username, $password, $database);
                // Die if connection was not successful
                if (!$conn){
                    die("Sorry we failed to connect: ". mysqli_connect_error());
                }
                else{ 
                    // Submit these to a database
                    // Sql query to be executed 
                    $sql = "INSERT INTO `users` (`Name`, `Email Id`, `Gender`, `Balance`) VALUES ('$name', '$email', '$gender', $balance)";
                    $result = mysqli_query($conn, $sql);
            
                    if($result){
                    echo "<div class='alert alert-success alert-dismissible fade show hide' role='alert'>
                    <strong>Success!</strong> Your entry has been submitted successfully!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span class='errorClose' aria-hidden='true'>×</span>
                    </button>
                    </div>";
                    }
                    else{
                        // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
                        echo "<div class='alert alert-danger alert-dismissible fade show hide' role='alert'>
                    <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span class='errorClose' aria-hidden='true'>×</span>
                    </button>
                    </div>";
                    }

                }

            }

                
        ?>
 
        <section class="login py-5 bg-light">

        
        <img src="images/menu.png" id="menuBtn">
            <div class="container pt-3">
                <div class="row g-0 pt-5">
                    <div class=" ps-5 pt-5 mt-5 col-lg-5 ">
                        <img src="images/cust.jfif" class="img-fluid">
                    </div>
                    <div class="col-lg-7 text-center py5">
                        <h1>Create New User</h1>
                        <form action="Register.php" method="post">
                            <div class="form-row py-3 pt-5">
                                <div class="offset-1 col-lg-10">
                                    <input type="text" name="name" class="inp px-3" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-row pt-4">
                                <div class="offset-1 col-lg-10">
                                    <input name="email" type="email" class="inp px-3" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-row pt-5 ">
                                <div  class="  offset-1 col-lg-10">
                                    <select  name="gender" class="inp px-3 form-selec " aria-label="Default select example">
                                        <option selected>Select Gender</option>
                                        <option value="F">Female</option>
                                        <option value="M">Male</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row pt-5 ">
                                <div class="offset-1 col-lg-10">
                                    <input id="balance" name="balance" type="text" class="inp px-3" placeholder="Balance">
                                </div>
                            </div>
                            <div class="form-row pt-5 pb-5">
                                <div class="offset-1 col-lg-10">
                                    <button type="submit" class="btn1">SUBMIT</BUTTON>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                        


        </section>
        <nav id="sideNav">
            <ul>
                <li><a href="index.html">HOME</a></li>
                <li><a href="users.php">OUR CUSTOMERS</a></li>
                <li><a href="history.php">TRANSACTION HISTORY</a></li>
                <li><a href="users.php">TRANSFER MONEY</a></li>
                <li><a href="Register.php">NEW USER</a></li>
            </ul>
        </nav>
        <div id="hojaplz">
        <img src="images/menu.png" id="menuBtn">
</div>

        <script>
           let menuBtn = document.querySelector('#hojaplz');
            let sideNav = document.querySelector('#sideNav')
            let errorClose = document.querySelector('.errorClose')
            let hide= document.querySelector('.hide')
            let balance= document.querySelector('balance')
        
            let condition = true;

           menuBtn.addEventListener('click',function(){
               if(condition){
                   sideNav.style.right = '0px';
                   condition = false;
               }else{
                sideNav.style.right = '-250px';
                condition = true;
               }

           })

           errorClose.addEventListener('click',function(){
             hide.style.display='none'
           })
           
        </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    
  <div style="text-align: right;position: fixed;z-index:9999999;bottom: 0;width: auto;right: 1%;cursor: pointer;line-height: 0;display:block !important;"><a title="Hosted on free web hosting 000webhost.com. Host your own website for FREE." target="_blank" href="https://www.000webhost.com/?utm_source=000webhostapp&utm_campaign=000_logo&utm_medium=website&utm_content=footer_img"><img src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png" alt="www.000webhost.com"></a></div><script>function getCookie(t){for(var e=t+"=",n=decodeURIComponent(document.cookie).split(";"),o=0;o<n.length;o++){for(var i=n[o];" "==i.charAt(0);)i=i.substring(1);if(0==i.indexOf(e))return i.substring(e.length,i.length)}return""}getCookie("hostinger")&&(document.cookie="hostinger=;expires=Thu, 01 Jan 1970 00:00:01 GMT;",location.reload());var wordpressAdminBody=document.getElementsByClassName("wp-admin")[0],notification=document.getElementsByClassName("notice notice-success is-dismissible"),hostingerLogo=document.getElementsByClassName("hlogo"),mainContent=document.getElementsByClassName("notice_content")[0];if(null!=wordpressAdminBody&&notification.length>0&&null!=mainContent){var googleFont=document.createElement("link");googleFontHref=document.createAttribute("href"),googleFontRel=document.createAttribute("rel"),googleFontHref.value="https://fonts.googleapis.com/css?family=Roboto:300,400,600,700",googleFontRel.value="stylesheet",googleFont.setAttributeNode(googleFontHref),googleFont.setAttributeNode(googleFontRel);var css="@media only screen and (max-width: 576px) {#main_content {max-width: 320px !important;} #main_content h1 {font-size: 30px !important;} #main_content h2 {font-size: 40px !important; margin: 20px 0 !important;} #main_content p {font-size: 14px !important;} #main_content .content-wrapper {text-align: center !important;}} @media only screen and (max-width: 781px) {#main_content {margin: auto; justify-content: center; max-width: 445px;}} @media only screen and (max-width: 1325px) {.web-hosting-90-off-image-wrapper {position: absolute; max-width: 95% !important;} .notice_content {justify-content: center;} .web-hosting-90-off-image {opacity: 0.3;}} @media only screen and (min-width: 769px) {.notice_content {justify-content: space-between;} #main_content {margin-left: 5%; max-width: 445px;} .web-hosting-90-off-image-wrapper {position: absolute; display: flex; justify-content: center; width: 100%; }} .web-hosting-90-off-image {max-width: 90%;} .content-wrapper {min-height: 454px; display: flex; flex-direction: column; justify-content: center; z-index: 5} .notice_content {display: flex; align-items: center;} * {-webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;} .upgrade_button_red_sale{box-shadow: 0 2px 4px 0 rgba(255, 69, 70, 0.2); max-width: 350px; border: 0; border-radius: 3px; background-color: #ff4546 !important; padding: 15px 55px !important; font-family: 'Roboto', sans-serif; font-size: 16px; font-weight: 600; color: #ffffff;} .upgrade_button_red_sale:hover{color: #ffffff !important; background: #d10303 !important;}",style=document.createElement("style"),sheet=window.document.styleSheets[0];style.styleSheet?style.styleSheet.cssText=css:style.appendChild(document.createTextNode(css)),document.getElementsByTagName("head")[0].appendChild(style),document.getElementsByTagName("head")[0].appendChild(googleFont);var button=document.getElementsByClassName("upgrade_button_red")[0],link=button.parentElement;link.setAttribute("href","https://www.hostinger.com/hosting-starter-offer?utm_source=000webhost&utm_medium=panel&utm_campaign=000-wp"),link.innerHTML='<button class="upgrade_button_red_sale">Go for it</button>',(notification=notification[0]).setAttribute("style","padding-bottom: 0; padding-top: 5px; background-color: #040713; background-size: cover; background-repeat: no-repeat; color: #ffffff; border-left-color: #040713;"),notification.className="notice notice-error is-dismissible";var mainContentHolder=document.getElementById("main_content");mainContentHolder.setAttribute("style","padding: 0;"),hostingerLogo[0].remove();var h1Tag=notification.getElementsByTagName("H1")[0];h1Tag.className="000-h1",h1Tag.innerHTML="Black Friday Prices",h1Tag.setAttribute("style",'color: white; font-family: "Roboto", sans-serif; font-size: 22px; font-weight: 700; text-transform: uppercase;');var h2Tag=document.createElement("H2");h2Tag.innerHTML="Get 90% Off!",h2Tag.setAttribute("style",'color: white; margin: 10px 0 15px 0; font-family: "Roboto", sans-serif; font-size: 60px; font-weight: 700; line-height: 1;'),h1Tag.parentNode.insertBefore(h2Tag,h1Tag.nextSibling);var paragraph=notification.getElementsByTagName("p")[0];paragraph.innerHTML="Get Web Hosting for $0.99/month + SSL Certificate for FREE!",paragraph.setAttribute("style",'font-family: "Roboto", sans-serif; font-size: 16px; font-weight: 700; margin-bottom: 15px;');var list=notification.getElementsByTagName("UL")[0];list.remove();var org_html=mainContent.innerHTML,new_html='<div class="content-wrapper">'+mainContent.innerHTML+'</div><div class="web-hosting-90-off-image-wrapper"><img class="web-hosting-90-off-image" src="https://cdn.000webhost.com/000webhost/promotions/bf-2020-wp-inject-img.png"></div>';mainContent.innerHTML=new_html;var saleImage=mainContent.getElementsByClassName("web-hosting-90-off-image")[0]}</script></body>
</html>