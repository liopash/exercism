package Raindrops;
use strict;
use warnings;
use Exporter 'import';
our @EXPORT_OK = qw(raindrop);

sub raindrop {
  my ($number) = @_;
  my $word = undef;
  $word = 'Pling' if $number % 3 == 0;
  $word .= 'Plang' if $number % 5 == 0;
  $word .= 'Plong' if $number % 7 == 0;
  return $word // $number;
}

1;
