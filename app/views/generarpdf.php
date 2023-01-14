<?php

require_once "vendor/autoload.php";
require_once "app/controllers/crudclientes.php";


$html = "<!DOCTYPE html>
<html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <title>Informe $cli->first_name</title>
        <style>
            body{
                font-family: 'Times New Roman', Times, serif;
                font-size: 1.5rem;
                padding:0;
                margn:0;
                box-sizing: border-box;
                background-color: white;
            }
            h1{
                background-color: blue;
                color: white;
                text-align: center;
                text-shadow: 2px 2px 2px black;
                
            }
            
            table{
                width: 100%;
            }

            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                background-color: cornflowerblue;
            }
            th, td {
                padding: .8rem;
                
            }
            td{
                text-align: center;
            }
            th{
                width: 30%;
                text-align: left;           
            }
        </style>
    </head>
    <body>
        <h1>Informe de $cli->first_name $cli->last_name</h1>
            <table>
                <tr>
                    <th>ID</th>
                    <td>$cli->id</td>
                </tr>
                <tr>
                    <th>NOMBRE</th>
                    <td>$cli->first_name</td>
                </tr>
                <tr>
                    <th>APELLIDO</th>
                    <td>$cli->last_name</td>
                </tr>
                <tr>
                    <th>EMAIL</th>
                    <td>$cli->email</td>
                </tr>
                <tr>
                    <th>GÉNERO</th>
                    <td>$cli->gender</td>
                </tr>
                <tr>
                    <th>IP</th>
                    <td>$cli->ip_address</td>
                </tr>
                <tr>
                    <th>TELÉFONO</th>
                    <td>$cli->telefono</td>
                </tr>
            </table>
    </body>
</html>";

$mpdf = new \Mpdf\Mpdf;
$mpdf->WriteHTML($html);
$mpdf->Output();
