
module BookKeeping   
    VERSION = 4
  end
  
  
  class Complement
    
    def self.of_dna(sequence)
  
      rna = sequence
              .split("")
              .map { |x| case x
                          when "G" then "C"
                          when "C" then "G"
                          when "T" then "A"
                          when "A" then "U"
                          else "" 
                        end }
              .join("")
      
      rna.size == sequence.size ? rna : ""
      
    end       
                       
  end 