<?php

class History
{
    protected $history = [];
    static protected $cookieName = 'history';

    public function __construct($history = null)
    {
        if ($history) {
            $this->history = $history;
        }
    }

    /**
     * @param array|null $history
     */
    public function setHistory($history)
    {
        $this->history = $history;
    }

    /**
     * @return array|null
     */
    public function getHistory()
    {
        return $this->history;
    }

    /**
     * Get current history data
     *
     * @return array|mixed
     */
    public static function getCurrentHistory()
    {
        $result = [];
        if (isset($_COOKIE[self::$cookieName])) {
            $result = unserialize($_COOKIE[self::$cookieName]);
        }
        return $result;
    }

    /**
     * save history data to cookie
     *
     * @return array|null
     */
    public function saveHistory()
    {
        $currentHistory = self::getCurrentHistory();
        if ($currentHistory) {
            $this->history = array_merge($this->history, $currentHistory);
            unset($_COOKIE[self::$cookieName]);
        }

        setcookie(self::$cookieName, serialize($this->history));

        return $this->history;
    }
}
