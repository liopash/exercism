class SumOfMultiples
  def initialize(*divs)
    @divs = *divs
  end

  def to(z)
    range = 1.upto(z - 1)
    mod = lambda do |num|
      @divs.any? { |div| (num % div).zero? }
    end

    range.select(&mod).reduce(0,:+)
  end
end

module BookKeeping
  VERSION = 2
end