<?php




    class UnbufferedAssociativeResultSet implements ArrayAccess, Iterator, Countable
	{
		private $intCurrent;
		private $resResult;
		private $intCount;

		function __construct($resResult)
		{
			$this->intCount = null;
            $this->intCurrent = 0;
            $this->resResult = $resResult;
        }
        
        public static function factory($resResult)
        {
        	return new self($resResult);
        } 

        function offsetExists($intOffset)
        {
			return $intOffset < $this->count() && $intOffset >= 0;
        }

		function offsetGet($intOffset)
		{
			if (!$this->offsetExists($intOffset)) return false;

			if (mysql_data_seek($this->resResult, $intOffset))
			{
				return mysql_fetch_assoc($this->resResult);
			}

			return false;
		}

		function offsetSet($offset,$value)
		{
			throw new Exception("This collection is read only.");
        }

		function offsetUnset($offset)
		{
			throw new Exception("This collection is read only.");
		}

		function count()
		{
			if (null === $this->intCount) $this->setCount();
			return $this->intCount;
		}

		private function setCount()
		{
			$this->intCount = mysql_num_rows($this->resResult);
		}

		function current()
		{
			return $this->offsetGet($this->intCurrent);
		}

		function key()
		{
			return $this->intCurrent;
		}

		function next()
		{
			return $this->intCurrent++;
		}

		function rewind()
		{
			$this->intCurrent = 0;
		}

		function valid()
		{
			return $this->offsetExists($this->intCurrent);
		}

		function append($value)
		{
			throw new Exception("This collection is read only");
		}

		function getIterator()
		{
			return $this;
		}
	}