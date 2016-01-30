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



