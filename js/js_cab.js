var $offset = 0;
$(document).on("scroll", function() {
	var $logo1 = $("#cab_logo_1");
	var $logo2 = $("#cab_logo_2");
	var $cab = $("#cab_screen");
	var $menu = $("#cab_nav");
	var $titu1 = $("#titu1");
	var $titu2 = $("#titu2");

	var offset = $(document).scrollTop();

	if(offset > 1) {
		if($offset == 0) {
			$($cab).animate({
				top : "0px",
				height : "50px"
			}, 500);
			$($logo1).animate({
				top : "-100px",
				height : "10px"
			}, 500);
			$($logo2).animate({
				top : "0px",
				height : "32px"
			}, 500);
			$($menu).animate({
				top : "50px"
			}, 500);
			$($titu1).animate({
				top : "-80px"
			}, 500);
			$($titu2).animate({
				top : "10px"
			}, 500);
			$offset = 1;
		}
	} else {
		$offset = 0;
		$($cab).animate({
			top : "0px",
			height : "100px"
		}, 500);
		$($logo1).animate({
			top : "0px",
			height : "83px"
		}, 500);
		$($logo2).animate({
			top : "-100px",
			height : "32px"
		}, 500);
		$($menu).animate({
			top : "80px"
		}, 500);
		$($titu1).animate({
			top : "10px"
		}, 500);
		$($titu2).animate({
			top : "-80px"
		}, 500);
	}
});
