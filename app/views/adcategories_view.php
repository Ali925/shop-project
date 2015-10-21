<div class="features_descript" style="border: none">

        <?php
            echo "<h4>{$header}</h4>";
            if($addForm){
                echo <<<HERE
                    <div class='Form'>
                        <form action='/AdCategories/addCat' method='post'>
                        <div class='dataForm'>
                            <div class='FormHeaders'>
                                <span>Название: </span>
                            </div>
                            <div class='FormData'>
                                <input id='title' name='title' type='text'>
                                <button type='submit'>Добавить</button>
                            </div>
                    </form>
HERE;
            }
            if($editForm) {
                echo <<<HERE
                    <div class='Form'>
                        <form action = '/AdCategories/editCat' method = 'post' >
                            <div class='dataForm'>
                            <div class='FormHeaders'>
                                <span>ID: </span><br/>
                                <span>Название: </span><br/>
                            </div>
                            <div class='FormData'>
                                <input disabled="disabled" value="{$category['id']}"><br/>
                                <input name="id" type="hidden" value="{$category['id']}">
                                <input id = 'title' name = 'title' type = 'text' value = '{$category['title']}' ><br/>
                                <button type ='submit' >Изменить</button >
                            </div>
                        </form >
HERE;
            }
            if(!$data){
                if(!$addForm && !$editForm){
                    echo "<h3>В таблице нет записей о категориях<h3>";
                }
            }else {
                echo <<<HERE
                <a href='/AdCategories/viewFormAdd'><button>Добавить новую категорию</button></a>
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

                    <td><a href="/AdCategories/viewFormEdit/{$value['id']}"><button>Изменить</button></a></td>
                    <td><a href="/AdCategories/delCat/{$value['id']}"><button>Удалить</button></a></td>
                    </tr>
HERE;
                }
                echo "</table>";
            }
        ?>

</div>