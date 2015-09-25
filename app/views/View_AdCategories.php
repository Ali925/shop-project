<div class="features_descript" style="border: none">
    <div class="feautures_descr_title">
        <?php
        if(!$data){
            echo "<h3>В таблице нет записей о категориях[<h3>";
        }else {

            echo <<<HERE
            <table class='tableContent'>
                <tr>
                    <th>ID</th>
                    <th>Категория</th>
                </tr>
HERE;
            foreach ($data as $value) {
                echo <<<HERE
            <tr>
                <td>{$value['id']}</td>
                <td>{$value['title']}</td>
                <td><a href="#"><button>Изменить</button></a></td>
                <td><a href="#"><button>Удалить</button></a></td>
            </tr>
HERE;
            }
            echo "</table>";
        }
        ?>
    </div>
</div>