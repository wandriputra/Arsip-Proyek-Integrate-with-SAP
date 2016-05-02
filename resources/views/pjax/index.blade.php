<html>
	<head></head>
	<body>
		
		<a href="{{url('pjax/home')}}">asd</a>
		<div id="pjax-container">
		{{isset(@home) : $home ? ''}}
		</div>
		<script src="{{url('asset/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
		<script src="{{url('asset/plugins/jQuery/jquery.pjax.js')}}"></script>
		        <script type="text/javascript">
            $(document).ready(function(){
                $(document).pjax('a', '#pjax-container')
            });
        </script>
	</body>
</html>