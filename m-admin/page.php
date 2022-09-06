<?PHP




  $NUMPERPAGE = 20; // max. number of items to display per page
  $this_page = "http://localhost/molla/m-admin/page.php";
  $data = range(1, 550); // data array to be paginated
  $num_results = count($data);



  if(!isset($_GET['page']) || !$page = intval($_GET['page'])) {
    $page = 1;
  }

  // extra variables to append to navigation links (optional)
  $linkextra = [];
  if(isset($_GET['var1']) && $var1 = $_GET['var1']) { // repeat as needed for each extra variable
    $linkextra[] = "var1=" . urlencode($var1);
  }
  $linkextra = implode("&amp;", $linkextra);
  if($linkextra) {
    $linkextra .= "&amp;";
  }

  // build array containing links to all pages
  $tmp = [];
  for($p=1, $i=0; $i < $num_results; $p++, $i += $NUMPERPAGE) {
    if($page == $p) {
      // current page shown as bold, no link
      $tmp[] = "<b>{$p}</b>";
    } else {
      $tmp[] = "<a href=\"{$this_page}?{$linkextra}page={$p}\">{$p}</a>";
    }
  }

  // thin out the links (optional)
  for($i = count($tmp) - 3; $i > 1; $i--) {
    if(abs($page - $i - 1) > 2) {
      unset($tmp[$i]);
    }
  }

  // display page navigation iff data covers more than one page
  if(count($tmp) > 1) {
    echo "<p>";

    if($page > 1) {
      // display 'Prev' link
      echo "<a href=\"{$this_page}?{$linkextra}page=" . ($page - 1) . "\">&laquo; Prev</a> | ";
    } else {
      echo "Page ";
    }

    $lastlink = 0;
    foreach($tmp as $i => $link) {
      if($i > $lastlink + 1) {
        echo " ... "; // where one or more links have been omitted
      } elseif($i) {
        echo " | ";
      }
      echo $link;
      $lastlink = $i;
    }

    if($page <= $lastlink) {
      // display 'Next' link
      echo " | <a href=\"{$this_page}?{$linkextra}page=" . ($page + 1) . "\">Next &raquo;</a>";
    }else{
    	echo "Finshed";
    }

    echo "</p>\n\n";
  }


   $data = new \ArrayIterator($data); // NOT needed if $data is already an Iterator!
  $it = new \LimitIterator($data, ($page - 1) * $NUMPERPAGE, $NUMPERPAGE);
  try {
    $it->rewind();
    foreach($it as $row) {
      echo $row; // display record
    }
  } catch(\OutOfBoundsException $e) {
    echo "Error: Caught OutOfBoundsException";
  }

  echo "<br>";
?>