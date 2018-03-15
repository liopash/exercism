class RunLengthEncoding {

    encode(str) {
        if (str == '') return '';
        let encoded = str.match(/(.)\1*/g).map(x => x.length + x[0]).join('');
        return encoded.split(/(\d*)/g).filter(x => x != 1).join('');
      }
  
    decode(str) {
        return str
            .split(/(\d*)/g)
            .filter(x => x !== '')
            .reduce(
                (arr, x) => {
                    if (Number(x)) {
                        arr.num = Number(x);
                        return arr;
                    } else {
                        arr.str = arr.str + x.repeat(arr.num);
                        arr.num = 1;
                        return arr;
                    }
                },
                { str: '', num: 1 }
            ).str;
    }
}

var rle = new RunLengthEncoding();

module.exports = rle;