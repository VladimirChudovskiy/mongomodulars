<html>
<head>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
</head>
<body>
<div id="pageWrap">
    <div id="topLine">
        @include('core::parts.navbar')
    </div>
    <div id="contentLine">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-body">
                    @yield('content')
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>