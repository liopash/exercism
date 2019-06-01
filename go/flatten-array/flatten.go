package flatten

func helper(a []interface{}, slc *[]interface{}) {
	for _, item := range a {
		switch v := item.(type) {
		case int:
			*slc = append(*slc, v)
		case []interface{}:
			helper(v, slc)
		}
	}
}

func Flatten(input []interface{}) []interface{} {
	var slc []interface{}
	helper(input, &slc)
	return slc
}
