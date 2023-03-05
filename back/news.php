<style>
    .full {
        display: none;
    }

    .news-title {
        background-color: #eee;
        cursor: pointer;
    }
</style>

<fieldset>
    <legend>最新文章管理</legend>
    <button onclick="to()">新增文章</button>
    <form action="./api/del.php" method="post">
        <table >
            <tr>
                <th style="width: 10%;">編號</th>
                <th style="width: 50%;">標題</th>
                <th style="width: 10%;">顯示</th>
                <th style="width: 10%;">刪除</th>
            </tr>
            <?php
            $all = $News->count();
            // dd($all);
            $div = 3;
            $pages = ceil($all / $div);
            $now = $_GET['p'] ?? 1;
            $start = ($now - 1) * $div;

            $news = $News->all(" limit $start , $div");
            foreach ($news as $key => $new) {
                $checked = ($new['sh'] == 1) ? "checked" : "";
            ?>
                <tr class="ct">
                    <td style="background-color:#eee;height:5vh"  class="ct"><?= $key + 1; ?></td>
                    <td><?= $new['title']; ?></td>
                    <td>
                        <input type="checkbox" name="sh[]" value="<?= $new['id']; ?>" <?= $checked; ?>>
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?= $new['id']; ?>">
                    </td>
                    <input type="hidden" name="id[]" value="<?= $new['id']; ?>">

                </tr>

            <?php
            }
            ?>
        </table>

        <div class="ct">
            <?php
            if (($now - 1) > 0) {
                $prev = $now - 1;

            ?>
                <a href="back.php?do=news&p=<?= $prev; ?>">
                    < </a>
                    <?php
                }
                for ($i = 1; $i <= $pages; $i++) {
                    $size = ($now == $i) ? "26px" : "16px";
                    ?>
                        <a href="back.php?do=news&p=<?= $i; ?>" style="font-size:<?= $size; ?>"> <?= $i; ?> </a>
                    <?php
                }
                if (($now + 1) <= $pages) {
                    $next = $now + 1;
                    ?>
                        <a href="back.php?do=news&p=<?= $next; ?>"> > </a>
                    <?php

                }
                    ?>
        </div>

        <div class="ct">
            <input type="submit" value="確認修改">

        </div>
    </form>

</fieldset>

<script>
    $(".news-title").on("click", function() {
        // $(".short").show();
        // $(".full").hide();
        $(this).next().children('.short,.full').toggle()
        // $(this).next().children('.full').toggle()
    })

    function to(){
        location.href='./back.php?do=add_news'
    };
</script>