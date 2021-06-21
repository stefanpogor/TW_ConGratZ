var loadCovers=false;
var loadGifs=false;
var loadStickers=false;
var loadingCovers=document.getElementById("loadingCoversArea");
var loadBtnCovers=document.getElementById("loadCovers");
var loadingStickers=document.getElementById("loadingStickersArea");
var loadBtnStickers=document.getElementById("loadStickers");
var loadingGifs=document.getElementById("loadingGifsArea");
var loadBtnGifs=document.getElementById("loadGifs");
var mycanvas = document.querySelector("#canvasGreet");
var context=mycanvas.getContext("2d");

function fill(){
var bgColor= document.getElementById("backgroundColor");
var bgColorFill= bgColor.value;
context.fillStyle=bgColorFill;
bgColor.addEventListener("input", function(){
    context.fillStyle=bgColorFill;
    console.log(bgColorFill);
}, false);
context.fillRect(0, 0, mycanvas.width, mycanvas.height);
};

loadBtnCovers.addEventListener("click", function(){

   if (loadCovers===false){ 
    var ajax= new XMLHttpRequest();
    ajax.open('GET', '../for-ajax/getGreetingsCovers.php');
    ajax.onload = function(){
    var jsonData=JSON.parse(ajax.responseText);
    insertHTML(jsonData);
}
ajax.send();
loadCovers=true;
}
});

function insertHTML(data){
    var htmlString="";

    for (i=0; i<data.length; i++){
        htmlString+="<img src=" +"'"+ data[i].path +"'" + "onclick='getImageSrc(this)' class='thumb'" +"/>";
    }

    loadingCovers.insertAdjacentHTML('beforeend', htmlString);
}

function showCovers() {
    document.getElementById("loadingCoversArea").classList.toggle("showCoversContent");
}

window.onclick = function (event) {
    if (!event.target.matches('.loadBtnCovers')) {
        var dropdowns = document.getElementsByClassName("loadingAreaCovers");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('showCoversContent')) {
                openDropdown.classList.remove('showCoversContent');
            }
        }
    }

    if (!event.target.matches('.loadBtnStickers')) {
        var dropdowns = document.getElementsByClassName("loadingAreaStickers");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('showStickersContent')) {
                openDropdown.classList.remove('showStickersContent');
            }
        }
    }

    if (!event.target.matches('.loadBtnGifs')) {
        var dropdowns = document.getElementsByClassName("loadingAreaGifs");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('showGifsContent')) {
                openDropdown.classList.remove('showGifsContent');
            }
        }
    }
}

function getImageSrc(_this){
    var path = _this.src;
    console.log(path);
    nimage=new Image();
    nimage.src= path;
    context.drawImage(nimage, 0, 0, mycanvas.width, mycanvas.height);
    console.log(nimage.src);
}


loadBtnStickers.addEventListener("click", function(){

    if (loadStickers===false){ 
     var ajax= new XMLHttpRequest();
     ajax.open('GET', '../for-ajax/getGreetingsStickers.php');
     ajax.onload = function(){
     var jsonData=JSON.parse(ajax.responseText);
     insertHTMLSt(jsonData);
 }
 ajax.send();
 loadStickers=true;
 }
 });
 
 function insertHTMLSt(data){
     var htmlString="";
 
     for (i=0; i<data.length; i++){
         htmlString+="<img src=" +"'"+ data[i].path +"'" + "onclick='getImageSrcSt(this)' class='thumb'" +"/>";
     }
 
     loadingStickers.insertAdjacentHTML('beforeend', htmlString);
 }
 
 function showStickers() {
     document.getElementById("loadingStickersArea").classList.toggle("showStickersContent");
 }
 
 function getImageSrcSt(_this){
     var path = _this.src;
     console.log(path);
     nimage=new Image();
     nimage.src= path;
     var xcoord= document.getElementById("xcoordSt").value;
     var ycoord= document.getElementById("ycoordSt").value;
     var wdth = document.getElementById("wdthSt").value;
     var hght = document.getElementById("hghtSt").value;
     context.drawImage(nimage, xcoord, ycoord, wdth, hght);
     console.log(nimage.src);
 }


 loadBtnGifs.addEventListener("click", function(){

    if (loadGifs===false){ 
     var ajax= new XMLHttpRequest();
     ajax.open('GET', '../for-ajax/getGreetingsGifs.php');
     ajax.onload = function(){
     var jsonData=JSON.parse(ajax.responseText);
     insertHTMLGf(jsonData);
 }
 ajax.send();
 loadGifs=true;
 }
 });
 
 function insertHTMLGf(data){
     var htmlString="";
 
     for (i=0; i<data.length; i++){
         htmlString+="<img src=" +"'"+ data[i].path +"'" + "onclick='getImageSrcGf(this)' class='thumb'" +"/>";
     }
 
     loadingGifs.insertAdjacentHTML('beforeend', htmlString);
 };
 
 function showGifs() {
     document.getElementById("loadingGifsArea").classList.toggle("showGifsContent");
 };

 function resetCanvas(){
    context.clearRect(0, 0, mycanvas.width, mycanvas.height);
};

function getImageSrcGf(_this){
    var path = _this.src;
    console.log(path);
    nimage=new Image();
    nimage.src= path;
    var xcoord= document.getElementById("xcoordGf").value;
    var ycoord= document.getElementById("ycoordGf").value;
    var wdth = document.getElementById("wdthGf").value;
    var hght = document.getElementById("hghtGf").value;
    context.drawImage(nimage, xcoord, ycoord, wdth, hght);
    console.log(nimage.src);
};

function onDownload(){
    mycanvas.toBlob((blob)=>{
        const timestamp=Date.now().toString();
        const a = document.createElement('a');
        document.body.append(a);
        a.download="greetingscard.png";
        a.href=URL.createObjectURL(blob);
        a.click();
        a.remove();
    });
};

const reader=new FileReader();
const img = new Image();
    
const uploadImage = (e) => {
    reader.onload= () =>{
         img.onload=()=>{
            var xcoord= document.getElementById("xcoordIm").value;
            var ycoord= document.getElementById("ycoordIm").value;
            var wdth = document.getElementById("wdthIm").value;
            var hght = document.getElementById("hghtIm").value;
            context.drawImage(img, xcoord, ycoord, wdth, hght);
        };
        img.src=reader.result;
    };
    reader.readAsDataURL(e.target.files[0])
};
const imgLoader= document.getElementById("uploader");
imgLoader.addEventListener('change', uploadImage);

function fillDetails(){
    var text = document.getElementById("text").value;
    var txtsize= document.getElementById("txtsize").value;

    var inputColor= document.getElementById("textColor");
    var color= inputColor.value;
    context.fillStyle=color;
    inputColor.addEventListener("input", function(){
        context.fillStyle=color;
    }, false);
    var xcoord= document.getElementById("xcoordTx").value;
    var ycoord= document.getElementById("ycoordTx").value;
    context.font= txtsize + " Arial";
    context.fillText(text, xcoord, ycoord);
};



