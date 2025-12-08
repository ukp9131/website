<?php
require_once dirname(__FILE__) . '/_.php';
require_once $global["ukp_dir"] . '/class.ukp.php';
$ukp = new Ukp();

//remap
$ukp->solution_remap_data($data);
require_once dirname(__FILE__) . '/_view/_remap.php';