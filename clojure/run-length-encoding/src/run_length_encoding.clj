(ns run-length-encoding)

(defn run-length-encode
  "encodes a string with run-length-encoding"
  [s]
  (let [parted (map first (partition-by identity s))
        counted (map count (partition-by identity s))]        
      (reduce str 
        (map #(str (if (= %1 1) "" %1) %2) counted parted))))

(defn run-length-decode
  "decodes a run-length-encoded string"
  [s]
  (let [decode (fn [r x] 
            (if (re-matches #"\d+" x) 
                (assoc r 1 (read-string x)) 
                (assoc r 1 1 0 (str (first r) (apply str (repeat (last r) x))))))]
  (first (reduce decode ["" 1]  (re-seq #"\d+|\D" s)))))

(run-length-decode "12opicie7k")