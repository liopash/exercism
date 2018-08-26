module BookKeeping
  VERSION = 2
end

class Integer
    ROMANS  = { 1000 => 'M',
                900 => 'CM',
                500 => 'D',
                400 => 'CD',
                100 => 'C',
                90 => 'XC',
                50 => 'L',
                40 => 'XL',
                10 => 'X',
                9 => 'IX',
                5 => 'V',
                4 => 'IV',
                1 => 'I' }
  
    def to_roman
      int = self
      roman = String.new
      ROMANS.each { |num, sign|
          roman << sign * (int / num)
          int = int % num }
      roman
    end
    
  end