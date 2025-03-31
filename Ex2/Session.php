<?php
class Session {
    public function __construct() {
        session_start();
        $this->correct();
    }

    public function close_session() {
        session_unset();
    }

    public function restart_session() {
        session_unset();

        session_start();
    }

    public function getVariable(string $var) {
        return $_SESSION[$var];
    }

    public function setVariable(string $var, $value) {
        $_SESSION[$var] = $value;
        $this->$var = $value;
    }

    public function unsetVariable(string $var) {
        unset($_SESSION[$var]);
        unset($this->$var);
    }

    public function correct() {
        foreach($_SESSION as $key=>$value) {
            $this->$key = $value;
        }
    }

    public function update() {
        foreach($this as $key=>$value) {
            $_SESSION[$key] = $value;
        }
    }

    public function isset($var) {
        return isset($_SESSION[$var]);
    }
}