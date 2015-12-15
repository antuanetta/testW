<?php

namespace Antuanetta;

/**
 * класс телевизор
 */
class TV 
{
    const CONTRAST_MAX = 100;
    const VOLUME_MAX = 100;

    private $on;
    private $currentChannel;
    private $volume;
    private $contrast;
    private $channels;
 
    public function __construct($on, array $channels, $currentChannel = 1, $volume = 10, $contrast = 50) {
        $this->on = $on;
        $this->currentChannel = $currentChannel;
        $this->volume = $volume;
        $this->contrast = $contrast;
        $this->channels = $channels;
    }
 
    /**
     * функция вкл/выкл.
     */
    public function turn($on = true)
    { 
        $this->on = $on;
    }
 
    /**
     * Возвращает значение включен телевизор или нет.
     */
    public function isOn()
    {
        return $this->on;
    }
 
    /**
     * Переключение каналов.
     * Переход по списку каналов замкнут
     * @param boolean up направление изменения
     */
    public function switchChannel($up)
    {
        if (!$this->isOn()) $this->turn(true);

        if ($up) {
            $this->currentChannel = $this->currentChannel < count($this->channels) - 1 ? $this->currentChannel++ : 0;
        } else {
            $this->currentChannel = $this->currentChannel > 0 ? $this->currentChannel-- : count($this->channels) - 1;
        }
    }
 
    /**
     * Переключение на конкретный канал.
     * Если номер попадает в диапазон от 0 до размера массива каналов, то переключает
     * иначе - не произойдет ничего
     */
    public function switchToChannel($num)
    { 
        if ($num >= 0 && $num < count($this->channels)) {
            $this->currentChannel = $num;
        }
    }
 
    /**
     * Изменение громкости.
     */
    public function changeVolume($up)
    { 
        if (!$this->isOn()) return;
		
        if ($up && $this->volume < self::VOLUME_MAX) {
            $this->volume++;
        } elseif (!$up && $this->volume > 0) {
            $this->volume--;
        }
    }
 
    /**
     * Возвращает номер текущего канала.
     */
    public function getCurrentChannel()
    {
        return $this->channels[$this->currentChannel];
    }
 
    /**
     * Возвращает значение громкости.
     */
    public function getVolume() 
    {
        return $this->volume;
    }
 
    /**
     * Возвращает значение контраста.
     */
    public function getContrast()
    {
        return $this->contrast;
    }
 
    /**
     * Изменение контраста.
     */
    public function changeContrast($up)
    { 
        if (!$this->isOn()) return;
		
        if ($up && $this->contrast < self::CONTRAST_MAX) {
            $this->contrast++;
        } elseif(!$up && $this->contrast > 0) {
            $this->contrast--;
        }
    }
};