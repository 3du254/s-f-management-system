
function show_user(evt, content){
    var j,tab_links,tab_content;
    tab_content=document.getElementsByClassName("tab_content");
    for(j=0;j < tab_content.length; j++){
        tab_content[j].style.display = "none";
    }
    tab_links=document.getElementsByClassName("tab_links");
    for(j=0;j<tab_links.length;j++){
        tab_links[j].className=tab_links[j].className.replace("active","");
    }
    document.getElementById(content).style.display="block";
    evt.currentTarget.className += "active";
}
document.getElementById("open_default").click(function(){
    $("#open_default").css({"background-color":"#ccc","color":"#000"});
});