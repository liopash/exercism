
var Gigasecond = function(time) {
  this.time = time;
}

Gigasecond.prototype.date = function () {
  gigaSec = (Date.parse(this.time) / 1000 + 1000000000)*1000
  return new Date(gigaSec)
  
}

module.exports = Gigasecond;