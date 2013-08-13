<html>
<style>
	html, body {
		height: 100%;
		margin: 0;
		padding: 0;
	}
	#console {
		font: 24px/30px normal normal "Courier New", Sans-serif;
		width: 100%;
		height: 100%;
		background:#222;
		color:green;
	}
</style>
<body>
<textarea id="console"></textarea>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.1/underscore-min.js" type="text/javascript"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.0.0/backbone-min.js" type="text/javascript"></script>
<script src="model.js" type="text/javascript"></script>
<script src="template.js" type="text/template" id="rowtemplate"></script>
<script src="view.js" type="text/javascript"></script>
<script>

	document.addEventListener("DOMContentLoaded", function(e) {
		var consoleModel = new cmds();
		var consoleRow = new RowView({
			template: tmp('rowtemplate'),
			model: consoleModel,
		});
		consoleRow.render();
	});


</script>
</body>
</html>