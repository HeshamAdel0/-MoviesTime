(function () {
	"use strict";

	var treeviewMenu = $('.app-menu');

	// Toggle Sidebar
	$('[data-toggle="sidebar"]').click(function(event) {
		event.preventDefault();
		$('.app').toggleClass('sidenav-toggled');
	});

	// Activate sidebar treeview toggle
	$("[data-toggle='treeview']").click(function(event) {
		event.preventDefault();
		if(!$(this).parent().hasClass('is-expanded')) {
			treeviewMenu.find("[data-toggle='treeview']").parent().removeClass('is-expanded');
		}
		$(this).parent().toggleClass('is-expanded');
	});

	// Set initial active toggle
	$("[data-toggle='treeview.'].is-expanded").parent().toggleClass('is-expanded');

	//Activate bootstrip tooltips
	$("[data-toggle='tooltip']").tooltip();


	 // User Avatar Image preview
	$("#images").change(function() {
	    
	    if (this.files && this.files[0]) {
	        var reader = new FileReader();
	        
	        reader.onload = function(e) {
	          $('#image_perview').attr('src', e.target.result);
	        }
	        
	        reader.readAsDataURL(this.files[0]);
	    }

	});// End User Avatar Image preview

	// Profile Cover Image preview
	$("#profilecover").change(function() {
	    
	    if (this.files && this.files[0]) {
	        var reader = new FileReader();
	        
	        reader.onload = function(e) {
	          $('#profilecover_perview').attr('src', e.target.result);
	        }
	        
	        reader.readAsDataURL(this.files[0]);
	    }

	});// End Profile Cover Image preview
	
})();
