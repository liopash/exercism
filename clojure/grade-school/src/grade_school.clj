(ns grade-school)

;(def db {})

(defn add [db p g] (if (db g) 
                    (assoc db g (into (db g) [p])) 
                    (assoc db g (vector p))))

(defn grade [db g] 
    (into [] (db g)))
  
(defn sorted [db]
  (reduce (fn [x y] (assoc x (first y) (into [] (sort (second y))))) {} (sort db)))