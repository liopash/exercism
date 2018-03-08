class PhoneNumber
  def self.clean(num)
    num = num.scan(/[0-9]/).delete_prefix('1')
    return unless num.size == 10
    return unless (2..9).cover?(num[0].to_i)
    return unless (2..9).cover?(num[3].to_i)
    num.join
  end
end

module BookKeeping
  VERSION = 2
end
