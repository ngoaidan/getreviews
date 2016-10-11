<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="col-md-5 col-md-offset-1 well" style="margin-top:35px; margin-bottom:35px">
	    <div class="form-group">
	      <label>ID:</label>
	      <input type="text" class="form-control" id="id" placeholder="Nhập ID app">
	    </div>
	    <div class="form-group">
	    	<label>Token:</label>
	    	<input type="text" class="form-control" id="token" placeholder="Nhập token">
	    </div>
	    <div class="form-group">
	      <label>Mã ngôn ngữ (hl):</label>
	      <input type="text" class="form-control" id="hl" placeholder="Nhập mã ngôn ngữ">
	    </div>
	    <div class="form-group">
	      <label>Số lượng review: (Kết quả là bội số của 40)</label>
	      <input type="text" class="form-control" id="num" placeholder="Nhập số lượng cần lấy">
	    </div>
	    <button type="button" onclick="start();" class="btn btn-primary">Lấy reviews</button>
	</div>
	<div id="data" class="col-md-10 col-md-offset-1"></div>
	<script src="jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
		function start() {
			document.getElementById("data").innerHTML = "";
			var id = document.getElementById('id').value;
			var token = document.getElementById('token').value;
			var hl = document.getElementById('hl').value;
			var num = document.getElementById('num').value;
			var max = Math.ceil(num/40);
			for( var dem = 1; dem<=max; dem++)
			{
				getreviews(dem, id, token, hl);
			}
		}
		// SrtjRSrv5hezElZcupSjlhSCq6k:1471400191593
		function getreviews(page, id, token, hl)
		{
			var data = {
				reviewType: 0,
				pageNum: page,
				id: id,
				reviewSortOrder: 1,
				xhr: 1,
				token: token,
				hl: hl
			};
			
			$.ajax({
				url: 'https://play.google.com/store/getreviews?authuser=0',
				type: 'post',
				dataType: "json",
				crossDomain : true,
				success: function (data) {
					alert('f');
				},
				error: function(data) {
					var arrData = data.responseText.split('\n\n');
					var jsonData = JSON.parse(arrData[1]);
					jsonData = jsonData[0];
					jsonData = jsonData[2];
					jsonData = jsonData.replace(/\\/g, "");
					document.getElementById("data").innerHTML += jsonData;
					console.log(jsonData);
					setTimeout(function() {
						$('.review-header').remove();
					}, 500);
				},
				data: data
			});
		}
		
	</script>
</body>
</html>

