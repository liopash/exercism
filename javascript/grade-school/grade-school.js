class School {
	
    constructor() {
        this.school = {};
    }

    add(name, grade) {
        if (this.school[grade]) {
            this.school[grade] = this.school[grade].concat(name).sort();
        } else {
            this.school[grade] = [name];
        }
    }

    roster() {
        return this.school;
    }

    grade(y) {
        return Object.keys(this.school).reduce((arr, x) => {
            if (x == y) {
                arr = this.school[x];
            }
            return arr;
        }, []);
    }
}

module.exports = School;