var tmp = function(id) {
	return _.template( $('#' + id).html() );
}

var RowView = Backbone.View.extend({

	tagName: "p",
	template: _.template($('#rowtemplate').html() ),

	className: "document-row",

	events: {

	},

	initialize: function() {
		_.bindAll(this, 'render');
		this.listenTo(this.model, "change", this.render);
		// $(document).bind('keyup', this.keyPressHandler);

	},

	render: function() {
	    this.$el.html(this.template(this.model.toJSON() ));
	    console.log('view rendered');
	    return this;
	},

	keyPressHandler: function(e) {
		console.log(e);
	}

});