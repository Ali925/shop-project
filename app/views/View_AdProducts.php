<div class="features_descript" style="border: none">
    <div class="feautures_descr_title">
        <?php

        if($addForm){
            echo <<<HERE
                <form action='/AdProducts/addProduct' method='post'>
                <table class='tableContent'>
                    <tr>
                        <th>Марка</th>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Категория</th>
                        <th>Количество</th>
                        <th>Цена</th>
                        <th>Изображение</th>
                    </tr>
                    <tr>
                        <td><input id="mark" name="mark" type="text"></td>
                        <td><input id="title" name="title" type="text"></td>
                        <td><input id="description" name="description" type="text"></td>
                        <td>
                            <select id="id_catalog" name="id_catalog">
HERE;
                                foreach($categories as $category){
                                    echo "<option selected='selected'>".$category['title']."</option>";
                                }
            echo <<<HERE
                            </select>
                        </td>
                        <td><input id="count" name="count" min="0" type="number"></td>
                        <td><input id="price" name="price" type="text"></td>
                        <td><button type='submit'>Добавить</button></td>
                    </tr>
                    </form>
HERE;
        }
        if($editForm){
            echo <<<HERE
                <form action='/AdProducts/editProduct' method='post'>
                <table class='tableContent'>
                    <tr>
                        <th>Марка</th>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Категория</th>
                        <th>Количество</th>
                        <th>Цена</th>
                        <th>Изображение</th>
                    </tr>
                    <tr>
                        <td><input id="mark" name="mark" value="{$product['mark']}" type="text"></td>
                        <td><input id="title" name="title" value="{$product['title']}" type="text"></td>
                        <td><input id="description" name="description" value="{$product['description']}" type="text"></td>
                        <td>
                            <select id="id_catalog" name="id_catalog">
HERE;
            foreach($categories as $category){
                echo "<option ";
                    if($product['id_catalog'] === $category['id']){
                        echo "selected='selected' ";
                    }
                echo ">".$category['title']."</option>";

            }
            echo <<<HERE
                            </select>
                        </td>
                        <td><input id="count" name="count" min="0" value="{$product['count']}" type="number"></td>
                        <td><input id="price" name="price" value="{$product['price']}" type="text"></td>
                        <td><input id="link" name="link" value="{$product['link']}" type="text"></td>
                        <td><button type='submit'>Изменить</button></td>
                    </tr>
                    </form>
HERE;
        }

        echo "<a href='/AdProducts/viewFormAdd'><button>Добавить продукт</button></a>";

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
                <td><a href="/AdProducts/viewFormEdit/{$value['id']}"><button>Изменить</button></a></td>
                <td><a href="/AdProducts/delProduct/{$value['id']}"><button>Удалить</button></a></td>
            </tr>
HERE;
            }
            echo "</table>";
        }
        ?>
    </div>
</div>