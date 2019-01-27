<div class='create_post'>
    <?php if(isset($errors)){
    echo $errors;
}?>
    <h3> Create Category </h3>
    <?php  echo form_open('category/create');?>
      <div class="form-group">
        <label>Category Name</label>
        <input type="text" class="form-control" name="category_name" >
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
</div>



