# PHPRewirteHost
该项目适用于浏览器实际域与服务器实际域不同时，对运行于PHP的应用程序进行服务器实际域重写，通过引入该项目，修正请求包HOST不一致对应用程序影响
# Tip
该项目非常的蠢 实际上推荐 Nginx反代一次 改变Host 或者在Nginx处理Host,实在没救了你想在PHP上动手可以试试本项目
# Use It！
在项目核心处第一行加入  include_once "RewirteHost.php"
正确设置其中RewirteHost.php中TargetHost参数为浏览器实际域 即刻运行
