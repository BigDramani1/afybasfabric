<?php

if(isset($_GET['search'])){
    //store the search querry in a variable
  $search = $_GET['query'];
  if(!empty($search)){
      //redirect to search results
      header("Location: ../view/search.php?query=$search");
  }
}
?>