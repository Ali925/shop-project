<div class="features_descript" style="border: none">
    <div class="feautures_descr_title">
        <?php
        if(!$data){
            echo "<h3>В таблице нет записей о товарах<h3>";
        }else {

            echo <<<HERE
            <table class='tableContent'>
                <tr>
                    <th>ID</th>
                    <th>Марка</th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Категория</th>
                    <th>Количество</th>
                    <th>Цена</th>
                    <th>Изображение</th>
                </tr>
HERE;
            foreach ($data as $value) {
                $id_catalog = --$value['id_catalog'];
                echo <<<HERE
            <tr>
                <td>{$value['id']}</td>
                <td>{$value['mark']}</td>
                <td>{$value['title']}</td>
                <td>{$value['description']}</td>
                <td>{$categories[$id_catalog]['title']}</td>
                <td>{$value['count']}</td>
                <td>{$value['price']}</td>
                <td><img src='{$value['link']}'></td>
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