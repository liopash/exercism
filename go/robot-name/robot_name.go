package robotname

import "time"
import r "math/rand"

type Robot string

var robotDb []string

func rFromString(txt string) string {
	r.Seed(time.Now().UnixNano())
	idx := r.Intn(len(txt) - 1)
	return string(txt[idx])
}

func rLet() string {
	alphabet := "ABCDEFGHIJKLMNOPQRSTUVWXYZ"
	return rFromString(alphabet)
}

func rNum() string {
	numbers := "0123456789"
	return rFromString(numbers)
}

func dbContains(item string, db []string) bool {
	for _, dbItem := range db {
		if item == dbItem {
			return true
		}
	}
	return false
}

func (r *Robot) Name() (string, error) {
	var robotName string
	if *r != Robot("") {
		return string(*r), nil
	}
	robotName = rLet() + rLet() + rNum() + rNum() + rNum()
	if dbContains(robotName, robotDb) {
		return r.Name()
	}
	robotDb = append(robotDb, robotName)
	*r = Robot(robotName)
	return robotName, nil
}

func (r *Robot) Reset() {
	*r = ""
	r.Name()
}
