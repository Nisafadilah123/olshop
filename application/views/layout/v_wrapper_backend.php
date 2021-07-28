<?php
//proteksi halaman
$this->user_login->proteksi_halaman();
// harus urut
require_once('v_head.php');
require_once('v_header_backend.php');
require_once('v_nav_backend.php');
require_once('v_content.php');
require_once('v_footer_backend.php');