<?php
// 应用目录为当前目录
define('APP_PATH', __DIR__ . '/');

// 内核目录，通常系统将自适应，无需定义
//define('CORE_PATH', __DIR__ . '//kernels/');

// 调试模式控制
define('APP_DEBUG', true);

// 载入框架主体文件
require(APP_PATH . 'kernels/DFramework.php');

// 载入应用配置文件
$config = require(APP_PATH . 'config/config.php');

// 实例化框架类
(new dframework\DFramework($config))->run();
