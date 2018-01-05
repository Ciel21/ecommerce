<?php 

use \Hcode\PageAdmin;
use \Hcode\Model;

$app->get('/', function() {
    
	$page = new Hcode\Page();

	$page->setTpl("index");

});

?>