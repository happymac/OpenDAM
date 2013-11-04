(function($) {
	"use strict";

	$(document).ready(function() {
		var $root = $("#selection-list-page");

		$root.find("[data-action=delete]").ConfirmModal({
			title: __("Delete confirmation"),
			message: __("Are you sure want to delete this selection?"),
			confirmBtn: {
				"class": "btn btn-danger",
				"text": '<i class="icon-trash"></i> '+__("Delete")
			}
		});
	});
})(jQuery);