                
class Hamming {
  
    compute(original, mutation) {
        if (original.length != mutation.length) throw new Error('DNA strands must be of equal length.');
    
        return original.split('').filter((x,i) => {
            let m = mutation.split('');
            return x != m[i];
        }).length;
    }
  
}

module.exports = Hamming;