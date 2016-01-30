Texter (tm)
===========

This is the greatest solution to text analysis that has ever been.

Usage
=====

To use Texter(tm), you can simply pass it a file name:

```
$ php texter.php ./gettysburg.txt 
    272 Total words
    138 Unique words

    Top 5 Words:
        that: 13
        the: 11
        we: 10
        to: 8
        here: 8

```

...or, if you'd rather, feel free to pass the text in via stdin:

```
$ cat gettysburg.txt | php texter.php
    272 Total words
    138 Unique words

    Top 5 Words:
        that: 13
        the: 11
        we: 10
        to: 8
        here: 8

```

Credits
=======

All credit here goes to WP Engine's amazing dev team. They've taught me a lot and they ask me to test out some of their new code problems for potential candidates. Hooray!

All code in this repo is my own. Completion took roughly 1h45m (not including the readme)

&lt;excuse&gt;...but I was blindfolded and had both hands behind my back... and was slightly distracted for some of it.&lt;/excuse&gt;
