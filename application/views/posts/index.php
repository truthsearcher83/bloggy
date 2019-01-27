
<h1><?php echo $title; ?></h1><br/>
<?php foreach($posts as $post):?>
    
    <div class =" post-row row">
        <div class="col-md-3">
            <img class = "post-thumb" src="<?php echo base_url().'asset/images/posts/'.$post['post_image'];?>">
        </div>
        <div class="col-md-9">
            <h4 class='blog-title'><strong><?php echo $post['title'];?></strong></h4>
            <p><i><?php echo 'In &nbsp'. $post['category_name']; ?></i></p>
            <div class="post_date"<small>Posted On :<?php echo $post['created_on'];?> </small></div>
            <p><?php echo word_limiter($post['body'], 60)?></p>
            <a class="btn btn-primary read_more" href="<?php echo base_url('posts').'/'.$post['slug'];?>">Read More</a>
        </div>
    </div>
<?php endforeach; ?>
<div class =" pagination-links">
    <?php echo $this->pagination->create_links(); ?>
</div>



