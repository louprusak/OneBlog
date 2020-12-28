<?php

class Connection extends PDO {

    private $stmt;

    /**
     * Connection constructor.
     * @param string $dsn
     * @param string $username
     * @param string $password
     */
    public function __construct(string $dsn, string $username, string $password) {

        parent::__construct($dsn,$username,$password);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    /** * @param string $query
     * @param array $parameters *
     * @return bool Returns `true` on success, `false` otherwise
     */

    public function executeQuery(string $query, array $parameters = []) : bool{
        $this->stmt = parent::prepare($query);
        echo "prepare query ok";
        foreach ($parameters as $name => $value) {
            echo 'before bindvalue ok';
            $this->stmt->bindValue($name, $value[0], $value[1]);
            echo 'post bindvalue ok';
        }
        echo 'foreach ok';
        return $this->stmt->execute();
    }

    public function getResults() : array {
        return $this->stmt->fetchall();

    }
}


