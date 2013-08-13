var cmds = Backbone.Model.extend({
	initialize: function() {
		console.log('initialized')
	},
	defaults: {
		'prompt': '>'
	}
});
