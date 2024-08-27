<?php
session_start();
class DB
{
    public $table;
    public $dsn = "mysql:host=localhost;dbname=db2;charset=utf8";
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
                $sql .= " where " . join(" && ", $tmp);
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
            // UPDATE `t` SET `id`='[value-1]',`img`='[value-2]',`text`='[value-3]',`sh`='[value-4]' WHERE 1
            $tmp = $this->a2s($arg);
            $sql = " update $this->table set " . join(" , ", $tmp) . " where `id` = '{$arg['id']}'";
        } else {
            // INSERT INTO `t`(`id`, `img`, `text`, `sh`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')
            $keys = array_keys($arg);
            $sql = "insert into `$this->table` (`" . join("`,`", $keys) . "`) values ('" . join("','", $arg) . "')";
        }
        // echo $sql;
        return $this->pdo->exec($sql);
    }

    function del($arg)
    {
        $sql = "delete from $this->table where ";
        if (is_array($arg)) {
            $tmp = $this->a2s($arg);
            $sql .= join(" && ", $tmp);
        } else {
            $sql .= " `id` = '$arg'";
        }
        // echo $sql;
        return $this->pdo->exec($sql);
    }

    function count(...$arg)
    {
        $sql = "select count(*) from $this->table";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " where " . join(" && ", $tmp);
            } else {
                $sql .= " where " . $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        // echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
    }

    function a2s($arg)
    {
        $tmp = [];

        foreach ($arg as $key => $value) {
            $tmp[] = "`{$key}` = '{$value}'";
        }
        return $tmp;
    }
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
