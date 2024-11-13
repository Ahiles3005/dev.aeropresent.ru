document.addEventListener('DOMContentLoaded', function() {
	var tabs = document.querySelectorAll('.tab');
	var tabPanes = document.querySelectorAll('.tab-pane');

	tabs.forEach(function(tab) {
		tab.addEventListener('click', function() {
			var tabId = this.getAttribute('data-tab');

			tabs.forEach(function(tab) {
				tab.classList.remove('active');
			});

			tabPanes.forEach(function(tabPane) {
				tabPane.classList.remove('active');
			});

			this.classList.add('active');
			document.querySelector('.tab-pane[data-tab="' + tabId + '"]').classList.add('active');
		});
	});
});

document.addEventListener('DOMContentLoaded', function() {
	const tabs = document.querySelector('.tabs');
	const arrow = document.querySelector('.arrow-2');

	function toggleTabs() {
		tabs.classList.toggle('expanded');
	}

	arrow.addEventListener('click', toggleTabs);

	function checkScreenWidth() {
		if (window.innerWidth >= 768) {
			tabs.classList.remove('expanded');
		}
	}

	window.addEventListener('resize', checkScreenWidth);
});
