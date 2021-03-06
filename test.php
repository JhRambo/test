<?php

#1 数字，字符 加一
// $a = '';    // 1 2
// $a = null;   // 1 2
// $a = 0; //0 1 2
// $a = 'a';   //a b c
// $a = true;      //1 1 1  true不会变化
// $a = false; //空，false不会变成true
// <======echo输出=======>
// echo $a++;
// echo $a;
// echo ++$a;

#2 注意|| 和 or的区别
// $a = false || true; //true
// $a = false or true or true; //false 优先前面的
// $a = true or false; //true  优先前面的
// $a = true || false; //true
// var_dump($a);
// print_r($a);

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
//     echo '1';
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
// echo memory_get_usage().PHP_EOL;
// $a = "i am string";
// echo memory_get_usage().PHP_EOL;
// $b = &$a;   //a: (refcount=2, is_ref=1)='i am string'
// // $b = $a;
// xdebug_debug_zval('a'); //a: (interned, is_ref=0)='i am string'
// echo memory_get_usage().PHP_EOL;

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
#1.数字索引
# +：前面数组覆盖后面数组相同索引的值
# array_merge：合并，不会被覆盖
// $a = [1,2,3,4];
// $b = [4,5,6,7,8];
// $ab = $a+$b;
// $ab = array_merge($a,$b);
// print_r($ab);

#2.字符串索引
# +：前面数组覆盖后面数组相同索引的值
# array_merge：后面数组覆盖前面数组相同索引的值
// $a = ['a'=>1,'b'=>2,'c'=>3,'d'=>4];
// $b = ['a'=>5,'b'=>6,'c'=>7,'d'=>8];
// print_r($a+$b);
// print_r(array_merge($a,$b));

#3.二维数组    同一维数组是一个道理
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
// echo strtotime(date('Y-m-d H:i:s'));     //日期转时间戳
// echo '-';
// echo time();
// echo '-';
// echo date('Y-m-d H:i:s', '1618563738');  //时间戳转日期

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
// $file = fopen('./bb.txt',"r");
// // fwrite($file,1111);
// fclose($file);
// print_r(filesize('./bb.txt'));

#17 parse_url 处理url
// $url = "http://www.baidu.com/abc/ab/1.php?id=1&name=aaa#bbb";
// print_r(parse_url($url));
// echo $path = parse_url($url,PHP_URL_PATH).PHP_EOL;   // /abc/ab/1.php
// echo $scheme = parse_url($url,PHP_URL_SCHEME).PHP_EOL;   //http
// echo $host = parse_url($url,PHP_URL_HOST).PHP_EOL;   //www.baidu.com
// echo $query = parse_url($url,PHP_URL_QUERY).PHP_EOL; //id=1&name=aaa
// echo $fragment = parse_url($url,PHP_URL_FRAGMENT).PHP_EOL;   //bbb

#18 计算字符长度
// $str = 'hello你好世界';
// $str = '   ';    //3个空格
// $str = null;     //0
// $str = false;    //0
// $str = true;        //1
// $str = 0;       //1
// echo strlen($str);
// $str = '你好php';
// echo strlen($str);   //字节长度
// echo mb_strlen($str);   //字符长度

#19 数组操作
/**
 * 底层结构：hashtable，数组+链表
 */
// $arr1 = ['a'=>1,'b'=>1,'c'=>3,'d'=>4,'e'=>8,'f'=>6,'g'=>3,'h'=>9];
// $arr2 = ['k'=>1,'l'=>9];
// print_r(array_flip($arr1));   //键值互换
// print_r(array_search(1,$arr1));  //查询给定值的key，如果有多个一样的值，则输出第一个键
// print_r(array_splice($arr1,0,2));  //截取数组，偏移量，长度
// print_r(array_chunk($arr1,3));   //拆数组=》二维数组，3表示每个子数组的元素个数
// print_r(array_combine(['a','b'],['1','2']));    //key和value合并生成一个数组
// print_r(array_diff($arr2,$arr1));   //返回$arr2中不存在的数组 这里只判断value的值是否相同
// print_r(array_intersect($arr2,$arr1));  //交集  这里只判断value的值是否相同，并输出['k'=>1,'1'=>9]（以第一个参数的数组为准）
// print_r(array_reverse($arr1));  //倒序输出
// print_r(array_unique($arr1));    //移除重复值，保留第一次出现的值
// print_r(array_fill('3',5,'a'));  //用给定的键值填充数组（3：起始索引，5：数组长度，a：键值）
// array_pop($arr1);print_r($arr1);//弹出顶部元素，类似于栈，后进先出
// array_shift($arr1);print_r($arr1);//弹出头部元素，类似于队列，先进先出
// print_r(array_keys($arr1)); //输出数组所有键名

#20 获取字符首次出现的位置 strpos
// $str = 'aAbB';
// echo strpos($str,'AbB');
// 每天复习20个demo==========TODO=============

#21 字符翻转1234567890 转换成 0987654321
// 用你最熟悉的语言编写并标注简单注释, 不要使用函数
// $str = '1234567890';
// // echo strrev($str);   //内置函数
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
// $num = 30;
// print_r(demo($num));

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
// $file = fopen("myMsg.txt", "r");
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

#6 yield生成器
// function readTxt()
// {
//     # code...
//     $handle = fopen("./myMsg.txt", 'rb');

//     while (feof($handle)===false) {
//         # code...
//         yield fgets($handle);
//     }

//     fclose($handle);
// }

// foreach (readTxt() as $key => $value) {
//     # code...
//     echo $value.'<br />';
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
//             break;  //输出两个路径不同位置的n的值
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

#46 mb_substr截取字符串 字符，中文
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
// $fa = implode("",array_reverse(preg_split("//u", $str)));  //u用来匹配中文
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

#52 pathinfo返回文件路径信息
/**
 * Array
 * (
 *      [dirname] => /test/test1/test2
 *      [basename] => test.txt
 *      [extension] => txt
 *      [filename] => test
 * )
 */
// print_r(pathinfo('/test/test1/test2/test.txt'));

#53 printf
// $number = 42;
// printf("%.2d\n", $number);
// printf("%1.2f\n", $number);
// printf("%1.2u\n", $number);

#54 保留小数
// $num = 1.23601;
// echo round($num,2).PHP_EOL; //四舍五入  1.24
// echo sprintf('%.2f',$num).PHP_EOL; //四舍五入  1.24
// echo number_format($num, 2).PHP_EOL; //四舍五入  1.24

#55 随机数
// echo getrandmax();  //最大值：2147483647 => 2^31
// echo rand(0,99999).PHP_EOL;
// echo rand().PHP_EOL;
// echo mt_getrandmax();   //最大值：2147483647 => 2^31
// echo mt_rand(0,99999).PHP_EOL;
// echo mt_rand().PHP_EOL;

#56 true or false
// if(in_array('00001',array(1))){
//     echo 1;
// }else{
//     echo 2;
// }
// var_dump('000001' == 1);

// $a = in_array('01',array('1')) == var_dump('01' == 1);
// echo $a;

#57 字符比较
// $a = 'HELLO PHP';
// $b = 'hello php';
// $b = 'HELLO PHP';
// var_dump(strcasecmp($a,$b)); //不区分大小写
// var_dump(strcmp($a,$b));    //区分大小写

#58 传值引用
/**
 * 可以把“变量”看成一个容器，“变量名”相当于这个容器的标签
 * unset相当于把这个标签名给撕了，但是只要这个盒子还有标签名贴着，那就不会被PHP的垃圾回收机制给回收掉！
 * 所以除非把所有标签给撕了，或者直接把容器里面的东西给拿出来，那么就成了空==>NULL了
 */
// echo memory_get_usage().PHP_EOL;
// $a = "hello";
// echo memory_get_usage().PHP_EOL;
// $b = &$a;   //$b = "hello"
// echo memory_get_usage().PHP_EOL;
// unset($b);
// echo memory_get_usage().PHP_EOL;
// echo $a; //hello

#59 empty isset
// $str = 'a';
// $str = '';
// $str = '0.0';
// $str = 0;
// $str = null;
// $str = false;
// $a = 1;
// echo empty(trim($str)) ? "true" : "false";
// echo empty($str) ? "true" : "false";
// echo isset($str,$a,$b) ? "true" : "false";    //isset 只要变量有设置值即为真,多个参数需要全部为真才为真

#60 intval (int)不会保留小数，ceil向上取整，round四舍五入,floor向下取整
// $num = -9.5367;
// // $num = '00009';
// echo intval($num);
// echo intval('5acv');    //5
// echo (int)$num;
// echo (int)'5acv';       //5
// echo ceil($num);
// echo round($num,3); //第二个参数表示保留小数点后几位
// echo floor($num);

#61 抽象类
/**
 * 抽象类/抽象方法声明的关键字abstract
 * 抽象类内部可以没有抽象方法
 * 内部只要有一个方法是抽象的，那么该类必须是抽象类
 * 抽象方法必须被重写
 * 抽象类不能被实例化
 * 可设置属性，可设置静态变量，也可以设置常量
 * 子类可重定义静态变量，常量的值
 */
// abstract class Person
// {
//     public $name;    //成员属性
//     public $age;
//     static $num = 10;
//     const NAME = '111'; //常量
//     const AGE = 10;
//     //抽象方法
//     // abstract protected function run();
//     public function aa($name, $age)
//     {
//         $this->name = $name;
//         $this->age = $age;
//         $person['name'] = $this->name;
//         $person['age'] = $this->age;
//         return $person;
//     }
//     public function bb(){
//         return 'bb';
//     }
// }
// //子类
// abstract class Man extends Person
// {
//     // //实现抽象方法
//     // public function run()
//     // {
//     //     return '运行...';
//     // }
//     public function cc(){
//         return 'cc';
//     }
//     abstract function dd();
// }
// //子子类
// class child extends Man
// {
//     function dd(){
//         return 'dd';
//     }
// }

// // $m1 = new Man();
// // echo $m1->run();
// // print_r($m1->aa('jack', '20'));
// // echo $m1->bb();
// // echo $m1->cc();
// $m2 = new child();
// echo $m2->dd();
// echo $m2::$num;
// //演示抽象类不能被实例化
// // $person = new Person();
// // echo $person::NAME;

#62 接口
/**
 * 接口内的方法都是抽象方法，不需要abstract声明
 * 必须是public，可省略
 * 不能设置属性，不能设置静态变量，可设置【常量】
 * 子类必须实现抽象类的所有方法，且必须是public，可省略，同接口一样
 * 子类不能覆盖接口中的常量
 */
// interface Person{
//     // public $name;    //属性，报错
//     const NAME = 'mark';    //常量
//     // static $num = 10;   //静态变量，报错
//     public function aa();
//     function bb();
//     function cc();
// }

// //子类
// class Man implements Person{
//     // const NAME = 'JACK';    //报错
//     function aa(){
//         return 'aa';
//     }
//     function bb(){
//         return 'bb';
//     }
//     function cc(){
//         return 'cc';
//     }
// }

// $m1 = new Man();
// echo $m1->aa();
// echo $m1->bb();
// echo $m1->cc();
// echo Man::NAME;

#63 静态变量与常量的区别
/**
 * 静态变量运行过程中可变，常量不可变
 */
// define('AAA',123);          //define只能用于定义全局常量
// const TEST_CT = 'test_ct';  //const 可以定义全局常量
// class aa{
//     // define('BBB',456);  //define不可用于类内部定义
//     const NUM = 10;
//     static $num = 10;
// }

// class bb extends aa{
//     const NUM = 11; //子类可重复定义
//     static $num = 11;//子类可重复定义
//     static function cc(){
//         Parent::$num += 1;
//         // Parent::NUM += 1;    //报错
//         // Parent::NUM = 11;    //报错
//         return self::NUM.self::$num.PHP_EOL.Parent::NUM.Parent::$num.PHP_EOL;
//     }

// }
// $bb = new bb();
// echo $bb->cc();
// echo $bb::cc();
// echo bb::cc();
// echo $bb::$num;
// echo aa::$num;
// echo $bb::NUM;  //$bb->NUM; 报错
// echo $bb->NUM = '这里的意思并不是修改常量NUM的值，只是设置一个变量的值而已';
// echo $bb->NUM;
// echo $bb::NUM;  //如果上面是修改常量的值，那么这里应该发生变化才是，但是这里输出原来的值，所以可以知道常量的值不被修改
// echo AAA;
// echo TEST_CT;

#64 递归计算
// $num = 7;
// function add($num)
// {
//     static $total = 0;
//     if ($num >= 1) {
//         $total += $num; //7
//         return add(--$num);    //6 5 4 3 2 1
//     } else {
//         return $total;
//     }
// }
// var_dump(add($num));

#65 不同类型元素相加
// $num1 = (float)1.23;
// $num2 = (string)'2';
// echo $num1+$num2;

#66 substr
// $mystr="Yantai nanshan University";
// // echo substr($mystr,2,2);
// echo substr($mystr,-5,-4);

#67 final
// final class aa{
//     final $name;    //final 不能用于声明类中成员属性
//     final function bb(){

//     }
// }

#68 递归
/**
 * f(0) = 2
 * f(1) = 1 * f(0) = 2
 * f(2) = 2 * f(1) = 4
 * f(3) = 3 * f(2) = 12
 * f(4) = 4 * f(3) = 48
 * f(4) = f(f(2))   = 48
 */
// function f($x)
// {
//     return (($x > 0) ? $x * f($x - 1) : 2);
// }
// echo $i = f(f(2));

#69 递归
/**
 * f(-2) = 1;
 * f(-1) = 1;
 * f(0) = 1;
 * f(1) = 1;
 * f(2) = 1;
 * f(3) = 1;
 * f(4) = f(2)+f(-2)+1; =>1+1+1=3
 * f(5) = f(3)+f(-1)+1; =>1+1+1=3
 * f(6) = f(4)+f(0)+1;  =>3+1+1=5
 * f(7) = f(5)+f(1)+1;  =>3+1+1=5
 * f(8) = f(6)+f(2)+1;  =>5+1+1=7
 * f(9) = f(7)+f(3)+1   =>5+1+1=7
 * f(f(9)) = f(7)
 */
// function f($n) {
//     if($n<=3) return 1;
//     else return f($n-2)+f($n-6)+1;
// }

// echo f(f(9));

#70 算法-有n步台阶，一次只能上1步或2步，共有多少种走法
/**
 * 1、n<=2的时候 并没有其他可选择的，所以可以得出f(0)=0;f(1)=1;f(2)=2;
 * 2、n>2时情况就变复杂起来，但是这个时候可以操作的步骤也就2种
 * 也就是走1步(n-1)与走2步(n-2)。所以可以得到f(n)=f(n-1)+f(n-2);
 */
/**
 * 递归
 * 优点：可能是最好理解的算法了把。代码简单，好理解。
 * 缺点：计算次数颇多，有很多冗余计算。数值越大，效率越低，递归调用浪费了空间，而且递归太深容易造成堆栈的溢出
 */
// function findStep($n) {
//     if($n<=2) {
//         return $n;
//     }
//     return findStep($n-1)+findStep($n-2);
// }

/**
 * 迭代
 * 优点: 基本没有冗余计算，效率高，因为时间只因循环次数增加而增加，而且没有额外的空间开销
 * 缺点: 谁能一次读完就理解的？代码不如递归简洁，可读性不好
 */
// function findStep($n)
// {
//     if ($n <= 2) return $n;
//     $first = 1;  //初始化为走到第1级台阶的走法
//     $second = 2; //初始化为走到第2级台阶的走法
//     $third = 0;
//     for ($i = 3; $i <= $n; $i++) {
//         //最后跨2步 + 最后跨1步的走法
//         $third = $first + $second;
//         $first = $second;
//         $second = $third;
//     }
//     return $third;
// }
// echo findStep(100);

#71 算法题给定一个长字符串zesfjjk和一个短字符串xsfjx，求短字符串在长字符串中出现的最长部分是什么
// $lstr = 'zesfjjk';
// $sstr = 'xsfjx';
// if (strpos($lstr, $sstr) > 0) {
//     echo $sstr;
// } else {
//     $arr = [];
//     for ($i = 0; $i < mb_strlen($sstr); $i++) {
//         for ($j = 1; $j < mb_strlen($sstr)-$i; $j++) {
//             $aa = substr($sstr, $i, $j);
//             if (strpos($lstr, $aa) > 0) {
//                 $arr[] = $aa;
//             }
//         }
//     }
//     print_r($aa);
// }

#72 给定一个无序数组，求这个数组变为有序后相邻元素之差的最大值是多少，要求时间复杂度是O(n)
// $a = [30,24,10,9,5,12,8,36];
// sort($a);
// print_r($a);
// $diff = [];
// for($i=0;$i<count($a);$i++){
//     if($i<count($a)-1){
//         $diff[] = abs($a[$i+1] - $a[$i]);
//     }

// }
// print_r($diff);
// echo max($diff);

#73 bitmap
// class bitMap
// {
//     //bit位运算
//     public function setBit($val)
//     {
//         //从0开始填充50个0，如果需要更大的值，则需要改动50即可
//         $bit_map = array_fill(0, 50, 0);
//         // 4b*8 = 32b,50*32 = 1600 ,也就是说数组的值不能大约1600
//         $int_bit_size = PHP_INT_SIZE * 8;

//         //填充
//         foreach ($val as $k => $v) {
//             //得到到byte[]的index 相当于// $div = $v / $init_bit_size; //byte所在的组,2的5次方 = 32
//             $index = $v >> 5;
//             //得到在byte[index]的位置
//             $position = $v % $int_bit_size;

//             //将1左移position后，那个位置自然就是1
//             $offset = $position >> 1;
//             //和以前的数据做|，这样，那个位置就替换成1了。
//             $bit_map[$index] = $bit_map[$index] | $offset; //循环 把标示位替换为1
//         }

//         $b = array();
//         foreach ($bit_map as $k => $v) {
//             for ($i = 0; $i < $int_bit_size; $i++) {
//                 $tmp = $i >> 1;
//                 $flag = $tmp & $bit_map[$k];
//                 if ($flag) {
//                     $b[] = $k * $int_bit_size + $i;
//                 }
//             }
//         }
//         var_dump($b);
//         exit;
//     }
// }

// $b = new bitMap();
// $c = array(1, 4, 3, 50, 34, 60, 100, 88, 200, 150, 300); //定义一个乱序的数组
// $b->setBit($c);

#74 global定义的全局常量和$GLOBALS的区别？
/**
 * global $var其实就是$var = &$GLOBALS['var']。调用外部变量的一个别名而已。
 */
// $var1 = 1;
// $var2 = 2;
// function test()
// {
//     $GLOBALS['var2'] = &$GLOBALS['var1'];
// }
// test();
// echo $var2; //1

// $var1 = 1;
// $var2 = 2;
// function test()
// {
//     global $var1, $var2;
//     // $var2 = &$var1;
//     //等价于
//     // $var2 = &$GLOBALS['var1'];
//     $var1 = $var2;  //2
//     $var1 = &$var2;  //1
// }
// test();
// echo $var1;
// echo $var2; //2 $var1的引用指向了$var2的引用地址，实质的值没有改变

// $var1 = 1;
// function test()
// {
//     unset($GLOBALS['var1']);    //可以unset
//     // unset($val1);   //这个方式不能unset
//     //这个方式也不能unset
//     //证明删除的只是别名|引用，起本身的值没有受到任何的改变。
//     // global $var1;
//     // unset($var1);
// }
// test();
// echo $var1;

#75 地址引用
// echo memory_get_usage().PHP_EOL;
// $a = array_fill('10','5','aa');    //起始索引10，值为aa,数组长度为30
// xdebug_debug_zval('a');
// echo memory_get_usage().PHP_EOL;
// $b = &$a;    //指向同一个引用地址
// $b = $a;     //同时被修改
// // $b = array_fill('10','5','bb');    //cow
// xdebug_debug_zval('a');
// // $a = 6;
// // $b = 6;
// echo memory_get_usage().PHP_EOL;
// xdebug_debug_zval('a');

#76 函数返回类型声明
// function a():int{//必须返回int类型,否则报错
//     return 1;
// }
// function b():?int{//必须返回int类型或者null类型,否则报错
//     return 2;   //null
// }

// echo a();
// echo b();

#77 字符串去重
// $str = "1223345677881";
// $a = str_split($str,1);
// print_r(array_unique($a));

#78 二叉树遍历
// class Node
// {
//     public $value;
//     public $child_left;
//     public $child_right;
// }
// final class Ergodic
// {
//     //前序遍历:先访问根节点，再遍历左子树，最后遍历右子树；并且在遍历左右子树时，仍需先遍历根节点，然后访问左子树，最后遍历右子树  
//     public static function preOrder($root)
//     {
//         $stack = array();
//         array_push($stack, $root);
//         while (!empty($stack)) {
//             $center_node = array_pop($stack);
//             echo $center_node->value . ' ';
//             //先把右子树节点入栈，以确保左子树节点先出栈  
//             if ($center_node->child_right != null) array_push($stack, $center_node->child_right);
//             if ($center_node->child_left != null) array_push($stack, $center_node->child_left);
//         }
//     }
//     //中序遍历:先遍历左子树、然后访问根节点，最后遍历右子树；并且在遍历左右子树的时候。仍然是先遍历左子树，然后访问根节点，最后遍历右子树  
//     public static function midOrder($root)
//     {
//         $stack = array();
//         $center_node = $root;
//         while (!empty($stack) || $center_node != null) {
//             while ($center_node != null) {
//                 array_push($stack, $center_node);
//                 $center_node = $center_node->child_left;
//             }
//             $center_node = array_pop($stack);
//             echo $center_node->value . ' ';
//             $center_node = $center_node->child_right;
//         }
//     }
//     //后序遍历:先遍历左子树，然后遍历右子树，最后访问根节点；同样，在遍历左右子树的时候同样要先遍历左子树，然后遍历右子树，最后访问根节点  
//     public static function endOrder($root)
//     {
//         $push_stack = array();
//         $visit_stack = array();
//         array_push($push_stack, $root);
//         while (!empty($push_stack)) {
//             $center_node = array_pop($push_stack);
//             array_push($visit_stack, $center_node);
//             //左子树节点先入$pushstack的栈，确保在$visitstack中先出栈  
//             if ($center_node->child_left != null) array_push($push_stack, $center_node->child_left);
//             if ($center_node->child_right != null) array_push($push_stack, $center_node->child_right);
//             while (!empty($visit_stack)) {
//                 $center_node = array_pop($visit_stack);
//                 echo $center_node->value . ' ';
//             }
//         }
//     }
// }
// //创建二叉树  
// $a = new Node();
// $b = new Node();
// $c = new Node();
// $d = new Node();
// $e = new Node();
// $f = new Node();
// $g = new Node();
// $h = new Node();
// $i = new Node();
// $a->value = 'A';
// $b->value = 'B';
// $c->value = 'C';
// $d->value = 'D';
// $e->value = 'E';
// $f->value = 'F';
// $g->value = 'G';
// $h->value = 'H';
// $i->value = 'I';
// $a->child_left = $b;
// $a->child_right = $c;
// $b->child_left = $d;
// $b->child_right = $g;
// $c->child_left = $e;
// $c->child_right = $f;
// $d->child_left = $h;
// $d->child_right = $i;

// //前序遍历  
// Ergodic::preOrder($a);  //结果是：A B D H I G C E F  
// echo PHP_EOL;
// //中序遍历  
// Ergodic::midOrder($a);  //结果是： H D I B G A E C F  
// echo PHP_EOL;
// //后序遍历  
// Ergodic::endOrder($a); //结果是:  H I D G B E F C A
// echo PHP_EOL;

#79 类public protected private
// class aa{
//     public function bb(){
//         return 1;
//     }
//     protected function cc(){
//         return 1;
//     }
//     private function dd(){
//         return 1;
//     }
// }

// class ee extends aa{
//     public function bb(){
//         return parent::cc();    //子类内部访问父类的protected
//         // return parent::dd();    //父类的private不能被子类访问
//         return 2;
//     }
//     protected function gg(){
//         return 2;
//     }
//     private function hh(){
//         return 2;
//     }
// }
// $c1 = new ee();
// echo $c1::bb();
// echo $c1::gg(); //protected private不能在类外部访问

#80 不同http协议区别
/**
 * 1.http0.9
 * 最初版本
 * 仅支持get
 * 仅能传输纯文本内容
 * 无状态连接
 *
 * 2.http1.0
 * 传输文本形式不受限制
 * 本质上支持长连接，增加了keep-alive，默认短连接
 * 增加了状态码
 *
 * 3.http1.1
 * 默认长连接，tcp串行，长时间没通信，则关闭
 * 节约带宽，支持只发送header头信息，不带任何body
 * 断点传输请求
 *
 * 4.http2.0
 * 多路复用，tcp并发请求
 * 头部header压缩，传输更快
 * 服务端有主动推送的功能
 *
 */

#81 字符串相加
//  $str1 = (int)'asddf';  //0
//  $str2 = (int)'qwert';  //0
//  echo $str1+$str2;

#82 链表 增删改查
// class Node
// {
//     public $data = '';
//     public $next = null;
//     function __construct($data)
//     {
//         $this->data = $data;
//     }
// }

// // 计算链表元素个数
// function countNode($head)
// {
//     $cur = $head;
//     $i = 0;
//     while (!is_null($cur->next)) {
//         ++$i;
//         $cur = $cur->next;
//     }
//     return $i;
// }

// /**
//  * 顺序增加节点
//  * $head：当前节点
//  * $data：要增加的节点元素
//  */
// function addNode($head, $data)
// {
//     $cur = $head;
//     while (!is_null($cur->next)) {
//         $cur = $cur->next;
//     }
//     $new = new Node($data);
//     $cur->next = $new;
// }

// // 紧接着插在$no后
// function insertNode($head, $data, $no)
// {
//     if ($no > countNode($head)) {
//         return false;
//     }
//     $cur = $head;
//     $new = new Node($data);
//     for ($i = 0; $i < $no; $i++) {
//         $cur = $cur->next;
//     }
//     $new->next = $cur->next;
//     $cur->next = $new;
// }

// // 删除第$no个节点
// function delNode($head, $no)
// {
//     if ($no > countNode($head)) {
//         return false;
//     }
//     $cur = $head;
//     for ($i = 0; $i < $no - 1; $i++) {
//         $cur = $cur->next;
//     }
//     $cur->next = $cur->next->next;
// }

// // 遍历链表
// function showNode($head)
// {
//     $cur = $head;
//     while (!is_null($cur->next)) {
//         $cur = $cur->next;
//         echo $cur->data . PHP_EOL;
//     }
// }

// $head = new Node(null); //定义头节点
// print_r($head); //此时链表为空
// addNode($head, 'a');
// print_r($head);
// addNode($head, 'b');
// print_r($head);
// addNode($head, 'c');
// print_r($head);
// insertNode($head, 'd', countNode($head));   //插入节点
// print_r($head);
// showNode($head);
// delNode($head, 2);  //删除节点
// showNode($head);

#83 斐波那契数列 1 1 2 3 5 8 13 21 34 55 …
//非递归写法：
// function fbnq($n){  //传入数列中数字的个数
//     if($n <= 0){
//         return 0;
//     }
//     $array[1] = $array[2] = 1; //设第一个值和第二个值为1
//     for($i=3;$i<=$n;$i++){ //从第三个值开始
//         $array[$i] = $array[$i-1] + $array[$i-2];
//         //后面的值都是当前值的前一个值加上前两个值的和
//     }
//     return $array;
// }

// //递归写法：
// function fbnq($n){
//     if($n <= 0) return 0;
//     if($n == 1 || $n == 2) return 1;
//     return fbnq($n - 1) + fbnq($n - 2);
// }
// print_r(fbnq(6));

#84 %  取模，即整除
// echo 3%2;   //1
// echo intval(3/2);

#85 汉诺塔问题：递归方法
/**
 * Hanoi(n, a, b, c) = Hanoi(n-1, a, c, b) + 1 + Hanoi(n-1, b, a, c)：
 * 将a上面n-1个盘子移到b，再将a最下面的盘子移到c，再将b上的n-1个盘子移到c，
 * 此时，n盘子汉诺塔问题 变成了 移动一个盘子 + 两个n-1盘子汉诺塔问题。
 */
// function hanoi($n)
// {
//     if ($n <= 1) return 1;
//     return 2 * hanoi($n - 1) + 1;
// }
// $n = 6;
// echo hanoi($n);

#86 闭包的使用
/**
 * 匿名函数
 * 闭包总结到最后，就是与函数不同的地方就是多加了一个use中间值，
 * 使用的时候注意一点是function后面的()为可变变量，use()里面的变量为实例一次后不改动的变量
 */
// $param = 1;
// $data = function () use ($param)
// {
//     var_dump($param);
// };

// $data();

// $param = 2;
// $data();

// $param = 1;
// //实例化
// $data = function () use ($param)
// {
//     var_dump($param);
// };

// $data();

// $param = 2;
// //实例化
// $data = function () use ($param)
// {
//     var_dump($param);
// };
// $data();

// $arr = [
//     '米' => ['咸粥', '甜粥', '米饭'],
//     '面' => ['面条', '花卷', '馒头'],
// ];

// $param = '';
// $bag = function ($data) use ($param)
// {
//     $l = count($data);
//     return $data[rand(0, $l-1)];
// };

// $eat_arr = [];

// foreach ($arr as $key => $value) {
//     $each_arr[] = '吃'.$key.'：'.$bag($value);
// }

// echo implode(',', $each_arr);

#87 静态，非静态的区别
// class A{
//     public static $num = 0; //静态变量
//     public $age = 20;
//     const NAME = 'jack';
//     public static function aa(){
//         // return $this->bb();
//         // return $this->age;
//         return self::$num;
//         return self::NAME;
//         return 1;
//     }
//     public function bb(){
//         return self::$num;
//         return $this->age;
//         return $this->aa();
//         return 2;
//     }
// }

// $obj = new A();
// // echo A::$age;
// // echo $obj->age;
// echo A::$num;
// echo $obj::$num;
// // echo $obj::aa();
// // echo $obj->aa();
// // echo $obj->bb();

#88 比较字符串
// $a = 'a';
// // $b = 'a';
// $b = &$a;
// $a = 'aa';
// // $b = 'b';
// unset($a);
// // unset($b);
// // echo $a;
// echo $b;
// xdebug_debug_zval('a');
// xdebug_debug_zval('b');
// // echo $a < $b? 1 : 2;

#89 new self 与 new static的区别
/**
 * 首先，他们的区别只有在继承中才能体现出来，如果没有任何继承，那么这两者是没有区别的。
 * 然后，new self()返回的实例是万年不变的，无论谁去调用，都返回同一个类的实例，而new static()则是由调用者决定的。
 */
// class Father {

//     public function getNewFather() {
//         return new self();  //父类
//     }

//     public function getNewCaller() {
//         return new static();    //可能是父类也可能是子类
//     }

// }

// // $f = new Father();

// // print get_class($f->getNewFather());    //Father
// // print get_class($f->getNewCaller());    //Father

// //继承
// class Sun1 extends Father {

// }

// //继承
// class Sun2 extends Father {

// }

// $sun1 = new Sun1(); //new子类对象
// $sun2 = new Sun2(); //new子类对象

// print get_class($sun1->getNewFather()); //Father
// print get_class($sun1->getNewCaller()); //Sun1
// print get_class($sun2->getNewFather()); //Father
// print get_class($sun2->getNewCaller()); //Sun2

#90
// class A
// {
//     public $num = 100;
// }
// $a = new A();
// $b = $a;
// $a->num = 200;
// echo $b->num;   //200

#91
// $d = mktime(9, 12, 31, 6, 10, 2015); //时，分，秒，月，日，年。
// echo "创建日期是 " . date("Y-m-d h:i:sa", $d);   2015-06-10 09:12:31am

#92 getdate()   返回数组
// $now = date('Y-m-d h:i:s');
// print_r(getdate(time()));

#93
// $a = 1;
// $b = 2;
// if ($b = 5) {
//     $b++;
// }
// echo $b;

#94 array_count_values
// $x = array(1, 3, 2, 3, 7, 8, 9, 7, 3);
// $y = array_count_values($x);
// print_r($y);
// echo $y[8];

#95 preg_match 成功返回1 失败返回0
// $qpt = 'Eat to live, but not live to eat';
// echo preg_match("/^to/", $qpt);

#96
// function total_Sum($c=5, $b=3,$a){
//     echo$a."+ ".$b." + ".$c." = ".($a+$b+$c) ;
// }
// total_Sum(1);

#97 字符串比较大小
// $str = "LAMPbrotherASD";
// $str1 = "LAMPBrother";
// $strc = strcmp($str, $str1);
// echo $strc;

#98
// $x = "display";
// echo ${$x . '_result'}();

// function display_result(){
//     return 1;
// }

#99 trait 实现多继承
// trait Dog
// {
//     public $name = "dog";
//     public function bark()
//     {
//         echo "This is ".$this->name;
//     }
// }
// class Animal
// {
//     public function eat()
//     {
//         print( "This is animal eat");
//     }
// }
// class Cat extends Animal
// {
//     use Dog;
//     public function drive()
//     {
//         echo( "This is cat drive");
//     }
// }
// $cat = new Cat();
// $cat->drive();
// echo PHP_EOL;
// $cat->eat();
// echo PHP_EOL;
// $cat->bark();
// echo PHP_EOL;

#100
// class A
// {
//     public static $num = 0;
//     public function __construct()
//     {
//         self::$num++;
//     }
// }
// new A();
// new A();
// new A();
// echo A::$num;

#101 输出当前文件夹下的所有文件名，包括..
// $x = dir(".");
// while ($y = $x->read()) {
//     echo $y;
// }
// $x->close();

#102 preg_spilt 正则匹配
// $str = 'qwe,1q,we';
// $a = preg_split('/q/',$str);
// print_r($a);

#103
// $arr = array('a' => 1, 'c' => 2);
// $arr[] = 56;    //对上一个数字索引+1，找到即停止，如果前面都没有数字索引，则当前索引为0
// $arr["x"] = 42;
// print_r($arr);

#104
// $x = 1;
// ++$x;
// $y = $x++;  //先把$X赋值给y，x再加一
// echo $x.PHP_EOL;
// echo $y.PHP_EOL;

#105
// $str1 = 'abc';
// $str2 = 'def';
// echo "{$str1}{$str2}";

#106 redis lua脚本
// $lua = <<<EOF
// local num = redis.call('GET', KEYS[1]);

// if not num then
// 	return 0;
// else
// 	local res = num * ARGV[1];
// 	redis.call('SET',KEYS[1], res);
// 	return res;
// end

// EOF;

// $redis = new Redis();
// $redis->connect('127.0.0.1', 6379);
// $redis->auth(123);
// $ret = $redis->eval($lua, array("lua:incrbymul", 2), 1);
// echo $ret;

#107 test git reset --soft --hard --mixed

#108 array
// $arr = [
//     [
//         'id' => 1,
//         'name' => 'a',
//         'age' => 20,
//     ],
//     [
//         'id' => 2,
//         'name' => 'b',
//         'age' => 21,
//     ],
// ];
// array_column($arr, 'id');

// #109 array_chunk
// $arr = [1,2,3,4,5,6,7,8];
// $chunk_arr = array_chunk($arr, 3);

#110 字符串自增
// $a = 'zzzzz';
// // echo $a++;
// ++$a;
// echo $a;

#111 优先级
// $a = 0; $b = 0;
// if ($a = 3>0 || $b = 3>0) {
//     $a++;
//     $b++;
// }
// echo $a;
// echo $b;

#112 true false 自增自减
// // $a = true;  //true 自增（自减），值不变
// $a = false; //false 自增（自减），值不变
// $a++;
// echo $a;

#113 往数组头部添加数据
// $a = [1,2,3,4,5,6];
// array_unshift($a, 7, 8, 9);
// print_r($a);

#114 yield生成器
// function makeRange($length)
// {
//     for($i = 0; $i < $length; $i++) {
//         yield $i;
//     }
// }
// foreach (makeRange(10000000) as $i) {
//     echo $i . PHP_EOL;
// }

#115 子类重写父类静态函数
// //父类
// class Parents
// {
//     public static function getClassName()
//     {
//         return __CLASS__;
//     }

//     public static function who()
//     {
//         echo self::getClassName();   //self 指向的是定义时持有它的类而不是调用时的
//     }

//     public static function who1()
//     {
//         echo static::getClassName();  //后期静态绑定
//     }
// }
// //子类
// class Children extends Parents
// {
//     public static function getClassName()
//     {
//         return __CLASS__;
//     }
// }
// echo Parents::getClassName().PHP_EOL;   //Parents
// echo Parents::who().PHP_EOL;            //Parents
// echo Parents::who1().PHP_EOL;           //Parents
// echo Children::getClassName().PHP_EOL;  //Children
// echo Children::who().PHP_EOL;           //Parents
// echo Children::who1().PHP_EOL;          //Children

#116 随机数
// $numbers = range(1, 20);
// // print_r($numbers);
// shuffle($numbers);
// foreach ($numbers as $number) {
//     echo $number.PHP_EOL;
// }

#117 global_1
// $x = 5;
// $y = 10;
// function myTest()
// {
//     global $x,$y;//通过global来声明$x,$y，相当于传递参数
//     $y = $x + $y;
// }
// myTest();
// echo $y;

#118 global_2
// $a = 1;
// function test(){
//     unset($GLOBALS['a']);
// }
// test();
// echo $a;    //输出异常，$a被unset掉

#119 global_3
// $a = 1;
// function test(){
//     global $a;  //$a = &$GLOBALS['a']
//     unset($a);
// }
// test();
// echo $a;    //输出1，删除的只是别名，$GLOBALS['a']的引用$a

#120 global_4
// $a = 0;
// function test(){
//     global $a;  //$a = &$GLOBALS['a'];
//     $a = 1;
// }
// test();
// echo $a;    //输出1，当$a在函数体中发生改变时，由于引用传值的关系$GLOBALS['a']的值也就变成了1，故而外部的$a的值也就变成了1

#121 global_5
// $a = 1;
// $b = 2;
// function test(){
//     global $a,$b;
//     $a = $b;
// }
// test();
// echo $a;    //输出2，由于同名引用的关系，函数体内$b的值为2，故而函数体内的$a的值为2，由于函数体内$a是对外部$a的同名引用，故而外部$a也是2

#122 global_6
// $a = 1;
// $b = 2;
// function test()
// {
//     global $a,$b;
//     $a = &$b;
// }
// test();
// echo $a;    //输出1，由于此时函数体内$a=&$b;由于&的关系，故而此时函数体内的$a已不再是对外部$a的同名引用，所以当函数体内的$a=2时，外部的$a并没有改变。

#123 global_7
// $a = 1;
// $b = 2;
// function test(){
//     global $a,$b;
//     $a = &$b;
//     $a = 8;
// }
// test();
// echo $a;echo $b; //输出1，8，此时函数体内的$a=8;由于引用传值的关系，函数体内的$b=8,再由于函数体内的$b对于外部的$b的同名引用，故而外部的$b=8，而由于&的关系，函数体内的$a与外部$a已不再是同名引用，故而外部的$a的值没有改变

#124 判断两个数组是否相等
// $a = [[1,2]];
// $b = [[1,2]];
// echo $a == $b? 1 : 2;

#125 register_shutdown_function函数的用法
#PHP中止的情况有三种：
#执行完成
#exit/die导致的中止
#发生致命错误中止
#【注意】输出的顺序，等执行完成了之后才会去执行register_shutdown_function的中止方法test
#a. 第一种情况，执行完成
// function test()
// {
//     echo '这个是中止方法test的输出';
// }
// register_shutdown_function('test');
// echo 'before' . PHP_EOL;

#b. 第二种情况，exit/die导致的中止
// function test()
// {
//     echo '这个是中止方法test的输出';
// }
// register_shutdown_function('test');
// echo 'before' . PHP_EOL;
// exit();
// echo 'after' . PHP_EOL;

#c. 第三种情况，发送致命错误中止
// function test()
// {
//     echo '这个是中止方法test的输出';
// }
// register_shutdown_function('test');
// echo 'before' . PHP_EOL;
// // 这里会发生致命错误
// $a = new A();
// echo 'after' . PHP_EOL;

#E1.额外参数
// class Shutdown
// {
//     public function stop()
//     {
//         echo "这个是stop方法的输出";
//     }
// }
// // 当PHP终止的时候（执行完成或者是遇到致命错误中止的时候）会调用new Shutdown的stop方法
// register_shutdown_function([new Shutdown(), 'stop']);
// // 将因为致命错误而中止
// $a = new A();
// // 这一句并没有执行，也没有输出
// echo '必须终止';

#E2.在类中执行
// class TestDemo {
//     public function __construct()
//     {
//         register_shutdown_function([$this, "f"], "hello");
//     }
//     public function f($str)
//     {
//         echo "class TestDemo->f():" . $str;
//     }
// }
// $demo = new TestDemo();
// echo 'before' . PHP_EOL;

#E3.
/**
 * 可以多次调用 register_shutdown_function，这些被注册的回调会按照他们注册时的顺序被依次调用。
 * 注意：如果你在f方法（第一个注册的方法）里面调用exit方法或者是die方法的话，那么其他注册的中止回调也不会被调用
 */
// function f($str)
// {
//     echo $str . PHP_EOL;
//     // 如果下面调用exit方法或者是die方法的话，其他注册的中止回调不会被调用
//     // exit();
// }

// // 注册第一个中止回调f方法
// register_shutdown_function("f", "hello");

// class TestDemo
// {
//     public function __construct()
//     {
//         register_shutdown_function([$this, "f"], "hello");
//     }

//     public function f($str)
//     {
//         echo "class TestDemo->f():" . $str;
//     }
// }

// $demo = new TestDemo();
// echo 'before' . PHP_EOL;

#E4.
/**
 * register_shutdown_function,注册一个会在php中止时执行的函数,中止的情况包括发生致命错误、die之后、exit之后、执行完成之后都会调用register_shutdown_function里面的函数
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/15
 * Time: 17:41
 */
// class Shutdown
// {
//     public function stop()
//     {
//         echo 'Begin.' . PHP_EOL;
//         // 如果有发生错误（所有的错误，包括致命和非致命）的话，获取最后发生的错误
//         if (error_get_last()) {
//             print_r(error_get_last());
//         }
//         // ToDo:发生致命错误后恢复流程处理
//         // 中止后面的所有处理
//         die('Stop.');
//     }
// }

// // 当PHP终止的时候（执行完成或者是遇到致命错误中止的时候）会调用new Shutdown的stop方法
// register_shutdown_function([new Shutdown(), 'stop']);
// // 将因为致命错误而中止
// $a = new A();
// // 这一句并没有执行，也没有输出
// echo '必须终止';

#E5.
// try {
//     // 将因为致命错误而中止
//     $a = new A();
//     // 这一句并没有执行，也没有输出
//     echo 'end';
// } catch (Throwable $e) {
//     print_r($e);
//     echo $e->getMessage();
// }

#E6.
// register_shutdown_function('myFun'); //放到最上面，不然如果下面有致命错误，就不会调用myFun了。
// $execDone = false; //程序是否成功执行完（默认为false）

// /**
// ********************* 业务逻辑区*************************
// */
// $tas = 3;
// if ($tas == 3) {
//     new daixiaorui();
// }

// /**
// ********************* 业务逻辑结束*************************
// */
// $execDone = true; //由于程序由上至下执行，因此当执行到此后，则证明逻辑没有出现致命的错误。

// function myFun()
// {
//     global $execDone;
//     if ($execDone === false) {
//         file_put_contents("./myMsg.txt", date("Y-m-d H:i:s")."---error: 程序执行出错。\r\n", FILE_APPEND);
//         /******** 以下可以做一些处理 ********/
//     }
// }

#126 ip
// echo ip2long ($_SERVER['HOSTNAME']);
// echo PHP_EOL;
// echo long2ip ('3232235530');

#127 php GD图像库
// print_r(gd_info());
// $remote_png_url = 'http://www.runoob.com/wp-content/themes/w3cschool.cc/assets/img/logo-domain-green2.png';
// $img_data = getimagesize($remote_png_url);
// print_r($img_data );

#128 生成唯一ID
#E1.session_create_id()
// echo session_create_id();
#E2.md5(uniqid());
// echo md5(uniqid());

#129 邮件
// $to = "237230999@qq.com";         // 邮件接收者
// $subject = "参数邮件";                // 邮件标题
// $message = "Hello! 这是邮件的内容。";  // 邮件正文
// $from = "ooxx666@88.com";   // 邮件发送者
// $headers = "From:" . $from;         // 头部信息设置
// mail($to,$subject,$message,$headers);
// echo "邮件已发送";

#130 php过滤器，filter
// if (!filter_var("someone@example....com", FILTER_VALIDATE_EMAIL)) {
//     echo ("E-mail is not valid");
// } else {
//     echo ("E-mail is valid");
// }

#131 获取客户端&服务端IP
// echo $_SERVER['REMOTE_ADDR'];   //客户端
// echo $_SERVER['SERVER_ADDR'];   //服务端

#132 file_get_contents获取网页内容
// $url = "http://www.phpres.com/index.html";
// $str = file_get_contents($url);
// print_r($str);

#133 读程题
// function foo($i)
// {
//     $i++;
//     echo $i;
// }
// function bar(&$i)
// {
// }
// $i = 10;
// echo $i++, ++$i; //输出：10,12
// foo($i); //输出：13
// bar($i); //输出：无输出

#134 读程题
// $num = 10;
// function multiply()
// {
//     // global $num;
//     $num = $num * 10;
// }
// multiply();
// echo $num;

#135 count — 计算数组中的单元数目或对象中的属性个数
// $str = 'abc';    //1
// $str = '';  //1
// $str = null;    //0
// echo count($str);

#136 实现第三方登录
// 1、首先我们需要以开发者的身份向第三方登陆平台申请接入应用，申请成功后，我们会获得一个【appID】和一个【secrectID】；
// 2、当我们的网站需接入第三方登陆时，会引导用户跳转到第三方的登陆授权页面，此时把之前申请的appID和secrectID带给登陆授权页面；
// 3、用户登陆成功后即得到授权，第三方会返回一个临时的【code】给我们的网站；
// 4、我们的网站接受到code后，再次向我们的第三方发起请求，并携带接收的code,从第三方获取【access_token】；
// 5、第三方处理请求后，会返回一个access_token给我们的网站，我们的网站获取到access_token后就可以调用第三方提供的接口了，比如获取用户信息等。最后把该用户信息存入到我们站点的数据库，并把信息保存到session中，实现用户的第三方登陆；

#137 array_filter去除数组空值
// $array1 = array('  ', 1, '', 2, 3);
// print_r(array_filter($array1, "del"));
// function del($var)
// {
//     return (trim($var));
// }

#138 写出一个能创建多级目录的PHP函数
/**
 * 创建多级目录
 * 考察mkdir，0777模式创建目录
 * @param $path string 要创建的目录
 * @param $mode int 创建目录的模式，在windows下可忽略
 */
// function create_dir($path, $mode = 0777)
// {
//     if (is_dir($path)) {
//         # 如果目录已经存在，则不创建
//         echo "该目录已经存在";
//     } else {
//         # 不存在，创建
//         if (mkdir($path, $mode, true)) {
//             echo "创建目录成功";
//         } else {
//             echo "创建目录失败";
//         }
//     }
// }
// create_dir('/var/www/test/log');

#139 php垃圾回收机制
/**
 * PHP可以自动进行内存管理，清除不再需要的对象。
 * PHP使用了引用计数(reference counting)这种单纯的垃圾回收(garbage collection)机制。
 * 每个对象都内含一个引用计数器，每个reference连接到对象，计数器加1。
 * 当reference离开生存空间或被设为NULL，计数器减1。
 * 当某个对象的引用计数器为零时，PHP知道你将不再需要使用这个对象，释放其所占的内存空间
 */

#140 写一段PHP代码，确保多个进程同时写入同一个文件成功
// $fp = fopen("myMsg.txt", "a+");
// if (flock($fp, LOCK_EX)) {
//     sleep(5);
//     //获得写锁，写数据
//     fwrite($fp, "当前时间：".date('Y-m-d H:i:s'));
//     // 解除锁定
//     flock($fp, LOCK_UN);
// } else {
//     echo "file is locking...";
// }
// fclose($fp);

#141 编写一个函数，递归遍历，实现无限分类，输出树形结构
/**
 * 表结构
 * CREATE TABLE tp_category (
 *	`cat_id` INT UNSIGNED NOT NULL auto_increment PRIMARY KEY COMMENT '类别ID',
 *	`cat_name` VARCHAR ( 30 ) NOT NULL DEFAULT '' COMMENT '类别名称',
 *  `parent_id` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '类别父ID',
 *  `level` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '级别',
 * ) ENGINE = INNODB charset = utf8;
 */
// $conn = require_once 'config/db.php';
// $sql = 'select * from tp_category';
// $data = [];
// $result = $conn->query($sql);
// if ($result->num_rows > 0) {
//     // 输出数据
//     while($row = $result->fetch_assoc()) {
//         $data[] = $row;
//     }
// }
// if (!empty($data)) {
//     $resultTree = tree($data);
//     print_r($resultTree);
// }
// function tree($array)
// {
//     //第一步 构造数据
//     $items = array();
//     foreach($array as $value){
//         $items[$value['cat_id']] = $value;
//     }
//     //第二部 遍历数据 生成树状结构
//     /**
//      * 这个方法的核心在于引用，php变量默认的传值方式是按指传递
//      * 也就是说 假如说 遍历顺序是 福建省 福州市 当遍历到福建省时 会把福建省放到tree中 
//      * 遍历到福州市时 会把福州市放到福建省的子节点数组中 
//      * 但是！！！ 这会儿的tree数组中 福建省已经放进去了 根据php变量按值传递的规则 你并没有更改tree数组中的福建省的数据 
//      * 所以这里用到了引用传递
//      * 当你对福建省做更改时，tree数组中的福建省也一并做了更改
//      */
//     $tree = array();
//     foreach($items as $key => $value){
//         if(isset($items[$value['parent_id']])){
//             $items[$value['parent_id']]['children'][] = &$items[$key];
//         }else{
//             $tree[] = &$items[$key];
//         }
//     }
//     return $tree;
// }

#142 日期：date
// echo date('j'); //当前月第几天，没有前导零 范围（1-31）
// echo date('D'); //当前星期，星期几，3个字母 范围（Mon 到 Sun）
// echo date('d'); //当前月第几天，有前导零的 2 位数字 范围（01-31）
// echo date('l'); //当前星期，星期几，完整字母 范围（Sunday 到 Saturday）
// echo date('N'); //ISO-8601 格式数字表示的星期中的第几天（PHP 5.1.0 新加）范围（1-7）
// echo date('t'); //当前月份天数（28-31）
