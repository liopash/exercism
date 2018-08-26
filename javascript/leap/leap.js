//
// This is only a SKELETON file for the "Leap" exercise. It's been provided as a
// convenience to get you started writing code faster.
//

var Year = function(year) {
  this.year = year;
  
};

Year.prototype.isLeap = function() {
  return !(this.year%4) && ((this.year%100!=0) || !(this.year%400));
};

module.exports = Year;
