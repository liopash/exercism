module BookKeeping
  VERSION = 1
end


class Sieve
    def initialize(max)
      @max = max
    end
  
    def primes
      # credit to rosetta code and @tenebrousedge 
      # @link https://rosettacode.org/wiki/Sieve_of_Eratosthenes#Ruby
      nums = [nil, nil, *2..@max]
      (2..Math.sqrt(@max)).each do |i|
        (i**2..@max).step(i) {|m| nums[m] = nil} if nums[i]
      end
      nums.compact
    end
  end
  
  class Prime < Sieve
    
    @@primes = []
    
    def self.nth num
      raise ArgumentError.new("Zero.") if num.zero?
      i = 10
      @@primes = Sieve.new(2**i).primes if @@primes == []
      while @@primes[num-1].nil? do 
        puts "Recounting!"
        i += 1
        @@primes = Sieve.new(2**i).primes 
      end
      @@primes[num-1]
    end
    
  end
      
      
      