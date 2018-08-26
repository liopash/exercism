module BookKeeping
  VERSION = 1
end

class Array

  def accumulate
    acc = []
    arr = self
    hd, *tail = arr
    return arr if hd.nil?

    loop do
      acc << yield(hd)
      hd, *tail = tail
      break if hd.nil?
    end
    acc 
 end
end
