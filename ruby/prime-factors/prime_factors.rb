require 'prime'

class PrimeFactors
  def self.for(num)
    oa = num
    i = 0
    arr = []
    primes = Prime.take(71_000)

    return [] if num <= 1

    loop do
      break if oa == arr.reduce(&:*)
      if (num % primes[i]).zero?
        arr << primes[i]
        num /= primes[i]
      else
        i += 1
      end
    end
    arr
  end
end
