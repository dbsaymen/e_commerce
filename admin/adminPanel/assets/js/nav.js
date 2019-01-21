
var selectedCat;

function getXMLHttpRequest() {
    var xhr= null;
    try {
        var xhr = new ActiveXObject("Microsoft.XMLHTTP");
    } catch(e)  {
        var xhr = new XMLHttpRequest;
    }
    return xhr;
}
function CategoryManagerBtn($id){
    var xhr=getXMLHttpRequest();
    xhr.open("GET","http://localhost/shop/php/index.php?=categoryNames/",true);
    xhr.send();
    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var area= document.getElementById("managerArea");
            area.innerHTML=xhr.responseText;
            selectedCat= parseInt(document.getElementsByClassName("categorys").item(0).item(0).value);
        }
    };

}

function DeleteCategory() {
    if(confirm("Delete Category !")){
        var xhr=getXMLHttpRequest();
        sql="http://localhost/shop/php/index.php?=DeletCategory/"+selectedCat;
        xhr.open("GET",sql,true);
        xhr.send();
        xhr.onreadystatechange = function () {
            if(xhr.readyState == 4 && xhr.status == 200) {
                CategoryManagerBtn(0);
                console.log(xhr.responseText);
                if(xhr.responseText=="success"){
                    alert("Category Deleted Successfuly!");
                }else{
                    alert("Faild to delete Category! must have subcategory or products");
                }

            }
        };
    }
}


function AddCategory() {
    var xhr=getXMLHttpRequest();
    var parentid=this.selectedCat;
    var name=document.getElementById("newCategoryName").value;
    if(confirm("do you want to add this Category?")){
        if(document.getElementById("isParentCategory").checked){
            parentid=0;
        }
        console.log(parentid);
        sql="http://localhost/shop/php/index.php?=AddCategory/"+name+"/"+parentid;
        xhr.open("GET",sql,true);
        xhr.send();
        xhr.onreadystatechange = function () {
            if(xhr.readyState == 4 && xhr.status == 200) {
                CategoryManagerBtn(0);
                alert("Category Deleted Successfuly!");
            }
        };
    }else{
        console.log("unconfiremd");
    }
}


function ProductManagerBtn(){
    var xhr=getXMLHttpRequest();
    xhr.open("GET","http://localhost/shop/php/index.php?=products",true);
    xhr.send();
    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var area= document.getElementById("managerArea");
            area.innerHTML=xhr.responseText;
        }
    };
}

function ProvidersManager(){
    var xhr=getXMLHttpRequest();
    xhr.open("GET","http://localhost/shop/php/index.php?=ProviderPage",true);
    xhr.send();
    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var area= document.getElementById("managerArea");
            area.innerHTML=xhr.responseText;
        }
    };
}
function AddProvider() {


    var file=document.getElementById("file-input").files[0];
    var descriptions=document.getElementById("description-input").value;
    var name=document.getElementById("Name-input").value;
    let formData = new FormData();
    let prov = {description:descriptions, names:name};
    formData.append("photo", file);

    var xhr=getXMLHttpRequest();
    xhr.open("POST","http://localhost/shop/php/index.php?=ProviderPage",true);
    xhr.setRequestHeader("content-type", "multipart/form-data");
    xhr.send(formData);
    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
        }
    };

}

function selectedCategory(val) {
    this.selectedCat=val;
    console.log(this.selectedCat);

}

function showAddProviderForm(){
    document.getElementById("addProviderForm").style.display="block"
}
function hideAddProviderForm(){
    document.getElementById("addProviderForm").style.display="none"
}

/*----------

Screen Resolustion

 */

document.getElementsByClassName("MainPanel")[0].style.height=(window.screen.height *0.5)+"px";