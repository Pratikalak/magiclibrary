<?php
$conn = mysqli_connect('db','librarian','library123','magic');
$q = $_GET['query'] ?? '';
$res = mysqli_query($conn, "SELECT * FROM books WHERE title LIKE '%$q%'");
while($row = mysqli_fetch_assoc($res)){
  echo "<div>{$row['title']}</div>";
}
?>
