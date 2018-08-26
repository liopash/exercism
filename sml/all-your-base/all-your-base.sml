fun pow b e = 
    if e = 0 
    then 1 
    else b * pow b (e-1);

(*
fun rebase (input_base: int, input_digits: int list, output_base: int): int list option =
*)
fun rebase (a,b,c) =  
      foldr (fn (x,int) => int + x * (pow a (length(b) - 1))) 0 b
    

  (*raise Fail "'rebase' is not implemented"
  let 
                  fun power b e : real = if e = 0 then 1.0 else b * power b (e-1);
               in 
  *)