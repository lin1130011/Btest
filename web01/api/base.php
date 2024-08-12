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
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " WHERE " . join(" && ", $tmp);
            } else {
                $sql .= $arg[0];
            }
        }

        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        // echo $sql;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function find($arg)
    {
        $sql = "SELECT * from $this->table";

        if (is_array($arg)) {
            $tmp = $this->a2s($arg);
            $sql .= " WHERE " . join(",", $tmp);
        } else {
            $sql .= " WHERE `id` = $arg";
        }

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function save($arg)
    {
        if (isset($arg['id'])) {
            $tmp = $this->a2s($arg);
            $sql = "UPDATE `$this->table` SET " . join(",", $tmp) . " WHERE `id` = '{$arg['id']}'";
        } else {
            // $sql= "INSERT INTO `$this->table`(`id`, `name`, `mobile`, `age`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')"
            $key = array_keys($arg);
            $sql = "INSERT INTO `$this->table` (`" . join("`,`", $key) . "`) VALUES ('" . join("','", $arg) . "')";
        }
        return $this->pdo->query($sql);
    }

    function del($arg)
    {
        if (is_array($arg)) {
            $tmp = $this->a2s($arg);
            $sql = "DELETE from $this->table where " . join(" && ", $tmp);
        } else {
            $sql = "DELETE from $this->table where `id` = $arg";
        }
        return $this->pdo->query($sql);
    }

    function count(...$arg)
    {
        $sql = "select count(*) from $this->table";
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
        // echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
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

function to($url)
{
    header("location:$url");
}
function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
