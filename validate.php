<?php 
class ValidateData
{

    public function IsExist($value)
    {
        if (! isset($value)) {
            return false;
        }
        
        if (empty($value)) {
            return false;
        }
        return true;
    }

    public function FilterStringOnHtmlSql($input_text)
    {
        $input_text = strip_tags($input_text);
        $input_text = htmlspecialchars($input_text);
        return mysql_escape_string($input_text);
    }

    public function CastInteger($input_integer)
    {
        $input_integer = trim($input_integer);
        return (int) $input_integer;
    }

    public function ValidString($input_text)
    {
        $input_text = trim($input_text);
        if (ctype_alpha($input_text)) {
            return true;
        } else {
            return false;
        }
    }

    public function ValidInteger($input_integer)
    {
        $input_integer = trim($input_integer);
        if (ctype_digit($input_integer)) {
            return true;
        } else {
            return false;
        }
    }

    public function ValidIntegerString($input_textInteger)
    {
        $input_textInteger = trim($input_textInteger);
        // if(preg_match('/[^A-Za-zа-яА-Я0-9\.\ \,]/', $input_textInteger)) { //разрешено- @ « "
        if (preg_match('/[\\\!\#\$\%\^\&\*\(\)\<\>\?\=\+\-\'\;\:]+/', $input_textInteger)) {
            // echo false.' - провал<br>';
            return false;
        } else {
            // echo $input_textInteger.' - успешно<br>';
            return true;
        }
    }
}
?>
