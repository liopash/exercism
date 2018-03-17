
class Raindrops {
  
  convert(num){
    let str = ''
    if (num % 3 === 0) {str += 'Pling'}
    if (num % 5 === 0) {str += 'Plang'}
    if (num % 7 === 0) {str += 'Plong'}
    if (str === '') { str = num.toString() }
    return str
  }
}

module.exports = Raindrops;