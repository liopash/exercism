class PrimeFactors {
  
    for(num) {
        let oa = num;
        let i = 2;
        let arr = [];
        while (oa != arr.reduce((x,y) => x * y,1)) {
            if (num % i === 0) {
                arr.push(i);
                num /= i;
            } else {
                i++;
            }
        }
        return arr;
    }
 
}

var primeFactors = new PrimeFactors();
   
module.exports = primeFactors;