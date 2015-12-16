<?php

namespace Antuanetta;

/**
 * класс телевизор
 */
class TV 
{
    const CHANNEL_MAX = 100;
    const CONTRAST_MAX = 100;
    const VOLUME_MAX = 100;

    private $on;
    private $currentChannelNum;
    private $volume;
    private $contrast;
    private $channels;
 
    public function __construct($on, array $channels, $currentChannelNum = 1, $volume = 10, $contrast = 50) {
        $this->on = $on;
        $this->currentChannelNum = $currentChannelNum;
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
     * @param boolean $up направление изменения
     */
    public function switchChannel($up)
    {
        if (!$this->isOn()) $this->turn(true);

        if ($up) {
            $this->currentChannelNum = $this->currentChannelNum < self::CHANNEL_MAX - 1 ? $this->currentChannelNum + 1 : 0;
        } else {
            $this->currentChannelNum = $this->currentChannelNum > 0 ? $this->currentChannelNum - 1 : self::CHANNEL_MAX - 1;
        }
    }
 
    /**
     * Переключение на конкретный канал.
     * Если номер попадает в диапазон от 0 до размера массива каналов, то переключает
     * иначе - не произойдет ничего
     * @param integer $num номер канала
     */
    public function switchToChannel($num)
    { 
        if ($num >= 0 && $num < self::CHANNEL_MAX) {
            $this->currentChannelNum = $num;
        }
    }
 
    /**
     * Изменение громкости.
     * @param boolean $up направление изменения
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
    public function getCurrentChannelNum()
    {
        return $this->currentChannelNum;
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
     * @param boolean $up направление изменения
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

    public function __toString()
    {
        return sprintf("Tv is: %s, CurrentChannel: %d, Volume: %d, Contrast: %d",
            $this->isOn() ? "On" : "Off", 
            $this->getCurrentChannelNum(), 
            $this->getVolume(), 
            $this->getContrast()
        );
    }
};