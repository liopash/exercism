(ns rna-transcription)

(defn to-rna [dna]
  (let [rna {\G \C 
             \C \G 
             \T \A 
             \A \U}]
      (assert (not (re-find #"[^CGTA]" dna))) 
      (clojure.string/join (map #(rna %) (seq dna)))))