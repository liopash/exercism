<?php 

function translate($words)
{
    $words = explode(" ", $words);
    $fn = function ($word) {
        $word = strtolower($word);
        $vowels = ["a", "e", "i", "o", "u", "yt", "xr"];
        $clusters = ["ch", "qu", "squ", "thr", "th", "sch"];
        $suffix = "ay";
        if (in_array(substr($word, 0, 3), $clusters)) return substr($word, 3) . substr($word, 0, 3) . $suffix;
        if (in_array(substr($word, 0, 2), $clusters)) return substr($word, 2) . substr($word, 0, 2) . $suffix;
        if (in_array($word[0], $vowels) || in_array(substr($word, 0, 2), $vowels)) return $word . $suffix;
        return substr($word, 1) . $word[0] . $suffix;
    };
    return implode(" ", array_map($fn, $words));
}