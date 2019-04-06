class School {
  type DB = Map[Int, Seq[String]]

  var _mem: DB = Map().withDefaultValue(List.empty)

  def add(name: String, g: Int) = 
        _mem += (g -> (_mem(g)++List(name)))

  def db: DB = _mem

  def grade(g: Int): Seq[String] = _mem.getOrElse(g,Seq())

  def sorted: DB = _mem.mapValues(_.sorted).toList.sortBy(_._1).toMap
}
