(function(w){


/* Object for handling page navigation on smaller devices */
DHDropdownNavigation = function( opts ){
	this.el  = opts.el || document.createElement('section');
	this.$el = $(this.el);
	
	this.$current  = this.$el.find(".current.option");
	this.$dropdown = this.$el.find("section.list");
	this.$options  = this.$dropdown.find("article.option");	
	
	this.open = false;
	
	var self = this;
	/* event binding */
	this.$current.click(function(){ self.toggle(); });
	this.$options.click(function(){ self.redirect(this) });
};

DHDropdownNavigation.prototype.toggle = function(){
	if( this.open ){
		this.$dropdown.css("display","none");
		this.open = false;
	} else {
		this.$dropdown.css("display","block");
		this.open = true;
	}
};

DHDropdownNavigation.prototype.redirect = function( ele ){
	var url = (ele.dataset) ? ele.dataset.url : $(ele).getAttribute("data-url");
	window.location = url;
};

})(window);

var dropDownNav;
$(document).ready(function(){
	dropDownNav = new DHDropdownNavigation({
		el : document.getElementById('dd_nav')
	});
});