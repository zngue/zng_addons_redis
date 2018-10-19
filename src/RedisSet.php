<?php
namespace zng\addons\redis;
use zng\addons\redis\driver\ZngRedis;

class RedisSet extends ZngRedis
{
	 /**
     * [将$value设置到容器中]
     * @return  [description]
     */
	public function listSetAdd( string $key , string $value)
	{
		
		return $this->redisConnect->sAdd( $key ,$value );	
	}
	 /**
     * [将$value从器中删除]
     * @return  [description]
     */
	public function listSetDel(stirng $key ,stirng $value)
	{
		
		return $this->redisConnect->sRem( $key,$value );
	}
	 /**
     * [将$key1中的$value值移动到$key2容器中]
     * @return  [description]
     */
	public function listSetRemove( stirng $key1, stirng $key2 , stirng $value)
	{
		
		return $this->redisConnect->sMove( $key1, $key2 , $value );
	}
	 /**
     * [判断$value是否在容器中]
     * @return  [description]
     */
	public function listSetIsSet( stirng $key, stirng $value)
	{
		
		return $this->redisConnect->sIsMember($key,$value);
	}
	/**
     * [返回集合中所有元素]
     * @return  [description]
     */
	public function listSetAll(stirng $key)
	{
		
		return $this->redisConnect->sMembers($key);
	}




}
