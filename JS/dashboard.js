var btReference = document.getElementById("conatinerHider");

btReference.addEventListener("click",function()
{
    let pannel = document.getElementById("menuItem");
    if(btReference.getAttribute("name") == "hide")
    {
        btReference.setAttribute("name","nonHide"); 
        pannel.style.display = "none";
    }
    else
    {
        btReference.setAttribute("name", "hide");
        pannel.style.display = "initial";
    }
});