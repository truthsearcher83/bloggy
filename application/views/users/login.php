<?php echo validation_errors();?>

<?php if($this->session->flashdata('user_registered')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
   <?php endif; ?>



<div class='row'>
    <div class='col-md-4 offset-md-4'>
        
        <?php echo form_open('user/login'); ?>
        <h2 class='text-center'><?php echo $title ;?></h2>
            <div class='form-group'>
                <label>Username</label>
                <input type='text' name='user_name' class='form-control' placeholder='Enter Your  User Name'>
            </div>
            <div class='form-group'>
                <label>Password</label>
                <input type='password' name='password' class='form-control'>
            </div>
        <button type='submit' class='btn btn-primary btn-block'>Login</button>
        <?php echo form_close();?>
    </div>                     
</div>



