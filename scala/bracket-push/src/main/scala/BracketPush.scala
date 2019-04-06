object BracketPush {
  def isPaired(str: String): Boolean = {
    def helper(str: String, chr: List[Char]): Boolean = {
      if (str > "") {
        str.head match {
          case '['|'('|'{' => helper(str.tail, str.head::chr)
          case ']' => if (chr.head == '[') helper(str.tail, chr.tail) else false
          case ')' => if (chr.head == '(') helper(str.tail, chr.tail) else false
          case '}' => if (chr.head == '{') helper(str.tail, chr.tail) else false
          case _ => helper(str.tail, chr)                                                                                          
         }             
       } else chr == List('_')         
    }
    helper(str, List('_'))            
  }
}
