
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
function CategoryManagerBtn(){
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
function CategorySelect(){
    var xhr=getXMLHttpRequest();
    xhr.open("GET","http://localhost/shop/php/index.php?=categorySelect/",true);
    xhr.send();
    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var area= document.getElementById("choose_category");
            area.innerHTML=xhr.responseText;
            document.getElementById("Category-input").value=parseInt(document.getElementsByClassName("categorys").item(0).item(0).value);
        }
    };
}

function ProviderSelect(){
    var xhr=getXMLHttpRequest();
    xhr.open("GET","http://localhost/shop/php/index.php?=providerSelect/",true);
    xhr.send();
    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var area= document.getElementById("choose_provider");
            area.innerHTML=xhr.responseText;
            document.getElementById("Provider-input").value=parseInt(document.getElementsByClassName("providers").item(0).item(0).value);
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

function selectedCategory(val) {
    this.selectedCat=val;


}
function selectedCategoryForProduct(val) {
    var area= document.getElementById("Category-input");
    area.value=val;

}
function selectedProviderForProduct(val) {
    var area= document.getElementById("Provider-input");
    area.value=val;

}

function showAddProduct(){
    document.getElementById("addProductForm").style.display="block";
    CategorySelect();
    ProviderSelect();
}
function showAddProviderForm(){
    document.getElementById("addProviderForm").style.display="block"
}
function hideAddProductForm(){
    document.getElementById("addProductForm").style.display="none"
}
function hideAddProviderForm(){
    document.getElementById("addProviderForm").style.display="none"
}
function updatadeActiveStatus(id){
    var isChecked=1;
    if(document.getElementById("opt"+id).checked){
        isChecked=0
    }
    var xhr=getXMLHttpRequest();
    xhr.open("POST","http://localhost/shop/php/index.php?=updateActiveStatus/"+id+"/"+isChecked,true);
    xhr.send();
    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200) {
            alert("Updated!");
        }
    };
}
/*----------

Screen Resolustion

 */

document.getElementsByClassName("MainPanel")[0].style.height=(window.screen.height *0.5)+"px";