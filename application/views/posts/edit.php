<div class='create_post'>
    <h4 class='blog-title'><strong><?php echo $title;?></strong></h4>
    <?php if(isset($errors)){
    echo $errors;
}?>

    <?php  echo form_open_multipart('posts/update');?>
 
      <div class="form-group">
        <label>Post Title</label>
        <input type="text" class="form-control" name="title" value='<?php echo $post['title'];?>' placeholder="Enter post title">
      </div>
    
      <div class="form-group">
        <label>Blog</label>
        <textarea class="form-control"  id ='editor1' name="body"><?php echo $post['body'];?></textarea>
      </div>
    
     <div class ="form-group">
        <label>Category </label>
        <select class="form-control" name="category">
                 <?php foreach($categories as $category):?>
                    <option value="<?php echo $category['id'] ;?>" 
                    <?php if($post['category_id']== $category['id']) {echo "selected = selected";}?>><?php echo $category['category_name'];?></option>
                 <?php endforeach; ?>
        </select>
    </div>
    
    <div class="form-group">
            <label>Upload Image</label>
            <input type="file" name="userfile" size="20">
    </div>
    
    <input type='hidden' name='id' value='<?php echo $post['id'];?>'>
    <input type='hidden' name='slug' value='<?php echo $post['slug'];?>'>
    
    <button type="submit" class="btn btn-primary">Update</button>
    
    <?php echo form_close();?> 

</div>