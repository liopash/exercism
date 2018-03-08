class Series
  def initialize(sequence)
    @s = sequence
  end

  def slices(num)
    raise ArgumentError if @s.length < num
    @s.chars.map.with_index do |_, i|
      t = @s[i..i + num - 1]
      t if t.size == num
    end.compact
  end
end
