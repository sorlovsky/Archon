<?php

/*
*
* @original author Nat Wilson
*
*This script picks a random blob file from the digital library, links that blob with its parent
*digital collection record and and assigns information about those records to 3 variables
* 1) The blobs record ID # is set to a variable named $id.
* 2) The title field in the parent collection is set to a variable named $title.
* 3) The blob's ContentID field is set to a variable named $collection.
*
*These variables can be used to create displayed images and links to their parent digital collections.
*
*I will put any setting or phrase that needs configuration in square brackets, i.e. [user name], replace the brackets and everything in it
*with the setting that is specific to your instance of Archon.
*
*The following lines will have to be changed depending on the institution's database and system configuration:
*
*$mysql_link = mysql_connect("localhost", "[database user name]", "[user password]");
*Note: "Localhost" should work for most instances.
*
*mysql_select_db("[database name]", $mysql_link) or die("Could not select database");
*
*FileTypeID = '[numeric type ID of the kind of file you want to include]'
*Note: this is to prevent pdf's from coming up in the result. Until we figure out how to automatically generate thumbnail previews for
*these we will have to limit the search to just images. See the FileTypeID field in the table for #'s associated with file types.
*
*It is also necessary to make a new limited database user for this function. In the case below, I made a user
*named "archon" with the following database privileges:
*
*Select
*Show/View
*Execute

*Bug: Certrain special characters dont get passes well through the variables and come out as "?." This might be fixed if we
*decoded the characters as they come out in index.php

*/
function get_random_blobs($num_blobs = 3)
{
	$num_blobs = (integer) $num_blobs;
	if(empty($num_blobs))
	{
		trigger_error('get_random_blobs must be passed an integer');
		return array();
	}

	$mysql_link = mysql_connect("localhost", "root", "");
	if (!$mysql_link)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("archon", $mysql_link) or die("Could not select database");

	$result = mysql_query(
"Select
tblDigitalLibrary_Files.ID,
tblDigitalLibrary_DigitalContent.Title,
tblDigitalLibrary_Files.DigitalContentID
from tblDigitalLibrary_Files,
tblDigitalLibrary_DigitalContent
where tblDigitalLibrary_Files.FileTypeID = '2'
and tblDigitalLibrary_Files.DigitalContentID = 	tblDigitalLibrary_DigitalContent.ID
ORDER BY RAND() LIMIT ".$num_blobs);

	$ret = array();
	if($result)
	{
		while($row = mysql_fetch_object($result))
			$ret[] = $row;
	}

	mysql_close($mysql_link);
	
	return $ret;
}

?>