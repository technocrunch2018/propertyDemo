    // Maximize
    //
    $(document).on('click', '.box-btn-maximize', function(){
      $(this).parents('.box').toggleClass('box-maximize').removeClass('box-fullscreen');
    });



    // Fullscreen
    //
    $(document).on('click', '.box-btn-fullscreen', function(){
      $(this).parents('.box').toggleClass('box-fullscreen').removeClass('box-maximize');
    });
    
    // Fullscreen
	$(function () {
		'use strict'

			$('[data-provide~="fullscreen"]').on('click', function () {
				screenfull.toggle($('#container')[0]);
			});

	}); // End of use strict