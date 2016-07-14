成功解压后请访问http://你的域名/fileadmin进入后台管理<br/>
<?php
/*
* Package: FTP Installer
* Author: Achunk JealousMan
* Email: achunk17@gmail.com
* Site: http://7ko.in
*/
error_reporting(0);
ignore_user_abort(true);
if(!class_exists('ZipArchive')) {
die("调用ZipArchive类失败！");
}
function zipExtract ($src, $dest)
    {
        $zip = new ZipArchive();
        if ($zip->open($src)===true)
        {
            $zip->extractTo($dest);
            $zip->close();
            return true;
        }
        return false;
    }

echo '<html><head><title>远程在线安装</title></head><body>';
if (!isset($_GET['zip'])) {
echo '<form method="get" action="?"><b>文件地址：</b><br /><input type="text" name="zip" value="http://b.wodemo.com/distribution/173731/9efa3c4ee8197c22b6e95bec5bc2d122/%E7%88%B1%E7%89%B9%E6%96%87%E4%BB%B6%E7%AE%A1%E7%90%86%E5%99%A81.82.zip"/><input type="submit" value="安装"/></form></body></html>';
exit;
}
$RemoteFile = rawurldecode($_GET["zip"]);
$ZipFile = "Archive.zip";
$Dir = "./";

copy($RemoteFile,$ZipFile) or die("无法复制文件 <b>".$RemoteFile);

if (zipExtract($ZipFile,$Dir)) {
echo "<b>".basename($RemoteFile)."</b> 成功解压文件到当前目录.";
unlink($ZipFile);

}
else {
echo "无法解压该文件 <b>".$ZipFile.".</b>";
if (file_exists($ZipFile)) {
unlink($ZipFile);
}

}
?>
<!--DEFAULT_WELCOME_PAGE-->

