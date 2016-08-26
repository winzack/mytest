<html>
<head>
</head>
<body>
<div class="input-div"><input name="tel" id="tel"/><button id="check">check</button></div>
<script type="text/javascript">
document.getElementById("check").onclick=function(){
//re=/(\d+)\.(\d+)\.(\d+)\.(\d+)/g //匹配IP地址的正则表达式
re = /0\d{2}-\d{8}/g;
var input = document.getElementById("tel").value;
if(re.test(input))
{
return RegExp.$1*Math.pow(255,3)+RegExp.$2*Math.pow(255,2)+RegExp.$3*255+RegExp.$4*1;
}
else
{
alert("Not a valid IP address!");
}};
</script>
</body>
</html>
