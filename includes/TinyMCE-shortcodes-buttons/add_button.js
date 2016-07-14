(function () {
	tinymce.PluginManager.add('add_button', function (editor) {
		editor.addButton('add_button', {
			text: 'Button',
			icon: false,
			onclick: function () {
				editor.windowManager.open({
					title: 'Add Button',
					body: [
						{
							type: 'textbox',
							name: 'text',
							label: 'Button text'
						},
						{
							type: 'textbox',
							name: 'link',
							label: 'Link url'
						},
						{
							type: 'listbox',
							name: 'style',
							label: 'Style',
							'values': [
								{text: '', value: ''},
								{text: 'button', value: 'btn'},
								{text: 'button custom', value: 'btn-custom'},
								{text: 'link', value: 'link'},
								{text: 'link custom', value: 'link-custom'}
							]
						},
						{
							type: 'textbox',
							name: 'css_class',
							label: 'Button CSS class'
						},
						{
							type: 'textbox',
							name: 'icon',
							label: 'Icon CSS class'
						},
						{
							type: 'listbox',
							name: 'align',
							label: 'Button Align',
							fixedWidth: true,
							'values': [
								{text: '', value: ''},
								{text: 'left', value: 'alignleft'},
								{text: 'center', value: 'aligncenter'},
								{text: 'right', value: 'alignright'}
							]
						}
					],
					onsubmit: function (e) {
						var align = e.data.align ? ' align="' + e.data.align + '"' : '';
						var icon = e.data.icon ? ' icon="' + e.data.icon + '"' : '';
						var style = e.data.style ? ' style="' + e.data.style + '"' : '';
						var css_class = e.data.css_class ? ' class="' + e.data.css_class + '"' : '';
						editor.insertContent('[button ' + style + css_class + '  text="' + e.data.text + '" ' + icon + ' link="' + e.data.link + '"' + align + ' ]');
					}
				});
			}
		});
	});
})();
