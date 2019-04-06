object Leap {
  def leapYear(year: Int): Boolean = 
    year.%(4).equals(0) && 
    !year.%(100).equals(0) || 
    year.%(400).equals(0) 
}
