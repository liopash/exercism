class Anagram {
  
  constructor(word){
    this.word = word.toLowerCase();
  }
  
  matches(...arr) {
    if (typeof arr[0] !== 'string') {arr = arr[0]}
    return arr.filter(x => {
      if (x.toLowerCase() == this.word) {return false}
      return x.toLowerCase().split('').sort().every( (y,i) => {
        return y == this.word.split('').sort()[i] && x.length == this.word.length ;
    });
   });
  }
}


module.exports = Anagram;