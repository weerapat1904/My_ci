<!DOCTYPE html>
<html>
    <head>
        <title>Codeigniter 3 Workshop</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/style.css?a=2">
        <link rel="stylesheet" href="assets/css/theme-amber.css?a=2">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/img/front/logo.png">
    </head>
    <body>
        <div class="khe-row khe-padding khe-theme-d6 khe-xlarge">
            <div class="khe-quarter">
                <h2 class="khe-animate-left">Codeigniter 3 Workshop</h2>
                <?php if ($this->session->userdata('username')) {?>
                    <div class="khe-display-topright  khe-margin-top khe-margin-right" >
                        <span>Welcome : <?php echo $this->session->userdata('fname') . " " . $this->session->userdata('lname') ?></span>&nbsp;
                        <a href="profile"><i class="fa fa-user" aria-hidden="true"></i></a>
                        <a href="logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                    </div>
                <?php } elseif ($this->session->userdata('admin_user')) {?>
                  <div class="khe-display-topright  khe-margin-top khe-margin-right" >
                        <span>Hi : <?php echo $this->session->userdata('admin_user') ?></span>&nbsp;
                        <a href="logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                    </div>
                <?php } else {?>
                  <div class="khe-display-topright  khe-margin-top khe-margin-right" >
                    <a href="#login" onclick="document.getElementById('login').style.display='block'"><i class="fa fa-sign-in" aria-hidden="true"></i></a>&nbsp;
                    <a href="#register" onclick="document.getElementById('register').style.display='block'"><i class="fa fa-user-plus" aria-hidden="true"></i></a>
                  </div>
               <?php }?>
            </div>
        </div>
        <!-- model -->
<div id="login" class="khe-modal">
    <div class="khe-modal-content khe-card-4 khe-animate-zoom" style="max-width:600px">

      <div class="khe-center"><br>
        <span onclick="document.getElementById('login').style.display='none'" class="khe-button khe-xlarge khe-hover-red khe-display-topright" title="Close Modal">&times;</span>
        <h1>กรุณาเข้าสู่ระบบ</h1>
      </div>
<!-- Form -->
      <form class="khe-container" action="login" method="post">
        <div class="khe-section">
          <label><b>Username</b></label>
          <input class="khe-input khe-border khe-margin-bottom" type="text" placeholder="Enter Username" name="username" required>
          <label><b>Password</b></label>
          <input class="khe-input khe-border" type="password" placeholder="Enter Password" name="password" required>
          <button class="khe-button khe-block khe-green khe-section khe-padding" type="submit">Login</button>

        </div>
      </form>
 <!-- Form -->

      <div class="khe-container khe-border-top khe-padding-16 khe-light-grey">
        <button onclick="document.getElementById('login').style.display='none'" type="button" class="khe-button khe-red">Cancel</button>

      </div>

    </div>
  </div>
<!-- model -->

<!-- model register -->
<div class="khe-container">
  <div id="register" class="khe-modal">
    <div class="khe-modal-content">
      <header class="khe-container khe-teal">
        <span onclick="document.getElementById('register').style.display='none'"
        class="khe-button khe-display-topright">&times;</span>
        <h2>สมัครสมาชิก</h2>
      </header>
      <div class="khe-container">
      <form class="khe-container"action="register" method="post">
      <input class="khe-input" type="hidden" name="status" value="1">
      <p>
      <input class="khe-input" type="text" name="fname" id="fname" value="" required placeholder="ใส่ชื่อภาษาอังกฤษเท่านั้น" onblur="check_fname();" >
      <label>First Name <span id="w_fname"></span></label></p>
      <p>
      <input class="khe-input" type="text" name="lname" id="lname" value="" required placeholder="ใส่นามสกุลภาษาอังกฤษ" onblur="check_lname();">
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
      <div class="khe-container">
      <p>
        <button type="submit"class="khe-btn khe-green khe-border">Register</button>

        <button class="khe-btn khe-red khe-border" onclick="document.getElementById('register').style.display='none'" type="button" class="khe-button khe-red">Cancel</button>
      </p>
    </div>
    </form>
      </div>

    </div>
  </div>
</div>
<!-- model register -->
