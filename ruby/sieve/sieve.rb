
module BookKeeping
    VERSION = 1
  end
  
class Sieve
    
    def initialize num
      @arr = [*2..num]
      @primes = []
    end
    
    def primes
      if @arr == [] 
         @primes
      else 
        head, *tail = @arr
        @primes.push head
        @arr = tail.select { |x| x.modulo(head) != 0 }
        primes
      end
    end
    
end  