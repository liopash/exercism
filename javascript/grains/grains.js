
let bigInt = require('./big-integer');

class Grains {
  
  square(i) {
    if (i < 1 || i > 64) throw new Error('ArgumentError');
    return bigInt(2).pow(i-1).toString()
  }
  
  total() {
    return Array(64).fill(0).map((x,i)=>bigInt(2).pow(i)).reduce((a,b)=>bigInt(a).plus(b)).toString()
  }
}

module.exports = Grains;