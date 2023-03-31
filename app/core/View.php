<?php

require_once "/var/www/task/app/models/TableModel.php";

class View extends TableModel
{
    function generate($content_view, $template_view, $data = null)
    {

//        if(is_array($data)) {
//            // преобразуем элементы массива в переменные
//            extract($data);
//        }


        include '/var/www/task/app/views/'.$template_view;
    }

}