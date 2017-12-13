<?php
$servername = "localhost";
$username = "Marcos";
$password = "0800";
$dbname = "DrawingLand";
$Nickname = $_POST['Nickname'];
$UserKey = $_POST['UserKey'];
$sent = $_POST['sent'];
//
if($sent == "Cadastrar"){
        ob_start();
        // Create connection
        $conn = mysql_connect($servername, $username, $password) or die("Conexão Interrompida");
        // Check connection 
                mysql_select_db($dbname) or die ("Erro ao selecionar o banco");
				$test = mysql_fetch_row("SELECT Nickname FROM Post WHERE Nickname = '$Nickname'");
				if($test){
					echo "<script>imap_alerts('Nome de Usuário já existente, tente outro por favor...')</script>";
				}else{
                $query = "INSERT INTO User(Nickname,UserKey) VALUES ('$Nickname','$UserKey');";
                $query = mysql_query($query)or die("Erro ao inserir no banco");
				echo "<script>imap_alerts('Redirecioando para a tela de Login.')</script>";
                header("Location:DrawingLandLogin.html");
                mysql_close($conn);
				}
}
?>