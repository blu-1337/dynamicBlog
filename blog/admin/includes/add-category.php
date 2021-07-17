<?php


require "dbh.php";

if (isset($_POST['add-category-btn'])){

  $name = $_POST['category-name'];
  $metaTitle = $_POST['category-meta-title'];
  $categoryPath = $_POST['category-path'];

  $date = date("Y-m-d");
  $time = date("H:i:s");

  // echo $name;
  // echo $metaTitle;
  // echo $time; //we just tested some variables

  //let's put these in the database

  $sqlAddCategory = "INSERT INTO blog_category (v_category_title, v_category_meta_title, v_category_path, d_date_created, d_time_created) VALUES ('$name', '$metaTitle', '$categoryPath', '$date', '$time')";

  if(mysqli_query($conn, $sqlAddCategory)){ //if this query runs and returns true
    mysqli_close($conn); //close connection
    header("Location: ../blog-category.php?addCategory=success"); //redirect to the following location, lets also display successful message
    exit();
  } 
  else {
    mysqli_close($conn); //close connection
    header("Location: ../blog-category.php?addCategory=error"); //redirect to the following location, lets also display error message
    exit();
  }

} 
else{
  header("Location: ../index.php");
  exit();
}
