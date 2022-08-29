<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes" />
  <title>4eachblog 掲示板</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="./style.css" />
</head>

<body>
  <header class="header">
    <h1 class="header__logo">
      <img src="4eachblog_logo.jpg" alt="eachblogのロゴマーク" />
    </h1>
    <nav class="header__nav">
      <ul>
        <li class="header__nav__item"><a href="#">トップ</a></li>
        <li class="header__nav__item"><a href="#">プロフィール</a></li>
        <li class="header__nav__item"><a href="#">4eachについて</a></li>
        <li class="header__nav__item"><a href="#">登録フォーム</a></li>
        <li class="header__nav__item"><a href="#">問い合わせ</a></li>
        <li class="header__nav__item"><a href="#">その他</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <div class="wrapper">
      <div class="main">
        <div class="main__post">
          <h2 class="main__post__title">プログラミングに役立つ掲示板</h2>
          <form method="post" action="insert.php">
            <div>
              <label for="handlename">ハンドルネーム</label>
              <br />
              <input type="text" class="text" size="35" name="handlename" id="handlename" />
            </div>

            <div>
              <label for="title">タイトル</label>
              <br />
              <input type="text" class="text" size="35" name="title" id="title" />
            </div>

            <div>
              <label for="comments">コメント</label>
              <br />
              <textarea name="comments" cols="100" rows="10" id="comments"></textarea>
            </div>

            <div>
              <input type="submit" class="submit" value="送信する" />
            </div>
          </form>
        </div>
        <div class="main__posted">


          <?php
          mb_internal_encoding("utf8");

          $pdo = new  PDO("mysql:dbname=php_lesson01; host=localhost;", "root", "");

          $stmt = $pdo->query("select * from 4each_bulletin_board");

          foreach ($stmt as $row) {
            echo <<< EOM
              <div class="main__posted__contents">
                <h4>{$row['title']}</h4>
                <p>{$row['comments']}</p>
                <small>
                  posted by {$row['handlename']}
                </small>
              </div>
            EOM;
          }
          ?>
          
        </div>
      </div>
      <div class="sidebar">
        <aside>
          <h3 class="sidebar__title">人気の記事</h3>
          <ul>
            <li class="sidebar__item"><a href="#">PHPオススメ本</a></li>
            <li class="sidebar__item"><a href="#">PHP MyAdminの使い方</a></li>
            <li class="sidebar__item"><a href="#">今人気のエディタTop5</a></li>
            <li class="sidebar__item"><a href="#">HTMLの基礎</a></li>
          </ul>
          <h3 class="sidebar__title">オススメリンク</h3>
          <ul>
            <li class="sidebar__item"><a href="#">インターノウス株式会社</a></li>
            <li class="sidebar__item"><a href="#">XAMPPのダウンロード</a></li>
            <li class="sidebar__item"><a href="#">Eclipseのダウンロード</a></li>
            <li class="sidebar__item"><a href="#">Bracketsのダウンロード</a></li>
          </ul>
          <h3 class="sidebar__title">カテゴリ</h3>
          <ul>
            <li class="sidebar__item"><a href="#">HTML</a></li>
            <li class="sidebar__item"><a href="#">PHP</a></li>
            <li class="sidebar__item"><a href="#">MySQL</a></li>
            <li class="sidebar__item"><a href="#">Javascript</a></li>
          </ul>
        </aside>
      </div>
    </div>
  </main>
  <footer class="footer">
    <small>
      copyright &copy; internous | 4each blog the which provides A to Z about programming.
    </small>
  </footer>
</body>

</html>