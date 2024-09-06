<?php

session_start();

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
            // UPDATE `movies` SET `id`='[value-1]',`name`='[value-2]',`level`='[value-3]',`length`='[value-4]',`ondate`='[value-5]',`publish`='[value-6]',`director`='[value-7]',`trailer`='[value-8]',`poster`='[value-9]',`intro`='[value-10]',`sh`='[value-11]',`rank`='[value-12]' WHERE 1
            $tmp = $this->a2s($arg);
            $sql = "update $this->table set " . join(",", $tmp);
            $sql .= " where `id` = {$arg['id']}";
        } else {
            $key = array_keys($arg);
            $sql = "insert into $this->table (`" . join("`,`", $key) . "`) values ('" . join("','", $arg) . "')";
        }
        return $this->pdo->exec($sql);
    }

    function del($arg)
    {
        $sql = "delete from $this->table where ";
        if (is_array($arg)) {
            $tmp = $this->a2s($arg);
            $sql .= join(" && ", $tmp);
        } else {
            $sql .= " `id` = {$arg}";
        }
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
            $tmp[] = "`{$key}` = '{$value}'";
        }
        return $tmp;
    }
}

function to($url)
{
    header("location:$url");
}

function dd($arg)
{
    echo "<pre>";
    print_r($arg);
    echo "</pre>";
}



$Admin = new DB("admin");
$Total = new DB("total");
$Bottom = new DB("bottom");
$Title = new DB('title');
$Ad = new DB('ad');
$Mvim = new DB('mvim');
$Image = new DB('image');
$News = new DB('news');
$Menu = new DB("menu");

if (!isset($_SESSION['views'])) {
    $total = $Total->find(1)['views'];
    $total++;
    $Total->save(['id' => 1, 'views' => $total]);
    // $Total->save($total);
    $_SESSION['views'] = $total;
}
