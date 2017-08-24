<?php
namespace app\agent\model;
use think\Model;

class Cate extends Model{

	
	//无限级分类
	public function catetree(){
		//取数据
		$cateres=$this->order('sort desc')->select();
		//排序
		return $this->sort($cateres);
	}
	//栏目排序方法
	//pid上级栏目id
	//level栏目层级
	public function sort($data,$pid=0,$level=0){
		static $arr=array();
		foreach ($data as $k => $v) {
			//数据库中的v['pid']，第一次循环最顶级的为0
			if($v['pid']==$pid){
				//数据库中并没有level，新增一个临时的索引,第一次也为0
				$v['level']=$level;
				//把结果的一维数组赋值给arr,arr为二维数组
				$arr[]=$v;
				//递归,当前栏目的id等于子栏目的pid,层级递增
				$this->sort($data,$v['id'],$level+1);
			}
		}
		return $arr;
	}

	//找到要删除的栏目的子栏目
	//当前栏目
	function getchildrenid($cateid){
		$cateres=$this->select();
		return $this->getchildrenid2($cateres,$cateid);
	}
	//子栏目查找
	public function getchildrenid2($cateres,$cateid){
		static $arr=array();
		foreach ($cateres as $k => $v) {
			if($v['pid']==$cateid){
				$arr[]=$v['id'];
				$this->getchildrenid2($cateres,$v['id']);
			}
		}
		return $arr;
	}







}