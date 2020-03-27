<?php

Router::Connect('/PiePHP/', ['controller' => 'app', 'action' => 'index']);
Router::Connect('/PiePHP/register', ['controller' => 'user', 'action' => 'add']);
