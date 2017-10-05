<?php
$url = $_REQUEST['u_r'];
print_r(get_headers($url));

print_r(get_headers($url, 1));
?>