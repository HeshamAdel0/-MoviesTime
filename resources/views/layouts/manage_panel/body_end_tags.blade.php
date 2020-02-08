{{-- jQuery --}}
	    <script src="{{ asset('admin-panel/js/jquery-3.3.1.min.js') }}"></script>
{{-- Popper --}}
	    <script src="{{ asset('admin-panel/js/popper.min.js') }}"></script>
{{-- Bootstrap --}}
	    <script src="{{ asset('admin-panel/js/bootstrap.min.js') }}"></script>
{{-- Ckeditor --}}
	    <script src="{{ asset('admin-panel/plugins/ckeditor/ckeditor.js') }}"></script>
{{-- Select2 --}}
	    <script src="{{ asset('admin-panel/plugins/select2.min.js') }}"></script>
{{--custom js--}}
	    <script src="{{ asset('admin-panel/js/movies_mix.js') }}"></script>
{{--The javascript plugin to display page loading on top--}}
	    {{-- <script src="{{ asset('admin-panel/js/plugins/pace.min.js') }}"></script> --}}
{{-- Page specific javascripts --}}
	    <script>
		    $('.bs-component [data-toggle="popover"]').popover();
		    $('.bs-component [data-toggle="tooltip"]').tooltip();
	    </script>
	    <script type="text/javascript">
	      $('#sl').on('click', function(){
	      	$('#tl').loadingBtn();
	      	$('#tb').loadingBtn({ text : "Signing In"});
	      });
	      
	      $('#el').on('click', function(){
	      	$('#tl').loadingBtnComplete();
	      	$('#tb').loadingBtnComplete({ html : "Sign In"});
	      });
	      
	      $('#demoSelect').select2();
    </script>
    </body>
<!-- End Body-->
</html>
