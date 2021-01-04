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


    /**
     * Fonction qui exécute la requête SQL
     * @param string $query
     * @param array $parameters *
     * @return bool Returns `true` on success, `false` otherwise
     */
    public function executeQuery(string $query, array $parameters = []) : bool{
        $this->stmt = parent::prepare($query);
        foreach ($parameters as $name => $value) {
            $this->stmt->bindValue($name, $value[0], $value[1]);
        }
        return $this->stmt->execute();
    }

    /**
     * Fonction qui renvoie sous forme de tableau le résultat de la requête SQL
     * @return array Résultat de la requête SQL
     */
    public function getResults() : array {
        return $this->stmt->fetchall();

    }
}


