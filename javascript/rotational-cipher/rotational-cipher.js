class RotationalCipher {
   
    constructor(){
        this.alphabet = 'abcdefghijklmnopqrstuvwxyz';
    }
  
    rotate(letters, num) {
        return letters.split('').map(x => {
            if (this.alphabet.includes(x)) {
                let i = (num + this.alphabet.indexOf(x)) % 26;
                return this.alphabet[i];
            } else if (this.alphabet.includes(x.toLowerCase())) {
                let i = (num + this.alphabet.indexOf(x.toLowerCase())) % 26;
                return this.alphabet[i].toUpperCase();
            } else {
                return x;
            }
        }).join('');
    }
  
}

module.exports = RotationalCipher;