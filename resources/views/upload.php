<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <title>write blog</title>
</head>

<body>
    <form id="form" enctype="multipart/form-data" method="post" action="../article/upload">
    	标题：<input id="title" name="title" type="text"></input>
    		<input id="author" name="author" type="hidden" value="#FFFF00"></input><br>
    	题图：<input id="title_img" name="title_img" type="file"></input><br>
    	标签：<input id="tags" name="tags" type="text"></input><br>
    	分类：<input name="category_id" type="radio" value="1">技术</input>
    		<input name="category_id" type="radio" value="2">游戏</input>
    		<input name="category_id" type="radio" value="3">随笔</input>
    		<input name="category_id" type="radio" value="4">转载</input>
    	<br>
    	主题：<input id="outline" name="outline" type="text" style="width:400px;height:60px"></input><br>    	
    	正文：
        <!-- 加载编辑器的容器 -->
        <script id="container" name="content" type="text/plain">
复制在这里然后提交
        </script>
    	<input type="submit"></button>    
    </form>
    <!-- <button id="submit">submit</button> -->
    <!-- 配置文件 -->
    <script type="text/javascript" src="../home/js/UEditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="../home/js/UEditor/ueditor.all.js"></script>
	<script type="text/javascript" src="../home/js/jquery/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="../home/js/jquery.form.min.js"></script>
    <script type="text/javascript">
        var editor = UE.getEditor('container');
      
//        $(":submit").click(function(){
//        	var content = UE.getEditor('container').getContent();
//        	var title = $("#title").val();
//        	var tags = $("#tags").val();
//        	var category_id = $('input:radio:checked').val();
//        	var title_img = $("#title_img");
// 			var outline = $("#outline").val();
//			
// 			var formData = new FormData(document.getElementById("form")[0]);
//			
// 			if ($.trim(title_img) == "") {  
//        		alert("请选择图片！");  
//        		return;  
//    		} 
// 
//        	$.ajax({
//            //cache: true,
//            type: "POST",            
//            //enctype: "multipart/form-data",
//            url: "../article/upload",
//            processData: false,
//            contentType: false,
//			data: formData,
// 	　　　　　　data: {
//				"title": title,				
//				"author": "FFFF00",
//				"tags": tags, 
//				"category_id": category_id,
//				"outline": outline,
//				"title_img": title_img,
//	　　　　　　　　　	"content": content,
//	　　　　　　},
//	
//	            async: false,
//	            error: function(request, status, error) {
//	                alert("Connection error");
//	                alert(error);	                
//	            },
//	            success: function(returnedData){
//	                alert("success");
//	                alert(returnedData);
//	            }
//	        });
//	      
//        });
    </script>
</body>

</html>

