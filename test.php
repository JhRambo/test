<?php

#1 数字，字符 加一
// $a = '';    // 1 2
// $a = null;   // 1 2
// $a = 0; //0 1 2
// $a = 'a';   //a b c
// $a = true;      //1 1 1  true不会变化
// $a = false; //空，false不会变成true
// echo $a++;
// echo $a;
// echo ++$a;

#2 注意|| 和 or的区别
// $a = false || true; //true
// $a = false or true; //false 优先前面的
// $a = true or false; //true  优先前面的
// $a = true || false; //true
// var_dump($a);

#3 输出数组元素
/**
 * reset() 函数将内部指针指向数组中的第一个元素，并输出。
 * 相关的方法：
 * current() - 返回数组中的当前元素的值
 * end() - 将内部指针指向数组中的最后一个元素，并输出
 * next() - 将内部指针指向数组中的下一个元素，并输出
 * prev() - 将内部指针指向数组中的上一个元素，并输出
 * each() - 返回当前元素的键名和键值，并将内部指针向前/后移动一个元素
 */
// $a = ['1','3','5','7'];
// print_r(reset($a));
// print_r(current($a));
// print_r(end($a));
// print_r(current($a));
// print(next($a));
// print_r(prev($a));
// print_r(each($a));
// print_r(each($a));

#4 随机返回数组中的几个元素 不可用于字符索引数组
// $a = array("red", "green", "blue", "yellow", "brown");
// $random_keys = array_rand($a, 3);
// print_r($random_keys);

#5 处理转义字符
// $str = 'a\bs';
// echo addslashes($str);  //添加转移字符   这个函数开启，则不要手动设置get_magic_quotes_gpc
// echo stripslashes($str);    //删除转义字符

#6 处理跨脚本攻击
// $str = "<alert>php</alert>";
// echo strip_tags($str);   //去掉alert标签，可以用与防止跨站脚本攻击

#7 数据类型转换
// $a = 12;
// $b = '12';
// if((string)$a === $b){
//     echo '11';
// }

#8 输出占用内存大小
// function f1(){
//     $i = 0;
//     return $i++;
// }
// echo f1().PHP_EOL;
// echo f1().PHP_EOL;
// echo memory_get_usage().PHP_EOL;

#9 xdebug的应用，引用计数器
// $a = "i am string";
// // $b = &$a;
// xdebug_debug_zval('a');
// echo memory_get_usage().PHP_EOL;
// echo memory_get_peak_usage().PHP_EOL;
// print_r(getrusage());

#10 位运算符
/**
 * 需转换为二进制
 * 二进制数在内存中是以补码的形式存放的
 */

//1.按位与
//二者都为1时为1，否则为0
// $a = 1; //00000001
// $b = 2; //00000010
// echo $a&$b;  //00000000

//2.按位或
//只要有一个为1即为1，否则为0
// $a = 1; //00000001
// $b = 2; //00000010
// echo $a|$b; //00000011

//3.异或
//不同为1，相同为0
// $a = 1; //00000001
// $b = 2; //00000010
// echo $a^$b; //00000011

//4.按位非或按位取反
// 正数，原码，反码，补码一致
//如9，原码00001001，反码00001001，补码00001001，对补码取反：11110110 11111001+1=11111010
//因为是负数，所以：先减1得反码：11110101，再取反得原码：11111010
// $a = 9;
// echo ~$a;
//如-10，原码11111010，反码11110101，补码11110101+00000001=11110110，对补码取反：00001001，
//因为是正数，所以：反码：00001001，原码：00001001
// $a = -10;
// echo ~$a;
//如16，原码00010000，反码00010000，补码00010000，对补码取反11101111 10010000+1=10010001
// $a = 16;
// echo ~$a;

//5.左移
// $a = 96; //01100000
// $b = 3; //左移的位数 -> 1100000000
// echo $a<<$b;    //1*2^9+1*2^8 = 512+256

//6.右移
// $a = 96; //01100000
// $b = 3; //又移的位数 -> 1100
// echo $a>>$b;    //1*2^3+1*2^2 = 8+4

#11 array_merge 和 + 的区别
//1.数字索引
//+：前面数组覆盖后面数组相同索引的值
//array_merge：合并，不会被覆盖
// $a = [1,2,3,4];
// $b = [5,6,7,8];

//2.字符串索引
//+：前面数组覆盖后面数组相同索引的值
//array_merge：后面数组覆盖前面数组相同索引的值
// $a = ['a'=>1,'b'=>2,'c'=>3,'d'=>4];
// $b = ['a'=>5,'b'=>6,'c'=>7,'d'=>8];
// print_r($a+$b);
// print_r(array_merge($a,$b));

//3.二维数组    同一维数组是一个道理
// $a = array(
//     'a'=>array('1')
// );
// $b = array(
//     'a'=>array('2'),
//     'b'=>array('3')
// );
// $c = array_merge($a,$b);
// $c = $a + $b;
// print_r($c);

#12 md5散列值32位
// echo strlen(md5('aaaa'));

#13 输出当前时间的秒数
// echo strtotime(date('Y-m-d H:i:s'));

#14 跨脚本攻击
//1.CSRF：跨站请求伪造（cross-site-request-forgery）需登录，拿到cookie，伪造请求
//2.XSS：跨脚本攻击（cross-site-script）无需登录，脚本攻击：反射型 存储型

#15 浮点型精度丢失
// if((0.01 + 0.003) == 0.013)
//     echo 'equal';
// else
//     echo 'unequal';
//解决办法：
// #1   使用bcadd函数，设置小数点个数
// if((bcadd(0.01, 0.003, 3)) == 0.013)
//     echo 'equal';
// else
//     echo 'unequal';
// #2   乘以一个整数，再除以
// echo (0.01*1000 + 0.003*1000)/1000;
//以上两个方法均需先知道小数点后几位，需先指定

#16 计算文件的大小，filesize
// $file = fopen('./aa.txt',"w");
// // fwrite($file,1111);
// fclose($file);
// print_r(filesize('./aa.txt'));

#17 parse_url 处理url
// $url = "http://www.baidu.com/abc/ab/1.php?id=1&name=aaa#bbb";
// print_r(parse_url($url));
// echo $path = parse_url($url,PHP_URL_PATH).PHP_EOL;   // /abc/ab/1.php
// echo $scheme = parse_url($url,PHP_URL_SCHEME).PHP_EOL;   //http
// echo $host = parse_url($url,PHP_URL_HOST).PHP_EOL;   //www.baidu.com
// echo $query = parse_url($url,PHP_URL_QUERY).PHP_EOL; //id=1&name
// echo $fragment = parse_url($url,PHP_URL_FRAGMENT).PHP_EOL;   //bbb

#18 计算字符长度
// $str = 'hello你好世界';
// echo strlen($str);  //17

#19 数组操作
// $arr1 = ['a'=>1,'b'=>2,'c'=>3,'d'=>4,'e'=>8,'f'=>6,'g'=>3];
// $arr2 = ['k'=>1];
// print_r(array_flip($arr1));   //键值互换
// print_r(array_search(1,$arr1));  //查询给定值的key
// print_r(array_splice($arr1,0,1));  //截取数组，偏移量，长度
// print_r(array_chunk($arr1,3));   //拆数组=》二维数组，3表示每个子数组的元素个数
// print_r(array_combine(['a','b'],['1','2']));    //key和value合并生成一个数组
// print_r(array_diff($arr2,$arr1));   //返回$arr2中不存在的数组 这里只判断value的值是否相同
// print_r(array_intersect($arr1,$arr2));  //交集  这里只判断value的值是否相同，并输出['a'=>1]
// print_r(array_reverse($arr1));  //倒叙输出
// print_r(array_unique($arr1));    //移除重复值，保留第一次出现的值
// print_r(array_fill('3',5,'a'));  //用给定的键值填充数组

#20 获取字符首次出现的位置 strpos
// $str = 'aAbB';
// echo strpos($str,'A');

#21 字符翻转1234567890 转换成 0987654321
// (用前述你最熟悉的语言编写并标注简单注释, 不要使用函数,
// $str = '1234567890';
// echo strrev($str);   //内置函数
// function echoStr($str){
//     // echo $str[2];
//     $length = strlen($str);
//     $fstr = '';
//     for($i=1;$i<=$length;$i++){
//         $fstr .= $str[$length-$i];
//     }
//     return $fstr;
// }
// echo echoStr($str);

#22 递归求阶乘
// function demo($a)
// {
//     if ($a > 1) {
//         $r = $a * demo($a - 1);
//     } else {
//         $r = $a;
//     }
//     return $r;
// }
// $vl = 30;
// print_r(demo($vl));

#23 将字符长fang-zhi-gang 转化为驼峰法的形式：FangZhiGang  ucfirst
// $str = 'fang-zhi-gang';
// $arr = explode('-',$str);
// $fstr = '';
// foreach($arr as $a){
//     $fstr .= ucfirst($a);
// }
// echo $fstr;

#24 数组排序
// $arr = ['c'=>3,'b'=>2,'a'=>1,'d'=>4,'f'=>6,'e'=>5];
// sort($arr);      //根据值正序排序，索引被重置为数字索引
// rsort($arr);     //根据值倒叙排序，索引被重置为数字索引
// ksort($arr);     //根据键正序排序，保留索引值
// krsort($arr);    //根据键倒叙排序，保留索引值
// asort($arr);     //根据值正序排序，保留索引关系
// arsort($arr);    //根据值倒序排序，保留索引关系
// print_r($arr);

#25 include require 的区别
//include 有返回值，require 没有返回值
//include 提示，require 错误，停止
//include_one require_one   引入之前先判断，存在则不引入

#26 PHP 不使用第三个变量实现交换两个变量的值
// $a = '1';
// $b = '2';
// $arr[] = $a;
// $arr[] = $b;
// echo $a = $arr[1];
// echo $b = $arr[0];

#27 写一个方法获取文件的扩展名
// echo end(explode('.','./aa.txt'));   //end输出数组最后一个元素

#28 用PHP打印出前一天的时间格式是2017-3-22 22:21:21
// echo date('Y-m-d H:i:s', strtotime('-1 day'));

#29 mysql_fetch_row() 和mysql_fetch_array之间有什么区别?
// mysql_fetch_row 数字索引
// mysql_fetch_array 数字索引和字符索引

#30 innodb 类型 存在不可删
//外键（foreign key） 是用于建立和加强两个表数据之间的链接的一列或多列。外键约束主要用来维护两个表之间数据的一致性。
//简言之，表的外键就是另一表的主键，外键将两表联系起来。一般情况下，要删除一张表中的主键必须首先要确保其它表中的没有相同外键
//（即该表中的主键没有一个外键和它相关联）。

#31 操作文件 读取大文件
#1 Linux命令tail
// $starttime = microtime_float();
// $file = 'aa.txt';
// $file = escapeshellarg($file); // 对命令行参数进行安全转义
// $line = `tail -n 100 $file`;
// echo $line, "<br/>";
// $endtime = microtime_float();
// echo $endtime - $starttime;
// function microtime_float()
// {
//     list($usec, $sec) = explode(" ", microtime());
//     return ((float) $usec + (float) $sec);
// }

#2 fseek文件操作函数
// $starttime = microtime_float();
// $file = 'aa.txt';
// $fp = fopen($file, "r+");
// $line = 100;
// $pos = -2;
// $t = $data = "";
// while ($line > 0) {
//     while ($t != "\n") //换行符
//     {
//         fseek($fp, $pos, SEEK_END); //移动指针
//         $t = fgetc($fp); //获取一个字符
//         $pos--; //向前偏移
//     }
//     $t = "";
//     $data = fgets($fp); //获取当前行的数据
//     $line--;
// }
// fclose($fp);
// echo $data, "<br/>";
// $endtime = microtime_float();
// echo $endtime - $starttime;
// function microtime_float()
// {
//     list($usec, $sec) = explode(" ", microtime());
//     return ((float) $usec + (float) $sec);
// }

#3 分块读取
// $starttime = microtime_float();
// $file = 'aa.txt';
// $fp = fopen($file, "r");
// $num = 10;
// $chunk = 4096; //4K的块
// $fs = sprintf("%u", filesize($file));
// $readData = '';
// $max = (intval($fs) == PHP_INT_MAX) ? PHP_INT_MAX : $fs;
// $data = '';
// for ($len = 0; $len < $max; $len += $chunk) {
//     $seekSize = ($max - $len > $chunk) ? $chunk : $max - $len;
//     fseek($fp, ($len + $seekSize) * -1, SEEK_END);
//     $readData = fread($fp, $seekSize) . $readData;
//     if (substr_count($readData, "\n") >= $num + 1) {
//         $ns = substr_count($readData, "\n") - $num + 2;
//         preg_match('/(.*?\n){' . $ns . '}/', $readData, $match);
//         $data = $match[1];
//         break;
//     }
// }
// fclose($fp);
// echo $data, "<br/>";
// $endtime = microtime_float();
// echo $endtime - $starttime;
// function microtime_float()
// {
//     list($usec, $sec) = explode(" ", microtime());
//     return ((float) $usec + (float) $sec);
// }

#4 分行读取
// $file = fopen("aa.txt", "r");
// while (!feof($file)) {
//     echo fgets($file);
// }
// fclose($file);

#5 spl函数库
// try {
//     foreach (new SplFileObject('aa.txt') as $line)
//         echo $line;
// } catch (Exception $e) {
//     echo $e->getMessage();
// }

#32 加解密
//对称：DES AES 加解密同一个密钥
//非对称：RSA   加解密不同钥匙（公钥，私钥）可用于数字签名
//MD5：hash散列，可能碰撞，非唯一性

#33 正则验证电子邮箱
// $preg = '';

#34 输出html
// echo "<a href='http://www.baidu.com'>bd</a>";

#35 数组添加元素
// $a[] = 'aa';
// array_push($a,'bb');
// print_r($a);

#36 判断输出(全局&局部)
// $num = 10;
// function multiply(){
//     // global $num;
//     $num = $num * 10;
//     return $num;
// }
// multiply();
// echo $num;

#37 截取字符串
// $a = 'asdfgh';
// echo substr($a,0,1);
// echo $a[0];

#38 创建表
// create table test_tb(
//     'id' int(10) not null auto_increment,
//     'name' varchar(20) default null,
//     primary key (id),
//     index (name) 
// )engine=innodb;

#39 计算两个文件的相对路径
// $a = '/a/b/c/d/e.php';
// $b = '/a/b/12/34/c.php';
// function getRelativePath($a, $b)
// {
//     $returnPath = array(dirname($b));   //返回路径中的目录部分，array('/a/b/12/34');
//     $arrA = explode('/', $a);               //array('','a','b','c','d','e.php');
//     $arrB = explode('/', $returnPath[0]);   //array('','a','b','12','34');
//     $len = count($arrB);    //5
//     for ($n = 1; $n < $len; $n++) {
//         if ($arrA[$n] != $arrB[$n]) {
//             break;
//         }
//     }
//     echo $n.PHP_EOL;    //3
//     if ($len - $n > 0) {
//         //array_fill() 数组用给定的键值填充数据，=>array('1'=>'..','2'=>'..')
//         $returnPath = array_merge($returnPath, array_fill(1, $len - $n, '..'));
//     }
//     /**
//      * array(
//      *  '/a/b/12/34/../../c/d/e.php'
//      * )
//      */
//     $returnPath = array_merge($returnPath, array_slice($arrA, $n));
//     return implode('/', $returnPath);
// }
// echo getRelativePath($a, $b);
// echo PHP_EOL;

#40 输出当前脚本名称
// echo basename('test.php');
// echo $_SERVER['PHP_SELF'];

#41 取模
// echo 8%-3;

#42 过滤<script>标签
// $script = '<script>aaa</script>';
// echo preg_replace('<script>','vv',$script);

#43 遍历文件夹
// function my_scandir($dir)
// {
//     $files = array();
//     if ($handle = opendir($dir)) {
//         while (($file = readdir($handle)) !== false) {
//             if ($file != ".." && $file != ".") {
//                 if (is_dir($dir . "/" . $file)) {
//                     $files[$file] = scandir($dir . "/" . $file);
//                 } else {
//                     $files[] = $file;
//                 }
//             }
//         }
//         closedir($handle);
//         return $files;
//     }
// }
// $dir = '/var/www/al';
// print_r($dir);

#44 防止sql注入
// $sql = "\'";
// echo addslashes($sql);

#45 计算字节个数或字符长度
// header('Content-Type:text/html;charset=utf-8');
// $str = '你好文化a1S';
// // echo strlen($str);   //字节个数
// echo mb_strlen($str);   //字符长度

#46 截取字符串 字符，中文
// $str = 'asd1234';
// $str = "你好啊我是谁呀";
// $str = "a你好啊我是谁呀";
// // echo substr($str,2,4);
// echo mb_substr($str,2,4);

#47 分割字符串
// $str = 'asdfqw121';
// print_r(str_split($str));

#48 关于中文字符翻转的问题
// $str = "nihao你好中国";
// $fa = join("",array_reverse(preg_split("//u", $str)));  //u用来匹配中文
// print_r($fa);

#49 获取当前脚本路径
// echo __FILE__;

#50 关于error_reporting()
// error_reporting(E_ALL);
// error_reporting(E_ALL &~ E_NOTICE);
// error_reporting(0);
// 相关题目：error_reporting(2047) 什么作用?
// 2047 = 1 + 2 + 4 + 8 + 16 + 32 + 64 + 128 + 256 + 512 + 1024
// 其中：
// 1 对应 E_ERROR，
// 2 对应 E_WARNING，
// 4 对应 E_PARSE，
// 8 对应 E_NOTICE，
// 16 对应 E_CORE_ERROR，
// 32 对应 E_CORE_WARNING
// 64 对应 E_COMPILE_ERROR，
// 128对应 E_COMPILE_WARNING，
// 256 对应 E_USER_ERROR，
// 512 对应 E_USER_WARNING，
// 1024 对应 E_USER_NOTICE。
// error_reporting(2047)意味着上述错误都会显示出来。

#51 双$运算 => 可变变量
// $str = 'cd';
// $$str = 'hotdog';   //$cd = 'hotdog'
// $$str .= 'ok';  //$cd = 'hotdogok';
// echo $cd;


