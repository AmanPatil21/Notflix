<?php
class FromSanitizer {

    public static function sanitizeFormString($inputName) {
        // Remove  html tags from string
        $inputName = strip_tags($inputName);
        // Remove spaces from the front and last
        $inputName = trim($inputName);
        // Make string lower case
        $inputName = strtolower($inputName);
        // Make first Chacter to Captial
        $inputName = ucfirst($inputName); 
        return $inputName;
    }

    public static function sanitizeFormUserName($inputName) {
        $inputName = strip_tags($inputName);
        $inputName = trim($inputName);
        return $inputName;
    }

    public static function sanitizeFormPassword($inputName) {
        $inputName = strip_tags($inputName);
        return $inputName;
    }

    public static function sanitizeFormEmail($inputName) {
        $inputName = strip_tags($inputName);
        $inputName = trim($inputName);
        return $inputName;
    }
}
?>
