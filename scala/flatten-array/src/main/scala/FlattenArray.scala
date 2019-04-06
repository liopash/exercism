object FlattenArray {
  def flatten(arr: List[Any]): List[Any] =
    arr.foldLeft(Nil: List[Any])((acc,y) => {
      y match {
        case null=> acc
        case y:List[Any] => acc ::: flatten(y)
        case y:Int => acc ::: List(y)
        }
    })
}
