// Two-fer or 2-fer is short for two for one. One for you and one for me.
package twofer

// ShareWith returns sentence based on name.
func ShareWith(name string) string {
	if name == "" {
		name = "you"
	}
	return "One for " + name + ", one for me."
}
