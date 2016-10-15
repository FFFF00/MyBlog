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
			function getQueryString(name){
			     var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
			     var r = window.location.search.substr(1).match(reg);
			     if(r!=null)return  unescape(r[2]); return null;
			}

			$(document).ready(function(){  
			
			    $(".navbutton").each(function(){  
			        $this = $(this);
			        var str = 'window.location=' + String(window.location);
			        var str_2 = String($this[0].getAttribute('onclick'));
			        str_2 = str_2.replace(/\'/g,"")
			        var url = encodeURI(str_2);	        
			        if(str.indexOf(url) != -1){  
          				$this.addClass("choice");  
        			} 
			    });
			    $(".hometitle").hover(function(){  
			        $this = $(this);
			        $(".blur").css("-webkit-filter", "blur(2px)");
			    });
			    $(".hometitle").mouseleave(function(){  
			        $this = $(this);
			        $(".blur").css("-webkit-filter", "blur(0px)");
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
	    <nav style="position:absolute; margin-top:58; height:31px;width:100%; background-color:#5599DD;">
			<b>
			<button id="but_1" class="navbutton" onclick="window.location='./index?model=category&parameter=技术'">技术</div>
			<button id="but_2" class="navbutton" onclick="window.location='./index?model=category&parameter=游戏'">游戏</div>
			<button id="but_3" class="navbutton" onclick="window.location='./index?model=category&parameter=随笔'">随笔</div>
			<button id="but_4" class="navbutton" onclick="window.location='./index?model=category&parameter=转载'">转载</div>
			</b>
	    </nav>
		<!-- 循环输出文章 -->
		<div class="container">			
			<div class="row"  style="margin-top:120px">
			
				<div class="col-md-2"></div>
				
		        <div class="col-md-6" style="width:595px">
		        	@foreach ($articles as $article)
		        	<div class="row">
			        	<div class="col-md-12 shadowbox">					    	
					        <br>

					        <!-- 题图为背景，底部为链接 -->
					        <div class="row">   
						        <div style="width:89.7%;height:300px;margin-left:5.2%; margin-top:10px; position:relative;">
									<div class="hometitle">
										<div class="blur">
											<a href=./article?article_id={{ $article->article_id }}>  
												<img style="position:absolute;left:0px;top:0px;width:100%;height:100%;" src="{{ $article->title_img }}" />
											</a>
											<div style="position:absolute; z-Index:1; margin-top:16px;">
												<!-- 分类框 -->
												<a style="color:#FFFFFF" href=./index?model=category&parameter={{ $article->category->category }}>
													<button class="category blur">
														
														<h3><b>{{ $article->category->category }}</b></h3>
														
													</button>
												</a>
												<!-- 阅读量 -->
												<div style="float:right; margin-left:20px; padding:0px 10px 0px 10px;background-color:#333333; color:#FFFFFF; opacity:0.7;">
		
														<h5><b>阅读：{{ $article->view }}</b></h5>
											
												</div>
											</div>
										<!--											
										@foreach ($article->tags->take(3) as $tag)
											{{ $tag->tag }}			
										@endforeach
										-->
										</div>
			 							<a href=./article?article_id={{ $article->article_id }}>
											<div style="position:absolute;left:3%;bottom:7%; z-Index:1; color:#FFFFFF">  	  
								       			
								       				<h1><b>{{ $article->title }}</b></h1>						       				
								       			
								       			{{ $article->author }}/{{ $article->created_at }}
								       		</div>
							       		</a>
									</div>
						        </div>
					        </div>
					        <!-- 概述区块 -->
				       		<div class="col-md-12" style="margin-top:15px;">

				       		
				       			<div class="col-md-1" style="width:33px;height:70px;background-color:#115599; color:#FFFFFF">
				       				<div style="margin-top:-15px;margin-left:-10px"><h3><b>导<br>语</h3></b></div>
				       			</div>
				       							     	
						       	<div class="col-md-11" style="margin-left:11px;background-color:#5599DD;color:#EEEEEE">			        					       
						        	<div  style="padding:7px 2px 7px 0px;text-indent:2em">
						        		{{ $article->outline }}						        		
						        	</div>					        
						        </div>
							      						
				        	</div>			        	   
				        <!-- 直接调底部边距为什么没用_(:зゝ∠)_ -->
				        <div class="row" style="padding:29px"><div class="col-md-12"></div></div>
				        	    					        					       					        
						</div>
						
					</div>    
					
					<div class="row"><br></div>    
				    @endforeach
				    
				    @if($classify)
				    	{!! $articles->appends($classify)->links() !!}
				    @else
				    	{!! $articles->links() !!}
				    @endif
				</div>
				<!-- 边侧栏 -->				
				<div class="col-md-3" style="width:300px;margin-left:-10px;">				
					
					<!-- 热门文章 -->
					<div class="row">
						<div class="col-md-8 col-md-offset-1 shadowbox" style="padding-bottom:10px">

					       	<div style="margin-top:15px;padding:3px 0px 3px 0px;letter-spacing:3px;background-color:#5599DD;text-align:center;color:#FFFFFF">
					       		<h4><b>热门文章</b></h4>
					       	</div>
							<div>
								@foreach($hotfive as $one)
									<hr style="margin:5px;text-align:center;width:160px;background-color:#CCCCCC;height:1px" />
									<a href=./article?article_id={{ $one->article_id }} style="color:#5599DD">{{ $one->title }}</a><br>													
								@endforeach
								<hr style="margin:5px;text-align:center;width:160px;background-color:#CCCCCC;height:1px" />
							</div>				
							<a href="./index?model=hot">	
								<button class="more">
									<h4><b>全部</b></h4>
								</button>
							</a>
						</div>	
					</div>	
					
					<div class="row"><br>
					</div>
					
					<div class="row">
						<!-- 标签栏 -->
				        <div class="col-md-8 col-md-offset-1 shadowbox">			        
							<div>

									<div style="margin-top:15px;padding:3px 0px 3px 0px;letter-spacing:3px;background-color:#5599DD;text-align:center;color:#FFFFFF">
							       		<h4><b>热门标签</b></h4>
							       	</div>

								<div style="margin-left:-5px;margin-top:10px;">
								@foreach ($tags as $tag)
									<div style="margin-left:5px;margin-top:5px;padding:4px;background-color: #115599; float:left; color:#FFFFFF">
										<b><a style="color:#FFFFFF" href=./index?model=tag&parameter={{ $tag->tag }}>{{ $tag->tag }}({{ $tag->count }})</a></b>
									</div>
								@endforeach	
								</div>
								<!-- 底部边距怎么调啊好烦 -->
								<div class="row" style="padding:15px"><div class="col-md-12"></div>
								</div>
							</div>
						</div>								
					</div>
					
					<div class="row"><br>
					</div>
					
					<div class="row">
						<!-- 标签栏 --> <!--
				        <div class="col-md-8 col-md-offset-1 shadowbox">			        
							<div>
								<div style="margin-left:-8px;margin-top:10px;">
								@foreach ($tags as $tag)
									<div style="margin-left:5px;margin-top:5px;padding:4px;background-color: #5599DD; float:left; color:#FFFFFF">
										<b><a style="color:#FFFFFF" href=./index?model=tag&parameter={{ $tag->tag }}>{{ $tag->tag }}({{ $tag->count }})</a></b>
									</div>
								@endforeach	
								</div> -->
								<!-- 底部边距怎么调啊好烦 --> <!--
								<div class="row" style="padding:15px"><div class="col-md-12"></div>
								</div>
							</div>
						</div>								 -->
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
