package Grains;
use strict;
use warnings;
use Exporter 'import';
our @EXPORT_OK = qw(grains_on_square total_grains);

sub grains_on_square {     
	my $idx = shift;     
	die "square must be between 1 and 64" if $idx < 1 || $idx > 64;     
	return int (2 ** ($idx - 1)); 
}  

sub total_grains {     
	my $total = 0;     
	for (1..64) { 	
		$total += grains_on_square($_);     
	}     
	return int $total; 
}

1;
