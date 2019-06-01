export class List {

  constructor(values) {
    this.values = this.validate(values)
  }

  validate(values, list = []) {
    if (values instanceof Array) {
      for (let v of values) {
        this.validate(v, list)
      }
    }
    if (values instanceof List) {
      list.push(...values.values)
    }
    if (typeof values == 'number') {
      list.push(values)
    }
    return list
  }

  length() {
    let length = 0
    while (this.values[length]) length++
    return length
  }

  append(list) {
    return new List([this, list])
  }

  concat(list) {
    return this.append(list)
  }

  map(fn) {
    let values = []
    let index = 0
    while (this.values[index]) {
      values[index] = fn(this.values[index])
      index++
    }
    return new List(values)
  }

  filter(fn) {
    let values = []
    let index = 0
    while (this.values[index]) {
      if (fn(this.values[index])) {
        values[index] = this.values[index]
      }
      index++
    }
    return new List(values)
  }

  reverse() {
    let values = []
    let index = this.values.length - 1
    while (this.values[index]) {
      values.push(this.values[index])
      index--
    }
    return new List(values)
  }

  foldl(fn, acc) {
    let index = 0
    while (this.values[index]) {
      acc = fn(acc, this.values[index])
      index++
    }
    return acc
  }

  foldr(fn, acc) {
    return  this.reverse().foldl(fn,acc)
  }
}


