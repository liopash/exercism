var DnaTranscriber = function() {
 
};

DnaTranscriber.prototype.toRna = function(dna) {
  let rna = dna.split('').map(
        x =>
        x == 'G' ? 'C' : 
        x == 'C' ? 'G' : 
        x == 'T' ? 'A' : 
        x == 'A' ? 'U' : ''
    )
    .join('');

  if (!dna.length || !rna.length) {
    throw new Error('Invalid input'); 
  } else if (rna.length != dna.length  ) {
    throw new Error;
  } else {
  return rna;
  } 
};

module.exports = DnaTranscriber;
