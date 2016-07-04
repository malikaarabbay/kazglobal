<?php

use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\helpers\Url;
use frontend\widgets\MenuWidget;
use common\models\Text;
?>

<header class="top_head">
    <div class="top_line">
        <div class="cr">
            <div class="enter_registr_container">
                <?php if(Yii::$app->user->isGuest) {?>
                <a href="<?= Url::toRoute(['/site/login']) ?>" class="enter">Войти</a>
                <a href="<?= Url::toRoute(['/site/signup']) ?>" class="registr">Регистрация</a>
                <?php } else { ?>
                    <a href="<?= Url::toRoute(['/user/index']) ?>" class="enter"><?= Yii::$app->user->identity->firstname ?> <?= Yii::$app->user->identity->lastname ?></a>
                    <a href="<?= Url::toRoute(['/site/logout']) ?>" class="registr">Выйти</a>
                <?php } ?>
            </div>
            <div class="soc_seti">
                Мы в соц. сетях:
                <div class="soct_seti_item">
                    <a target="_blank" href="<?= Text::getValue('vk')?>" class="vk"><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDk3Ljc1IDk3Ljc1IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA5Ny43NSA5Ny43NTsiIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8Zz4KCTxwYXRoIGQ9Ik00OC44NzUsMEMyMS44ODMsMCwwLDIxLjg4MiwwLDQ4Ljg3NVMyMS44ODMsOTcuNzUsNDguODc1LDk3Ljc1Uzk3Ljc1LDc1Ljg2OCw5Ny43NSw0OC44NzVTNzUuODY3LDAsNDguODc1LDB6ICAgIE03My42NjcsNTQuMTYxYzIuMjc4LDIuMjI1LDQuNjg4LDQuMzE5LDYuNzMzLDYuNzc0YzAuOTA2LDEuMDg2LDEuNzYsMi4yMDksMi40MSwzLjQ3MmMwLjkyOCwxLjgwMSwwLjA5LDMuNzc2LTEuNTIyLDMuODgzICAgbC0xMC4wMTMtMC4wMDJjLTIuNTg2LDAuMjE0LTQuNjQ0LTAuODI5LTYuMzc5LTIuNTk3Yy0xLjM4NS0xLjQwOS0yLjY3LTIuOTE0LTQuMDA0LTQuMzcxYy0wLjU0NS0wLjU5OC0xLjExOS0xLjE2MS0xLjgwMy0xLjYwNCAgIGMtMS4zNjUtMC44ODgtMi41NTEtMC42MTYtMy4zMzMsMC44MWMtMC43OTcsMS40NTEtMC45NzksMy4wNTktMS4wNTUsNC42NzRjLTAuMTA5LDIuMzYxLTAuODIxLDIuOTc4LTMuMTksMy4wODkgICBjLTUuMDYyLDAuMjM3LTkuODY1LTAuNTMxLTE0LjMyOS0zLjA4M2MtMy45MzgtMi4yNTEtNi45ODYtNS40MjgtOS42NDItOS4wMjVjLTUuMTcyLTcuMDEyLTkuMTMzLTE0LjcwOC0xMi42OTItMjIuNjI1ICAgYy0wLjgwMS0xLjc4My0wLjIxNS0yLjczNywxLjc1Mi0yLjc3NGMzLjI2OC0wLjA2Myw2LjUzNi0wLjA1NSw5LjgwNC0wLjAwM2MxLjMzLDAuMDIxLDIuMjEsMC43ODIsMi43MjEsMi4wMzcgICBjMS43NjYsNC4zNDUsMy45MzEsOC40NzksNi42NDQsMTIuMzEzYzAuNzIzLDEuMDIxLDEuNDYxLDIuMDM5LDIuNTEyLDIuNzZjMS4xNiwwLjc5NiwyLjA0NCwwLjUzMywyLjU5MS0wLjc2MiAgIGMwLjM1LTAuODIzLDAuNTAxLTEuNzAzLDAuNTc3LTIuNTg1YzAuMjYtMy4wMjEsMC4yOTEtNi4wNDEtMC4xNTktOS4wNWMtMC4yOC0xLjg4My0xLjMzOS0zLjA5OS0zLjIxNi0zLjQ1NSAgIGMtMC45NTYtMC4xODEtMC44MTYtMC41MzUtMC4zNTEtMS4wODFjMC44MDctMC45NDQsMS41NjMtMS41MjgsMy4wNzQtMS41MjhsMTEuMzEzLTAuMDAyYzEuNzgzLDAuMzUsMi4xODMsMS4xNSwyLjQyNSwyLjk0NiAgIGwwLjAxLDEyLjU3MmMtMC4wMjEsMC42OTUsMC4zNDksMi43NTUsMS41OTcsMy4yMWMxLDAuMzMsMS42Ni0wLjQ3MiwyLjI1OC0xLjEwNWMyLjcxMy0yLjg3OSw0LjY0Ni02LjI3Nyw2LjM3Ny05Ljc5NCAgIGMwLjc2NC0xLjU1MSwxLjQyMy0zLjE1NiwyLjA2My00Ljc2NGMwLjQ3Ni0xLjE4OSwxLjIxNi0xLjc3NCwyLjU1OC0xLjc1NGwxMC44OTQsMC4wMTNjMC4zMjEsMCwwLjY0NywwLjAwMywwLjk2NSwwLjA1OCAgIGMxLjgzNiwwLjMxNCwyLjMzOSwxLjEwNCwxLjc3MSwyLjg5NWMtMC44OTQsMi44MTQtMi42MzEsNS4xNTgtNC4zMjksNy41MDhjLTEuODIsMi41MTYtMy43NjEsNC45NDQtNS41NjMsNy40NzEgICBDNzEuNDgsNTAuOTkyLDcxLjYxMSw1Mi4xNTUsNzMuNjY3LDU0LjE2MXoiIGZpbGw9IiNGRkZGRkYiLz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" /></a>
                </div>
                <div class="soct_seti_item">
                    <a target="_blank" href="<?= Text::getValue('youtube')?>" class="you_tube"><img src="" alt=""><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDk3Ljc1IDk3Ljc1IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA5Ny43NSA5Ny43NTsiIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8Zz4KCTxnPgoJCTxwb2x5Z29uIHBvaW50cz0iMjUuNjc2LDUyLjQ4MiAyOS41NTEsNTIuNDgyIDI5LjU1MSw3My40NTUgMzMuMjE3LDczLjQ1NSAzMy4yMTcsNTIuNDgyIDM3LjE2NCw1Mi40ODIgMzcuMTY0LDQ5LjA0NyAgICAgMjUuNjc2LDQ5LjA0NyAgICIgZmlsbD0iI0ZGRkZGRiIvPgoJCTxwYXRoIGQ9Ik01Ni42NzQsNTUuMDQ2Yy0xLjIxMiwwLTIuMzQzLDAuNjYyLTMuNDA2LDEuOTcydi03Ljk3MmgtMy4yOTV2MjQuNDA5aDMuMjk1di0xLjc2MmMxLjEwMywxLjM2MSwyLjIzMywyLjAxMywzLjQwNiwyLjAxMyAgICBjMS4zMTEsMCwyLjE5My0wLjY5LDIuNjMzLTIuMDQ0YzAuMjIxLTAuNzcxLDAuMzM0LTEuOTgyLDAuMzM0LTMuNjY1di03LjI0MmMwLTEuNzIyLTAuMTEzLTIuOTI0LTAuMzM0LTMuNjU1ICAgIEM1OC44NjgsNTUuNzM2LDU3Ljk4NCw1NS4wNDYsNTYuNjc0LDU1LjA0NnogTTU2LjM0NCw2OC4yNTVjMCwxLjY0NC0wLjQ4MiwyLjQ1NC0xLjQzNCwyLjQ1NGMtMC41NDEsMC0xLjA5Mi0wLjI1OS0xLjY0My0wLjgxMSAgICBWNTguODE0YzAuNTUxLTAuNTQ1LDEuMTAyLTAuODAzLDEuNjQzLTAuODAzYzAuOTUxLDAsMS40MzQsMC44NDIsMS40MzQsMi40ODJWNjguMjU1eiIgZmlsbD0iI0ZGRkZGRiIvPgoJCTxwYXRoIGQ9Ik00My44MjQsNjkuMTY3Yy0wLjczMSwxLjAzMy0xLjQyMiwxLjU0Mi0yLjA4NCwxLjU0MmMtMC40NCwwLTAuNjkxLTAuMjU5LTAuNzcxLTAuNzcxYy0wLjAzLTAuMTA2LTAuMDMtMC41MDgtMC4wMy0xLjI4ICAgIHYtMTMuMzloLTMuMjk2djE0LjM3OWMwLDEuMjg1LDAuMTExLDIuMTUzLDAuMjkxLDIuNzA1YzAuMzMxLDAuOTIyLDEuMDYzLDEuMzU0LDIuMTIzLDEuMzU0YzEuMjEzLDAsMi40NTctMC43MzIsMy43NjctMi4yMzQgICAgdjEuOTg0aDMuMjk4VjU1LjI2OGgtMy4yOThWNjkuMTY3eiIgZmlsbD0iI0ZGRkZGRiIvPgoJCTxwYXRoIGQ9Ik00Ni42NTMsMzguNDY2YzEuMDczLDAsMS41ODgtMC44NTEsMS41ODgtMi41NTF2LTcuNzMxYzAtMS43MDEtMC41MTUtMi41NDgtMS41ODgtMi41NDhjLTEuMDc0LDAtMS41OSwwLjg0OC0xLjU5LDIuNTQ4ICAgIHY3LjczMUM0NS4wNjMsMzcuNjE2LDQ1LjU3OSwzOC40NjYsNDYuNjUzLDM4LjQ2NnoiIGZpbGw9IiNGRkZGRkYiLz4KCQk8cGF0aCBkPSJNNDguODc1LDBDMjEuODgyLDAsMCwyMS44ODIsMCw0OC44NzVTMjEuODgyLDk3Ljc1LDQ4Ljg3NSw5Ny43NVM5Ny43NSw3NS44NjgsOTcuNzUsNDguODc1Uzc1Ljg2OCwwLDQ4Ljg3NSwweiAgICAgTTU0LjMxMSwyMi44NmgzLjMyMXYxMy41MzJjMCwwLjc4MSwwLDEuMTg2LDAuMDQsMS4yOTVjMC4wNzMsMC41MTYsMC4zMzUsMC43OCwwLjc4MSwwLjc4YzAuNjY2LDAsMS4zNjUtMC41MTYsMi4xMDQtMS41NTkgICAgVjIyLjg2aDMuMzN2MTguMzc5aC0zLjMzdi0yLjAwNGMtMS4zMjYsMS41Mi0yLjU5LDIuMjU3LTMuODA1LDIuMjU3Yy0xLjA3MiwwLTEuODEyLTAuNDM1LTIuMTQ2LTEuMzY1ICAgIGMtMC4xODQtMC41NTctMC4yOTUtMS40MzYtMC4yOTUtMi43MzNWMjIuODZMNTQuMzExLDIyLjg2eiBNNDEuNzMzLDI4Ljg1M2MwLTEuOTY1LDAuMzM0LTMuNDAxLDEuMDQyLTQuMzMgICAgYzAuOTIxLTEuMjU3LDIuMjE4LTEuODg1LDMuODc4LTEuODg1YzEuNjY4LDAsMi45NjQsMC42MjgsMy44ODUsMS44ODVjMC42OTgsMC45MjgsMS4wMzIsMi4zNjUsMS4wMzIsNC4zM3Y2LjQzNiAgICBjMCwxLjk1NC0wLjMzNCwzLjQwMy0xLjAzMiw0LjMyMmMtMC45MjEsMS4yNTQtMi4yMTcsMS44ODEtMy44ODUsMS44ODFjLTEuNjYsMC0yLjk1Ny0wLjYyNy0zLjg3OC0xLjg4MSAgICBjLTAuNzA4LTAuOTE5LTEuMDQyLTIuMzY5LTEuMDQyLTQuMzIyVjI4Ljg1M3ogTTMyLjgyNywxNi41NzZsMi42MjIsOS42ODVsMi41MTktOS42ODVoMy43MzVMMzcuMjYsMzEuMjUxdjkuOTg5aC0zLjY5MnYtOS45ODkgICAgYy0wLjMzNS0xLjc3LTEuMDc0LTQuMzYzLTIuMjU5LTcuODAzYy0wLjc3OC0yLjI4OS0xLjU4OS00LjU4NS0yLjM2Ny02Ljg3MkgzMi44Mjd6IE03NS4xODYsNzUuMDYxICAgIGMtMC42NjgsMi44OTktMy4wMzksNS4wMzktNS44OTQsNS4zNThjLTYuNzYzLDAuNzU1LTEzLjYwNCwwLjc1OS0yMC40MiwwLjc1NWMtNi44MTMsMC4wMDQtMTMuNjU4LDAtMjAuNDE5LTAuNzU1ICAgIGMtMi44NTUtMC4zMTktNS4yMjctMi40NTgtNS44OTMtNS4zNThjLTAuOTUxLTQuMTI5LTAuOTUxLTguNjM4LTAuOTUxLTEyLjg5czAuMDEyLTguNzYsMC45NjItMTIuODkgICAgYzAuNjY3LTIuOSwzLjAzNy01LjA0LDUuODkyLTUuMzU4YzYuNzYyLTAuNzU1LDEzLjYwNi0wLjc1OSwyMC40MjEtMC43NTVjNi44MTMtMC4wMDQsMTMuNjU3LDAsMjAuNDE5LDAuNzU1ICAgIGMyLjg1NSwwLjMxOSw1LjIyNywyLjQ1OCw1Ljg5Niw1LjM1OGMwLjk0OCw0LjEzLDAuOTQyLDguNjM4LDAuOTQyLDEyLjg5Uzc2LjEzNyw3MC45MzIsNzUuMTg2LDc1LjA2MXoiIGZpbGw9IiNGRkZGRkYiLz4KCQk8cGF0aCBkPSJNNjcuMTcsNTUuMDQ2Yy0xLjY4NiwwLTIuOTk1LDAuNjE5LTMuOTQ3LDEuODY0Yy0wLjY5OSwwLjkyLTEuMDE4LDIuMzQyLTEuMDE4LDQuMjg1djYuMzcxICAgIGMwLDEuOTMzLDAuMzU3LDMuMzY1LDEuMDU5LDQuMjc2YzAuOTUxLDEuMjQyLDIuMjY0LDEuODYzLDMuOTg4LDEuODYzYzEuNzIxLDAsMy4wNzItMC42NTEsMy45ODQtMS45NzIgICAgYzAuNC0wLjU4NCwwLjY2LTEuMjQ1LDAuNzctMS45NzVjMC4wMzEtMC4zMywwLjA3LTEuMDYxLDAuMDctMi4xMjR2LTAuNDc5aC0zLjM2MWMwLDEuMzItMC4wNDMsMi4wNTMtMC4wNzIsMi4yMzIgICAgYy0wLjE4OCwwLjg4MS0wLjY2MiwxLjMyMS0xLjQ3MywxLjMyMWMtMS4xMzIsMC0xLjY4Ni0wLjg0LTEuNjg2LTIuNTIydi0zLjIyNmg2LjU5MnYtMy43NjdjMC0xLjk0My0wLjMyOS0zLjM2NS0xLjAyLTQuMjg1ICAgIEM3MC4xMzUsNTUuNjY2LDY4LjgyNCw1NS4wNDYsNjcuMTcsNTUuMDQ2eiBNNjguNzgyLDYyLjIxOGgtMy4yOTZ2LTEuNjgzYzAtMS42ODIsMC41NTMtMi41MjMsMS42NTQtMi41MjMgICAgYzEuMDksMCwxLjY0MiwwLjg0MiwxLjY0MiwyLjUyM1Y2Mi4yMTh6IiBmaWxsPSIjRkZGRkZGIi8+Cgk8L2c+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" /></a>
                </div>
                <div class="soct_seti_item">
                    <a target="_blank" href="<?= Text::getValue('insta')?>" class="insta"><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDQ5LjY1MiA0OS42NTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQ5LjY1MiA0OS42NTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8Zz4KCQk8Zz4KCQkJPHBhdGggZD0iTTI0LjgyNSwyOS43OTZjMi43MzksMCw0Ljk3Mi0yLjIyOSw0Ljk3Mi00Ljk3YzAtMS4wODItMC4zNTQtMi4wODEtMC45NC0yLjg5N2MtMC45MDMtMS4yNTItMi4zNzEtMi4wNzMtNC4wMjktMi4wNzMgICAgIGMtMS42NTksMC0zLjEyNiwwLjgyLTQuMDMxLDIuMDcyYy0wLjU4OCwwLjgxNi0wLjkzOSwxLjgxNS0wLjk0LDIuODk3QzE5Ljg1NCwyNy41NjYsMjIuMDg1LDI5Ljc5NiwyNC44MjUsMjkuNzk2eiIgZmlsbD0iI0ZGRkZGRiIvPgoJCQk8cG9seWdvbiBwb2ludHM9IjM1LjY3OCwxOC43NDYgMzUuNjc4LDE0LjU4IDM1LjY3OCwxMy45NiAzNS4wNTUsMTMuOTYyIDMwLjg5MSwxMy45NzUgMzAuOTA3LDE4Ljc2MiAgICAiIGZpbGw9IiNGRkZGRkYiLz4KCQkJPHBhdGggZD0iTTI0LjgyNiwwQzExLjEzNywwLDAsMTEuMTM3LDAsMjQuODI2YzAsMTMuNjg4LDExLjEzNywyNC44MjYsMjQuODI2LDI0LjgyNmMxMy42ODgsMCwyNC44MjYtMTEuMTM4LDI0LjgyNi0yNC44MjYgICAgIEM0OS42NTIsMTEuMTM3LDM4LjUxNiwwLDI0LjgyNiwweiBNMzguOTQ1LDIxLjkyOXYxMS41NmMwLDMuMDExLTIuNDQ4LDUuNDU4LTUuNDU3LDUuNDU4SDE2LjE2NCAgICAgYy0zLjAxLDAtNS40NTctMi40NDctNS40NTctNS40NTh2LTExLjU2di01Ljc2NGMwLTMuMDEsMi40NDctNS40NTcsNS40NTctNS40NTdoMTcuMzIzYzMuMDEsMCw1LjQ1OCwyLjQ0Nyw1LjQ1OCw1LjQ1N1YyMS45Mjl6IiBmaWxsPSIjRkZGRkZGIi8+CgkJCTxwYXRoIGQ9Ik0zMi41NDksMjQuODI2YzAsNC4yNTctMy40NjQsNy43MjMtNy43MjMsNy43MjNjLTQuMjU5LDAtNy43MjItMy40NjYtNy43MjItNy43MjNjMC0xLjAyNCwwLjIwNC0yLjAwMywwLjU2OC0yLjg5NyAgICAgaC00LjIxNXYxMS41NmMwLDEuNDk0LDEuMjEzLDIuNzA0LDIuNzA2LDIuNzA0aDE3LjMyM2MxLjQ5MSwwLDIuNzA2LTEuMjEsMi43MDYtMi43MDR2LTExLjU2aC00LjIxNyAgICAgQzMyLjM0MiwyMi44MjMsMzIuNTQ5LDIzLjgwMiwzMi41NDksMjQuODI2eiIgZmlsbD0iI0ZGRkZGRiIvPgoJCTwvZz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" /></a>
                </div>
            </div>
        </div>
    </div>
    <div class="head_center">
        <div class="cr">
            <a href="/" class="logo"><img src="/img/logo.png" alt=""></a>
            <ul class="map_site">
                <li><a href="">Новости</a>
                    <a href="">Топ -5 туров</a>
                    <a href="">Наши клиенты</a>
                </li>
                <li><a href="">Форум</a>
                    <a href="">Горящие туры</a>
                    <a href="">Реклама</a>
                </li>
                <li><a href="">Контроль качества</a>
                    <a href="">Проекты KGT</a>
                    <a href="">Каталоги</a>
                </li>
                <li><a href="">Полезная информация</a>
                    <a href="">Курсы валют</a>
                </li>
            </ul>
            <div class="head_right">
                <a href="" class="phone"><?= Text::getValue('phone')?></a>
                <a href="" class="whatsapp"><?= Text::getValue('whatsapp')?></a>
                <a href="" class="skype"><?= Text::getValue('skype')?></a>
                <a href="" class="mail"><?= Text::getValue('email')?></a>
            </div>
        </div>
    </div>
    <?= MenuWidget::widget() ?>
</header>
