# pra_bquiz02_1

			<?= date("m月d日l") ?> | 今日瀏覽: <?=$Total->find(['date'=>date("Y-m-d")])['total'] ;?> | 累積瀏覽: <?= $Total->sum(['total']) ;?>
