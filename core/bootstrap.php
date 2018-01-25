<?php

global $config;
$config = require 'config.php';

require 'functions.php';

// Controller
require './controllers/Comment.php';

// Model
require './model/Connection.php';
require './model/QueryBuilder.php';

global $query;
$query = new QueryBuilder( Connection::make( $config['db'] ) );