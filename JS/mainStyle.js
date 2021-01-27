var ImageNo = 1;

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
    let srcName = "IMG/MainPageResource/lib";
    let Extension = ".jfif";
    ImageNo--;
    if (ImageNo < 1) {
        ImageNo = 3;
        document.getElementById("PicDisp").src = srcName + ImageNo + Extension;
    } else {
        document.getElementById("PicDisp").src = srcName + ImageNo + Extension;
    }
}

function SwitchCardTheme() {
    if (document.getElementById("themeL").className == "quote") {
        document.getElementById("themeL").setAttribute("class", "quoteS");
    }
    if (document.getElementById("themeD").className == "log") {
        document.getElementById("themeD").setAttribute("class", "logS");
    } else {
        if (document.getElementById("themeL").className == "quoteS") {
            document.getElementById("themeL").setAttribute("class", "quote");
        }
        if (document.getElementById("themeD").className == "logS") {
            document.getElementById("themeD").setAttribute("class", "log");
        }
    }
}

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