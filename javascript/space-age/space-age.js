class SpaceAge {
	constructor(earthSec) {
		this.seconds = earthSec;
		this.earthYear = this.seconds / 31557600;
		this.t = {
			Mercury: 0.2408467,
			Venus: 0.61519726,
			Mars: 1.8808158,
			Jupiter: 11.862615,
			Saturn: 29.447498,
			Uranus: 84.016846,
			Neptune: 164.79132
		};
	}

	onEarth() {
		return Number(this.earthYear.toFixed(2));
	}

	onMercury() {
		return Number((this.earthYear / this.t.Mercury).toFixed(2));
	}

	onVenus() {
		return Number((this.earthYear / this.t.Venus).toFixed(2));
	}

	onMars() {
		return Number((this.earthYear / this.t.Mars).toFixed(2));
	}

	onJupiter() {
		return Number((this.earthYear / this.t.Jupiter).toFixed(2));
	}

	onSaturn() {
		return Number((this.earthYear / this.t.Saturn).toFixed(2));
	}

	onUranus() {
		return Number((this.earthYear / this.t.Uranus).toFixed(2));
	}

	onNeptune() {
		return Number((this.earthYear / this.t.Neptune).toFixed(2));
	}
}
 
module.exports = SpaceAge