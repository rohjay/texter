<?php

require_once __DIR__ . '/class.texter.php';
require_once __DIR__ . '/helpers.texter.php';

$content = isset($argv[1]) ? @file_get_contents($argv[1]) : file_get_contents("php://stdin");
$content = trim($content);

if ( empty($content) ) {
    print_help_and_exit();
}

$texter = new Texter();
$results = $texter->analyze_text($content);

display_results($results);
