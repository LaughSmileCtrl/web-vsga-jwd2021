<?php
namespace Model;

class Validation {
    public static function validate($post, $redirect)
    {
        foreach ($post as $key => $value) {
            if (empty($value)) {
                header('Location:../' . $redirect
                    . '.php?msg=' . $key . ' kosong');
                exit();
            }
        }
    }
}