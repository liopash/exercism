package scrabble

import s "strings"

var alphabet = map[int][]byte{
	1:  []byte{'A', 'E', 'I', 'O', 'U', 'L', 'N', 'R', 'S', 'T'},
	2:  []byte{'D', 'G'},
	3:  []byte{'B', 'C', 'M', 'P'},
	4:  []byte{'F', 'H', 'V', 'W', 'Y'},
	5:  []byte{'K'},
	8:  []byte{'J', 'X'},
	10: []byte{'Q', 'Z'},
}

func Score(word string) int {
	oScore := 0
	for _, letter := range s.ToUpper(word) {
		for score, val := range alphabet {
			for _, bajt := range val {
				if bajt == byte(letter) {
					oScore += score
				}
			}
		}
	}
	return oScore
}
