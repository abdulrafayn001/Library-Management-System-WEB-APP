var ImageNo = 1;

<<<<<<< HEAD
function NextImg() {
    let srcName = "IMG/MainPageResource/lib";
    let Extension = ".jfif";
    ImageNo++;
    if (ImageNo > 3) {
        ImageNo = 1;
        document.getElementById("PicDisp").src = srcName + ImageNo + Extension;
    } else {
        document.getElementById("PicDisp").src = srcName + ImageNo + Extension;
    }
}

function PrevImg() {
=======
function NextImg()
{
    let srcName = "IMG/MainPageResource/lib"; 
    let Extension = ".jfif";
    ImageNo++;
    if(ImageNo > 3)
    {
        ImageNo = 1;
        document.getElementById("PicDisp").src = srcName + ImageNo + Extension;
    }
    else
    {
        document.getElementById("PicDisp").src = srcName+ImageNo+Extension;
    }
}
function PrevImg()
{
>>>>>>> 0ddd8731d668376313389997b7867475ebdef2f6
    let srcName = "IMG/MainPageResource/lib";
    let Extension = ".jfif";
    ImageNo--;
    if (ImageNo < 1) {
        ImageNo = 3;
        document.getElementById("PicDisp").src = srcName + ImageNo + Extension;
<<<<<<< HEAD
    } else {
=======
    }
    else 
    {
>>>>>>> 0ddd8731d668376313389997b7867475ebdef2f6
        document.getElementById("PicDisp").src = srcName + ImageNo + Extension;
    }
}

<<<<<<< HEAD
function SwitchCardTheme() {
    if (document.getElementById("themeL").className == "quote") {
        document.getElementById("themeL").setAttribute("class", "quoteS");
    }
    if (document.getElementById("themeD").className == "log") {
        document.getElementById("themeD").setAttribute("class", "logS");
    } else {
=======
function SwitchCardTheme()
{
    if (document.getElementById("themeL").className == "quote")
    {
        document.getElementById("themeL").setAttribute("class","quoteS");
    }
    if (document.getElementById("themeD").className == "log")
    {
        document.getElementById("themeD").setAttribute("class", "logS");
    }
    else
    {
>>>>>>> 0ddd8731d668376313389997b7867475ebdef2f6
        if (document.getElementById("themeL").className == "quoteS") {
            document.getElementById("themeL").setAttribute("class", "quote");
        }
        if (document.getElementById("themeD").className == "logS") {
            document.getElementById("themeD").setAttribute("class", "log");
        }
    }
}

<<<<<<< HEAD
document.getElementById("themeD").addEventListener("mouseover", function() {
    SwitchCardTheme();
});
document.getElementById("themeD").addEventListener("mouseout", function() {
    SwitchCardTheme();
});
document.getElementById("themeL").addEventListener("mouseover", function() {
    SwitchCardTheme();
});
document.getElementById("themeL").addEventListener("mouseout", function() {
    SwitchCardTheme();
});
=======
document.getElementById("themeD").addEventListener("mouseover",function()
{
    SwitchCardTheme();
});
document.getElementById("themeD").addEventListener("mouseout", function () {
    SwitchCardTheme();
});
document.getElementById("themeL").addEventListener("mouseover", function () {
    SwitchCardTheme();
});
document.getElementById("themeL").addEventListener("mouseout", function () {
    SwitchCardTheme();
});
>>>>>>> 0ddd8731d668376313389997b7867475ebdef2f6
