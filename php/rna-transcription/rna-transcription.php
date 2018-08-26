<?php

function toRna($str) 
{
    $transcode = ['G' => 'C',
           'C' => 'G',
           'T' => 'A',
           'A' => 'U'];
    $rna = function($x) use ($transcode) {
        return $transcode[$x];
    };       
    return implode(array_map($rna,str_split($str)));
};