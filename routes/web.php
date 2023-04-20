<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WsCrudArticulo;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*Route::get('/articulo', function () {
    $serverName="LAPTOP-HCJ89HJ8\SQLEXPRESS";
    $Database="Muebleria";
    $UID="sa";
    $PWD="aaa";
    $connectionInfo=array("Database"=>"Muebleria", "UID"=>"sa", "PWD"=>"aaa");
    $con=sqlsrv_connect($serverName,$connectionInfo);
    $query="SELECT [id] ,[clasificacion]FROM [dbo].[clasificacion]";
    return view('articulo', compact('serverName', 'Database','UID','PWD', 'query'));
});*/

Route::get('/articulo', function () {
    $serverName="LAPTOP-HCJ89HJ8\SQLEXPRESS";
    $Database="Muebleria";
    $UID="sa";
    $PWD="aaa";
    $connectionInfo=array("Database"=>"Muebleria", "UID"=>"sa", "PWD"=>"aaa");
    $con=sqlsrv_connect($serverName,$connectionInfo);
    $query="SELECT [id] ,[clasificacion]FROM [dbo].[clasificacion]";
    $queryArl="SELECT [id], [precio], [idMedida], [IdClasificacion] FROM [dbo].[articulo]";
    $queryArlinf="SELECT [id], [precio], [idMedida], [IdClasificacion] FROM [dbo].[articulo] WHERE [id]=";
    $queryVw="SELECT dbo.medida.alto, dbo.medida.largo, dbo.medida.ancho FROM dbo.articulo INNER JOIN dbo.medida ON dbo.articulo.idMedida = dbo.medida.id WHERE dbo.articulo.id = ";
    return view('articulo', compact('serverName', 'Database','UID','PWD', 'query','queryArl', 'queryArlinf', 'queryVw'));
});


Route::post('/articulo', [App\Http\Controllers\WsCrudArticulo::class, 'store'])->name('articulo');

