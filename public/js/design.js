const design_div = document.getElementById("design-div");

function add_text()
{
	var new_text = prompt("Insert text here");

	var text_element = document.createElement("div");

	var edit_element = document.createElement("div");
	edit_element.classList = "editing-text-element";
	edit_element.setAttribute("onclick", "edit_text(this);");

	text_element.appendChild(edit_element);

	text_element.appendChild(document.createTextNode(new_text));

	text_element.classList = "design-text";

	dragElement(design_div, text_element);

	design_div.appendChild(text_element);
}

function add_image()
{
	var new_image_element = document.createElement("div");
	new_image_element.classList = "preview-image-element";

	dragElement(design_div, new_image_element);

	var file = document.getElementById("input-image").files[0];

    if(file)
    {
		new_image_element.style.backgroundImage = "url(\"" + window.URL.createObjectURL(file) + "\")";
	}

	var edit_element = document.createElement("div");
	edit_element.classList = "editing-text-element";
	edit_element.setAttribute("onclick", "close_image(this);");

	new_image_element.appendChild(edit_element);

	design_div.appendChild(new_image_element);
}

function edit_text(element)
{
	var text_content = element.nextSibling;
	console.log(text_content.data);
	var new_text = prompt("Edit text", text_content.data);
	text_content.data = new_text;
}

function close_image(element)
{
	var parent_element = element.parentElement;

	var parent_parrent = parent_element.parentElement;

	parent_parrent.removeChild(parent_element);
}

function export_image()
{
	var text_edit = document.getElementsByClassName("editing-text-element");

	console.log(text_edit);

	for(i = 0; i < edit_text.length + 1; i++)
	{
		text_edit[i].style.backgroundColor = "transparent";
		text_edit[i].style.width = "0";
		text_edit[i].style.height = "0";
	}

	setTimeout(() => {
		html2canvas([document.getElementById('design-div')], {
			onrendered: function(canvas) {
			   document.body.appendChild(canvas);
			   var data = canvas.toDataURL('images/png');
			   send_image_to_server();
			   // AJAX call to send `data` to a PHP file that creates an image from the dataURI string and saves it to a directory on the server
			}
		});
	}, 200);



}

function send_image_to_server()
{
	var canvas = document.querySelector("canvas");

	var dataURL = canvas.toDataURL();

	var ajax = new XMLHttpRequest();
	var form_data = new FormData();

	form_data.append("img", dataURL);

	ajax.onload = function()
	{
		console.log("uploadovana slika");
		console.log(this.responseText);

		var parent = canvas.parentElement;

		parent.removeChild(canvas);

	}

	ajax.open("POST", "public/upload.php", true);
	ajax.send(form_data);

}

function dragElement(child, parrent)
{
	var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
	child.onmousedown = dragMouseDown;

	function dragMouseDown(e) {
	e = e || window.event;
	e.preventDefault();
	// get the mouse cursor position at startup:
	pos3 = e.clientX;
	pos4 = e.clientY;
	document.onmouseup = closeDragElement;
	// call a function whenever the cursor moves:
	document.onmousemove = elementDrag;
	}

	function elementDrag(e) {
	e = e || window.event;
	e.preventDefault();
	// calculate the new cursor position:
	pos1 = pos3 - e.clientX;
	pos2 = pos4 - e.clientY;
	pos3 = e.clientX;
	pos4 = e.clientY;
	// set the element's new position:

	if((parrent.offsetTop - pos2) > 0)
		parrent.style.top = (parrent.offsetTop - pos2) + "px";
	else
		parrent.style.top = ((parrent.offsetTop - pos2) * (-1)) + "px";

	if((parrent.offsetLeft - pos2) > 0)
		parrent.style.left = (parrent.offsetLeft - pos1) + "px";
	else
		parrent.style.left = ((parrent.offsetLeft - pos1) * (-1)) + "px";

	//      parrent.style.top = (parrent.offsetTop - pos2) + "px";
	//      parrent.style.left = (parrent.offsetLeft - pos1) + "px";
	}

	function closeDragElement() {
	/* stop moving when mouse button is released:*/
	document.onmouseup = null;
	document.onmousemove = null;
	}
}
