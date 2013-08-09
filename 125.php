<html>

<style>
	p {
		display: inline-block;
	}
	label {
		width:130px;
		text-align: right;
		float: left;
		margin-right: 10px;
	}
	input {
		float: left;
	}
	button {
		display: block;
		width: 100px;
	}
	#output {
		box-shadow: 0 0 0 1px teal inset;
		background-color: #daedee;
		float: left;
	}
	#output p {
		padding: 10px 20px;
	}
</style>
<body>
<p>Analyze text document</p>
<form action="125.php" type="post">
	<p>
		<label for="digits">Number of Digits</label>
		<input name="digits" id="digits" placeholder="e.g. 4"></input>
	</p>
	<p>
		<label for="divisor">Divisor</label>
		<input name="divisor" id="divisor" placeholder="e.g. 8"></input>
	</p>
	
	<button type="submit" id='submitbtn'>Calculate</button>

</form>

<div id="output">
</div>
<script>
	document.addEventListener("DOMContentLoaded", function() {
		app.init();
	});

	var app = {
		init: function() {
			if (window.File && window.FileReader && window.FileList && window.Blog) {
				
			}
			console.log("judist priest")

		}
	}


</script>
</body>
</html>