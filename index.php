<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Document</title>
</head>
<body>

<?php

class Kettle {

    public $html = '';
    public $result = 0;

    public function getData() {

        $this->html .= '<div class="form"><form method="POST">Введите данные:';

        $this->html .= '<input type="text" name="volume" placeholder="Объем воды (0.2 - 2)" />
                        <input type="text" name="temperature" placeholder="Температура воды"/>
                        <button type="submit">Принять</button';

        $this->html .= '</form></div>';

        echo $this->html;

        if (empty($_POST['volume']) && empty($_POST['temperature'])) return;
        else $this->checkInfo();
    }

    public function checkInfo() {
        if ($_POST['volume'] > 2) {
            echo 'Слишком много воды!';
        } else if ($_POST['volume'] < 0.2) {
            echo 'Слишком мало воды!';
        } else if ($_POST['temperature'] < 0) {
            echo 'Вы растапливаете лед в чайнике? Ужас!';
        } else if ($_POST['temperature'] > 100) {
            echo 'Введите температуру меньше 100 градусов, хотя бы!';
        } else $this->result();
    }

    public function result() {
        $this->result = (4200 * $_POST['volume'] * (100 - $_POST['temperature'])) / (0.85 * 2000);

        echo 'Время закипания чайника: ' . floor($this->result/60) . ' мин. ' . floor($this->result%60) . ' сек.';
    }
}

$kettle = new Kettle();

echo $kettle->getData();

?>  
</body>
</html>
