<div class="khe-container khe-padding-15 khe-theme-light">
    <h2 class="khe-animate-right">พื้นฐานการใช้งาน CRUD</h2>
</div>

<div class="khe-row-padding khe-theme-light" style="padding:20px;">


        <form action="serch_data" method="post">
           <input type="text" name="serch" id="serch" placeholder="ค้นหาจากชื่อ" required>
           <button class="khe-button khe-pink">Serch</button>
        </form>


    <div style="text-align:right;padding-bottom:5px;">
        <a href="admin"><p><button class="khe-button khe-teal">Back</button></p></a>
    </div>
    <table class="khe-table-all khe-card-4 khe-animate-opacity">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Image</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>

                    <th>Action</th>
                </tr>
            <?php foreach ($user as $row) {?>
                <tr class="khe-hover-green">
                        <td><?php echo $row->m_id ?></td>
                        <td><?php echo $row->m_fname ?></td>
                        <td><?php echo $row->m_lname ?></td>
                        <td><img src="uploads/<?php echo $row->m_img; ?>" alt="" width="200" hight="100"></td>
                        <td><?php echo $row->m_user ?></td>
                        <td>***************</td>
                        <td><?php echo $row->m_email ?></td>
                    <td>
                        <a href="update_form?id=<?php echo $row->m_id; ?>"><i class="fa fa-pencil-square-o fa-2x" title="แก้ไขข้อมูล"></a></i>&nbsp;&nbsp;&nbsp;
                        <a href="delete_user?del=<?php echo $row->m_id ?>"onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash-o fa-2x" title="ลบข้อมูล"></i></a>

                    </td>
                </tr>
            <?php }?>
    </table>
</div>


