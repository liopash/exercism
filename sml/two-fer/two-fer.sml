fun name (input: string option): string =
   case input of 
     NONE => "One for you, one for me."
   | SOME input => "One for " ^ input ^ ", one for me."