module BookKeeping
  VERSION = 3
end
  

class Binary
  def self.to_decimal(num)
    raise ArgumentError if num.to_s =~ /[^0-1]/
    num.to_s.chars.reverse.each_with_index.reduce(0) do |r, (x, i)|
      r + x.to_i * 2**i
    end
  end
end
