
<h1><?php echo $title; ?></h1><br/>
<ul class="list-group">
    <?php foreach($category as $category):?>
    <a href="<?php echo base_url()."category/posts_in_category/". $category['id'];?>"> <li class="list-group-item"><?php echo $category['category_name'];?></li> </a>
        <?php if ($category['user_id']==$this->session->userdata('user_id')) : ?>
            <form action ="category/delete/<?php echo $category['id'];?>" class = "delete_category" method="post">
            <input type="submit"  class = " btn-link text-danger " value ="[X]">
            </form>
        <?php endif;?>
    <?php endforeach; ?>
       
</ul>
    



