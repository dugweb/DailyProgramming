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
<!-- Sample inputs

	"A words", where A is the number of words in the given document
"B letters", where B is the number of letters in the given document
"C symbols", where C is the number of non-letter and non-digit character, excluding white spaces, in the document
"Top three most common words: D, E, F", where D, E, and F are the top three most common words
"Top three most common letters: G, H, I", where G, H, and I are the top three most common letters
"J is the most common first word of all paragraphs", where J is the most common word at the start of all paragraphs in the document (paragraph being defined as a block of text with an empty line above it) (*Optional bonus*)
"Words only used once: K", where K is a comma-delimited list of all words only used once (*Optional bonus*)
"Letters not used in the document: L", where L is a comma-delimited list of all alphabetic characters not in the document (*Optional bonus*)

-->


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