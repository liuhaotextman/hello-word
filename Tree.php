<?php
class Tree
{
	static public $treeList=array();//存放无限极分类结果

	public function create($data,$pid,$parent_field,$primary_field)
	{
		foreach ($data as $key=>$value)
		{
			if ($value[$parent_field]==$pid)
			{
				//防止重复添加
				if (!in_array($value, self::$treeList))
				{
					self::$treeList[]=$value;
					unset($data[$key]);
					self::create($data,$value[$primary_field],$parent_field,$primary_field);
				}
			}
		}
		return self::$treeList;
	}
}