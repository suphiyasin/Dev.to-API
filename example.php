<?php
include("src.php");
$use = new devto();
$use->cookie = 'ENTER dev.to COOKIE';
$use->username = "ENTER YOUR USERNAME FROM dev.to";

//Get Shared Posts
$sa = $use->getposts();
foreach($sa as $as){
	echo 'Link : <a href="https://dev.to'.$as['path'].'" target="_blank">https://dev.to'.$as['path'].'</a><br/>
	ID : '.$as['id'].'<br/><hr/><br/>';
}
