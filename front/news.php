<header style="padding: 20px 0;">
    <h3 style="text-align: center;font-weight:700;">電影情報<span style="display: block;font-size:16px;margin-top:10px">News</span></h3>
</header>
<style>
    table {
        width: 80%;
    }

    td {
        padding: 10px 5px;
    }

    tr {
        border-bottom: 1px solid white;
    }

    a {
        text-decoration: none;
    }

    p:hover {
        color: #5483B3;
    }

    p {
        line-height: 130%;
    }

    .news-img {
        width: 300px;
    }

    .news-content {
        width: 70%;
        vertical-align: top;
    }

    @media (max-width: 768px) {
        .news-img {
            width: 100%;
        }

        .news-content {
            width: 100%;
            vertical-align: top;
        }

        tr {
            display: flex;
            flex-direction: column;
        }
    }
</style>

<div class="container" style="height: 100vh;overflow:auto">
    <table class="mt-5 mx-auto">
        <?php
        $news = $News->all(" order by id desc");
        foreach ($news as $new) {
        ?>
            <tr>
                <td>
                    <img class="news-img" src="./img/<?= $new['img']; ?>">
                </td>
                <td class="news-content">
                    <a href="?do=news-content&id=<?= $new['id']; ?>">
                        <p style="font-size: 20px;font-weight:bold;"><?= $new['title']; ?></p>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>