class BookKeeping
    VERSION = 3
  end
  
class Hamming
    def self.compute(original, mutation)
 
        raise ArgumentError unless original.size == mutation.size

        original.split("")
                .zip(mutation.split(""))
                .select { |x| x[0] != x[1] }
                .length
 
    end
end
