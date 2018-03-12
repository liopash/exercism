class Matrix {
  
    constructor(str) {
        this.rows = str.split('\n').map(x => x.split(' ').map(y => parseInt(y)));
        this.columns = str.split('\n')
            .map(x => x.split(' ')) 
            .map((_,i,arr) => arr.map(y => parseInt(y[i])));
    }
  
}

module.exports = Matrix;