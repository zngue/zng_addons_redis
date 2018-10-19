<?php
namespace zng\addons\redis\driver;

class ZngRedis{
	
	
	public function __construct ( string $host , int $port, bool $type = false ){
		$redis = new \Redis();
		if( $type ){
			
			$redis->pconnect($host, $port);
		}else{
			
			$redis->connect($host, $port);
		}
		$this->redisConnect = $redis;
	}
	/**
     * [返回redis实例对象]
     * @return [obj] [description]
     */
    public function redisInstance()
    {
        
        return $this->redisConnect;
    }
	
	
	
	
	
}