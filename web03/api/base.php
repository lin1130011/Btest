<?php
session_start();
class DB
{
    public $table;
    public $dsn = "mysql:host=localhost;dbname=db3;charset=utf8";
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

    function find($arg)
    {
        $sql = "select * from $this->table";
        if (is_array($arg)) {
            $tmp = $this->a2s($arg);
            $sql .= " where " . join(" && ", $tmp);
        } else {
            $sql .= " where `id` = $arg";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function save($arg)
    {
        if (isset($arg['id'])) {
            $tmp = $this->a2s($arg);
            $sql = "update $this->table set " . join(" , ", $tmp) . " where `id` = '{$arg['id']}'";
        } else {
            $keys = array_keys($arg);
            $sql = "INSERT INTO $this->table (`" . join("`,`", $keys) . "`) values ('" . join("','", $arg) . "')";
        }
        // echo $sql;
        return $this->pdo->exec($sql);
    }

    function del($arg)
    {
        $sql = "delete from $this->table";
        if (is_array($arg)) {
            $tmp = $this->a2s($arg);
            $sql .= " where " . join(" && ", $tmp);
        } else {
            $sql .= " where `id` = $arg";
        }
        return $this->pdo->exec($sql);
    }

    function count(...$arg)
    {
        $sql = "select count(*) from $this->table";
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
        return $this->pdo->query($sql)->fetchColumn();
    }

    function max(...$arg)
    {
        $sql = "select max(`id`) from $this->table";
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
        return $this->pdo->query($sql)->fetchColumn();
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

function q($sql)
{
    $dsn = "mysql:host=localhost;charset=utf8;dbname=db3";
    $pdo = new PDO($dsn, 'root', '');
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function dd($arg)
{
    echo "<pre>";
    print_r($arg);
    echo "</pre>";
}

function to($url)
{
    header("location:$url");
}

$Poster = new DB('poster');
