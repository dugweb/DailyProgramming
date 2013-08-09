<html>

<style>
	html, body {
		height: 100%;
		font: 1em/1.2em normal normal Helvetica, Arial, Sans-serif;
	}
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

	#dropzone {
		background:#f8f8f8;
		border:1px solid #eaeaea;
		color: #eaeaea;
		text-align: center;
		min-height:150px;
		display: block;
		font-size: 2em;
		padding-top: 100px;
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

<div id="dropzone">
	Drop Zone
</div>

<div id="output">
</div>
<script>

	var $ = function(val) {
		return document.getElementById(val);
	}

	document.addEventListener("DOMContentLoaded", function() {
		app.init();
	});

	var app = {
		init: function() {
			if (!window.File || !window.FileReader || !window.FileList || !window.Blob) {
				console.log('Your browser sucks. Update please.');
				return;
			};
			var dropzone = $('dropzone');
			dropzone.addEventListener("dragover", this.dragHandler, false);
			dropzone.addEventListener("drop", this.dropHandler, false);

			this.dropzone = dropzone;

		},

		dragHandler: function(e) {
			e.preventDefault();
			console.log("DRAG OVER");
		},
		dropHandler: function(e) {
			e.preventDefault();
			console.log("DROPPED");
		}

	}


</script>
</body>
</html>