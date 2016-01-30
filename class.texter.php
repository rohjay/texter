<?php

class Texter
{
    public $results;

    public function analyze_text($text)
    {
        $this->results['words'] = $this->split($text);
        $this->results['count'] = $this->count($this->results['words']);
        $this->results['tally'] = $this->tally($this->results['words']);
        $this->results['unique_words'] = $this->count($this->results['tally']);
        $this->results['top'] = $this->top($this->results['tally'],5);
        return $this->results;
    }

    public function split($text)
    {
        $lowered = strtolower($text);

        // remove all punctuation and new lines (except for single quotes for the moment)
        $no_punctuation = preg_replace('/[^0-9a-z\'\s]+/', '', $lowered);

        // Replace the new lines with spaces
        $no_new_lines = str_replace("\n", ' ', $no_punctuation);

        // Make our list of werds now =]
        $list_of_words = explode(' ', $no_new_lines);

        // Since we've given special treatment to single quotes for contractions,
        // let's trim them off the ends of each word now. YEAH! =D
        $list_of_words = array_map(function($word){
            return trim($word, "'");
        }, $list_of_words);

        // return after filtering out the empties *shakes fist*
        return array_filter( $list_of_words );
    }

    public function count($words)
    {
        return count($words);
    }

    public function tally($words)
    {
        $tally = array();
        foreach ( $words as $word ) {
            $word = strtolower($word);
            if ( !isset($tally[$word]) ) {
                $tally[$word] = 0;
            }
            ++$tally[$word];
        }
        return $tally;
    }

    public function top($tally, $num_of_results=5)
    {
        arsort($tally);
        return array_slice($tally, 0, $num_of_results);
    }
}
