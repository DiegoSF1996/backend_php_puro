<?php 
use App\Helpers\Route;
use App\Controllers\UsuarioController;

Route::addRoute('GET','usuario/listar',UsuarioController::class,'listar');
Route::addRoute('POST','usuario/salvar',UsuarioController::class,'salvar');