<?php

Router::Connect('/PiePHP/', ['controller' => 'app', 'action' => 'index']);
Router::Connect('/PiePHP/register', ['controller' => 'user', 'action' => 'register']);
Router::Connect('/PiePHP/login', ['controller' => 'user', 'action' => 'login']);

Router::Connect('/PiePHP/user/list', ['controller' => 'user', 'action' => 'listAllUser']);
Router::Connect('/PiePHP/user/details', ['controller' => 'user', 'action' => 'DetailUser']);
Router::Connect('/PiePHP/user/delete', ['controller' => 'user', 'action' => 'deleteUser']);