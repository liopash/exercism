(ns bob)

(defn response-for [s] 
    (cond
      (and (> (count (re-seq #"[A-Z]" s)) 1) 
           (= (count (re-seq #"[a-z]" s)) 0)) "Whoa, chill out!"
      (= \? (last s)) "Sure."
      (clojure.string/blank? s)  "Fine. Be that way!"
      :else "Whatever."
))

