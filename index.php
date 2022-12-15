<?php 
$today = date("m.d.y");
$time = date("H:i");
$type = "Верстка не выбрана.";
$multiplication = "Вся таблица умножения.";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet">
    <title>Силаев 211-362 лаба 11</title>
</head>
<body>
    <header class = "header">
        <div>Главная</div>
        <div>
            <?php 
                echo '<a href="?html_type=TABLE';

                if (isset($_GET['content'])){
                    echo '&content='.$_GET['content'];
                }

                echo '"';

                if (array_key_exists('html_type', $_GET) && $_GET['html_type']== 'TABLE'){
                    echo ' class="selected"';
                    $type = "Табличная верстка.";
                }
                echo '>Табличная верстка</a>';
            ?>
        </div>
        <div>
            <?php 
                echo '<a href="?html_type=DIV';

                if (isset($_GET['content'])){
                    echo '&content='.$_GET['content'];
                }

                echo '"';

                if (array_key_exists('html_type', $_GET) && $_GET['html_type']== 'DIV'){
                    echo ' class="selected"';
                    $type = "Блочная верстка.";
                }
                echo '>Блочная верстка</a>'; 
            ?>
        </div>
    </header>
    <main class="body">
        <div class="styletable">
            <table class="tables">
                <tbody>
                    <?php
                        echo '<tr>';
                        echo '<td><a href="/"';
                        if (!isset($_GET['content'])){
                            echo 'class="selected"';
                            $multiplication = "Вся таблица умножения.";
                        } else {
                            echo 'class="none"';
                        }
                        echo '>Вся таблица умножения</a></td>';
                        echo '</tr>';

                        for ($i=2; $i<=9; $i++) {
                            echo '<tr>';
                            echo '<td><a href="?content='.$i.'"';
                            if (isset($_GET['content']) && $_GET['content']==$i){
                                echo 'class="selected"';
                                $multiplication = 'Таблица умножения на '.$i.'.';
                            } else {
                                echo 'class="none"';
                            }
                            echo '>Таблица умножения на '.$i.'</a></td>';
                            echo '</tr>';
                        }
                   ?>
                </tbody>
            </table>
        </div>
        <div class="div">
            <?php
                function outNumAsLink($x) {
                    if ($x <= 9){
                        echo '<a href="?content='.$x.'">'.$x.'</a>';
                    } else {
                        echo $x;
                    }
                }

                function outRow($n){
                    for ($i=2; $i<=9; $i++){
                        echo '<a href="?content='.$n.'">'.$n.'</a>x<a href="?content='.$i.'">'.$i.'</a>=';
                        if (($i*$n)<=9){
                            echo '<a href="?content='.($i*$n).'">'.($i*$n).'</a>';
                        } else {
                            echo ($i*$n);
                        }
                        echo '<br>';
                    }
                }

                function outTable($n){
                    for ($i=2; $i<=9; $i++){
                        echo '<tr>';
                        echo '<td><a href="?content='.$n.'">'.$n.'</a>x<a href="?content='.$i.'">'.$i.'</a></td>';
                        if (($i*$n)<=9){
                            echo '<td><a href="?content='.($i*$n).'">'.($i*$n).'</a></td>';
                        } else {
                            echo '<td>'.($i*$n).'</td>';
                        }
                        echo '</tr>';
                    }
                }

                function outTableForm(){
                    echo '<div class="stylemultiplication">';
                    echo '<table class="multiplication">';
                    echo '<tbody>';
                    if (!isset($_GET['content'])){
                        for ($i=2; $i<10; $i++){
                            outTable($i);
                        }
                    } else {
                        outTable($_GET['content']);
                    }
                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                }

                function outDivForm(){
                    if (!isset($_GET['content'])){
                        for ($i=2; $i<10; $i++){
                            echo '<div class="ttRow">';
                            outRow($i);
                            echo '</div>';
                        }
                    } else {
                        echo '<div class="ttRow">';
                        outRow($_GET['content']);
                        echo '</div>';
                    }
                }

                if (isset($_GET['html_type']) && $_GET['html_type']=='TABLE'){
                    outTableForm();
                } else {
                    outDivForm();
                }
            ?>
        </div>
    </main>
    <footer class="footer">
        <div class="right"><?php echo $type ?></div>
        <div class="right"><?php echo $multiplication ?></div>
        <div><?php echo 'Дата: ', $today, 'г. Время: ', $time ?></div>
    </footer>
</body>
</html>
