
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
        sql="http://localhost/shop/php/index.php?=Deletcategory/"+selectedCat;
        xhr.open("GET",sql,true);
        xhr.send();
        xhr.onreadystatechange = function () {
            if(xhr.readyState == 4 && xhr.status == 200) {
                CategoryManagerBtn(0);
                alert("Category Deleted Successfuly!");

            }
        };
    }
}
function AddCategory() {
    alert("do you want to add this Category?");
}

function selectedCategory(val) {
    this.selectedCat=val;

}