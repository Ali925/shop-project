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
            $id_catalog = --$data['id_catalog'];
            echo <<<HERE
            <tr>
                <td>{$data['id']}</td>
                <td>{$data['mark']}</td>
                <td>{$data['title']}</td>
                <td>{$data['description']}</td>
                <td>{$categories[$id_catalog]['title']}</td>
                <td>{$data['count']}</td>
                <td>{$data['price']}</td>
                <td><img src='{$data['link']}'></td>
            </tr>
HERE;
                echo "</table>";
        }
        ?>
    </div>
</div>