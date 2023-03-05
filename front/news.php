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
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table>
        <tr>
            <th style="width: 30%;">標題</th>
            <th style="width: 50%;">內容</th>
        </tr>
        <?php
        $all = $News->count(['sh' => 1]);
        $div = 5;
        $pages = ceil($all / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;

        $news = $News->all(['sh' => 1], " limit $start,$div");
        foreach ($news as $new) {

        ?>
            <tr>
                <td class="news-title"><?= $new['title']; ?></td>
                <td>
                    <div class="short"><?= mb_substr($new['text'], 0, 20); ?>...</div>
                    <div class="full"><?= nl2br($new['text']); ?></div>
                </td>
                <td>

                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div>
        <?php
        if (($now - 1) > 0) {
            $prev = $now - 1;

        ?>
            <a href="index.php?do=news&p=<?= $prev; ?>">
                < </a>
                <?php
            }
            for ($i = 1; $i <= $pages; $i++) {
                $size=($now==$i)?"26px":"16px";
                ?>
                    <a href="index.php?do=news&p=<?= $i; ?>" style="font-size:<?=$size ;?>"> <?= $i; ?> </a>
                <?php
            }
            if (($now + 1) <= $pages) {
                $next = $now + 1;
                ?>
                    <a href="index.php?do=news&p=<?= $next; ?>"> > </a>
                <?php

            }
                ?>
    </div>
</fieldset>

<script>
    $(".news-title").on("click", function() {
        // $(".short").show();
        // $(".full").hide();
        $(this).next().children('.short,.full').toggle()
        // $(this).next().children('.full').toggle()
    })
</script>