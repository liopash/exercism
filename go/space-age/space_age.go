// Given an age in seconds, calculate how old someone would be on other planets
package space

type Planet string

var spaceAge = map[Planet]float64{
	"Mercury": 0.2408467,
	"Venus":   0.61519726,
	"Mars":    1.8808158,
	"Jupiter": 11.862615,
	"Saturn":  29.447498,
	"Uranus":  84.016846,
	"Neptune": 164.79132,
	"Earth":   1,
}

// Function Age return age in years on another planet
func Age(seconds float64, planet Planet) float64 {
	var earthSeconds float64 = 31557600
	earthYear := seconds / earthSeconds
	return earthYear / spaceAge[planet]
}
