<?php

$Empresa = $_POST['Empresa'];
$Produtor = $_POST['Produtor'];
$Valor = $_POST['Valor'];
$Prazo = $_POST['Prazo'];
$Qtde = $_POST['Qtde'];
$NF = $_POST['NF'];
$Produtor1 = $_POST['Produtor1'];
$Valor1 = $_POST['Valor1'];
$Prazo1 = $_POST['Prazo1'];
$Qtde1 = $_POST['Qtde1'];
$NF1 = $_POST['NF1'];
$Produtor2 = $_POST['Produtor2'];
$Valor2 = $_POST['Valor2'];
$Prazo2 = $_POST['Prazo2'];
$Qtde2 = $_POST['Qtde2'];
$NF2 = $_POST['NF2'];
$Produtor3 = $_POST['Produtor3'];
$Valor3 = $_POST['Valor3'];
$Prazo3 = $_POST['Prazo3'];
$Qtde3 = $_POST['Qtde3'];
$NF3 = $_POST['NF3'];
$Cliente = $_POST['Cliente'];
$Qtde4 = $_POST['Qtde4'];
$Boleto = $_POST['Boleto'];
$data_atual = date('d/m/y');
$hora_atual = date('H:i:s');

$server = 'localhost:8080';
$usuario = "root";
$senha = '';
$banco = 'formulario_pedido';

$conn = new mysqli($server, $usuario, $senha, $banco);

if($conn->connect_error){
    die("Falha ao se comunicar cm o banco de dados: ".conn->connect_error);
}
$smtp = $conn->prepare("INSERT TO dados teste (Empresa, Produtor, Valor, Prazo, Qtde, NF, Produtor1, Valor1, Prazo1, Qtde1, NF1, Produtor2, Valor2, Prazo2, Qtde2, NF2, Produtor3, Valor3, Prazo3, Qtde3, NF3, Cliente, Qtde4, Boleto, data, hora) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$smtp->bind_param("ssssssssssssssssssssssssss", $Empresa, $Produtor, $Valor, $Prazo, $Qtde, $NF, $Produtor1, $Valor1,$Prazo1, $Qtde1, $NF1, $Produtor2, $Valor2, $Prazo2, $Qtde2, $NF2, $Produtor3, $Valor3, $Prazo3, $Qtde3, $NF3, $Cliente, $Qtde4, $Boleto, $data_atual, $hora_atual);

if($smtp->execute()){
    echo "Mensagem enviada com sucesso!";
} else{
    echo "Erro no envio da mensagem: ".smtp->error;
}
$smtp->close();
$conn->close();
