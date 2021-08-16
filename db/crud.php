<?php
    class Attendee {
        private $db;

        function __construct($db) {
            $this->db = $db;
        }

        public function insert($firstName, $lastName, $dateBirth, $email, $phone, $specialty) {
            try {
                //code...
                $sql = 'INSERT INTO attendee(first_name, last_name, date_birth, email, contact_number, specialty_id) VALUES(:firstName, :lastName, :dateBirth, :email, :phone, :specialty)';
                $stmt = $this->db->prepare($sql);
                    
                $stmt->bindparam(':firstName', $firstName);
                $stmt->bindparam(':lastName', $lastName);
                $stmt->bindparam(':dateBirth', $dateBirth);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':phone', $phone);
                $stmt->bindparam(':specialty', $specialty);

                $stmt->execute();
                return true;

            } 
            catch (PDOException $e) {
                //throw $th;
                echo $e->getMessage();
                return false;
            }
        }

        public function getAttendees() {
            $sql = "SELECT * FROM attendee T INNER JOIN specialties K ON T.specialty_id = K.specialty_id";
            $result = $this->db->query($sql);

            return $result;
        }

        public function getSpecialties() {
            $sql = "SELECT * FROM specialties";
            $result = $this->db->query($sql);

            return $result;
        }

        public function getAttendeeDetails($id) {
            $sql = "SELECT * FROM attendee T INNER JOIN specialties K ON T.specialty_id = K.specialty_id WHERE attendee_id = :id";
            $stmt = $this->db->prepare($sql);

            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();

            return $result;
        }

        public function editAttendee($id, $firstName, $lastName, $dateBirth, $email, $phone, $specialty) {
            try {
                $query = "UPDATE attendee SET first_name = :firstName, last_name = :lastName, date_birth = :dateBirth, email = :email, contact_number = :phone, specialty_id = :specialty WHERE attendee_id = :id";
                $stmt = $this->db->prepare($query);

                $stmt->bindparam(':id', $id);
                $stmt->bindparam(':firstName', $firstName);
                $stmt->bindparam(':lastName', $lastName);
                $stmt->bindparam(':dateBirth', $dateBirth);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':phone', $phone);
                $stmt->bindparam(':specialty', $specialty);
                
                $stmt->execute();
                return true;
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function deleteAttendee($id) {
            try {
                $query = "DELETE FROM attendee WHERE attendee_id = :id";
                $stmt = $this->db->prepare($query);

                $stmt->bindparam(':id', $id);
                $stmt->execute();

                return true;
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }
    }
?>