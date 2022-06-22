<?php
include_once("model/Book.php");
class Model{
    public function getBookList(){

        $host = "sql200.epizy.com"; /* Host name */
        $user = "epiz_31121671"; /* User */
        $password = "7XhEahxb5zgcPgN"; /* Password */
        $dbname = "epiz_31121671_db1"; /* Database name */

        $conn = mysqli_connect($host, $user, $password,$dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM PetrovicKnjige26719";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
            $books = [];
            while($row = $result->fetch_assoc()) {
                //$books[] = array($row["naziv"] => new Book($row["naziv"],$row["autor"],$row["opis"]) );
                $books[$row["naziv"]] = new Book($row["naziv"],$row["autor"],$row["opis"]) ; 
                //echo $row["id"] . "<br>";
                //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();

        //print_r($books);

        return $books;
        /*return array(
            "Jungle Book" => new Book("Jungle Book","R. Kipling","A classic."),
            "Moonwalker" => new Book("Moonwalker","J. Walker",""),
            "PHP for Dummies" => new Book("PHP for Dummies","N.N.","")
        );*/
    }
    public function getBook($title){
        $allBooks = $this->getBookList();
        return $allBooks[$title];
    } 

    public function insertBook($naziv, $autor, $opis){
        
        $host = "sql200.epizy.com"; /* Host name */
        $user = "epiz_31121671"; /* User */
        $password = "7XhEahxb5zgcPgN"; /* Password */
        $dbname = "epiz_31121671_db1"; /* Database name */

        $conn = mysqli_connect($host, $user, $password,$dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO PetrovicKnjige26719 (naziv, autor, opis)VALUES ('" . $naziv . "','" . $autor. "','" . $opis . "')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else 
         {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }   

        $conn->close();
    }

    public function deleteBook($naziv){
        
        $host = "sql200.epizy.com"; /* Host name */
        $user = "epiz_31121671"; /* User */
        $password = "7XhEahxb5zgcPgN"; /* Password */
        $dbname = "epiz_31121671_db1"; /* Database name */

        $conn = mysqli_connect($host, $user, $password,$dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "DELETE FROM PetrovicKnjige26719 WHERE naziv = '" . $naziv . "'";
        
        if ($conn->query($sql) === TRUE) {
            echo "record deleted";
        } 
        else 
         {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }   

        $conn->close();
    }

    public function updateBook($naziv, $autor, $opis){

        $host = "sql200.epizy.com"; /* Host name */
        $user = "epiz_31121671"; /* User */
        $password = "7XhEahxb5zgcPgN"; /* Password */
        $dbname = "epiz_31121671_db1"; /* Database name */

        $conn = mysqli_connect($host, $user, $password,$dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = " UPDATE PetrovicKnjige26719 SET naziv='" . $naziv . "', autor='" . $autor . "', opis='" . $opis . "' WHERE naziv = '" . $naziv . "'";

        if ($conn->query($sql) === TRUE) {
            echo "record updated";
        } 
        else 
         {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }   

        $conn->close();
    }

}
?>