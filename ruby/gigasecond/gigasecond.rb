module BookKeeping
    VERSION = 6 # Where the version number matches the one in the test.
end



class Gigasecond 
  
    def self.from(time)
         
        Time.at(time.to_i + 1_000_000_000)
    
    end
end