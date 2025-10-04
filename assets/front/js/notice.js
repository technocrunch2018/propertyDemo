if ($(".cookie-notice").length) {
	$(".accept-cookies").on("click", function () {
		// Following code can be placed in AJAX .done
		width = $(".cookie-notice").width();
		$(".cookie-notice").animate(
			{
				left: "-=" + width
			},
			250,
			"linear",
			function () {
				// animation is complete, remove element from DOM
				$(this).remove();
			}
		);
	});
}


const items = document.querySelectorAll(".filters-sidebar .accordion a");

function toggleAccordion() {
  this.classList.toggle("active");
  this.nextElementSibling.classList.toggle("active");
}

items.forEach((item) => item.addEventListener("click", toggleAccordion));