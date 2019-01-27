
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

/*----------- Category ----------*/
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
function selectedCategory(val) {
    this.selectedCat=val;


}

/*----------- AutoSelect ----------*/
function selectedProviderForProduct(val) {
    var area= document.getElementById("Provider-input");
    area.value=val;
}
function selectedCategoryForProduct(val) {
    var area= document.getElementById("Category-input");
    area.value=val;

}

/*----------- Products ----------*/
function ProductManagerBtn(){
    var xhr=getXMLHttpRequest();
    xhr.open("GET","http://localhost/shop/php/index.php?=products",true);
    xhr.send();
    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var area= document.getElementById("managerArea");
            area.innerHTML=xhr.responseText;
            CategorySelectAdd();
            ProviderSelectAdd();
            CategorySelectUpdate();
            ProviderSelectUpdate();
        }
    };
}
function ProductUpdate(id){
    var area= document.getElementById("selected_product_to_update");
    area.value=id;
    var xhr=getXMLHttpRequest();
    xhr.open("GET","http://localhost/shop/php/index.php?=products/"+id,true);
    xhr.send();
    xhr.onreadystatechange = function () {
        var json = JSON.parse(xhr.responseText);
        document.getElementById("update_Name-input").value=json[1];
        document.getElementById("update_Name-input").innerText=json[1];
        document.getElementById("update_Price-input").value=json[2];
        document.getElementById("update_Price-input").innerText=json[2];
        document.getElementById("update_description-input").value=json[6];
        document.getElementById("update_description-input").innerText=json[6];
        document.getElementById("update_Details-input").value=json[8];
        document.getElementById("update_Details-input").innerText=json[8];
    }
}
function deleteProduct(id){
    if(confirm("Delete Product ?")) {
        var xhr = getXMLHttpRequest();
        xhr.open("GET", "http://localhost/shop/php/index.php?=deleteProduct/" + id, true);
        xhr.send();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                alert("Deleted!");
                ProductManagerBtn();
            }
        };
    }
}
function CategorySelectAdd(){
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
function CategorySelectUpdate(){
    var xhr=getXMLHttpRequest();
    xhr.open("GET","http://localhost/shop/php/index.php?=categorySelect/",true);
    xhr.send();
    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var area= document.getElementById("choose_categoryUpdate");
            area.innerHTML=xhr.responseText;
            document.getElementById("Category-inputUpdate").value=parseInt(document.getElementsByClassName("categorys").item(0).item(0).value);
        }
    };
}
function ProviderSelectAdd(){
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
function ProviderSelectUpdate(){
    var xhr=getXMLHttpRequest();
    xhr.open("GET","http://localhost/shop/php/index.php?=providerSelect/",true);
    xhr.send();
    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var area= document.getElementById("choose_providerUpdate");
            area.innerHTML=xhr.responseText;
            document.getElementById("Provider-inputUpdate").value=parseInt(document.getElementsByClassName("providers").item(0).item(0).value);
        }
    };
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
            ProductManagerBtn();
        }
    };
}
function updatadeSalesStatus(id){
    var isChecked=1;
    var discount=0;
    if(document.getElementById("sales"+id).checked){
        isChecked=0
    }
    if(isChecked){
        discount=prompt("Discount in percent % :")
    }
    var xhr=getXMLHttpRequest();
    xhr.open("POST","http://localhost/shop/php/index.php?=updatadeSalesStatus/"+id+"/"+isChecked+"/"+discount,true);
    xhr.send();
    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200) {
            alert("Updated!");
            ProductManagerBtn();
        }
    };
}

/*----------- Provider ----------*/
function deleteProvider(id){
    if(confirm("Delete Product ?")) {
        var xhr = getXMLHttpRequest();
        xhr.open("GET", "http://localhost/shop/php/index.php?=deleteProvider/" + id, true);
        xhr.send();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                alert("Deleted!");
                ProvidersManager();
            }
        };
    }
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

/*---------- Screen Resolustion ----------*/

document.getElementsByClassName("MainPanel")[0].style.height=(window.screen.height *1.5)+"px";