
function show_login(evt, content){
    var j,tab_links,login_wrapper;
    login_wrapper=document.getElementsByClassName("login_wrapper");
    for(j=0;j < login_wrapper.length; j++){
        login_wrapper[j].style.display = "none";
        }
    tab_links=document.getElementsByClassName("tab_links");
    for(j=0;j<tab_links.length;j++){
        tab_links[j].className=tab_links[j].className.replace("active","");
    }
    document.getElementById(content).style.display="block";
    evt.currentTarget.className += "active";
}
document.getElementById("open_default").click();