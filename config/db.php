<?php
/*
 * @Descripttion: 
 * @version: 
 * @Author: ZQW
 * @Date: 2021-04-26 15:26:17
 * @LastEditTime: 2021-04-26 15:29:44
 */
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = 'test';
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
return $conn;