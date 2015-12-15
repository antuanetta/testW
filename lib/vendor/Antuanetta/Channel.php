<?php

namespace Antuanetta;

/**
 * класс канал
 */
class Channel 
{
    private $num;  // номер канала
    private $name; // название канала
    private $frequency; // частота
  
    public function __construct($num, $name, $frequency) 
    {
        $this->num = $num;
        $this->name = $name;
        $this->frequency = $frequency;
    }
    
    /**
     * Возвращает номер канала
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     *  Возвращает имя канала
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     *  Возвращает частоту канала
     */
    public function getFrequency()
    {
        return $this->frequency;
    }
}