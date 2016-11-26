<?php
//start session
ob_start();
session_start();
error_reporting(0);
//require system files
//$_SESSION['bahasa']=='en';
include "bahasa.php";

//echo $_GET['bahasa'];
//exit;


include "josys/koneksi.php";
include "josys/class_paging.php";
include "josys/paging.php";
include "josys/library.php";
include "josys/fungsi_indotgl.php";
include "josys/fungsi_rupiah.php";
//include "josys/fungsi_bahasa.php";
//include template
include "template.php";
ob_end_flush();
