<?php
class DB
{
    public $table;
    public $dsn = "mysql:host=localhost;dbname=db3;chatset=utf8";
    public $pdo;

    function __construct($table)
    {
        $this->table = $table;

        $this->pdo = new PDO($this->dsn, 'root', '');
    }

    function all(...$arg)
    {
        $sql = "select * from $this->table";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);

                $sql .= " where " . join(",", $tmp);
            } else {
                $sql .= $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function a2s($arg)
    {
        $tmp = [];

        foreach ($arg as $key => $value) {
            $tmp[] = "`$key` = '$value'";
        }
        return $tmp;
    }
}
