<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
</head>
<body>

<?php
include_once('../simple_html_dom.php');


// get DOM from URL or file
$html = file_get_html('http://jirayu.thailandpages.com/profile');

foreach($html->find('span.auto_bot_company_profile') as $e)
    echo $e->outertext . '<br>';



?>


</body>
</html>