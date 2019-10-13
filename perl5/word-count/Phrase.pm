package Phrase;
use strict;
use warnings;
use Exporter 'import';
our @EXPORT_OK = qw(word_count);

sub word_count {
   my @txt = split(/\W+/, lc shift);
   my %hash;
   $hash{$_}++ for @txt; 
   return \%hash;
}

1;
