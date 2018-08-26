class Triangle {
    constructor(size) {
        this.size = size;
        this.fact = num => (num === 0 ? 1 : num * this.fact(num - 1));
        this.rows = this.rows();
        this.lastRow = this.rows[this.rows.length - 1];
    }

    rows() {
        let arr = new Array(this.size).fill(1).map((x, i) => Array(i + 1).fill(x));
        return arr.map((y, o) => {
            return y.map((x, i) => {
                return this.fact(o) / (this.fact(i) * this.fact(o - i));
            });
        });
    }
}


module.exports = Triangle;