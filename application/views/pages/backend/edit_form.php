<div style="text-align:right;padding-bottom:5px;">
    <a href="admin"><p><button class="khe-button khe-teal">Back</button></p></a>
</div>
<form class="khe-container" action="update_data" method="post">
    <input type="hidden" name="id" value="<?php echo $user[0]->m_id;?>">
    <label class="khe-text-blue"><b>First Name</b></label>
    <input  class="khe-input khe-border" type="text" name="fname" value="<?php echo $user[0]->m_fname;?>">
    
    <label class="khe-text-blue"><b>Last Name</b></label>
    <input class="khe-input khe-border" type="text" name="lname" value="<?php echo $user[0]->m_lname;?>">

    <label class="khe-text-blue"><b>Username</b></label>
    <input class="khe-input khe-border" type="text" name="username" value="<?php echo $user[0]->m_user;?>">

    <label class="khe-text-blue"><b>Password</b></label>
    <input class="khe-input khe-border" type="password" name="pass" value="<?php echo $user[0]->m_pass;?>">

    <label class="khe-text-blue"><b>Email</b></label>
    <input class="khe-input khe-border" type="text" name="email" value="<?php echo $user[0]->m_email;?>">
    <button class="khe-btn khe-blue">Submit</button>

</form>