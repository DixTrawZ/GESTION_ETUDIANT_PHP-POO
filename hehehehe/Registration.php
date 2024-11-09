<?php
    class Registration 
    {
        private $id;
        private $dateOfInscription;
        private $grade;
        private $studentId;
        private $courseId;

        public function __construct($id, $dateOfInscription, $grade, $studentId, $courseId) 
        {
            $this->id = $id;
            $this->dateOfInscription = $dateOfInscription;
            $this->grade = $grade;
            $this->studentId = $studentId;
            $this->courseId = $courseId;
        }

        public function saveToFile() 
        {
            $data = "{$this->id}, {$this->dateOfInscription}, {$this->grade}, {$this->studentId}, {$this->courseId}\n";
            file_put_contents("registrations.txt", $data, FILE_APPEND);
        }

        public static function displayFromFile() 
        {
            if (file_exists("registrations.txt")) 
            {
                $lines = file("registrations.txt");
                foreach ($lines as $line) 
                {
                    $line = trim($line);
                    if (!empty($line)) 
                    {
                        list($id, $dateOfInscription, $grade, $studentId, $courseId) = explode(", ", trim($line));
                        echo "<tr>";
                        echo "<td>$id</td>";
                        echo "<td>$dateOfInscription</td>";
                        echo "<td>$grade</td>";
                        echo "<td>$studentId</td>";
                        echo "<td>$courseId</td>";
                        echo "<td>";
                        echo "<button onclick=\"editRegistration('$id', '$dateOfInscription', '$grade', '$studentId', '$courseId')\">Update</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "<td>";
                        echo "<form action='supprimer_registration.php' method='post'>";
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
                echo "<tr><td>Aucune donnée d'inscription disponible.</td></tr>";
            }
        }

        public static function deleteFromFile($idToDelete) 
        {
            if (file_exists("registrations.txt")) 
            {
                $lines = file("registrations.txt");
                $updatedLines = [];
                foreach ($lines as $line) 
                {
                    $line = trim($line);
                    if (!empty($line)) 
                    {
                        list($id, $dateOfInscription, $grade, $studentId, $courseId) = explode(", ", $line);
                        if ($id != $idToDelete) 
                        {
                            $updatedLines[] = $line;
                    }
                }
                file_put_contents("registrations.txt", implode("\n", $updatedLines) . "\n");
                }
            }
        }

        public static function updateInFile($idToUpdate, $dateOfInscription, $grade, $studentId, $courseId) 
        {
            if (file_exists("registrations.txt")) 
            {
                $lines = file("registrations.txt");
                $updatedLines = [];
                foreach ($lines as $line) 
                {
                    $line = trim($line);
                    if (!empty($line)) 
                    {
                        list($id, $existingDateOfInscription, $existingGrade, $existingStudentId, $existingCourseId) = explode(", ", $line);
                        if ($id == $idToUpdate) 
                        {
                            $updatedLines[] = "{$idToUpdate}, {$dateOfInscription}, {$grade}, {$studentId}, {$courseId}";
                        } 
                        else 
                        {
                            $updatedLines[] = $line;
                        }
                    }
                }
                file_put_contents("registrations.txt", implode("\n", $updatedLines) . "\n");
            }
        }
    }
?>