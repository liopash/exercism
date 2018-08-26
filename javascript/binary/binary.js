class Binary {
  
  constructor(num){
    this.num = num;
  }
  
  toDecimal(){
    if (this.num.match(/[^0-1]/)) return 0;
    
    return this.num.split('').reverse().reduce((arr,x,i) => {
      return arr + x * 2 ** i; 
    },0);
  }
  
}

module.exports = Binary
