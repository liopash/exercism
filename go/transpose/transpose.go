package transpose

import "strings"

func maxSlice(xs []string) int {
	max := 0
	for _, x := range xs {
		if max < len(x) {
			max = len(x)
		}
	}
	return max
}

func resize(str string, size int) string {
	for len(str) < size {
		str += "#"
	}
	return str
}

func equalizer(xs []string) []string {
	size := maxSlice(xs)
	for i, item := range xs {
		xs[i] = resize(item, size)
	}
	return xs
}

func zipByIdx(xs []string, idx int) string {
	var zipped []byte
	for _, item := range xs {
		zipped = append(zipped, item[idx])
	}
	return string(zipped)
}

func cleaner(xs string) string {
	xs = strings.TrimRight(xs, "#")
	xs = strings.Replace(xs, "#", " ", -1)
	return xs
}

func Transpose(xs []string) []string {
	transposed := make([]string, 0)
	xs = equalizer(xs)
	for i := 0; i < maxSlice(xs); i++ {
		transposed = append(transposed, cleaner(zipByIdx(xs, i)))
	}
	return transposed
}
