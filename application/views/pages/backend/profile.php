<div >
<div class="khe-container" >
  <h2>Profile</h2>

      <div class="khe-row" style="max-width:50%;margin:auto;">
          <a href="#edit_user" onclick="document.getElementById('edit_user').style.display='block'"><i class="fa fa-pencil-square-o fa-3x " aria-hidden="true" title="แก้ไขข้อมูลของคุณ" ></i></a>&nbsp;&nbsp;
          <a href="#upload" onclick="document.getElementById('upload').style.display='block'"><button class="khe-button khe-green " style="margin-top:-30px;">อัพโหลดรูปภาพ</button></a>
          <a href="#delete" onclick="document.getElementById('delete').style.display='block'"><button class="khe-button khe-green " style="margin-top:-30px;">ลบบัญชี</button></a>

          <div class="khe-col s3  khe-left">

          <h4>ชื่อ</h4>
          <h4>นามสกุล</h4>
          <h4>อีเมล</h4>
          <h4>ชื่อผู้ใช้</h4>
          <h4>รหัสผ่าน</h4>
          <h4>รูปภาพ</h4>

      </div>
      <?php foreach ($user1 as $row) {?>
        <div class="khe-col s4  khe-left">
          <h4><?php echo $row->m_fname; ?></h4>
          <h4><?php echo $row->m_lname ?></h4>
          <h4><?php echo $row->m_email; ?></h4>
          <h4><?php echo $row->m_user; ?></h4>
          <h4>**************<h4>
          <img src="uploads/<?php echo $user1[0]->m_img; ?>" alt="" width="250" hight="150">


        </div>
      <?php }?>
  </div>
</div>
</div>
<!-- model edit_user -->

<div class="khe-container">
  <div id="edit_user" class="khe-modal">
    <div class="khe-modal-content">
      <header class="khe-container khe-teal">
            <span onclick="document.getElementById('edit_user').style.display='none'"
            class="khe-button khe-display-topright">&times;</span>
            <h2>แก้ไขข้อมูล</h2>
      </header>
      <div class="khe-container">

          <form class="khe-container"action="edit_member" method="post">

              <input class="khe-input" type="hidden" name="id" value="<?php echo $user1[0]->m_id; ?>">
              <p>
              <input class="khe-input" type="text" name="fname" id="e_fname" value="<?php echo $user1[0]->m_fname; ?>" required placeholder="ใส่ชื่อของคุณ" onblur="edit_fname();" >
              <label>First Name <span id="ew_fname"></span></label></p>
              <p>
              <input class="khe-input" type="text" name="lname" id="e_lname" value="<?php echo $user1[0]->m_lname; ?>" required placeholder="ใส่นามสกุลของคุณ" onblur="edit_lname();" >
              <label>Last Name <span id="ew_lname"></span></label></p>
              <p>
              <p>
              <input class="khe-input" type="email" name="email" id="e_email" value="<?php echo $user1[0]->m_email; ?>" required placeholder="ใส่อีเมลของคุณ" onblur="edit_email();">
              <label>Email <span id="ew_email"></span></label></p>
              <p>
              <input class="khe-input" type="text" name="username" id="e_username" value="<?php echo $user1[0]->m_user; ?>" require placeholder="ใส่ยูเซอร์เนมของคุณ" onblur="edit_user();">
              <label>Username <span id="ew_user"></span></label></p>
              <p>
              <input class="khe-input" type="password" name="password" id="e_password" value="<?php echo $user1[0]->m_pass ?>" required placeholder="ใส่รหัสผ่านของคุณ" onblur="edit_password();">
              <label>Password <span id="ew_password"></span></label></p>
              <input type="checkbox" onclick="edit_show()">Show Password

              <div class="khe-container">
                  <p>
                    <button type="submit" class="khe-btn khe-green khe-border">Edit</button>
                    <button class="khe-btn khe-red khe-border" onclick="document.getElementById('edit_user').style.display='none'" type="button" class="khe-button khe-red">Cancel</button>
                  </p>
              </div>
        </form>


      </div>
    </div>
  </div>
</div>
<!-- model edit_user -->

<!-- upload -->
<div id="upload" class="khe-modal">
    <div class="khe-modal-content khe-card-4">
      <header class="khe-container khe-teal">
        <span onclick="document.getElementById('upload').style.display='none'"
        class="khe-button khe-display-topright">&times;</span>
        <h2>อัพโหลดรูปภาพ</h2>
      </header>
      <div class="khe-container">
       <form action="upload_img" method="post" enctype="multipart/form-data">
       <input class="khe-input" type="file" name="img">
       <input class="khe-input" type="hidden" name="id_img" value="<?php echo $user1[0]->m_id; ?>">
       <input class="khe-input" type="hidden" name="img_old" value="<?php echo $user1[0]->m_img; ?>">
       <button type="submit" class="khe-btn khe-green khe-border">อัพโหลด</button>
       </form>
      </div>
    </div>
  </div>
<!-- upload -->

<div id="delete" class="khe-modal">
    <div class="khe-modal-content" style="width:30%">
        <header class="khe-container khe-teal">
            <span onclick="document.getElementById('delete').style.display='none'"
            class="khe-button khe-display-topright">&times;</span>
            <h4>คุณต้องการลบบัญชี?</h4>
        </header>
        <div class="khe-container" align="center" style="padding-top:30px;padding-bottom:30px;">
            <a href="delete_account?del=<?php echo $row->m_id; ?>"><button class="khe-btn khe-red khe-border" style="width:30%">ยืนยัน</button></a>
            <button class="khe-btn khe-white khe-border" style="width:30%" onclick="document.getElementById('delete').style.display='none'">ยกเลิก</button>
        </div>
    </div>
</div>