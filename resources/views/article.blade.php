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
	</head>
	<body style="background-color: #EEEEEE;">

	    <nav style="position:fixed; z-Index:10; height:60px;width:100%; background-color:#115599">
	    	<div style="float:left; margin-top:-8px; margin-left:20.5%; color:#FFFFFF"><h2><b>#FFFF00</b></h2></div>
	    	<div style="float:left; margin-top:18px; margin-left:10px;">
	    		<input style="padding-left:5px; border-radius:2px;border-style:none;background-color:#2866A3"></input>
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
				<div style="float:left; margin-left:-90px; height:70px; width:74.2%; background-color:#115599; color:#FFFFFF;" >
					<!-- 标题 -->
					<div style="position:relative;margin-left:33%;top:10%; height:60px;">				
						<font face="微软雅黑">
							<h4><b>{{ $article->title }}</b></h4>
							<h6>{{ $article->author }}/{{ $article->updated_at }}</h6>
						</font>
					</div>				
				</div>
				<!-- 右半条 -->
				<div style="position:relative; float:left; right:-19.5%; height:70px; width:255px; background-color:#115599;"></div>
			</div>
			<!-- content -->
			<div class="row"><br></div>
			<div class="row">
			
				<div class="col-md-2"></div>
				
		        <div class="col-md-6" >
		        	
		        	<div class="row">
			        	<div class="col-md-12" style="background-color: #F6F7F7;
	               			box-shadow: inset 2px -3px 1px #DDDDDD, inset -3px 2px 1px #DDDDDD;">					    	
					        <br>					        
					        <p>{{ $article->outline }}</p><br>  
					        <p>{!! $article->content !!}</p>      					        					       					        
						</div>
					</div>    
			    
				</div>
				
				<div class="col-md-3" style="margin-left:-10px; margin-top:-91px">
				
					<div class="row">
			        	<div class="col-md-8 col-md-offset-1" style="background-color: #F6F7F7;
	               			box-shadow: inset 1px -3px 1px #DDDDDD, inset -3px 1px 1px #DDDDDD;">
			        
			        		<div class="preview">访问量</div>
								<div class="view">
									<ol contenteditable="true">
										<li>{{ $article->view }}</li>									
									</ol>
								</div>
							</div>
						
						</div>
					<div>
						<div class="row"><br></div>
					
						<div class="row">
							<div class="col-md-8 col-md-offset-1" style="background-color: #F6F7F7;
	               				box-shadow: inset 2px -3px 2px #DDDDDD, inset -3px 2px 2px #DDDDDD;">
				        
				        		<div class="preview">有序列表</div>
									<div class="view">
										<ol contenteditable="true">
											<li>Lorem ipsum dolor sit amet</li>										
										</ol>
									</div>
								</div>
							
							</div>	
						</div>
						<div class="row"><br></div>
					
						<div class="row">
							<div class="col-md-8 col-md-offset-1" style="background-color: #F6F7F7;
	               				box-shadow: inset 2px -3px 2px #DDDDDD, inset -3px 2px 2px #DDDDDD;">
				        
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
    </body>
</html>
 
