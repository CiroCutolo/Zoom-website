function moreInfo(panelId){
	var x = document.getElementById(panelId);
  alert("ciao");
  if (x.style.display == "none") {
    x.style.display = "hidden";
  } else {
    x.style.display = "none";
  }
}