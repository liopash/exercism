	
var ArgumentError = class ArgumentError {};
exports.ArgumentError = ArgumentError;
exports.WordProblem = class WordProblem {
    constructor(question) {
        this.question = question;
    }

    answer() {
        let words = {
            plus: '+',
            minus: '-',
            multiplied: '*',
            divided: '/',
			
        };
        if (!this.question.match(/[-0-9]/g)) throw (new ArgumentError);
        let arr = this.question.split(' ').reduce((memo, x) => {
            if (Object.keys(words).includes(x)) {
                return memo.concat(words[x]);
            } else if (x.match(/[-0-9]/g)) {
                return memo.concat(`(${x.match(/[-0-9]/g).join('')})`);
            } else {
                return memo;
            }
        }, []);
        //following is weird, but - ignoring the typical order of operations
        //otherwise would just eval joined arr
        let leftToRight = eval(arr.slice(0,3).join(''));
        return eval(`${leftToRight} ${arr.slice(3).join('')}`);
    }
}
