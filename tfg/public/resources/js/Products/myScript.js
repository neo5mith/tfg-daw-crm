/*global $*/
/*global $notify*/


//When window loaded, execute that function
window.onload = getBasicData();
// window.onload = autocompleteBrands();


// // Autocomplete Brands
// function autocompleteBrands(){
//     var options = {
    
//         url: "resources/brands.json",
        
//         getValue: "name",
        
//         list: {	
//             match: {
//               enabled: true
//             }
//         },
        
//         theme: "square"
//     };
    
//     $("#brands").easyAutocomplete(options);
// }


// Getting basic information from the project and put it into a table
function getBasicData(){
    $.ajax({
        url: 'https://tfg-sergi-daw-neosmith.c9users.io/products',
        type: 'GET',
        success: function(result){
            var items = [];
            items.push('<table class="table table-bordered"><tr><th class="text-center">Ref</th><th class="text-center">Brand</th><th class="text-center">Model</th><th class="text-center">Stock</th><th class="text-center">Details</th><th class="text-center">Update Details</th><th class="text-center">Delete</th></tr>');
            $.each(result, function(key, value){
                items.push('<tr>'); 
                items.push('<td class="text-center">'+value.ref+'</td>');
                items.push('<td class="text-center">'+value.brand+'</td>');
                items.push('<td class="text-center">'+value.model+'</td>');
                items.push('<td class="text-center">'+value.stock+'</td>');
                items.push('<td class="text-center"><a type="button" class="btn btn-primary" data-detail-product="'+value.id+'">View details</a></td>');
                items.push('<td class="text-center"><a type="button" class="btn btn-primary" data-update-product="'+value.id+'">Update details</a></td>');
                items.push('<td class="text-center"><a type="button" class="btn btn-danger" data-delete-product="'+value.id+'">Delete Product</a></td>');
                items.push('</tr>');
            });
            items.push('</table>');
            $('#productsTable').html(items.join(''));
        },
        error: function(ts) { console.log(ts.responseText) }
    });
}


//Clean modal form if Cancel is clicked
function cleanModalInputs(){
    var clean = "";
    $('#ref').val(clean);
    $('#brand').val(clean);
    $('#model').val(clean);
    $('#stock').val(clean);
    $('#description').val(clean);
    $('#dealer').val(clean);
    $('#price').val(clean);
    $('#dealerPrice').val(clean);
}


// Check all Fields for ADD are completed (in progress*************************************)
function checkAllFieldsInserted(){
    createProduct();
    // console.log($("#AddModal:input").val());
    // var empty = "";
    // if ($("#AddModal :input") !== "" && $("#AddModal :input").val() === 0){
    //     createProduct();
    // } else {
    //     $.notify("You must complete all fields to Add the Product!","warn");
    // }
}


// Create Product, clean form, and hide modal
function createProduct(){
    var item = {
        "ref": $('#ref').val(), 
        "brand": $('#brand').val(), 
        "model": $('#model').val(), 
        "stock": $('#stock').val(),
        "description": $('#description').val(), 
        "dealer": $('#dealer').val(),
        "price": $('#price').val(), 
        "dealerPrice": $('#dealerPrice').val()
    };
    
    $.ajax({
        url: 'https://tfg-sergi-daw-neosmith.c9users.io/product',
        type: 'POST',
        data: item,
        success: function(result){
            getBasicData();
            var clean = "";
            $('#ref').val(clean);
            $('#brand').val(clean);
            $('#model').val(clean);
            $('#stock').val(clean);
            $('#description').val(clean);
            $('#dealer').val(clean);
            $('#price').val(clean);
            $('#dealerPrice').val(clean);
            $.notify("Product added", "success");
            $('#AddModal').modal('hide');
        },
        error : function(ts){
            $.notify("Sorry, but something went wrong. Please try again.", "error");
            console.log(ts.responseText);
        }
    });
}


// Comprovation if user wants to delete Product
$(document).on("click", "[data-delete-product]", function(evt) {
    
    evt.preventDefault();
  
    // 1. retrieve product ID
    var id = $(this).data("delete-product");
  
    $('#delYes').data('deleteSure-product',id);
  
    $('#DelModal').modal('show');

});


$(document).on("click", "[data-deleteSure-product]", function(evt) {
    var id = $(this).data("deleteSure-product");
    
    deleteProduct(id);
});


// Delete Product
function deleteProduct(sid){
    $.ajax({
    url: 'https://tfg-sergi-daw-neosmith.c9users.io/product/'+sid,
    type: 'DELETE',
    success: function(result){
        $('#DelModal').modal('hide');
        $.notify("Product Deleted","warn");
        getBasicData();
    },
    error: function(ts){
        $.notify("Sorry, but something went wrong. Please try again.", "error");
        console.log(ts.responseText);
    }
    });
}

//When update buton clicked, take the id of the product and show modal of update, call the func to get details
$(document).on("click", "[data-update-product]", function(evt) {
    evt.preventDefault();

    var id = $(this).data("update-product");
    $('#UpdateModal').modal('show');

    getProductDetailsEdit(id);
});

// Get Details of the Product and insert them into the modal of update product
function getProductDetailsEdit(sid){

    $.ajax({
        url: 'https://tfg-sergi-daw-neosmith.c9users.io/productDet/'+sid,
        type: 'GET',
        success: function(result){
            $("#uid").val(result.id);
            $("#uref").val(result.ref);
            $("#ubrand").val(result.brand);
            $("#umodel").val(result.model);
            $("#ustock").val(result.stock);
            $("#udescription").val(result.description);
            $("#udealer").val(result.dealer);
            $("#uprice").val(result.price);
            $("#udealerPrice").val(result.dealerPrice);
        },
        error: function(ts){
            console.log(ts.responseText);
        }
    });
}


// Once updates are done and nothing is left behind, update product (PROGRES *******************************)
function checkAllFieldsInsertedUpd(){
    updateProduct();
    // console.log($("#UpdateModal:input").val());
    // var empty = "";
    // if ($("#UpdateModal :input") !== "" && $("#UpdateModal :input").val() === 0){
    //     updateProduct();
    // } else {
    //     $.notify("You must complete all fields to Update the Product!","warn");
    // }
}


// Update Product
function updateProduct(){
    var item = {
        "id": $('#uid').val(),
        "ref": $('#uref').val(), 
        "brand": $('#ubrand').val(), 
        "model": $('#umodel').val(), 
        "stock": $('#ustock').val(),
        "description": $('#udescription').val(), 
        "dealer": $('#udealer').val(),
        "price": $('#uprice').val(), 
        "dealerPrice": $('#udealerPrice').val()
    };
    
    $.ajax({
        url: 'https://tfg-sergi-daw-neosmith.c9users.io/productUpdate',
        type: 'PUT',
        data: item,
        success: function(result){
            $('#UpdateModal').modal('hide');
            getBasicData();
            $.notify("Product Updated", "success");
        },
        error : function(ts){
            $.notify("Sorry, but something went wrong. Please try again.", "error");
            console.log(ts.responseText);
        }
    });
}


//When detail is click take the id from it's called, show the modal, and call the method to fill the info
$(document).on("click", "[data-detail-product]", function(evt) {
    evt.preventDefault();

    var id = $(this).data("detail-product");
    console.log("ID es: "+id);
    $('#InfoModal').modal('show');

    getProductDetails(id);
});

// Get Details of the Product and insert them into the modal of info product
function getProductDetails(sid){

    $.ajax({
        url: 'https://tfg-sergi-daw-neosmith.c9users.io/productDet/'+sid,
        type: 'GET',
        success: function(result){
            $("#iid").val(result.id);
            $("#iref").val(result.ref);
            $("#ibrand").val(result.brand);
            $("#imodel").val(result.model);
            $("#istock").val(result.stock);
            $("#idescription").val(result.description);
            $("#idealer").val(result.dealer);
            $("#iprice").val(result.price);
            $("#idealerPrice").val(result.dealerPrice);
        },
        error: function(ts){
            console.log(ts.responseText);
        }
    });
}

