<?php

namespace classes;

class database
{
    /**
     * @var string
     */
    private $host = "localhost";

    /**
     * @var string
     */
    private $username = "root";

    /**
     * @var string
     */
    private $password = "";
    /**
     * @var string
     */
    private $dbName = "";
    /**
     * @var int
     */
    private $port;
    /**
     * @var \PDO
     */
    private $connection;

    /**
     * database constructor.
     * @param $host
     * @param $username
     * @param $password
     * @param $dbName
     * @param int $port
     */
    public function __construct($host, $username, $password, $dbName, $port = 3306)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbName = $dbName;
        $this->port = $port;

        try {
            $connection = new \PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName . ";port=" . $this->port, $this->username, $this->password);
            $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->connection = $connection;

        } catch (\PDOException $exception) {
            echo "Error while database connect " . $exception->getMessage();
        }
    }

    /**
     * @return \PDO
     */

    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param $conn
     */

    public function setConnection($conn)
    {
        if ($conn instanceof \PDO) {
            $this->connection = $conn;
        }
    }

    /**
     * @return array
     */

    public function getMenuStuffs($session)
    {
        if(!empty($session)){
            $sql = "SELECT * FROM menu WHERE menu.logged_in = 1";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);

        }else{
            $sql = "SELECT * FROM menu WHERE menu.logged_in = 0";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

    }


    /**
     * @param $firstname
     * @param $lastname
     * @param $email
     * @param $password
     */

    public function register($firstname, $lastname, $email, $password)
    {
        $exists = false;
        $link = mysqli_connect('localhost', 'root', '', 'todos', 3306);

        $mysql_get_user = "SELECT * FROM users WHERE email='$email'";
        mysqli_select_db($link, 'todos');
        $retval = mysqli_query($link, $mysql_get_user);

        while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
            $exists = true;
        }
        if ($exists = true) {
            $message = "Tento používateľ už existuje!";
            echo "<script type='text/javascript'>alert('$message');</script>";

        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (meno,priezvisko,email,password) VALUES ('" . $firstname . "','" . $lastname . "','" . $email . "','" . $hashed_password . "')";

            $stmtinsert = $this->connection->prepare($sql);
            $stmtinsert->execute();
            if ($stmtinsert) {
                echo "Succesfull saved";
            } else {
                "Error";
            }
        }
    }

    public function login($email, $password)
    {
        $link = mysqli_connect('localhost', 'root', '', 'todos', 3306);

        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email) || empty($password)){
            $message = "Nesprávne meno alebo heslo";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }else{
            $sql = "SELECT * FROM users WHERE idusers =? || email=?;";
            $stmt = mysqli_stmt_init($link);
            if (!mysqli_stmt_prepare($stmt,$sql)){
                $message = "Nesprávne meno";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }else{
                mysqli_stmt_bind_param($stmt,"ss",$email,$email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($row = mysqli_fetch_assoc($result)){

                    $pwdCheck = password_verify($password, $row['password']);
                    if ($pwdCheck == false){

                        $message = "Nesprávne heslo";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    }
                    elseif ($pwdCheck == true){
                       // session_start();
                        $_SESSION['userId'] = $row['idusers'];
                        $_SESSION['userUID'] = $row['meno'];
//                        $message = "System in";
//                        echo "<script type='text/javascript'>alert('$message');</script>";
                            header("location: todo.php");
                            exit();
                    }else{
                        $message = "Nesprávne heslo";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    }

                }else{
                    $message = "Používateľ neexistuje";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }

            }
        }
    }

}
        ?>
