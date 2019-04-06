var Bob = function() {
 
};

Bob.prototype.hey = (remark) => {
    let size = (x) => x === null ? 0 : x.length; 

    if (size(remark.match(/\s/g)) == size(remark)) {
        return 'Fine. Be that way!';
    } else if (
        size(remark.match(/[A-Z]/g)) > 1 &&
		remark.match(/[a-z]/g) === null
    ) {
        return 'Whoa, chill out!';
    } else if (remark.trim().endsWith('?')) { //es6 
        return 'Sure.';
    } else {
        return 'Whatever.';
    }
};

module.exports = Bob;