<?php
namespace zng\addons\redis;

use zng\addons\redis\driver\ZngRedis;
class RedisList extends ZngRedis {

        public $key;

	   
        /**
         * [insertQueue 头部插入队列]
         * @param  [$key] $data [description]
         * @param  [$data]
         * @return [type]       [description]
         */
        public function  addHeaderQueue( string $key , array $data ){

            $length=$this->redisConnect->lPush( $key,serialize($data) );

            return $length;
        }
    /**
     * [inserFooterQuee 尾部插入队列]
     * @param  [$key] $data [description]
     * @param  [$data]
     * @return [type]       [description]
     */
        public function addFooterQuee( string $key , array $data ){

            $length=$this->redisConnect->rPush( $key,serialize($data) );

            return $length;

        }
        /**
         * [removeFooertQueue 从队列尾部中取出数据]
         * @param  [$key] $data [description]
         * @return [type]       [description]
         */
        public function removeFooertQueue( string  $key){

            $value=$this->redisConnect->rPop($key);

            if($value){
                return unserialize($value);
            }else{
                return false;
            }
        }
    /**
     * [removeHeaderQueue 从队列头部中取出数据]
     * @param  [$key] $data [description]
     * @return [type]       [description]
     */
    public function removeHeaderQueue( string  $key){

        $value=$this->redisConnect->lPop($key);

        if($value){
            return unserialize($value);
        }else{
            return $this->getLength($key);
        }
    }
    /**
     * [getLength 获取队列长度]
     * @return [key] [description]
     */
    public function getLength( $key ){

        $length=$this->redisConnect->lSize($key);
        return $length ? $length :0;
    }
     /**
     * [Index 获取指定key的值Index 的value值]
     * @return [key] [description]
     */
    public function getIndexValue(stirng $key ,  int $Index){

        return $this->redisConnect->lGet($key, $Index);
    }
    /**
     * [Index 设置key的Index 的value值]
     * @return [key] [description]
     */
    public function setIndexValue( string $key ,int $Index ,array $data ){

        return $this->redisConnect->lSet( $key, $Index, serialize($data) );
    }
    /**
     * [获取指定范围的值 默认返回所有]
     * @return [key] [description]
     */
    public function getRangeValue(  string $key , int  $start =0 , string  $end ='-1'  ){


       return  $this->redisConnect->lRange($key, $start , $end);
    }
    /**
     * [截取链表key中start到end位置间的元素]
     * @return [key] [description]
     */
    public function getListValue( string $key ,int $start  ,int $end  ){


        return $this->redisConnect->lTrim($key, $start, $end);
    }
     /**
     * [截取链表key中start到end位置间的元素]
     * @return [key] [description]
     */
    public function removeIndex(string $key , array $data , string $count ){


        return $this->redisConnect->lRem($key, serialize($data), $count);
    }
     



}