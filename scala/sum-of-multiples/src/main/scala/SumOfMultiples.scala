object SumOfMultiples {
  def sum(factors: Set[Int], limit: Int): Int = { 
    def loop(factors: Set[Int], limit: Int, acc: Int): Int = {  
      if (limit <= 0) acc
        else if (factors.exists(x => limit % x == 0)) loop(factors, limit - 1, acc + limit)
          else loop(factors, limit - 1, acc)
    }
    loop(factors, limit - 1, 0)
  }
}
