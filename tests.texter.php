<?php

require_once __DIR__ . '/class.texter.php';

class TexterTest extends PHPUnit_Framework_TestCase
{
    public function testSplit()
    {
        $texter = new Texter();

        $sentence = "the quick brown fox jumps over the lazy dog";
        $expected = array(
            'the',
            'quick',
            'brown',
            'fox',
            'jumps',
            'over',
            'the',
            'lazy',
            'dog'
        );

        $actual = $texter->split($sentence);
        $this->assertEquals($expected,$actual);
    }

    public function testSplitPunctuation()
    {
        $texter = new Texter();

        $sentence = "Oh Romeo, wherefore art thou?!";
        $expected = array(
            'oh',
            'romeo',
            'wherefore',
            'art',
            'thou',
        );

        $actual = $texter->split($sentence);
        $this->assertEquals($expected,$actual);
    }

    public function testSplitContraction()
    {
        $texter = new Texter();

        $sentence = "Will won't do don't have some nachos on the boat!";
        
        $this->assertTrue(in_array("won't", $texter->split($sentence)));
    }

    public function testSplitSingleQuotes()
    {
        $texter = new Texter();

        $sentence = "I've tried to say 'this' like this before. Leavin' this one alone!";
        $words = $texter->split($sentence);

        $this->assertFalse(in_array("'this'", $words));
    }

    public function testSplitNewLine()
    {
        $texter = new Texter();

        $sentence = "First line\nSecond Line\n";
        $expected = array(
            'first',
            'line',
            'second',
            'line'
        );

        $actual = $texter->split($sentence);
        $this->assertEquals($expected,$actual);
    }

    public function testCount()
    {
        $texter = new Texter();

        $sentence = "the quick brown fox jumps over the lazy dog";
        $words = $texter->split($sentence);
        $actual = $texter->count($words);

        $this->assertEquals(9,$actual);
    }

    public function testTally()
    {
        $texter = new Texter();

        $sentence = 'four four Three four three two Four three two one';
        $words = $texter->split($sentence);

        $expected = array(
            'four' => 4,
            'three' => 3,
            'two' => 2,
            'one' => 1
        );

        $actual = $texter->tally($words);
        $this->assertEquals($expected,$actual);
    }

    public function testUniqueWordsFour()
    {
        $texter = new Texter();

        $sentence = 'four four Three four three two Four three two one';
        $tally = $texter->tally($texter->split($sentence));
        $actual = $texter->count($tally);

        $expected = 4;
        $this->assertEquals($expected,$actual);
    }

    public function testUniqueWordsFive()
    {
        $texter = new Texter();

        $sentence = 'Five, five four. Five four three, five four three two! FIVE FOUR THREE TWO ONE!!!! ! ! !!!!';
        $tally = $texter->tally($texter->split($sentence));
        $actual = $texter->count($tally);

        $expected = 5;
        $this->assertEquals($expected,$actual);
    }

    public function testTopFive()
    {
        $texter = new Texter();

        $sentence = 'Five, five four. Five four three, five four three two! FIVE FOUR THREE TWO ONE!!!! ! ! !!!!';
        $tally = $texter->tally($texter->split($sentence));
        $actual = $texter->top($tally,5);

        $expected = array(
            'five' => 5,
            'four' => 4,
            'three' => 3,
            'two' => 2,
            'one' => 1
        );
        $this->assertEquals($expected,$actual);
    }

    public function testGettysburgTxt()
    {
        $texter = new Texter();

        $path_to_text = __DIR__.'/gettysburg.txt';
        $sentence = file_get_contents($path_to_text);

        $results = $texter->analyze_text($sentence);
        $actual = $results['top'];
        $expected = array(
            'that' => 13,
            'the' => 11,
            'we' => 10,
            'to' => 8,
            'here' => 8,
        );

        $this->assertEquals($expected, $actual);
    }
}