<?php
    class Teacher 
    {
        private $id;
        private $lastName;
        private $firstName;
        private $specialty;
        private $courseList;

        public function __construct($id, $lastName, $firstName, $specialty,$courseList) 
        {
            $this->id = $id;
            $this->lastName = $lastName;
            $this->firstName = $firstName;
            $this->specialty = $specialty;
            $this->courseList = $courseList;
        }

        /*public function addCouse($course) 
        {
            $this->courseList[] = $course;
        }*/

        public function saveToFile() 
        {
            $courses = implode(",", $this->courseList);
            $data = "{$this->id},{$this->lastName},{$this->firstName},{$this->specialty},{$courses}\n";
            file_put_contents("teachers.txt", $data, FILE_APPEND);
        }

        public static function displayFromFile() 
        {
            if (file_exists("teachers.txt")) 
            {
                $lines = file("teachers.txt");
                foreach ($lines as $line) 
                {
                    $line = trim($line);
                    if (!empty($line)) 
                    {
                        list($id, $lastName, $firstName, $specialty, $courseList) = explode(",", trim($line), 5);   
                        $courses = explode(",", $courseList);
                        echo "<tr>";
                        echo "<td>$id</td>";
                        echo "<td>$lastName</td>";
                        echo "<td>$firstName</td>";
                        echo "<td>$specialty</td>";
                        echo "<td>" . implode(", ", $courses) . "</td>";
                        echo "<td>";
                        echo "<button onclick=\"editTeacher('$id', '$lastName', '$firstName', '$specialty', '" . implode(', ', $courses) . "')\">Update</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "<td>";
                        echo "<form action='supprimer_teacher.php' method='post'>";
                        echo "<input type='hidden' name='id' value='$id'>";
                        echo "<input type='submit' value='Supprimer'>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                }
            } 
            else 
            {
                echo "<tr><td>Aucune donnée d'enseignants disponible.</td></tr>";
            }
        }
        
        public static function deleteFromFile($idToDelete) 
        {
            if (file_exists("teachers.txt")) 
            {
                $lines = file("teachers.txt");
                $updatedLines = [];
                foreach ($lines as $line) 
                {
                    $line = trim($line);
                    if (!empty($line)) 
                    {
                        list($id, $lastName, $firstName, $specialty, $courseList) = explode(",", $line);
                        if ($id != $idToDelete) 
                        {
                            $updatedLines[] = $line;
                        }
                    }
                }  
                file_put_contents("teachers.txt", implode("\n", $updatedLines) . "\n");
            }
        }

        public static function updateInFile($id, $lastName, $firstName, $specialty, $courseList) 
        {
            if (file_exists("teachers.txt")) 
            {
                $lines = file("teachers.txt");
                $updatedLines = [];
                foreach ($lines as $line) 
                {
                    $line = trim($line);
                    if (!empty($line)) 
                    {
                        list($lineId, $oldLastName, $oldFirstName, $oldSpecialty, $oldCourseList) = explode(",", $line);
                        if ($lineId == $id) 
                        {
                            if (!is_array($courseList)) {
                                $courseList = explode(',', $courseList);
                            }
                            
                            $courses = implode(",", $courseList); 
                            $updatedLines[] = "{$id},{$lastName},{$firstName},{$specialty},{$courses}";
                        } 
                        else 
                        {
                            $updatedLines[] = $line;
                        }
                    }
                }  
                file_put_contents("teachers.txt", implode("\n", $updatedLines) . "\n");
            }
        }
        

        
        
    }
?>