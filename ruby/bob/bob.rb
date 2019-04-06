module BookKeeping
  VERSION = 1 # Where the version number matches the one in the test.
end


class Bob 

    def self.hey remark
      
        if remark.scan(/[A-Z]/).size > 1 && remark.scan(/[a-z]/).size == 0
          "Whoa, chill out!" 
        elsif remark.strip[-1] == "?" 
          "Sure." 
        elsif remark.scan(/\s/).size == remark.size 
          "Fine. Be that way!"
        else  
          "Whatever."
        end  
    end
    
end