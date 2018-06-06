# DFramework

PHP MVC 快速开发框架

## 简述

**DFramework** - 一款极简的MVC框架，基于PHP开发。

要求：

* PHP 5.3.0+ 推荐使用PHP7.2

## 目录说明

```
app 网站根目录
├─controllers   控制器目录
├─models    模型目录
├─views 视图目录
├─config    配置文件目录
├─kernels   框架内核目录
├─assets    静态资源文件目录
├─index.php 入口文件
```

## 使用

### 1. 创建数据库

在数据库中创建名为 test 的数据库，并插入两条记录，命令：

```
CREATE DATABASE `test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `test`;

CREATE TABLE `item` (
    `id` int(11) NOT NULL auto_increment,
    `item_name` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
 
INSERT INTO `item` VALUES(1, 'Hello World.');
INSERT INTO `item` VALUES(2, 'Lets go!');
```

### 2.修改数据库配置文件

打开配置文件 config/config.php ，使之与自己的数据库匹配

```
$config['db']['host'] = '127.0.0.1';
$config['db']['username'] = 'root';
$config['db']['password'] = 'root';
$config['db']['dbname'] = 'test';
```

### 3.配置Apache或Nginx
在Apache或Nginx中创建一个站点，把 project 设置为站点根目录（入口文件 index.php 所在的目录）。

然后设置单一入口， Apache服务器配置：
```
<IfModule mod_rewrite.c>
    # 打开Rerite功能
    RewriteEngine On

    # 如果请求的是真实存在的文件或目录，直接访问
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d

    # 如果访问的文件或目录不是真事存在，分发请求至 index.php
    RewriteRule . index.php
</IfModule>
```
Nginx服务器配置：
```
location / {
    # 重新向所有非真实存在的请求到index.php
    try_files $uri $uri/ /index.php$args;
}
```

其他服务器请自行进行兼容迁移操作。

