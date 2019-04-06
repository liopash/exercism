<?php

class School
{

    protected $school = [];

    public function add(string $name, string $grade) : array
    {
        $this->school[$grade][] = $name;
        return $this->school;
    }

    public function grade(string $grade) : array
    {
        return $this->school[$grade] ?? [];
    }

    public function numberOfStudents() : int
    {
        return array_sum(array_map('count', $this->school));

    }
    
    public function studentsByGradeAlphabetical() : array
    {
        return array_map(function ($item) {
            sort($item);
            return $item;
        }, $this->school);

    }
}