class ArmstrongNumber {
  validate(input) {
    return (
      input
        .toString()
        .split('')
        .reduce((m, x, _, arr) => m + x ** arr.length, 0) === input
    );
  }
}

ArmstrongNumber = new ArmstrongNumber();

module.exports = ArmstrongNumber;