(defn pow
     [x y]
     (if (< y 0)
         (/ 1.0 (reduce * (take (- y) (repeat x))))
         (reduce * (take y (repeat x)))))