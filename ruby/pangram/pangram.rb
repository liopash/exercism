
module BookKeeping
    VERSION = 6
end
  
class Pangram
    
    def self.pangram? phrase
      [*'a'..'z'].all?(&phrase.downcase.method(:include?)) 
    end

end