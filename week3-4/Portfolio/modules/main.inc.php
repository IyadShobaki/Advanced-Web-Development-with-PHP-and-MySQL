<?php # Script 2.5 - main.inc.php

/* 
 *	This is the main content module.
 *	This page is included by index.php.
 */

// Redirect if this page was accessed directly:
if (!defined('BASE_URL')) {

	// Need the BASE_URL, defined in the config file:
	require_once ('../includes/config.inc.php');
	
	// Redirect to the index page:
	$url = BASE_URL . 'index.php';
	header ("Location: $url");
	exit;
	
} // End of defined() IF.
?>

	  <h2>Iyad Shobaki</h2>
	  <p>A computer science student at Stark State College. Currently looking for a co-op or internship. Languages: VB.NET, HTML5, CSS3, PHP, SQL (Microsoft SQL Server). I work for Lyft and Uber as a ride share driver.</p>
	  <h2>How I got started </h2>
	  <p>I start learning coding at Stark State College in Spring 2018 </p>
	  <h2>My dream job</h2>
	  <p>To be a professional software developer.</p>
