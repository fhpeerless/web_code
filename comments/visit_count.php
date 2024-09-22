<?php
date_default_timezone_set('Asia/Shanghai');  // 设置时区，根据你的实际需求调整
$filename = 'visit_count.txt';

// 获取当前日期
$current_date = date('Y-m-d');

// 打开文件，如果文件不存在则创建一个新的
$file = fopen($filename, 'a+');

if ($file) {
    // 获取文件锁以处理并发访问
    flock($file, LOCK_EX);

    // 获取文件内容
    $data = fread($file, filesize($filename));
    $visits = json_decode($data, true);

    // 如果文件内容是空的或者日期改变，初始化访问计数
    if ($visits === false || !isset($visits['date']) || $visits['date'] !== $current_date) {
        $visits = ['date' => $current_date, 'count' => 0];
    }

    // 增加访问计数
    $visits['count']++;

    // 重置文件指针，并清空文件内容
    ftruncate($file, 0);
    rewind($file);

    // 将新的访问计数写回到文件
    fwrite($file, json_encode($visits));

    // 输出当前日期的访问计数
    echo "当日访问次数: " . $visits['count'];

    // 释放锁并关闭文件
    flock($file, LOCK_UN);
    fclose($file);
} else {
    echo "无法打开文件 $filename";
}
?>