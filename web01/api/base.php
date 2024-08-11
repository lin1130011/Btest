<?php
class DB
{
    public $table;
    public $dsn = "mysql:host=localhost;dbname=db1;charset=utf8";
    public $pdo;

    function __construct($table)
    {
        $this->table = $table;

        $this->pdo = new PDO($this->dsn, 'root', '');
    }

    function all(...$arg)
    {
        $sql = "SELECT * from $this->table";
        if (is_array($arg[0])) {
            $tmp = $this->a2s($arg[0]);
            $sql .= " WHERE " . join(" && ", $tmp);
        } else {
            $sql .= $arg[0];
        }

        if (isset($arg[1])) {
            $sql .= $arg[1];
        }

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function find($arg)
    {
        $sql = "SELECT * from $this->table";

        if (is_array($arg)) {
            $tmp = $this->a2s($arg);
            $sql .= " WHERE " . join(" && ", $tmp);
        } else {
            $sql .= " WHERE `id` = $arg";
        }

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function a2s($array)
    {
        $tmp = [];
        foreach ($array as $key => $value) {
            $tmp[] = "`{$key}` = '{$value}'";
        }
        return $tmp;
    }
}

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
