<?php
    class Course 
    {
        private $id;
        private $name;
        private $description;
        private $credits;
        private $teacherId;

        public function __construct($id, $name, $description, $credits, $teacherId) 
        {
            $this->id = $id;
            $this->name = $name;
            $this->description = $description;
            $this->credits = $credits;
            $this->teacherId = $teacherId;
        }

        public function saveToFile() 
        {
            $data = "{$this->id}, {$this->name}, {$this->description}, {$this->credits}, {$this->teacherId}\n";
            file_put_contents("courses.txt", $data, FILE_APPEND); 
        }

        public static function displayFromFile() 
        {
            if (file_exists("courses.txt")) 
            {
                $lines = file("courses.txt");
                foreach ($lines as $line) 
                {   
                    $line = trim($line);
                    if (!empty($line)) 
                    {
                        list($id, $name, $description, $credits, $teacherId) = explode(", ", trim($line));
                        echo "<tr>";
                        echo "<td>$id</td>";
                        echo "<td>$name</td>";
                        echo "<td>$description</td>";
                        echo "<td>$credits</td>";
                        echo "<td>$teacherId</td>";
                        echo "<td>";
                        echo "<button onclick='editCourse(\"$id\", \"$name\", \"$description\", \"$credits\", \"$teacherId\")'>Updateeee</button>";
                        echo "</td>";
                        echo "<td>";
                        echo "<form action='supprimer_course.php' method='post'>";
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
                echo "<tr><td>Aucune donnée de cours disponible.</td></tr>";
            }
        }

        public static function deleteFromFile($id) 
        {
            $courses = [];
            if (file_exists("courses.txt")) 
            {
                $lines = file("courses.txt");
                foreach ($lines as $line) 
                {
                    list($currentId, $name, $description, $credits, $teacherId) = explode(", ", trim($line));
                    if ($currentId != $id) 
                    {
                        $courses[] = trim($line);
                    }
                }
                file_put_contents("courses.txt", implode("\n", $courses) . "\n");
            }
        }

        public static function updateInFile($idToUpdate, $name, $description, $credits, $teacherId) 
        {
            if (file_exists("courses.txt")) 
            {
                $lines = file("courses.txt");
                $updatedLines = [];
                foreach ($lines as $line) 
                {
                    $line = trim($line);
                    if (!empty($line)) 
                    {
                        list($id, $existingName, $existingDescription, $existingCredits, $existingTeacherId) = explode(", ", $line);
                        if ($id == $idToUpdate) 
                        {
                            $updatedLines[] = "{$idToUpdate}, {$name}, {$description}, {$credits}, {$teacherId}";
                        } 
                        else 
                        {
                            $updatedLines[] = $line;
                        }
                    }
                }
                file_put_contents("courses.txt", implode("\n", $updatedLines) . "\n");
            }
        }
    }
?>