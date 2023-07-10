<?php
$total_pages = ceil($total_records / $page_size);
if (isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $total_pages) {
      $current_page = (int) $_GET['page'];
  } else {
      $current_page = 1;
  }
$offset = ($current_page - 1) * $page_size;
$limit = $page_size;
?>
