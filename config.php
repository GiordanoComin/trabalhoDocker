<?php

$caminhoBanco = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $caminhoBanco);
$pdo->exec('CREATE TABLE numeros (id INTEGER PRIMARY KEY, numero_um TEXT, numero_dois TEXT, tipo_operacao TEXT, resultado TEXT);');