class Flattener {
  flatten(input, flt = []) {
    let [hd, ...tail] = input;
    if (hd !== undefined) {
      if (typeof hd === "number" || typeof hd === "string" || hd === null) {
        if (hd !== null) {
          flt.push(hd);
        }
      } else {
        return this.flatten(hd.concat(tail), flt);
      }
      return this.flatten(tail, flt);
    } else {
      return flt;
    }
  }
}

module.exports = Flattener;
