module BookKeeping
    VERSION = 3
end
  
#more then inspired by other solutions
module RunLengthEncoding
        
  def self.encode str
    str.chars.chunk(&:itself).map { |x,arr|  
    (arr.size > 1 ? arr.size.to_s : '') + x }.join
  end
      
  def self.decode str
    str.scan(/(\d*)(\D)/)
       .reduce(String.new) { |decoded, (num, char) |  
         decoded << (num.empty? ? char : char * num.to_i) }
  end

end