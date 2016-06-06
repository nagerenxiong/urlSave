   <?php   
    //假若我们本地的文件是一个名为xmlas.txt的文本   
   function _post($str){
    $val = !empty($_POST[$str]) ? $_POST[$str] : null;
    return $val;
  }
   function wirte($filename,$contents)
     {
      $fp=fopen($filename,"wb");
      if($fp)
      {
       flock($fp,LOCK_EX);//同一时间锁定文件，只能一个人操作
       fwrite($fp,$contents);
       flock($fp,LOCK_UN);//保存数据握进行解锁文件并保存
       fclose($fp);
       return true;
      }else
      {
       return false;
      }
    }
    $url=_post("url")."\r\n";
    $className=_post("className");
    if($className=="")die();
    $className1=iconv("UTF-8", "GBK", $className);
    $fileUrl="D:/txt/".$className1.".txt";
    If(!file_exists($fileUrl)){
      $file = fopen($fileUrl,'w');
      fwrite($file, $url);
      fclose($file);
    }
    else{
       $str = file_get_contents($fileUrl);
       $str1=$str.$url;
       echo $str1;
       wirte($fileUrl,$str1);
    }
  ?>