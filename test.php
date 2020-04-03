<?php

// $a = '';    //1 2
// $a = null;   //1 2
// $a = 'a';   //b c
// $a = true;      //1 1
// echo ++$a;
// echo ++$a;

// $a = false || true; //true
// $a = false or true; //false 优先前面的
// $a = true or false; //true  优先前面的
// $a = true || false; //true
// var_dump($a);

/**
 * reset() 函数将内部指针指向数组中的第一个元素，并输出。
 * 相关的方法：
 * current() - 返回数组中的当前元素的值
 * end() - 将内部指针指向数组中的最后一个元素，并输出
 * next() - 将内部指针指向数组中的下一个元素，并输出
 * prev() - 将内部指针指向数组中的上一个元素，并输出
 * each() - 返回当前元素的键名和键值，并将内部指针向前(后？)移动
 */

//  $arr = ["name"=>'jack','age'=>'20'];
//  print_r(each($arr));
//  print_r(next($arr));
//  print_r(end($arr));
//  print_r($arr);
//  print_r(prev($arr));
//  print_r(current($arr));

// $people = array("Bill", "Steve", "Mark", "David");

// // reset($people);
// // next($people);
// end($people);

// //以下组合
// //加上reset()等价于foreach
// while (list($key, $val) = each($people))
//   {
//   echo "$key => $val<br>";
//   }

// $a = array("red", "green", "blue", "yellow", "brown");
// $random_keys = array_rand($a, 3);
// print_r($random_keys);
// exit;
// echo $a[$random_keys[0]] . "<br>";
// echo $a[$random_keys[1]] . "<br>";
// echo $a[$random_keys[2]];

//注意数字索引和字符字符索引的区别
//数字索引
// $a = [2,3,1];
// $b = [4,2];

// //字符索引
// // $a = ['a'=>2,'b'=>3,'c'=>1];
// // $b = ['a'=>4,'b'=>2];

// print_r(array_merge($a,$b));    // [2,3,1,4,2]     ['a'=>4,'b'=>2,'c'=>1]
// print_r(array_merge($b,$a));    // [4,2,2,3,1]     ['a'=>2,'b'=>3,'c'=>1]
// print_r($a+$b);     // [2,3,1]  ['a'=>2,'b'=>3,'c'=>1]
// print_r($b+$a);     // [4,2,1]  ['a'=>4,'b'=>2,'c'=>1]

// print_r(array_intersect($b,$a));//array_intersect


// $str = 'a\bs';
// echo addslashes($str);  //添加转移字符   这个函数开启，则不要手动设置get_magic_quotes_gpc
// echo stripslashes($str);    //删除转义字符

// $str = "<html>php</html>";
// echo strip_tags($str);   //去掉html标签，可以用与防止跨站脚本攻击

// $a = 12;
// $b = '12';
// if((string)$a === $b){
//     echo '11';
// }


// $str1 = 10;
// $str2 = $str1;
// echo $str2;
// echo $$str2;    //echo $10;

function f1(){
    $i = 0;
    return $i++;
}

echo f1();
echo f1();
