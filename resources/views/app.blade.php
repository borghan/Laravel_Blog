<!DOCTYPE html>
<html class="no-js" lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Laravel 5 教程</title>
    <link rel='stylesheet' href="/css/bootstrap.min.css" type='text/css' media='all'/>
    <link rel='stylesheet' href="/css/all.css" type='text/css' media='all'/>
    <script type='text/javascript' src="/js/all.js"></script>
</head>
<body>
<div id="wrapper">
    <header id="header">
        <div class="menu" id="menu">
            <a href="/post/#">
                <i class="fa fa-paper-plane"></i>
            </a>
        </div>
        <div class="container">
            <div class="pad group">
                <h1 class="site-title">
                    <a href="/">
                        <img src="/images/avatar.jpg" alt="img">
                    </a>
                </h1>
                <p class="site-description" id="site-description">A Web Developer</p>
            </div>
        </div>
    </header>
    <div id="page" class="container">
        <section class="content">
            <div class="pad group">
                @yield('content')
            </div>
        </section>
    </div>
    <nav class="nav-container group" id="nav-footer">
    <div class="nav-text">A simple blog in Laravel 5.1</div>
    <div class="nav-wrap"><ul class="nav container group">
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-758">
                <p class="social-link">
                    <a class="github" href="https://github.com/borghan" target="_blank">
                        <i class="fa fa-github"></i>
                    </a>
                </p>
            </li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-758">
                <a href="http://borghan.com" rel="nofollow" target="_blank">Copyright © 2014 --
                    2015 A simple blog in Laravel 5.1</a>
            </li>
            <li id="menu-item-758" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-758">
                <p class="social-link">
                    <a class="weibo" href="http://weibo.com/u/" target="_blank">
                        <i class="fa fa-weibo"></i>
                    </a>
                </p>
            </li>
        </ul>
    </div>
</nav>
</div>
</body>
</html>