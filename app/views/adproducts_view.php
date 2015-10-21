<div class="features_descript" style="border: none">

        <?php
            echo "<h4>{$header}</h4>";
            if($addForm){
                echo <<<HERE
                    <div class='Form'>
                        <form action='/AdProducts/addProduct' enctype="multipart/form-data" method='post'>
                            <div class='dataForm'>
                                <div class='FormHeaders'>
                                    <span>Марка: </span><br/>
                                    <span>Название: </span><br/>
                                    <span class="productDescr">Описание: </span><br/>
                                    <span>Категория: </span><br/>
                                    <span>Количество: </span><br/>
                                    <span>Цена: </span><br/>
                                    <span>Изображение: </span><br/>
                                </div>
                                <div class='FormData'>
                                    <input id="mark" name="mark" type="text"><br/>
                                    <input id="title" name="title" type="text"><br/>
                                    <textarea class="productDescr" id="description" name="description"></textarea><br/>
                                    <select id="id_catalog" name="id_catalog"><br/>
HERE;
                                    foreach($categories as $category){
                                        echo "<option>".$category['title']."</option>";
                                    }
                echo <<<HERE
                                    </select><br/>
                                    <input id="count" name="count" min="0" type="number"><br/>
                                    <input id="price" name="price" type="text"><br/>
                                    <input name="MAX_FILE_SIZE" value="2048000" type="hidden">
                                    <input id="link" name="link" type="file"><br/>
                                    <button type='submit'>Добавить</button>
                                </div>
                            </div>
                         </form>
                    </div>
HERE;
            }
            if($editForm){
                echo <<<HERE
                    <div class='Form'>
                        <form action='/AdProducts/editProduct' enctype="multipart/form-data" method='post'>
                            <div class='dataForm'>
                                <div class='FormHeaders'>
                                    <span>ID: </span><br/>
                                    <span>Марка: </span><br/>
                                    <span>Название: </span><br/>
                                    <span class="productDescr">Описание: </span><br/>
                                    <span>Категория: </span><br/>
                                    <span>Количество: </span><br/>
                                    <span>Цена: </span><br/>
                                    <span>Изображение: </span><br/>
                                </div>
                                <div class='FormData'>
                                    <input disabled="disabled" value="{$product['id']}" type="text">
                                    <input name="id" value="{$product['id']}" type="hidden">
                                    <input id="mark" name="mark" value="{$product['mark']}" type="text">
                                    <input id="title" name="title" value="{$product['title']}" type="text">
                                    <textarea class="productDescr" id="description" name="description">{$product['description']}</textarea><br/>
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
                                    <input id="count" name="count" min="0" value="{$product['count']}" type="number"><br/>
                                    <input id="price" name="price" value="{$product['price']}" type="text"><br/>
                                    <input name="MAX_FILE_SIZE" value="2048000" type="hidden">
                                    <input id="old_file" name="old_file" style="display:none" value="{$product['link']}" type="text">
                                    <input id="link" name="link" type="file"><br/>
                                    <div class="productPhoto"><img src="../../img/content/items/{$product['link']}"></div>
                                    <button type='submit'>Изменить</button>
                                </div>
                            </div>
                         </form>
                    </div>
HERE;
            }
            if(!$data){
                if(!$addForm && !$editForm) {
                    echo "<h3>В таблице нет записей о товарах<h3>";
                }
            }else {

                echo <<<HERE
                <a href='/AdProducts/viewFormAdd'><button>Добавить продукт</button></a>
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
                    $path_to_file = "../../img/content/items/";
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

                    <td><img src='{$path_to_file}{$value['link']}'></td>
                    <td><a href="/AdProducts/viewFormEdit/{$value['id']}"><button>Изменить</button></a></td>
                    <td><a href="/AdProducts/delProduct/{$value['id']}"><button>Удалить</button></a></td>
                </tr>
HERE;
                }
                echo "</table>";
            }
        ?>

</div>