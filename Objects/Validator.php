<?php

class Validator
{
    /**
     * Check for an integer validity
     *
     * @param integer $value Integer to validate
     * @return boolean Validity is ok or not
     */
    public static function isInt($value)
    {
        return ((string)(int)$value === (string)$value || $value === false);
    }
}
