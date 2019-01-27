<div class='create_post'>
    <?php if(isset($errors)){
    echo $errors;
}?>

    <?php  echo form_open_multipart('posts/create');?>
      <div class="form-group">
        <label>Post Title</label>
        <input type="text" class="form-control" name="title"  placeholder="Enter post title">
      </div>
      <div class="form-group">
        <label>Blog</label>
        <textarea id = "editor1" class="form-control" name="body"></textarea>
      </div>
    <div class="form-group">
        <label>Choose Catgeory</label>
        <select class="form-control" name="category">
             <?php foreach($categories as $category):?>
                <option value="<?php echo $category['id'] ;?>"><?php echo $category['category_name'];?></option>
              <?php endforeach; ?>
        </select>
        <div class="form-group">
            <label>Upload Image</label>
            <input type="file" name="userfile" size="20">
        </div>
    </div>
      <button type="submit" class="btn btn-primary">Submit</button>
</div>


