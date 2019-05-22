
<?php
    $num = 2;

    # heredoc 结束必须顶头，解析变量
    $html = <<<HTMLMAIN
    <section>
        <h1>这是标题</h1>
        <ul>
            <li>列表页</li> ($num-1)
            <li>文章页</li> $num
            <li>图片页</li> ($num+1)
        </ul>
    </section>
HTMLMAIN;

    echo '<h1>heredoc结束必须顶头，输出的都是字符串，可以解析变量 </h1>';
    echo $html;
    echo '<hr>';


    # nowdoc 结束必须顶头，不解析变量，类似单引号
    $html1 = <<<'HTMLMAIN'
    <section>
        <h1>这是标题</h1>
        <ul>
            <li>列表页</li> ($num-1)
            <li>文章页</li> $num
            <li>图片页</li> ($num+1)
        </ul>
    </section>
HTMLMAIN;

    echo '<h2>nowdoc结束必须顶头，输出的都是字符串，不解析变量</h2>';
    echo $html1;
?>