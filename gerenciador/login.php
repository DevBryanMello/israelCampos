<?php
session_start();

if(isset($_POST['email']) && !empty($_POST['email'])){
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));

    $dns = "mysql:dbname=israelcampos;host=localhost";
    $dbuser = "root";
    $dbpass = "";

    try{
        $pdo = new PDO($dns,$dbuser,$dbpass);
        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql = $pdo->query($sql);

        if($sql->rowCount() > 0){

            $dado = $sql->fetch();
            $_SESSION['id'] = $dado['id'];
            header("Location: admin.php");
        }
        
    } catch(PDOException $e) {
        echo "Falhou: ".$e->getMessage();
    }
}
?>

<html lang="pt-BR">
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="../assets/css/login.css">
        <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    </head>
</html>
<form method="POST">
    <label for="email">Email:</label>
    <input type="text" name="email" /><br><br>

    <label for="senha">Senha:</label>
    <input type="password" name="senha"><br><br>

    <input class="btnEntrar" type="submit" value="Entrar">

</form>