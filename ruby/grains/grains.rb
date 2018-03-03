module BookKeeping
  VERSION = 1
end

class Grains
  
  def self.square i
    raise ArgumentError if i < 1 || i > 64
    2**(i-1)
  end
  
  def self.total
    (0..63).map { |x| 2**x }.reduce(&:+)
  end
    
end