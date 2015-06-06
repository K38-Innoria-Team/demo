<?php require_once("headPage.php"); ?>
<body>
<div class="Page">
    <?php require_once("header.php"); ?>
    <div class="Content">
        <p style="text-align: center"><img src="<?php echo base_url(); ?>assets/img/step3.png" width="18%"></p>
        <div class="item active">
            <div class="Information">
                <b style="font-size:20px; padding-left:100px">ACCOUNT INFORMATION</b>

                <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/Home/step4">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Firstname</label>
                        <div class="col-sm-5">
                            <input name="txtFirstName" type="text" class="form-control" placeholder="Your firstname" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Lastname</label>
                        <div class="col-sm-5">
                            <input name="txtLastName" type="text" class="form-control" placeholder="Your lastname" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-5">
                            <input name="txtEmail" type="email" class="form-control" placeholder="example@mail.com" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Phone number</label>
                        <div class="col-sm-5">
                            <input name="txtPhone" type="text" class="form-control" placeholder="Your phone number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Birthday</label>
                        <div class="col-sm-5">
                            <input name="txtBirthday" type="date" class="form-control" placeholder="Your birthday" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-5">
                            <input name="txtPassword" type="password" class="form-control" placeholder="Your password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button name="btnSubmit" type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </div>
                    <?php 
                        echo '<input type="hidden" name="dis_id" value="'.$dis_id.'">';
                        echo '<input type="hidden" name="ser_id" value="'.$ser_id.'">'; 
                    ?>
                </form>
            </div>
        </div>
    </div>
    <?php require_once("footer.php"); ?>
</div>
</body>
