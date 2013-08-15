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
		min-height: 90%;
		background:#222;
		color:green;
		padding: 10px;
	}
	.description {
		min-height: 10%;
		font-size: 12px;
		padding: 10px;	
	}
</style>
<body>

<div class="description">
	<p>Challenge: <a href="http://www.reddit.com/r/dailyprogrammer/comments/1k7s7p/081313_challenge_135_easy_arithmetic_equations/">[08/13/13] Challenge #135 [Easy] Arithmetic Equations</a></p>
	<p>Arithmetic types out simple arithmetic problems, and waits for an answer to be typed in. If the answer
is correct, it types back "Right!", and a new problem. If the answer is wrong, it replies "What?", and
waits for another answer. Every twenty problems, it publishes statistics on correctness and the time
required to answer.</p>
</div>

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