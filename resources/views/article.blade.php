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
		
		
		<script type="text/javascript" src="../home/js/auth.js"></script>
		
		<link rel="stylesheet" href="../home/css/myblog.css" type="text/css" />
		
		<script type="text/javascript">			
			//原理很简单，通过递归检查是否存在父元素，累加起来得到距离值
			function getTop(e){
			    var offset = e.offsetTop;
			    if(e.offsetParent != null) offset += getTop(e.offsetParent);
			    return offset;
			}	
			
			function adjustimg(){ 
				var w = $("#content").width();//容器宽度 
				$("#content img").each(function(){//如果有很多图片，我们可以使用each()遍历
				var img_w = $(this).width();//图片宽度 
				var img_h = $(this).height();//图片高度 
				if(img_w > w){//如果图片宽度超出容器宽度--要撑破了 
					var height = (w * img_h) / img_w; //高度等比缩放 
					$(this).css({"width":w,"height":height});//设置缩放后的宽度和高度 
					} 
				});
			}
					      
			$(window).load(function(){
				adjustimg();
			})
			
			$(document).ready(function(){
				adjustimg();
				  					
				$("#loginbutton").click(function(){
  					$("#authbackground").show();
					$("#loginbox").show();
  				});
  							   			    
  				$("#registerbutton").click(function(){
  					$("#authbackground").show();
					$("#registerbox").show();
  				});
  				
  				$("#loginexit").click(function(){
  					$("#authbackground").hide();
					$("#loginbox").hide();
  				});
  				
  				$("#registerexit").click(function(){
  					$("#authbackground").hide();
					$("#registerbox").hide();
  				});
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
				
				$("#submit").click(function(){
		        	var content = $("#commentarea").val();
		        	var user_id = {{ $user->id }};
		        	var article_id = {{ $article->article_id }};
		        	var lead_id = 1; 			
		 			
		        	$.ajax({
		            cache: true,
		            type: "POST",
		            url: "./article/addComment",
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
			});
		</script>	
		<style>

		</style>
	</head>
	<body style="background-color: #EEEEEE;">
	<font face="微软雅黑">
	    <!-- navbar -->
		<nav style="position:fixed; z-Index:10; height:58px;width:100%; background-color:#115599">
			<a href="./index">
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
	    		<div style="position:relative;float:left; margin-top:9px;margin-left:28% ; width:40px; height:40px; overflow:hidden;border-radius:20px; z-Index:1">
				  	<img src={{ $user->head_img }} style="width:100%; height:100%;"></img>
				</div>
	    	@else
	    		<!-- 登录注册按钮 -->
	    		<b>
	    			<div id="authbackground"></div>
	    			
	    			<button id="loginbutton" class="auth" style="margin-left:280px">登录</button>
	    			
					<div id="loginbox" class="authbox">					
					<div class="authbanner">
						欢迎回归
						<div style="color:#5599DD; font-size:5px">努力回忆密码吧 </div>
					</div>
						邮箱<input id="loginemail" class="authinput"> </input><br>
						密码<input id="loginpassword" type="password" class="authinput"> </input><br>					
						<button id="loginexit" class="authboxexitbutton">取消</button>
						<button id="login" class="authboxbutton">登录</button>
					</div>
	    		
	    			<button id="registerbutton" class="auth" style="">注册</button>
	    				    			
					<div id="registerbox" class="authbox">
					<div class="authbanner">
						注册账号
						<div style="color:#5599DD; font-size:5px">只是起个好名字而已</div>
					</div>
						邮箱<input id="registeremail" class="authinput"> </input><br>
						昵称<input id="registername" class="authinput"> </input><br>
						密码<input id="registerpassword" class="authinput"> </input><br>
						<input id="registerid" type="hidden" value={{ $user->id }}></input>
						<button id="registerexit" class="authboxexitbutton">取消</button>
						<button id="register" class="authboxbutton">注册</button>
					</div>
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
				<div style="margin-left:194px; margin-top:55px; height:210px;width:813px; background-color:#FFFF00" >				
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
				<div style="position:relative; float:left; right:-230px; height:70px; width:236px; background-color:#115599;"></div>
			</div>
			<!-- content -->
			<div class="row"><br></div>
			<div class="row">
			
				<div class=""></div>
				
		        <div class="" style="float:left;margin-left:210px;width:567px;">
		        	
		        	<div class="row">
			        	<div id="content" class="shadowbox" style="padding:0px 24px 4px 24px">					    	
					        <br>					        
					        <p>{{ $article->outline }}</p><br>  
					        <p>{!! $article->content !!}</p>      					        					       					        
						</div>
					</div>  
					<!-- 评论区标题 -->
					<div class="row" style="height:90px;margin-top:20px;background-color:#5599DD;color:#FFFFFF">
						<img src="../home/img/logo/comment.png" style="margin-left:25px"></img>					
						<img src="../home/img/logo/slash.png" style="margin-left:230px"></img>
						<div style="margin:50px 15px 5px 0px; float:right;"><h6>已有评论0条</h6></div> 
					</div>
					
					<!-- 评论区 -->
					<div class="row shadowbox" style="margin-top:20px; margin-bottom:20px; padding:0px 0% 0px 0%;  ">					
					
					@if($user->is_anony)
		    		<div style="float:left; margin-top:30px;margin-left:25px ; width:35px; height:35px;  background-color:{{ $user->name }}; overflow:hidden;border-radius:20px; z-Index:1">
					  	<div style="margin-left:auto;margin-right:auto;margin-top:5px; width:15px; height:15px;  background-color:#EEEEEE; border-radius:20px">
					 	</div>
					 	<div style="margin-left:auto;margin-right:auto; width:17px; height:20px;  background-color:#EEEEEE; border-radius:2px">
						</div>
					</div>
					@else
					<div style="float:left; margin-top:30px;margin-left:25px ; width:35px; height:35px; overflow:hidden;border-radius:20px; z-Index:1">
				
					  	<img src={{ $user->head_img }} style="width:100%; height:100%;"></img>
				
					</div>
					@endif
					
					<div>
						<textarea id="commentarea" style="margin:30px 0px 0px 10px; width:490px; height:100px; outline:none; padding:10px 10px 10px 10px;resize:none; border:soild; border-color:#EEEEEE"></textarea>
						<button id="submit" style="float:left; padding: 5px 10px 5px 10px; margin-left:70px; color: #666666; border:none;">提交</button>
						<div style="float:left; text-align:right;padding: 5px 10px 5px 10px;width:442px;background-color:#ECECEC; color:#888888">你甚至不需要登录就可以留言哦</div>
					</div>		
								
					<div style="margin:50px 0px 30px 0px; height:5px;  background-color:#F5F6F7;"></div>
					@foreach($comments as $comment)
					<!-- 匿名头像 -->
					@if($user->is_anony)
		    		<div style="float:left; margin-top:-10px;margin-left:25px ; width:35px; height:35px;  background-color:{{ $comment->user->name }}; overflow:hidden;border-radius:20px; z-Index:1">
					  	<div style="margin-left:auto;margin-right:auto;margin-top:5px; width:15px; height:15px;  background-color:#EEEEEE; border-radius:20px">
					 	</div>
					 	<div style="margin-left:auto;margin-right:auto; width:17px; height:20px;  background-color:#EEEEEE; border-radius:2px">
						</div>
					</div>
					@else
					<div style="float:left; margin-top:-10px;margin-left:25px ; width:35px; height:35px; overflow:hidden;border-radius:20px; z-Index:1">
				
					  	<img src={{ $user->head_img }} style="width:100%; height:100%;"></img>
				
					</div>
					@endif
				
					<div class = "" style="margin-left:10px;float:left;width:480px;color:#666666;">
						<div style="margin:-10px 0px 10px 0px;color:#5599DD">
							<b>{{ $comment->user->name }}</b>
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
       			 <div>
			</div>	    
		</div>
				
				<div style="float:left;width:200px;margin-left:30px;margin-top:-90px;">
					<div id="inner" style="width:200px">
						
				        	<div class="sidebox shadowbox">
				        
				        		<div class="preview">访问量
				        		</div>
								<div class="view">
									
										{{ $article->view }}								
									
								</div>
							</div>
						
								<div class="sidebox shadowbox">					        
					        		
									@foreach ($article->tags as $tag)
									<div style="margin-left:5px;margin-top:5px;padding:4px;background-color: #115599; float:left; color:#FFFFFF">
										<b><a style="color:#FFFFFF" href=./index?model=tag&parameter={{ $tag->tag }}>{{ $tag->tag }}({{ $tag->count }})</a></b>
									</div>
									@endforeach	
								</div>
								
								
							
						
						
								<div class="sidebox shadowbox">
					        
					        		
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
 
