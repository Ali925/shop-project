<div class="features_descript" style="border: none">

    <div class="features_list_wrap">
        <div class="alarm">
            <?php
            $back = explode("/", $_SERVER['HTTP_REFERER']);
            $back = $back[count($back) - 1];
            $message = urldecode($message);

            echo "<h3>{$message}</h3>";
            ?>

            <?php if($error): ?>
                <?php
                    echo "<a href='/{$back}'><button>Попробовать ещё раз</button></a>";
                ?>
            <?php endif; ?>

            <a href="/"><button>Вернуться на Главную</button></a>

        </div>
    </div>
</div>