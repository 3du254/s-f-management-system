// JavaScript
var stats=0;
function show(wrapperL,wrapperR){
if (stats==1){
	wrapperL.style.left="0px";
	wrapperL.style.transition="left 0.3s linear";
	wrapperR.style.width="86%";
	wrapperR.style.transition="width 0.3s linear";
	stats=0;
}
else{
	wrapperL.style.left="-14%";
	wrapperL.style.transition="left 0.3s linear";
	wrapperR.style.width="100%";
	wrapperR.style.transition="width 0.3s linear";
	stats=1;
}
}

// JQuery
//logout
$(document).ready(function() {
	$(".sessionName").click(function(){
		//$("#logout").slideToggle("fast");
		$("#logout").toggle();
		});
    $("#open_default").click(function(){
        $(this).css({"background-color":"#ccc","color":"#000"});
    });
});


