<?php

class database
{

    private $host;
    private $username;
    private $password;
    private $database;
    private $charset;
    private $db;

    // create class constants (admin and user)

    public function __construct($host, $username, $password, $database, $charset)
    {
        $this->host = $host; //localhost
        $this->username = $username; //root
        $this->password = $password;
        $this->database = $database;
        $this->charset = $charset;

        try {
            // DSN connection method
            /*
            - mysql driver
            - host (localhost/127.0.0.1)
            - database (schema) name
            - charset
            */
            $dsn = "mysql:host=$this->host;dbname=$this->database;charset=$this->charset";
            $this->db = new PDO($dsn, $this->username, $this->password);

            //   echo "Database connection successfully established";

        } catch (PDOException $e) {
            // die and exit are equivalent
            // exit-> Output a message and terminate the current script
            die("Unable to connect: " . $e->getMessage());
        }

    }

    public function login($username, $password)
    {
        $sql = "SELECT id, password FROM account WHERE username = :username";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['username' => $username]);

        // fetch should return an associative array (key, value pair)
        $result = $stmt->fetch();

        // check $result is an array
        if (is_array($result)) {

            // apply count on if $result is an array
            if (count($result) > 0) {

                // get hashed_password from database result with key 'password'
                $hashed_password = $result['password'];

                // verife that user exists and that provided password is the same as the hashed password
                if ($username && password_verify($password, $hashed_password)) {
                    session_start();

                    // store userdata in session variables
                    $_SESSION['id'] = $result['id'];
                    $_SESSION['username'] = $username;
                    $_SESSION['loggedin'] = true;

                    header("location: welcome.php");

                } else {
                    // returned an error message to show in span element in login form (index.php)
                    return "Incorrect username and/or password. Please fix your input and try again.";
                }
            }
        } else {
            // no matching user found in db. Make sure not to tell the user.
            return "Failed to login. Please try again";
        }
    }
}

?>
