
<?php echo validation_errors();?>

<div class='row'>
    <div class='col-md-4 offset-md-4'>
        
        <?php echo form_open('user/register'); ?>
        <h2 class='text-center'><?php echo $title ;?></h2>
            <div class='form-group'>
                <label>Name</label>
                <input type='text' name='name' class='form-control' placeholder='Enter Your Name'>
            </div>
                        <div class='form-group'>
                <label>Username</label>
                <input type='text' name='user_name' class='form-control' placeholder='Enter Your  User Name'>
            </div>
            <div class='form-group'>
                <label>Password</label>
                <input type='password' name='password' class='form-control'>
            </div>
            <div class='form-group'>
                <label>Re-Enter Password</label>
                <input type='password' name='confirm_password' class='form-control' >
            </div>
            <div class='form-group'>
                <label>Email</label>
                <input type='email' name='email' class='form-control' placeholder='Enter Your Email Adress Here'>
            </div>
        <button type='submit' class='btn btn-primary btn-block'>Register</button>
        <?php echo form_close();?>
    </div>                     
</div>

