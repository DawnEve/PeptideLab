求web文本编辑器实现原理, 开发思路,javascript实现
http://zhidao.baidu.com/link?url=Ub7KOOGtxOqOsvwISGoq6a1bmty06unGayDFaxYi-vzTYNv8qkCodlTCx_lX24UI6vRjd4U7SgLb_1lueKLtBa

要开发一个web文本编辑器,
谁能给一些这样的设计思路提示, 以及原理,或者部分具体实现
主要使用javascript开发实现

1. 文本编辑器一般都用 iframe 实现。
2. iframe 内部文档的 designMode = 'on' 就是编辑模式。
3. designMode = 'on' 的情况下，可以执行浏览器的编辑命令 execCommand。
4. 编辑器的每一个按钮对应一个 command。

另外：
div 的属性 contEditable="true" 的情况下，也可以实现HTML的编辑。
好像是contentEditable="true"属性。

如果要做出真正可用的编辑器，需要掌握两个知识点：
1. DOM
2. RANGE

网上有很多javascript的编辑器，可以参考。

================================================================
富文本编辑器原理，文本编辑器原理
http://www.bkjia.com/webzh/868017.html

富文本编辑器，Rich Text Editor, 简称 RTE, 是一种可内嵌于浏览器，所见即所得的文本编辑器。
富文本编辑器不同于文本编辑器，比较好的文本编辑器有kindeditor,fckeditor等，百度推出的开源富文本编辑器UEditor算是其中的后起之秀。

对于支持富文本编辑的浏览器来说，其实就是设置 document 的 designMode 属性为 on 后，再通过执行 document.execCommand('commandName'[, UIFlag[, value]]) 即可。

commandName 和 value 可以在MSDN 上和MDC 上找到，它们就是我们创建各种格式的命令，比方说，我们要加粗字体，执行 document.execCommand('bold', false) 即可。

很简单是吧？但是值得注意的是，通常是选中了文本后才执行命令，被选中的文本才被格式化。
对于未选中的文本进行这个命令，各浏览器有不同的处理方式，比方 IE 可能是对位于光标中的标签内容进行格式化，而其它浏览器不做任何处理，这超出本文的内容，不细述。
同时需要注意的是，UIFlag 这个参数设置为 true 表示 display any user interface triggered by the command (if any) 
各浏览器之前的区别 1、Mozilla和IE在生成HTML时，Mozilla是生成span样式，而IE则使用HTML标签生成样式： 
Mozilla
<span style="font-weight: bold;">I love geckos.</span><span style="font-weight: bold; font-style: italic;     text-decoration: underline;">Dinosaurs are big.</span>
IE
<STRONG>I love geckos.</STRONG><STRONG><EM><U>Dinosaurs are big.</U></EM></STRONG>

2、另外一个区别就是访问iframe中的document 
Mozilla使用W3C标准方式 IFrameElement.contentDocument 
IE使用 IFrameElement.document 
或者直接使用 document.getElementById(aID).contentWindow.document 获取document 
这里附上最简化的编辑器示例： 
eidtor.html

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
  <title></title>
  <style type="text/css">
    .editorIframe {
      border: 1px solid #0000ff;
      width: 100%;
      height: 300px;
    }
  </style>

</head>
<body onload="onload()">
<div>
  自定义编译器
</div>
<div>
  <button onclick="doRichEditCommand('bold')" style="font-weight:bold; width: 25px">B</button>
  <button onclick="doRichEditCommand('italic')" style="font-weight:bold; width: 25px">I</button>
</div>
<div>
  <iframe id="editorIframe" class="editorIframe" src="editorIframe1.html"></iframe>
</div>

<script type="text/javascript">
  var editorDoc = getIFrameDocument('editorIframe');
  var editorEl = document.getElementById('editorIframe');

  function onload() {
    document.getElementById('editorIframe').contentWindow.focus();
  }


  function doRichEditCommand(cmd, arg) {
    //这里不能使用缓存对象，editorDoc
    cmd && getIFrameDocument('editorIframe').execCommand(cmd, false, arg);
    document.getElementById('editorIframe').contentWindow.focus();
  }

  function getIFrameDocument(aID) {

    return document.getElementById(aID).contentWindow.document;

    //不需要使用Mozilla写法
    // if contentDocument exists, W3C compliant (Mozilla)
//    if (document.getElementById(aID).contentDocument) {
//      return document.getElementById(aID).contentDocument;
//    } else {
//      // IE
//      return document.frames[aID].document;
//    }
  }
</script>
</body>
</html>

//===============================
Document.execCommand()
https://developer.mozilla.org/en-US/docs/Web/API/document/execCommand


