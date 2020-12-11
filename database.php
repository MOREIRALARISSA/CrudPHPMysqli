<?php

$host = 'database-crud.c9grdhgtjmgc.us-east-1.rds.amazonaws.com';
$user = 'admin';
$password = 'Lasouza123*';
$database= 'cadastro';

$connection = new mysqli($host, $user, $password, $database);
// $connection = new mysqli('localhost', 'root', '', 'cadastro');

if ($connection->connect_error) {
    exit("Error: {$connection->connect_error}");
}

function getCad($connection) {
    $html = '';
    $sql = 'select * from clientes order by id desc';
    $results = $connection->query($sql);
    if ($results->num_rows) {
        while($cliente = $results->fetch_object()) {
            $html .= "<tr>
                        <td>{$cliente->id}</td>
                        <td>{$cliente->nome}</td>
                        <td>{$cliente->email}</td>
                        <td>{$cliente->cidade}</td>
                        <td>{$cliente->estado}</td>
                    </tr>";
        }
        return $html;
    }
}

function formIsValid() {
    $valid = true;
    if(empty($_POST['name'])) {
        $valid = false;
    } else if(empty($_POST['email'])) {
        $valid = false;
    } else if(empty($_POST['city'])) {
        $valid = false;
    } else if(empty($_POST['uf'])) {
        $valid = false;
    }
    return $valid;
}

$html = getCad($connection);

if(formIsValid() && isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $uf = $_POST['uf'];

    $sql = 'insert into clientes (nome, email, cidade, estado) values (?, ?, ?, ?)';
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('ssss', $name, $email, $city, $uf);
    $stmt->execute();

    $html = getCad($connection);

    $stmt->close();
    $connection->close();
}

if(isset($_POST['edit']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $uf = $_POST['uf'];

    $sql = 'update clientes set nome = ?, email = ?, cidade = ?, estado = ? where id = ?';
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('ssssi', $name, $email, $city, $uf, $id);
    $stmt->execute();

    $html = getCad($connection);

    $stmt->close();
    $connection->close();
}

if(isset($_POST['delete']) && isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = 'delete from clientes where id = ?';
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $html = getCad($connection);
    
    $stmt->close();
    $connection->close();
}

