module BookKeeping
  VERSION = 4
end


class Squares
  
  def initialize num
    @range = (1..num).to_a
  end
  
  def self.sqrt
    self * self
  end
  
  def square_of_sum
    @range.reduce(&:+).sqrt
  end
  
  def sum_of_squares
    @range.map(&:sqrt).reduce(&:+)
  end
  
  def difference
    square_of_sum - sum_of_squares
  end
  
end