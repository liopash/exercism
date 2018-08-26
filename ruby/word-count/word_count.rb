module BookKeeping   
  VERSION = 1
end

class Phrase 
  
  def initialize sentence
    @s = sentence.downcase.scan(/\b[a-z0-9']+\b/)
  end
  
  def word_count
    @s.each_with_object(Hash.new(0)) { |x, w_count|
          w_count[x] += 1 }
  end

end

