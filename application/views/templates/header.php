<html>
        <head>
                <title>My Blog </title>
                <link rel="stylesheet" href="<?php echo base_url();?>asset/css/bootstrap.min.css">
                <link rel="stylesheet" href="<?php echo base_url();?>asset/css/style.css">
                <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
        </head>
        <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php echo base_url();?>">Bloggy</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php  echo base_url();?>">Home </a>
      </li>
       <li class="nav-item">
                <a class="nav-link" href="<?php  echo base_url();?>posts">Blog</a>
        </li>
        <li class="nav-item">
                <a class="nav-link" href="<?php  echo base_url();?>category">Categories</a>
        </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php  echo base_url();?>about">About</a>
      </li>
    </ul>
      <ul class="nav navbar-nav navbar-right">
       <?php if($this->session->userdata('logged_in')):?>
       <li class="nav-item">
        <a class="nav-link" href="<?php  echo base_url();?>user/logoff">Logoff</a>
      </li>
      <?php else :?>
        <li class="nav-item">
        <a class="nav-link" href="<?php  echo base_url();?>user/login">Login</a>
        </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php  echo base_url();?>user/register">Register</a>
      </li>
      <?php endif;?>
      <li class="nav-item">
        <a class="nav-link" href="<?php  echo base_url();?>posts/create">Create Post</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php  echo base_url();?>category/create">Create Category</a>
      </li>
    </ul>
  </div>
</nav>
       <div class="container">
  <!-- Flash Data --> 
  
  <?php if($this->session->flashdata('login_success')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('login_success').'</p>'; ?>
   <?php endif; ?>
<?php if($this->session->flashdata('post_created')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
   <?php endif; ?>
<?php if($this->session->flashdata('post_deleted')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
   <?php endif; ?>
<?php if($this->session->flashdata('post_updated')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
   <?php endif; ?>
  <?php if($this->session->flashdata('category_deleted')): ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('category_deleted').'</p>'; ?>
   <?php endif; ?>
<?php if($this->session->flashdata('category_created')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
   <?php endif; ?>
<?php if($this->session->flashdata('login_failure')): ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failure').'</p>'; ?>
   <?php endif; ?>

               

