<?php

Router::Connect('/PiePHP/', ['controller' => 'app', 'action' => 'index']);
Router::Connect('/PiePHP/register', ['controller' => 'user', 'action' => 'register']);
Router::Connect('/PiePHP/login', ['controller' => 'user', 'action' => 'login']);

Router::Connect('/PiePHP/test', ['controller' => 'user', 'action' => 'testEntity']);

