<?php
include("connection.php");
session_start();

      if(isset($_POST['productitem'])){
        $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
        $product_description = mysqli_real_escape_string($conn, $_POST['product_description']);
        $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
        $product_unit = mysqli_real_escape_string($conn, $_POST['product_unit']);
        $User_ID = $_SESSION['User_ID'];

      $account = mysqli_query($conn, "INSERT INTO tbl_product(product_name, product_description, product_price,product_unit, User_ID)
      VALUES('$product_name','$product_description','$product_price', '$product_unit', '$User_ID')");
        if(!$account){
          die("Couldn't insert  data" .mysqli_error($conn) );
        }else{
          header("location: dashboard.php");
        }
      }


      if(isset($_POST['client_details'])){
        $Client_name = mysqli_real_escape_string($conn, $_POST['Client_name']);
        $Clint_PhoneNumber = mysqli_real_escape_string($conn, $_POST['Clint_PhoneNumber']);
        $client_email = mysqli_real_escape_string($conn, $_POST['client_email']);
        $postaladdress = mysqli_real_escape_string($conn, $_POST['postaladdress']);
        $client_region = mysqli_real_escape_string($conn, $_POST['client_region']);
        $client_district = mysqli_real_escape_string($conn, $_POST['client_district']);
        $client_street = mysqli_real_escape_string($conn, $_POST['client_street']);
        $client_block = mysqli_real_escape_string($conn, $_POST['client_block']);
        $User_ID = $_SESSION['User_ID'];

      $account = mysqli_query($conn, "INSERT INTO tbl_customer_registraion(Client_name, Clint_PhoneNumber, client_email,postaladdress,client_region,client_district, client_street,client_block, User_ID)
      VALUES('$Client_name','$Clint_PhoneNumber','$client_email', '$postaladdress', '$client_region','$client_district','$client_street', '$client_block', '$User_ID')");
        if(!$account){
          die("Couldn't insert  data" .mysqli_error($conn) );
        }else{
        header("location: dashboard.php");
        }
      }

      if(isset($_POST['upload'])){

      //   $image = $_FILES['user_photo']['name'];
      //   $target = "images/".basename($image);
      //   $User_ID = $_SESSION['User_ID'];
      // //  die("UPDATE user SET user_photo='$image' WHERE User_ID='$User_ID'");
      //   $sql = mysqli_query($conn, "UPDATE user SET user_photo='$image' WHERE User_ID='$User_ID'");
      //   if(!$sql){
      //     die(mysqli_error($conn));
      //   }
      //   if (move_uploaded_file($_FILES['images']['tmp_name'], $target)) {
      //   	echo "Image uploaded successfully";
      //   	}else{
      //   		echo "Failed to upload image";
      //   	}
                  $fileInfo = PATHINFO($_FILES["user_photo"]["name"]);

            	if (empty($_FILES["user_photo"]["name"])){
            		$location=$srow['photo'];
            		?>
            			<script>
            				window.alert('Uploaded photo is empty!');
            				window.history.back();
            			</script>
            		<?php
            	}
            	else{
            		if ($fileInfo['extension'] == "jpg" OR $fileInfo['extension'] == "png") {
            			$newFilename = $fileInfo['filename'] . "_" . time() . "." . $fileInfo['extension'];
            			move_uploaded_file($_FILES["user_photo"]["tmp_name"], "images/" . $newFilename);
            			$location = "images/" . $newFilename;

            			mysqli_query($conn,"UPDATE user set user_photo='$location' where User_ID='$User_ID'") or die(mysqli_error($conn));

            			?>
            				<script>
            					window.alert('Photo updated successfully!');
            					window.history.back();
            				</script>
            			<?php
            		}
            		else{
            			?>
            				<script>
            					window.alert('Photo not updated. Please upload JPG or PNG files only!');
            					window.history.back();
            				</script>
            			<?php
            		}
            	}
        }

        if(isset($_POST['profile'])){
          $fullname = $_POST['fullname'];
          $user_name= $_POST['user_name'];
          $password = md5($_POST['password']);
          $email = $_POST['email'];
          $phonenumber = $_POST['phone_number'];
           $User_ID = $_SESSION['User_ID'];

          $insert_update = mysqli_query($conn, "UPDATE user SET fullname='$fullname', user_name='$user_name', password='$password', email='$email', phone_number='$phonenumber' Where User_ID='$User_ID' ") or die(mysqli_error($conn));
          if(!$insert_update){
            ?>
              <script>
                window.alert('Oooops No Updates done');
                window.history.back();
              </script>
            <?php
          }else{
            ?>
              <script>
                window.alert(' Profile updated successfully');
                window.history.back();
              </script>
            <?php
          }
        }

        if(isset($_POST['btn_terms'])){
          $Shipping_terms =mysqli_real_escape_string($conn, $_POST['Shipping_terms']);
          $terms_condition =mysqli_real_escape_string($conn, $_POST['terms_condition']);
          $User_ID = $_SESSION['User_ID'];

          $sql_insert_terms = mysqli_query($conn, "INSERT INTO tbl_terms_condition(Shipping_terms, terms_condition, User_ID)VALUES('$Shipping_terms', '$terms_condition', '$User_ID') ") or die(mysqli_error($conn));

          if(!$sql_insert_terms){
            echo "failed";
          }else{
            echo "success";
          }
        }
?>
