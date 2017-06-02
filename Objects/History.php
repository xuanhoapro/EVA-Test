<?php
/**
 * Created by PhpStorm.
 * User: ACV.HoaNX
 * Date: 6/2/2017
 * Time: 1:46 PM
 */

class History
{
    protected $data;
    public function __construct()
    {
        
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    public function render()
    {
        return 'HoaNX';
    }

}