<div class="box">
    <div class="box-header box-primary">
      <h3><center>Upload Profile image </center></h3>
    </div>
    <div class="box-body">
        <form action="productDB.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="size" value="1000000">
          <div class="form-group row">
              <label for="" class="col-sm-4 col-form-label">Upload image</label>
              <div class="col-sm-8">
                <input type="file" class="form-control" id="" name="user_photo" >
              </div>
        </div>
        <button type="submit" class="btn btn-info" name="upload">Upload Image</button>
        </form>
    </div>
  
</div>
