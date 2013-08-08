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
<p>Find the highest divisor of an N digit number</p>
<form>
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
var $ = function(id) {
	return document.getElementById(id);
}

document.addEventListener("DOMContentLoaded", function() {
	app.init();
});

var app = {
	n: 0,
	m: 0, 

	init: function() {
		this.submit = $('submitbtn');
		this.submit.addEventListener("click", this.clickHandler);

		this.output = $('output');
	},

	clickHandler: function(e) {
		e.preventDefault();

		// Use self, defined outside of object, so it's the correct scope.
		// It's annoying and probably why I should use jQuery
		self.n = $('digits').value;
		self.m = $('divisor').value;

		self.calculateDivisor();
	},

	calculateDivisor: function() {
		var largestNum = Math.pow(10, this.n) - 1;

		while (largestNum > 0) {
			if (largestNum % this.m === 0) {
				this.setOutput(largestNum);
				return;
			}
			largestNum--;
		}
		this.setOutput("never");
		return;
	}, 

	setOutput: function(val) {
		var output = "<p>The highest number " + this.m;
		output += " will divide evenly into " + (Math.pow(10, this.n) - 1);
		output += " is " + val + ".</p>";

		this.output.innerHTML = output;
	}
};
var self = app;

</script>

</body>
</html>