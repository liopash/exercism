var Pangram = function (sentence) {
    this.sentence = sentence; 
};

Pangram.prototype.isPangram = function() {
    let alphabet = 'abcdefghijklmnopqrstuvwxyz';
    return alphabet.split('').every( x => this.sentence.toLowerCase().includes(x));
};

module.exports = Pangram;