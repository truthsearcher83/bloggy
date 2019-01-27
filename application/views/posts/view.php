
    <h4 class='blog-title'><strong><?php echo $post['title'];?></strong></h4>
    <p><i><?php echo 'In &nbsp'. $post['category_name']; ?></i></p>
    <div class="post_date"<small>Posted On :<?php echo $post['created_on'];?> </small></div>
    <img src="<?php echo base_url()."asset/images/posts/".$post['post_image'];?>"><br/>
    <p><?php echo $post['body'];?></p>
    
    <?php if (($this->session->userdata('user_id'))== $post['user_id']):?>
    <?php echo form_open('posts/delete/'.$post['id']);?>
    <a class="btn btn-success" href="<?php echo base_url(). 'posts/edit/'.$post['slug'];?>">Edit</a>
    <button  class="btn btn-danger" >Delete</button>
    <?php echo form_close();?>
    <?php endif ;?>
   
    <h3>Post A Comment </h3>
    <?php echo validation_errors() ;?>
    <?php echo form_open('comments/add/'.$post['id']);?>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" >
        </div>
    <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" >
        </div>

        <div class="form-group">
          <label>Comment </label>
          <textarea class="form-control"  name="comment_body"></textarea>
        </div>   

        <input type='hidden' name='slug' value='<?php echo $post['slug'];?>'>

        <button type="submit" class="btn btn-primary">Comment</button>
  
    <?php echo form_close();?>
    
    <h3>Comments</h3>
    <?php if($comments) :?>
        <?php foreach($comments as $comment):?>
            <div class='card card-body bg-light'>
                <h5>By <?php echo $comment['name'];?></h5>
                <p><?php echo $comment['comment_body'];?></p>
            </div>
        <?php endforeach;?>
    <?php else :?>
    <h5>No Comments To Display</h5>
    <?php endif;?>

        
    

