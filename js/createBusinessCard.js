var load=false;
var loadingImages=document.getElementById("loadingImagesArea");
var loadBtn=document.getElementById("loadImages");
var canvas = document.querySelector("#canvas");
var context=canvas.getContext("2d");

function fill(){
var bgColor= document.getElementById("backgroundColor");
var bgColorFill= bgColor.value;
context.fillStyle=bgColorFill;
bgColor.addEventListener("input", function(){
    context.fillStyle=bgColorFill;
    console.log(bgColorFill);
}, false);
context.fillRect(0, 0, canvas.width, canvas.height);
};

loadBtn.addEventListener("click", function(){

   if (load===false){ 
    var ajax= new XMLHttpRequest();
    ajax.open('GET', '../for-ajax/getBusinessCovers.php');
    ajax.onload = function(){
    var jsonData=JSON.parse(ajax.responseText);
    insertHTML(jsonData);
}
ajax.send();
load=true;
}
});

function insertHTML(data){
    var htmlString="";

    for (i=0; i<data.length; i++){
        htmlString+="<img src=" +"'"+ data[i].path +"'" + "onclick='getImageSrc(this)' class='thumb'" +"/>";
    }

    loadingImages.insertAdjacentHTML('beforeend', htmlString);
}

function showImages() {
    document.getElementById("loadingImagesArea").classList.toggle("showContent");
}

window.onclick = function (event) {
    if (!event.target.matches('.loadBtn')) {
        var dropdowns = document.getElementsByClassName("loadingArea");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('showContent')) {
                openDropdown.classList.remove('showContent');
            }
        }
    }
}

function getImageSrc(_this){
    var path = _this.src;
    console.log(path);
    nimage=new Image();
    nimage.src= path;
    context.drawImage(nimage, 0, 0, canvas.width, canvas.height);
    console.log(nimage.src);
}

function fillDetails(){
    var name = document.getElementById("name").value;
    var occupation = document.getElementById("occupation").value;
    var address = document.getElementById("address").value;
    var phone = document.getElementById("phone").value;
    var site = document.getElementById("site").value;
    var mail = document.getElementById("mail").value;

    var inputColor= document.getElementById("textColor");
    var color= inputColor.value;
    context.fillStyle=color;
    inputColor.addEventListener("input", function(){
        context.fillStyle=color;
    }, false);

    context.font="15px Arial";
    context.fillText(name, 10, 40);
    context.font="12px Arial";
    context.fillText(occupation, 10, 55);
    context.fillText(address, 10, 70);
    context.fillText(phone, 10, 85);
    context.fillText(site, 10, 105);
    context.fillText(mail, 10, 115);
};

const reader=new FileReader();
const imgLogo = new Image();

const uploadLogo = (e) => {
    reader.onload= () =>{
        imgLogo.onload=()=>{
            context.drawImage(imgLogo, 165, 25, 100, 100);
        };
        imgLogo.src=reader.result;
    };
    reader.readAsDataURL(e.target.files[0])
};


const imgLogoLoader= document.getElementById("uploader");
imgLogoLoader.addEventListener('change', uploadLogo);

download.addEventListener("click", function() {
    // only jpeg is supported by jsPDF
    var imgData = canvas.toDataURL("image/jpeg", 1.0);
    var pdf = new jsPDF();
  
    pdf.addImage(imgData, 'JPEG', 10, 10);
    pdf.save(document.getElementById("name").value + " - bussiness_card"+".pdf");
  }, false);

function resetCanvas(){
    context.clearRect(0, 0, canvas.width, canvas.height);
};

generate_qr.addEventListener("click", function(){
    var name = document.getElementById("name").value;
    var occupation = document.getElementById("occupation").value;
    var address = document.getElementById("address").value;
    var phone = document.getElementById("phone").value;
    var site = document.getElementById("site").value;
    var mail = document.getElementById("mail").value;
    var contactDetails="Nume: " + name + "; " + 
                        "Post: " + occupation + "; " + 
                        "Adresa: " + address + "; " + 
                        "Nr. tel.: " + phone + "; " + 
                        "Site: " + site + "; " + 
                        "Email: " + mail; 
    console.log(contactDetails);
    document.getElementById("qr_code").src ="https://api.qrserver.com/v1/create-qr-code/?data=" + contactDetails + "&size=100x100";

});

// function generatePDFfromXML(){
//     var inputColor= document.getElementById("textColorxml");
//     var color= inputColor.value;
//     context.fillStyle=color;
//     inputColor.addEventListener("input", function(){
//         context.fillStyle=color;
//     }, false);

//     var fileInput = document.getElementById("xmluploader").files[0];
//     console.log(fileInput);
//     var reader = new FileReader();
//            reader.onload = function(e) {
//                readXml=e.target.result;
//                console.log(readXml);
//                var parser = new DOMParser();
//                var doc = parser.parseFromString(readXml, "application/xml");
//                console.log(doc);
//                var employees = doc.getElementsByTagName('employeeDetails');
//                var arr=[];
//                var currx=10;
//                var curry=10;
//                var pdf = new jsPDF();
//                var imgData=[];
//                for (var i=0; i<employees.length; i++){
//                    console.log(i);
//                    var arr=[];
//                     for (var j=0; j<employees[i].childNodes.length; j++){
//                         var y=employees[i].childNodes[j];
//                             arr[j]= y.textContent;
//                     }
        
//                     cleanArray = arr.filter(function () { return true });
                
//                     context.font="15px Arial";
//                     context.fillText(cleanArray[1], 10, 40);
//                     context.font="12px Arial";
//                     context.fillText(cleanArray[3], 10, 55);
//                     context.fillText(cleanArray[5], 10, 70);
//                     context.fillText(cleanArray[7], 10, 85);
//                     context.fillText(cleanArray[9], 10, 105);
//                     context.fillText(cleanArray[11], 10, 115);

//                     imgData[i] = canvas.toDataURL("image/jpeg", 1.0);

//                     console.log(imgData[i])
  
//                     console.log(pdf.addImage(imgData[i], 'JPEG', currx, curry));
//                     currx+=370;
//                     curry+=370;
//                     pdf.save("download.pdf")
//                     fill();
//                     context.clearRect(0, 0, canvas.width, canvas.height);
//                }
               
//            }
//            reader.readAsText(fileInput);
// }
