(ns armstrong-numbers)

(defn exp [x n]
  (loop [acc 1 n n]
    (if (zero? n) acc
        (recur (* x acc) (dec n)))))

(defn armstrong? [n]
    (let [nn (count (str n))
          arr (into [] (str n))]
         (= n (reduce + (map #(exp (Character/getNumericValue %) nn) arr)))))

