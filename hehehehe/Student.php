<?php
    class Student 
    {
        private $id;
        private $lastName;
        private $firstName;
        private $dateOfBirth;
        private $registrationList;

        public function __construct($id, $lastName, $firstName, $dateOfBirth, $registrationList) 
        {
            $this->id = $id;
            $this->lastName = $lastName;
            $this->firstName = $firstName;
            $this->dateOfBirth = $dateOfBirth;
            $this->registrationList = $registrationList;
        }

        /*public function addRegistration($registration) 
        {
            $this->registrationList[] = $registration;
        }*/

        public function saveToFile() 
        {
            $registrationListJson = json_encode($this->registrationList);
            $data = "{$this->id}, {$this->lastName}, {$this->firstName}, {$this->dateOfBirth}, {$registrationListJson}\n";
            file_put_contents("students.txt", $data, FILE_APPEND);
        }

        public static function displayFromFile() 
        {
            if (file_exists("students.txt")) 
            {
                $lines = file("students.txt");
                foreach ($lines as $line) 
                {
                    $line = trim($line);
                    if (!empty($line)) 
                    {
                        list($id, $lastName, $firstName, $dateOfBirth, $registrationListJson) = explode(",", trim($line), 5);
                        $registrationList = json_decode(trim($registrationListJson), true);
                        if ($registrationList === null) 
                        {
                            $registrationList = [];
                        }
                        echo "<tr>";
                        echo "<td>$id</td>";
                        echo "<td>$lastName</td>";
                        echo "<td>$firstName</td>";
                        echo "<td>$dateOfBirth</td>";
                        echo "<td>" . implode(", ", $registrationList) . "</td>";
                        echo "<td>";
                        echo "<button onclick=\"editStudent('$id', '$lastName', '$firstName', '$dateOfBirth', '" . implode(', ', $registrationList) . "')\">Update</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "<td>";
                        echo "<form action='supprimer_etudiant.php' method='post'>";
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
                echo "<tr><td>Aucune donnée d'élèves disponible.</td></tr>";
            }
        }

        public static function deleteFromFile($idToDelete) 
        {
            if (file_exists("students.txt")) 
            {
                $lines = file("students.txt");
                $updatedLines = [];
                foreach ($lines as $line) 
                {
                    $line = trim($line);
                    if (!empty($line)) 
                    {
                        list($id, $lastName, $firstName, $dateOfBirth, $registrationListJson) = explode(",", $line);
                        if ($id != $idToDelete) 
                        {
                            $updatedLines[] = $line;
                        }
                    }
                }
                file_put_contents("students.txt", implode("\n", $updatedLines) . "\n");
            }
        }

        public static function updateInFile($id, $lastName, $firstName, $dateOfBirth, $registrationList) 
        {
            if (file_exists("students.txt")) 
            {
                $lines = file("students.txt");
                $updatedLines = [];
                foreach ($lines as $line) 
                {
                    $line = trim($line);
                    if (!empty($line)) 
                    {
                        list($lineId, $oldLastName, $oldFirstName, $oldDateOfBirth, $oldRegistrationListJson) = explode(",", $line);
                        if ($lineId == $id) 
                        {
                            $registrationListJson = json_encode($registrationList); 
                            $updatedLines[] = "{$id}, {$lastName}, {$firstName}, {$dateOfBirth}, {$registrationListJson}";
                        } 
                        else 
                        {
                            $updatedLines[] = $line;
                        }
                    }
                }  
                file_put_contents("students.txt", implode("\n", $updatedLines) . "\n");
            }
        }

    }
?>