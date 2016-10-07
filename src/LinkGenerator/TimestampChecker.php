<?php
namespace LinkGenerator;
class TimestampChecker {

    public function isTimestamp($string) {
        try {
            new \DateTime('@' . $string);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

}
