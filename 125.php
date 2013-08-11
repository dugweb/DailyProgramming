<html>

<style>
	html, body {
		height: 100%;
		font: 1em/1.2em normal normal Helvetica, Arial, Sans-serif;
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
		color: #ccc;
		max-height: 200px;
		text-align: center;
		display: block;
		font: 1.4em/1.6em normal normal;
		padding: 50px 25px;
		overflow-y: scroll;
		overflow-x: hidden;	
	}

	#output {
		box-shadow: 0 0 0 1px teal inset;
		background-color: #daedee;
		float: left;
		padding: 25px;
	}
	#output p {
		padding: 10px 20px;
	}
</style>
<body>

<p><a href="http://www.reddit.com/r/dailyprogrammer/comments/1e97ob/051313_challenge_125_easy_word_analytics/">Challenge Link</a></p>
<p>Took the regex from <a href="http://www.reddit.com/r/dailyprogrammer/comments/1e97ob/051313_challenge_125_easy_word_analytics/c9y3fpu">Skeeto&lsquo;s</a> solution. I need to buckle down and learn the crap out of Regex.</p>

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

		fileData: "",
		fileStats: {},

		init: function() {
			if (!window.File || !window.FileReader || !window.FileList || !window.Blob) {
				console.log('Your browser sucks. Update please.');
				return;
			};

			var dropzone = $('dropzone');
			dropzone.addEventListener("dragover", this.dragHandler, false);
			dropzone.addEventListener("drop", this.dropHandler, false);

			this.dropzone = dropzone;
			this.output = $('output');

		},

		dragHandler: function(e) {
			e.stopPropagation();
			e.preventDefault();
			
			event.dataTransfer.dropEffect = 'copy'; // Explicitly show this is a copy
		},
		dropHandler: function(e) {
			e.preventDefault();
			e.stopPropagation();

			var file = e.dataTransfer.files[0]; // Only one file allowed to be dropped

			var reader = new FileReader();

			reader.addEventListener('load', self.fileReadHandler, false);

			reader.readAsText(file);
		},
		fileReadHandler: function(e) {
			var data = e.currentTarget.result;
			var stats = {};

			stats["Word Count"] = self.wordCount(data);
			stats["Letter Count"] = self.letterCount(data);
			stats["Symbol Count"] = self.symbolCount(data);
			stats["Most Common Words"] = self.commonWords(data);
			stats["Most Common Letters"] = self.commonLetters(data);
			stats["Most Common First Word"] = self.commonFirstWord(data);
			stats["Unused Letters"] = self.unusedletters(data);

			self.fileData = data.toLowerCase();
			self.dropzone.innerHTML = data;
			self.setStats(stats);
		},

		setStats: function(arr) {
			this.fileStats = arr;
			this.updateOutput();
		},
		updateOutput: function() {
			
			this.output.innerHTML = "";
			
			Object.keys(this.fileStats).forEach(function(key) {
				this.output.innerHTML += key + ": " + self.fileStats[key] + "<br />";
			});
			
		},

		wordCount: function(data) {
			var words = data.split(/[^\w]+/).filter(function(n) {
				return n;
			}); 
			return words.length;
		}, 
		letterCount: function(data) {
			var letters = data.replace(/[^a-zA-Z]+/g, '').split('');
			
			return letters.length;
		},
		symbolCount: function(data) {
			var symbols = data.replace(/[\w\s]+/g, '').length;
			
			return symbols;
		},
		commonWords: function(data) {
			return "todo";
		},
		commonLetters: function(data) {
			// todo
		},
		commonFirstWord: function(data) {
			// todo
		},
		unusedletters: function(data) {
			// todo
		}
	}

	var self = app;


</script>
</body>
</html>