//windows.open
//attribute value
//'_blank'	Opens the linked document in a new window or tab
//'_self'	Opens the linked document in the same frame as it was clicked (this is default)
//'_parent'	Opens the linked document in the parent frame
//'_top'	Opens the linked document in the full body of the window
//JS open URL in same page
function openURL(Obj){
	window.open(Obj, '_top');
}

//open URL in new page
function openURLnewTab(Obj){
	window.open(Obj, '_blank');
}

//countdown and reload page(URL)
//time(sec=time/100)
function reloadURL(Obj,Time){
	setTimeout(function(){
		window.location.reload(1);
		}, Time);
}


//get client IP address

//from json
//require jQuery
//output e.ip
function getIP(){
	$.get("http://ipinfo.io", function(e) {
			alert(e.ip);
			$('#demo').text(e.ip);
		}, "jsonp");
}

function getIP2(){
	$.getJSON("https://api.ipify.org/?format=json", function(e) {
		alert (e.ip);
		$('#demo').text(e.ip);
	});
}
