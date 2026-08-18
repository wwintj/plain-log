(function () {
	'use strict';

	var labels = window.plainLogCodeCopy;

	if (!labels) {
		return;
	}

	document.querySelectorAll('.single-entry .entry-content pre').forEach(function (pre) {
		if (pre.getAttribute('data-code-copy-enhanced') === 'true') {
			return;
		}

		var wrapper = document.createElement('div');
		var button = document.createElement('button');
		var resetTimer = 0;
		var requestId = 0;

		pre.setAttribute('data-code-copy-enhanced', 'true');
		wrapper.className = 'code-copy-block';
		button.className = 'code-copy-button';
		button.type = 'button';
		button.textContent = labels.copy;
		button.setAttribute('aria-live', 'polite');

		pre.parentNode.insertBefore(wrapper, pre);
		wrapper.appendChild(button);
		wrapper.appendChild(pre);

		function showStatus(text, activeRequestId) {
			window.clearTimeout(resetTimer);
			button.textContent = text;
			resetTimer = window.setTimeout(function () {
				if (activeRequestId === requestId) {
					button.textContent = labels.copy;
				}
			}, 2000);
		}

		button.addEventListener('click', function () {
			requestId += 1;
			var activeRequestId = requestId;

			window.clearTimeout(resetTimer);
			button.textContent = labels.copy;

			if (!navigator.clipboard || typeof navigator.clipboard.writeText !== 'function') {
				showStatus(labels.copyFailed, activeRequestId);
				return;
			}

			try {
				navigator.clipboard.writeText(pre.textContent).then(
					function () {
						if (activeRequestId === requestId) {
							showStatus(labels.copied, activeRequestId);
						}
					},
					function () {
						if (activeRequestId === requestId) {
							showStatus(labels.copyFailed, activeRequestId);
						}
					}
				);
			} catch (error) {
				showStatus(labels.copyFailed, activeRequestId);
			}
		});
	});
}());
