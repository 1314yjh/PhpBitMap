<?php
 

class BitMap
{
	public $bitMaps = [];
	public $size = PHP_INT_SIZE * 8;

	private $length = 0;

	public function __construct($arr)
	{
		$this->length = ceil(max($arr) / $this->size);
		$this->bitMaps = array_fill(0, $this->length, 0);
		foreach ($arr as $key => $one) { 
    		$this->setBit($one);
    	}

	}

	public function setBit($value)
	{
		$keyPos = floor($value / $this->size);
		$bitPos = $value % $this->size;
		$this->bitMaps[$keyPos] |= (1 << $bitPos);
	}

	public function find($findValue)
	{
		$keyPos = floor($findValue / $this->size);
		$bitPos = $findValue % $this->size;
		$isFinded = $this->bitMaps[$keyPos] & (1 << $bitPos);
		return boolval($isFinded);
	}

	private function getLength()
	{
		return $this->length;
	}
	/**
	 * 交集
	 */
	public function intersect(BitMap $bitMapObj)
	{
		$newBitMap = [];

		if($this->getLength() >= $bitMapObj->getLength()){
			$outBitMap = $this->bitMaps;
			$innerBitMap = $bitMapObj->bitMaps;
		}else{
			$outBitMap = $bitMapObj->bitMaps;
			$innerBitMap = $this->bitMaps;
		}

		foreach ($outBitMap as $key => $oneOutBitMap) {
			# code...
			if(array_key_exists($key, $innerBitMap)){
				$newBitMap[] = $oneOutBitMap & $innerBitMap[$key];
			}
		}


		$newArr = [];
		foreach($newBitMap as $k => $bitMap)
		{
			for($i = 0; $i < $this->size; $i++){
				$flag = $bitMap & (1 << $i);
 
				if($flag)
				{
					$newArr[] = $k * $this->size + $i;
				}
			}
		}
		return $newArr; 
	}


	public function getSortArr()
	{
		$newArr = [];
		foreach($this->bitMaps as $k => $bitMap)
		{
			for($i = 0; $i < $this->size; $i++){
				$flag = $bitMap & (1 << $i);
 
				if($flag)
				{
					$newArr[] = $k * $this->size + $i;
				}
			}
		}
		return $newArr;
	}
}
