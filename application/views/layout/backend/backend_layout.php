<!-- Header -->
<!DOCTYPE html>
<html>
    <head>
        <title>Codeigniter 3 Workshop</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/theme-amber.css?a=2">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/img/front/logo.png">
        <link rel="stylesheet" href="assets/sweetalert/css/sweetalert2.css">
        <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Srisakdi">
    </head>
    <body>
        <div class="khe-row khe-padding khe-theme-d6 khe-xlarge">
            <div class="khe-quarter">
                <h2 class="khe-animate-left">Codeigniter 3 Workshop</h2>
                <div class="khe-display-topright  khe-margin-right" id="clock" >15:03:20</div>
                <?php if ($this->session->userdata('username')) {?>
                    <div class="khe-display-topright  khe-margin-top khe-margin-right" >
                        <span>Welcome : <?php echo $this->session->userdata('fname') . " " . $this->session->userdata('lname') ?></span>&nbsp;
                        <a href="profile"><i class="fa fa-user" aria-hidden="true" title="ดูโปรไฟล์ของคุณ"></i></a>
                        <a href="logout"><i class="fa fa-times-circle" aria-hidden="true" title="ออกจาหระบบ"></i></a>
                    </div>
                <?php } elseif ($this->session->userdata('admin_user')) {?>
                  <div class="khe-display-topright  khe-margin-top khe-margin-right" >
                        <span>Hi : <?php echo $this->session->userdata('admin_user') ?></span>&nbsp;
                        <a href="logout"><i class="fa fa-times-circle" aria-hidden="true" title="ออกจากระบบ"></i></a>
                    </div>
                <?php } else {?>
                  <div class="khe-display-topright  khe-margin-top khe-margin-right" >
                    <a href="#login" onclick="document.getElementById('login').style.display='block'"><i class="fa fa-sign-in" aria-hidden="true" title="เข้าสู่ระบบ"></i></a>&nbsp;
                    <a href="#register" onclick="document.getElementById('register').style.display='block'"><i class="fa fa-user-plus" aria-hidden="true" title="สมัครสมาชิก"></i></a>
                  </div>
               <?php }?>
            </div>
        </div>
<!-- Header -->
        <!-- model_login -->
<div id="login" class="khe-modal">
    <div class="khe-modal-content khe-card-4 khe-animate-zoom" style="max-width:600px">

      <div class="khe-center"><br>


        <span onclick="document.getElementById('login').style.display='none'" class="khe-button khe-xlarge khe-hover-red khe-display-topright" title="Close Modal">&times;</span>
        <h1>กรุณาเข้าสู่ระบบ</h1>
      </div>

      <form class="khe-container" action="login" method="post" id="form_login" name="form_login">
        <div class="khe-section">
          <label><b>Username</b></label>
          <input class="khe-input khe-border khe-margin-bottom" type="text" placeholder="Enter Username" name="username" id="user_login" required>
          <label><b>Password</b></label>
          <input class="khe-input khe-border" type="password" placeholder="Enter Password" name="password" id="pass_login" required>
          <input type="checkbox" onclick="show_pass()">Show Password
          <button onclick="alert_login();" class="khe-button khe-block khe-green khe-section khe-padding" type="button" id="btn_login" >Login</button>

        </div>
      </form>

      <div class="khe-container khe-border-top khe-padding-16 khe-light-grey">
        <button onclick="document.getElementById('login').style.display='none'" type="button" class="khe-button khe-red">Cancel</button>
      </div>
    </div>
</div>
<!-- model_login -->

<!-- model register -->
<div class="khe-container">
  <div id="register" class="khe-modal">
    <div class="khe-modal-content">
      <header class="khe-container khe-teal">
        <span onclick="document.getElementById('register').style.display='none'"
        class="khe-button khe-display-topright">&times;</span>
        <center><h2>Register</h2></center>
      </header>
      <div class="khe-container">
          <form class="khe-container"action="register" method="post" enctype="multipath/form-data">
                <input class="khe-input" type="hidden" name="status" value="1">
                <p>
                <input class="khe-input" type="text" name="fname" id="fname" value="" required placeholder="ใส่ชื่อของคุณ" onblur="check_fname();" >
                <label>First Name <span id="w_fname"></span></label></p>
                <p>
                <input class="khe-input" type="text" name="lname" id="lname" value="" required placeholder="ใส่นามสกุลของคุณ" onblur="check_lname();">
                <label>Last Name <span id="w_lname"></span></label></p>
                <p>
                <p>
                <input class="khe-input" type="email" name="email" id="email" value="" required placeholder="กรุณากรอกอีเมล" onblur="check_email();">
                <label>Email <span id="w_email"></span></label></p>
                <p>
                <input class="khe-input" type="text" name="username" id="username" value="" required placeholder="กรอกตัวหนังสือภาษาอังกฤษ อย่างน้อย 8 ตัว" onblur="check_user();">
                <label>Username <span id="w_user"></span></label></p>
                <p>
                <input class="khe-input" type="password" name="password" id="password" value="" required placeholder="กรอกตัวเลขอย่างน้อย 8 ตัว" onblur="check_pass();">
                <label>Password <span id="w_pass"></span></label></p>
                <input type="checkbox" onclick="rgt_show()">Show Password
                <p>
                  <button type="submit"  class="khe-btn khe-green khe-border" id="btn_register">Register</button>
                  <button class="khe-btn khe-red khe-border" onclick="document.getElementById('register').style.display='none'" type="button" class="khe-button khe-red">Cancel</button>
                </p>

          </form>
      </div>

    </div>
  </div>
</div>
<!-- model register -->

<!-- page -->
<div>
    <?php
if (isset($content)) {
    echo $content;
}
?>
</div>
<!-- page -->
<!-- footer -->
<div class="khe-container khe-theme-d6">
    <p class="khe-large khe-animate-left">Wiraphat Chorakhe</p>
</div>
<!-- footer -->
        <script src="assets/jquery/jquery-3.5.1.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/sweetalert/js/sweetalert2.min.js"></script>

    </body>
</html>
<!-- footer -->