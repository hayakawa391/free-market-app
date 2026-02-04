<!DOCTYPE html>
<!--レイアウトについて　Laravel3-5-->
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>Attendance Management</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  @yield('css')
</head>

<body>
  <header class="header"><!--ヘッダーのメニュー-->
    <div class="header__inner">
      <div class="header-left">
        <a href="/" class="logo">COACHTECH</a>

        <form action="/search" method="get" class="search-form">
          <input type="text" name="keyword" placeholder="何をお探しですか？">
        </form>
      </div>

      <div class="header-right">
        <a href="/mypage">マイページ</a>

        <form action="/logout" method="post">
          @csrf
          <button type="submit">ログアウト</button>
        </form>

        <a href="/sell" class="sell-btn">出品</a>
      </div>
    </div>
  </header>

  <main>
    @yield('content')
  </main>
</body>

</html>
