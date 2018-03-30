<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'My Blog') - My Blog - </title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
@include('layouts._header')

<div class="container">
    <div class="col-md-offset-1 col-md-10">
        @include('shared._messages')
        @yield('content')
        @include('layouts._footer')
    </div>
</div>

<script src="/js/app.js"></script>
<script type="text/javascript">
    var tit = document.getElementsByTagName('title')[0];
    var txt = tit.innerHTML;
    setInterval(function () {
        tit.innerHTML = txt;
        setTimeout("tit.innerHTML=txt + 'LTS';" , 500);
    }, 1000);
</script>
</body>
</html>