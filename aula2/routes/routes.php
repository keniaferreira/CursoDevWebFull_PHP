<?php

use Src\Route as Route;
 
Route::get(['set' => '/contato', 'as' => 'contato.listar'], 'Controller\ContatosController@listar');

Route::get(['set' => '/contato/criar', 'as' => 'contato.criar'], 'Controller\ContatosController@formulario');

Route::post(['set' => '/contato/salvar', 'as' => 'contato.salvar'], 'Controller\ContatosController@editarSalvar');
 
Route::get(['set' => '/contato/editar', 'as' => 'contato.editar'], 'Controller\ContatosController@editarSalvar');

Route::get(['set' => '/contato/excluir', 'as' => 'contato.excluir'], 'Controller\ContatosController@excluir');