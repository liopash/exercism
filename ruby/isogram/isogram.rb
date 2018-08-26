module BookKeeping
  VERSION = 4
end

# Isogram checker
class Isogram
  def self.isogram?(input)
    input = input.downcase.scan(/[a-z]/)
    input.uniq.length == input.length
  end
end

