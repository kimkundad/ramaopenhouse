<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=filename.xls");
header("Pragma: no-cache");
header("Expires: 0");


echo '<table border="1">';
//make the column headers what you want in whatever order you want
echo '<tr><th>Field Name 1</th><th>Field Name 2</th><th>Field Name 3</th></tr>';
//loop the query data to the table in same order as the headers

    echo "<tr><td>1</td><td>2</td><td>3</td></tr>";

echo '</table>';
?>
