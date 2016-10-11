<html>
    <head>
        <title>@yield('title')</title>
      	<!-- 配置文件 -->
	    <script type="text/javascript" src="../home/js/UEditor/ueditor.config.js"></script>
	    <!-- 编辑器源码文件 -->
	    <script type="text/javascript" src="../home/js/UEditor/ueditor.all.js"></script>
		<script type="text/javascript" src="../home/js/jquery/jquery-3.1.1.min.js"></script>
		
		<!-- 新 Bootstrap 核心 CSS 文件 -->
		<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
		
		<!-- 可选的Bootstrap主题文件（一般不用引入） -->
		<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
		
		<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
		<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
		
		<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
		<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" href="../home/css/myblog.css" type="text/css" />
		
		<script type="text/javascript">			
			//原理很简单，通过递归检查是否存在父元素，累加起来得到距离值
			function getTop(e){
			    var offset = e.offsetTop;
			    if(e.offsetParent != null) offset += getTop(e.offsetParent);
			    return offset;
			}
			$(document).ready(function(){  			   			    
			    //智能浮动层
			    //先把浮动层对象存在一个变量中，方便后面调用
			    var obj = document.getElementById("inner"); //b为漂浮层的id
				//获取浮动层元素离窗口顶部的距离
				var top = getTop(obj);
				window.onscroll = function(){
				    //获取窗口的scrollTop
				    var bodyScrollTop = document.documentElement.scrollTop || document.body.scrollTop;
				    //防止跳动
					bodyScrollTop += 80;
				    if (bodyScrollTop > top){
				    /*当窗口的滚动高度大于浮动层距离窗口顶部的距离时，也就是原理中说的第一种情况
				    *我们把这个浮动层position值设为fixed，top值设为0px，让它定位在窗口顶部*/
				    obj.style.position = "fixed";
				    obj.style.top = "80px";
				    //obj.css("margin-left","0px");
				    } else {
				    /*当窗口的滚动高度小于浮动层距离窗口顶部的距离时，也就是原理中说的第一种情况
				    *我们把这个浮动层position值设为static或为空，让它回归文档流
				    *让它回到原来的位置上去*/
				    obj.style.position = "static";
				    }
				}
			      			       			     
			});
		</script>	
		<style>
		.sidebox{
			width:200px;
			padding:5px 10px 5px 10px;
			margin-bottom:15px;
		}
		</style>
	</head>
	<body style="background-color: #EEEEEE;">
	<font face="微软雅黑">
	    <nav style="position:fixed; z-Index:10; height:58px;width:100%; background-color:#115599">
			<a href="http://192.168.10.10/article/queryByClassify">
		    	<button id="FFFF00">
		    		<h2><b>#FFFF00</b></h2>
		    	</button>
	    	</a>
	    	<!-- 搜索栏-->
	    	<div style="float:left; margin-top:18px; margin-left:40px;">
	    		<input style="padding-left:5px;width:200px; border-radius:2px;border-style:none;background-color:#2866A3"></input>	    		
	    	</div>
	    	
	    	<a href="#" style="float:left; margin-top:22px; margin-left:5px">
          		<span class="glyphicon glyphicon-search"></span>
        	</a>
	    	
	    	@if(!$user->is_anony)
	    		<div style="float:right; margin-top:10px; margin-right:-20px; width:40px; height:40px;  background-color:#DDDDDD; overflow:hidden;border-radius:20px">
				  	<div style="margin-left:auto;margin-right:auto;margin-top:5px; width:16px; height:17px;  background-color:#EEEEEE; border-radius:20px">
				 	</div>
				 	<div style="margin-left:auto;margin-right:auto; width:20px; height:20px;  background-color:#EEEEEE; border-radius:2px">
					</div>
				</div>
	    	@else
	    		<!-- 登录注册按钮 -->
	    		<b>
	    		<a href="../login">
	    			<button class="auth" style="margin-left:23%">登录</button>
	    		</a>
	    		<a href="../register">
	    			<button class="auth" style="">注册</button>
	    		</a>
	    		</b>
	    		<!-- 匿名头像 -->
	    		<div style="position:relative;float:left; margin-top:9px;margin-left:1% ; width:40px; height:40px;  background-color:{{ $user->name }}; overflow:hidden;border-radius:20px; z-Index:1">
				  	<div style="margin-left:auto;margin-right:auto;margin-top:5px; width:16px; height:17px;  background-color:#EEEEEE; border-radius:20px">
				 	</div>
				 	<div style="margin-left:auto;margin-right:auto; width:20px; height:20px;  background-color:#EEEEEE; border-radius:2px">
					</div>
				</div>    	
	    	@endif
	    	<!-- 用户名 -->
	    	<div style="float:left; margin-top:17px; margin-left:-20px; padding: 3px 15px 2px 25px; background-color:#3377BB; color:#FFFFFF; border-radius:20px;">
	    		{{ $user->name }}
	    		@if($user->is_anony)
	    			(未登录)    	
	    		@endif
	    	</div>
	    	
	    	
	    </nav>
			
		<div class="container">
			<!-- banner -->
			<div class="row">			 
				<div style="margin-left:17%; margin-top:60px; height:200px;width:67.5%; background-color:#FFFF00" >				
					<img src={{ $article->title_img }} height="100%" width="100%" /><br> 			
				</div>
			</div>
			
			<div class="row"><br></div>
			<!-- title -->			
			<div class="row">
				<!-- 左半条 -->
				<div style="float:left; margin-left:-90px; height:70px; width:882px; background-color:#115599; color:#FFFFFF;" >
					<!-- 标题 -->
					<div style="position:relative;margin-left:35%;top:10%; height:60px;">				
						
							<h4><b>{{ $article->title }}</b></h4>
							<h6>{{ $article->author }}/{{ $article->updated_at }}</h6>
						
					</div>				
				</div>
				<!-- 右半条 -->
				<div style="position:relative; float:left; right:-230px; height:70px; width:237px; background-color:#115599;"></div>
			</div>
			<!-- content -->
			<div class="row"><br></div>
			<div class="row">
			
				<div class=""></div>
				
		        <div class="" style="float:left;margin-left:210px;width:567px;">
		        	
		        	<div class="row">
			        	<div class="shadowbox" style="padding:0px 24px 0px 24px">					    	
					        <br>					        
					        <p>{{ $article->outline }}</p><br>  
					        <p>{!! $article->content !!}</p>      					        					       					        
						</div>
					</div>  
					
					<!-- 评论区 -->
					<div class="row shadowbox" style="margin-top:20px; margin-bottom:20px; padding:0px 0% 0px 0%;  ">
					
					
					<div style="float:left; margin-top:30px;margin-left:25px ; width:35px; height:35px;  background-color:{{ $user->name }}; overflow:hidden;border-radius:20px; z-Index:1">
					  	<div style="margin-left:auto;margin-right:auto;margin-top:5px; width:15px; height:15px;  background-color:#EEEEEE; border-radius:20px">
					 	</div>
					 	<div style="margin-left:auto;margin-right:auto; width:17px; height:20px;  background-color:#EEEEEE; border-radius:2px">
						</div>
					</div>
					
					<div>
						<textarea id="commentarea" style="margin:30px 0px 0px 10px; width:490px; height:100px; outline:none; padding:10px 10px 10px 10px;resize:none; border:soild; border-color:#EEEEEE"></textarea>
						<button id="submit" style="float:left; padding: 5px 10px 5px 10px; margin-left:70px; color: #666666; border:none;">提交</button>
						<div style="float:left; text-align:right;padding: 5px 10px 5px 10px;width:442px;background-color:#ECECEC; color:#888888">你甚至不需要登录就可以留言哦</div>
					</div>					
					<div style="margin:50px -10px 30px -10px; height:35px;  background-color:#5599DD;"></div>
					@foreach($comments as $comment)
					<!-- 匿名头像 -->
		    		<div style="float:left; margin-top:-10px;margin-left:25px ; width:35px; height:35px;  background-color:{{ $comment->user->name }}; overflow:hidden;border-radius:20px; z-Index:1">
					  	<div style="margin-left:auto;margin-right:auto;margin-top:5px; width:15px; height:15px;  background-color:#EEEEEE; border-radius:20px">
					 	</div>
					 	<div style="margin-left:auto;margin-right:auto; width:17px; height:20px;  background-color:#EEEEEE; border-radius:2px">
						</div>
					</div>
				
					<div class = "" style="margin-left:10px;float:left;width:480px;color:#666666;">
						<div style="margin:-10px 0px 10px 0px;color:#5599DD">
							<b>习近平{{ $comment->user->name }}</b>
						</div>
						
						{!! $comment->content !!}
						<div style="color:#CCCCCC"><h6>
						
							{{ $comment->created_at }}
							<a href="#" style="color:#AAAAAA; margin-left:10px">
					        	<span class="glyphicon glyphicon-heart"></span>
					        </a>
					        {{ $comment->like }}
					        </h6>
				        </div>
					</div>
	<hr style="margin-left:25px;text-align:center;width:92%;background-color:#EEEEEE;height:1px" />
					@endforeach  
					</div>
					
					
					
			    	<!-- 
			    	<div class="row shadowbox">
			    		
        <script id="editor" name="content" type="text/plain">
 这里写你的初始化内容
        </script>
        <button id="submit">submit</button>
-->
        <div>
        <script type="text/javascript">
        var editor = UE.getEditor('editor');
      
        $(":submit").click(function(){
        	var content = UE.getEditor('editor').getContent();
        	var user_id = {{ $user->id }};
        	var article_id = {{ $article->article_id }};
        	var lead_id = 1; 			
 			
        	$.ajax({
            cache: true,
            type: "POST",
            url: "http://192.168.10.10/article/addComment",
	　　　　　　data: {					
				"user_id": user_id,
				"article_id": article_id,
				"lead_id": lead_id, 
	　　　　　　　　　	"content": content,
	　　　　　　},
	
	            async: false,
	            error: function(request, status, error) {
	                alert("Connection error");
	                alert(error);
	            },
	            success: function(){
	                alert("success");
	                
	            }
	        });	     
        });
    </script>	
     
    
			    	</div>
			    
			    
			    
				</div>
				
				<div style="float:left;margin-left:30px;margin-top:-90px;">
					<div id="inner">
						
				        	<div class="sidebox shadowbox">
				        
				        		<div class="preview">访问量
				        		</div>
								<div class="view">
									<ol contenteditable="true">
										<li>{{ $article->view }}</li>									
									</ol>
								</div>
							</div>
						
								<div class="sidebox shadowbox">
					        
					        		
									@foreach ($article->tags as $tag)
									<div style="margin-left:5px;margin-top:5px;padding:4px;background-color: #115599; float:left; color:#FFFFFF">
										<b><a style="color:#FFFFFF" href=http://192.168.10.10/article/queryByClassify?model=tag&parameter={{ $tag->tag }}>{{ $tag->tag }}({{ $tag->count }})</a></b>
									</div>
									@endforeach	
								</div>
								
								
							
						
						
								<div class="sidebox shadowbox">
					        
					        		<div class="preview">有序列表</div>
									<div class="view">
										<ol contenteditable="true">
											<li>Lorem ipsum dolor sit amet</li>										
										</ol>
									</div>
								</div>
									
							</div>	
										
			        	</div> 
			    	</div>    
			    	
			        <div class="col-md-2">
		        	</div>
				  
	      	</div>
		    
		</div>
        <div class="container">
            @yield('content')
        </div>
    </font>
    </body>
</html>
 
