$a =  array(311,22,23,5,4,159,63);
$b =  array(311,22,23,45,46,159,63);
    	 
$bitMapObj1 = new BitMap($a);
$bitMapObj2 = new BitMap($b); 

##### 查找某一个数字
```
$isFinded = $bitMapObj1->find(30);
```

##### 获取排序好的数据
```
$sortedArr1 =  $bitMapObj1->getSortArr();
$sortedArr2 =  $bitMapObj2->getSortArr();
```
 
##### 取两个对象的交集
```
$jiaoji = $bitMapObj1->intersect($bitMapObj2); 
```
