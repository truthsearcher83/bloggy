<h2>POSTS IN CATEGORY :&nbsp;<?php echo $category_name['category_name']; ?> </h2>
<?php if (isset($no_posts)):?>
<h3>No Posts In Category</h3>
<?php else :?>
<?php foreach($posts_in_category as $post):?>
    <h4 class='blog-title'><strong><?php echo $post['title'];?></strong></h4>
    <p><i><?php echo 'In &nbsp'. $post['category_name']; ?></i></p>
    <div class="post_date"<small>Posted On :<?php echo $post['created_on'];?> </small></div>
    <img class  src="<?php echo base_url()."asset/images/posts/".$post['post_image'];?>"><br/>
    <p><?php echo $post['body']?></p>
    <?php echo form_open('posts/delete/'.$post['id']);?>
    <a class="btn btn-success" href="<?php echo base_url(). 'posts/edit/'.$post['slug'];?>">Edit</a>
    <button  class="btn btn-danger" >Delete</button>
<?php endforeach;?>
<?php endif;?>

