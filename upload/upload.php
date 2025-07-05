<?php
if(isset($_FILES['book'])){
  $name = basename($_FILES['book']['name']);
  move_uploaded_file($_FILES['book']['tmp_name'], "uploads/$name");
  echo "Uploaded: $name";
}
?>
<form method="post" enctype="multipart/form-data">
  <input type="file" name="book">
  <button>Upload</button>
</form>
