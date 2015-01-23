<?php 

/**
 * Main page for default template
 *
 * @package Archon
 * @author Chris Rishel
 */
isset($_ARCHON) or die();
if($_REQUEST['f'] == 'about')
{
 require("about.php");
 return;
}

require_once("randomblobid.php"); 
echo("<h1 id='titleheader'>" . strip_tags($_ARCHON->PublicInterface->Title) . "</h1>\n");

?>

<?php
  
  $blobs = get_random_blobs(3);
  krumo($blobs);
  echo $blobs->Title;
  
  $id = $blobs[1]->ID;
  $collection = $blobs[1]->DigitalContentID;
  $URL = '../archon/?p=digitallibrary/getfile&id='.$id.'&preview=long';
  echo $blobs[2]->DigitalContentID;
  echo "<a href='../archon/?p=digitallibrary/digitalcontent&id=".$collection."'><img src=".$URL."height=250></a>";
  echo "<br>Learn more about this collection: <a href='..?p=digitallibrary/digitalcontent&id=".$collection."'>".$title."</a>";
  echo "</br>";
  echo "</br>";
  echo "ID: ". $id;
  echo "</br>";
  echo "</br>";
  echo "collection: ". $collection;
  echo "</br>";
  echo "</br>";
  echo "URL: ". $URL;
  echo "</br>";
  echo "</br>";
  $objDigitalContent = New DigitalContent($blobs-> DigitalContentID[0]);
  echo "</br>";
  echo "</br>";
  krumo($objDigitalContent)

  // echo("<img class='digcontentfile' src='".$objFile->getFileURL(DIGITALLIBRARY_FILE_PREVIEWLONG)."' alt='{$objFile->getString('Title')}'/><br/>");

  
 ?>
<head>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#accordion" ).accordion();
  });

  </script>
</head>

<div id='themeindex' class='bground'>
<dl>
    <div id="accordion">
  <h3>About</h3>
  <div>
    <p>

    <li><a href="http://localhost/archon/?p=core/index&f=about">About us link</a></li> mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
    ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
    amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
    odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
    </p>
  </div>
  <h3>Contact Info</h3>
  <div>
    <p>
    Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
    purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
    velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
    suscipit faucibus urna.
    </p>
  </div>
  <h3>Mission</h3>
  <div>
    <p>
    Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
    Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
    ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
    lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
    </p>
    <ul>
      <li>List item one</li>
      <li>List item two</li>
      <li>List item three</li>
    </ul>
  </div>
</div>
  </dd>
</dl>
</div>