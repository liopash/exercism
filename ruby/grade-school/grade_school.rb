class School
  def initialize
    @school = {}
  end

  def add(student, grade)
    @school.store(student, grade)
  end

  def students(grade)
    match = ->(_k, v) { v == grade }
    @school.select(&match).keys.sort
  end

  def students_by_grade
    formated_school = @school.each_with_object(Hash.new([])) do |(student, grade), memo|
      memo[grade] += student.split
    end
    formated_school.sort.map { |k, v| { grade: k, students: v.sort } }
  end
end

module BookKeeping
  VERSION = 3
end
