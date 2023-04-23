<?php
$file = '/etc/dnsmasq.conf'; // 文件路径
$error_msg = ''; // 错误信息

// 检查是否有POST请求
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['file_content'])) {
    // 获取用户输入的内容
    $file_content = $_POST['file_content'];

    // 检查文件是否可写
    if (!is_writable($file)) {
        $error_msg = 'File not writable, cannot save!';
    } else {
        // 将内容写入文件
        if (file_put_contents($file, $file_content) === false) {
            $error_msg = 'Save Failed!';
        } else {
            $success_msg = 'Save Successfully!';
        }
    }
}

// 读取文件内容
$file_content = file_get_contents($file);
?>
