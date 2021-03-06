<?php
session_start();
ini_set("register_globals", "off");
ini_set("upload_max_filesize", "20M");
ini_set("post_max_size", "40M");
ini_set("memory_limit", "80M");

require_once("../data/conn.php");
require_once("../data/users.php");
require_once("../data/groups.php");
require_once("../data/listingfiles.php");
require_once("../data/enewsletters.php");
require_once("../data/testimonials.php");
require_once("../data/feedbacks.php");
require_once("../data/program.php");
require_once("../data/crop.php");
$program = new Program();
$crop = new Crop();

$conn 					= new Dbconn();		
$users	 				= new Users();	
$groups					= new Groups();
$listingFiles		= new ListingFiles();
$enewsletters			= new Enewsletters();
$testimonials		= new Testimonials();
$feedbacks			= new Feedbacks();

require_once("../data/sewakendra.php");
$sewakendra = new Sewakendra();

require_once("../data/cropvariety.php");
$cropvariety = new Cropvariety();

require_once("../data/cropstatistics.php");
$crop_stat = new Cropstatistics();


define (ADMIN_GALLERY_LIMIT,20);


require_once("../data/constants.php");
require_once("../data/sqlinjection.php");
require_once("../data/youtubeimagegrabber.php");

//for users.php
define("USERDISTRICT", 2)
?>