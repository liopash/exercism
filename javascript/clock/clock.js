class Clock {

  at(h = 0, m = 0) {
    this.h = (24 + (h + parseInt(m / 60) + (m < 0 ? -1 : 0)) % 24) % 24;
    this.m = (60 + m % 60) % 60;
    return this;
  }

  toString() {
    let zero = x => (x < 10 ? "0" + x : x);
    let clock = `${zero(this.h)}:${zero(this.m)}`;
    return clock;
  }

  plus(n) {
    return this.at(this.h, this.m + n);
  }

  minus(n) {
    return this.at(this.h, this.m - n);
  }

  equals(other) {
    return this.toString() === other.toString();
  }
}

module.exports = {
  at: (hour, min) => new Clock().at(hour, min)
};
