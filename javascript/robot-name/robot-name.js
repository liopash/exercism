class Robot {
    constructor() {
        this.name = this.reset();
    }
  
    reset() {
        let letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        let name = `${letters[Math.round(Math.random()*25)]}${letters[Math.round(Math.random()*25)]}${Math.round(Math.random()*899) + 100}`;
        if (!Robot.names.includes(name)) { 
            Robot.names.push(name);
            return this.name = name;
        } else {
            this.reset();
        }
    }
  
}

Robot.names = [];

module.exports = Robot;