(function () {
	'use strict';

	var labels = window.plainLogCodeCopy;

	if (!labels || !labels.code || !labels.copy || !labels.copied || !labels.copyFailed) {
		return;
	}

	document.querySelectorAll('.single-entry .entry-content pre').forEach(function (pre) {
		if (
			pre.getAttribute('data-code-copy-enhanced') === 'true'
			|| pre.closest('.code-block')
		) {
			return;
		}

		var wrapper = document.createElement('div');
		var toolbar = document.createElement('div');
		var toolbarLabel = document.createElement('span');
		var button = document.createElement('button');
		var content = document.createElement('div');
		var lineNumbers = document.createElement('div');
		var lineNumbersFragment = document.createDocumentFragment();
		var scroll = document.createElement('div');
		var lineCount = pre.textContent.split(/\r\n|\r|\n/).length;
		var lineNumber;
		var resetTimer = 0;
		var requestId = 0;
		var i;

		pre.setAttribute('data-code-copy-enhanced', 'true');
		wrapper.className = 'code-block';
		toolbar.className = 'code-toolbar';
		toolbarLabel.className = 'code-toolbar-label';
		toolbarLabel.textContent = labels.code;
		button.className = 'code-copy-button';
		button.type = 'button';
		button.textContent = labels.copy;
		button.setAttribute('aria-live', 'polite');
		content.className = 'code-content';
		lineNumbers.className = 'code-line-numbers';
		lineNumbers.setAttribute('aria-hidden', 'true');
		scroll.className = 'code-scroll';

		for (i = 1; i <= lineCount; i += 1) {
			lineNumber = document.createElement('span');
			lineNumber.textContent = i;
			lineNumbersFragment.appendChild(lineNumber);
		}

		lineNumbers.appendChild(lineNumbersFragment);

		pre.parentNode.insertBefore(wrapper, pre);
		wrapper.appendChild(toolbar);
		wrapper.appendChild(content);
		toolbar.appendChild(toolbarLabel);
		toolbar.appendChild(button);
		content.appendChild(lineNumbers);
		content.appendChild(scroll);
		scroll.appendChild(pre);

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
