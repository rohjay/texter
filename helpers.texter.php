<?php

function display_results($results)
{
    echo "\t{$results['count']} Total words\n";
    echo "\t{$results['unique_words']} Unique words\n";
    echo "\n";
    echo "\tTop 5 Words:\n";
    foreach ( $results['top'] as $word => $count ) {
        echo "\t\t$word: $count\n";
    }
    echo "\n";
}

function print_help_and_exit()
{
    echo "\tTexter: The text analyzing software you've always dreamed of!\n";
    echo "\tUsage:\n";
    echo "\t\tphp texter.php /path/to/text/file.txt\n";
    echo "\t\t\tOR\n";
    echo "\t\tcat /path/to/text/file.txt | php texter.php\n";
    echo "\tHappy Analyzing!\n";
    exit();
}
