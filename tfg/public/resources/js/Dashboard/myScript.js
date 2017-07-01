/* global $*/
/* global google*/


//When window loaded, execute that function
window.onload = getInfoGraph();
window.onload = getReservedOrders();
window.onload = getLastClients();
window.onload = getLastProducts();
window.onload = getProductsWarnStock();

function getInfoGraph(){
//Ask for Orders info
    $.ajax({
        url: 'https://tfg-sergi-daw-neosmith.c9users.io/orders',
        type: 'GET',
        success: function(result){
            graphic(result);
        },
        error: function(xhr, ajaxOptions, thrownError){
            console.log("getBasicData, error");
            // console.log(xhr.status);
            // console.log(thrownError);
        }
    });
}


//Graphic from orders
function graphic($orders){
    
    // Load the Visualization API and the corechart package.
    google.charts.load('current', {'packages':['corechart']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);
    
    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {
    
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Date');
        data.addColumn('number', 'Money Spent');
        // data.addRows([ 
        //   ['Meizu', 3],
        //   ['Nexus', 1],
        //   ['Apple', 1],
        //   ['Hp', 1],
        //   ['Huawei', 2]
        // ]);
        
        var items = [];
        $.each($orders, function(key, value){
            var item = [];
            item.push(value.client.surname);
            item.push(Math.round(value.totalPrice));
            items.push(item);
        });
        
        data.addRows(items);
    
        // Set chart options
        var options = {'title':'Graphic about Orders',
            'width':1000,
            'height':400,
            isStacked: true
        };
    
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('earnedMoney'));
        chart.draw(data, options);
    }
}


//Get 10 last Orders
function getReservedOrders(){
    // console.log("Entrem a getBasicData");
    $.ajax({
        url: 'https://tfg-sergi-daw-neosmith.c9users.io/dashboard/reservedOrders',
        type: 'GET',
        success: function(result){
            var items = [];
            
            items.push('<table class="table table-bordered"><tr><th class="text-center">Order Id</th><th class="text-center">Buy Date</th><th class="text-center">Total Price (€)</th><th class="text-center">Status</th></tr>');
            
            $.each(result, function(key, value){
                
                var date = new Date(value.buyDate*1000);
                
                items.push('<tr>'); 
                items.push('<td class="text-center">'+value.id+'</td>');
                items.push('<td class="text-center">'+date+'</td>');
                items.push('<td class="text-center">'+value.totalPrice+'</td>');
                items.push('<td class="text-center">'+value.status+'</td>');
                items.push('</tr>');
            });
            
            items.push('</table>');
            
            $('#lastOrders').html(items.join(''));
            
        },
        error: function(xhr, ajaxOptions, thrownError){
            console.log("getBasicData, error");
            console.log(xhr.status);
            console.log(thrownError);
            var items = [];
            items.push('<h2 class="text-center">There is no data from the DataBase.</h2>');
            $('#lastOrders').html(items.join(''));
        }
    });
}


// Get 10 last Clients
function getLastClients(){
    $.ajax({
        url: 'https://tfg-sergi-daw-neosmith.c9users.io/dashboard/lastClients',
        type: 'GET',
        success: function(result){
            var items = [];
            items.push('<table class="table table-bordered"><tr><th class="text-center">DNI</th><th class="text-center">Name</th><th class="text-center">Surname</th></tr>');
            $.each(result, function(key, value){
                items.push('<tr>'); 
                items.push('<td class="text-center">'+value.dni+'</td>');
                items.push('<td class="text-center">'+value.name+'</td>');
                items.push('<td class="text-center">'+value.surname+'</td>');
                items.push('</tr>');
            });
            items.push('</table>');
            $('#lastClients').html(items.join(''));
        },
        error: function(){
            var items = [];
            items.push('<h2 class="text-center">There are no clients yet or there is an error with the DB right now.</h2>');
            $('#lastClients').html(items.join(''));
        }
    });
}

// Get 10 last Products
function getLastProducts(){
    $.ajax({
        url: 'https://tfg-sergi-daw-neosmith.c9users.io/dashboard/lastProducts',
        type: 'GET',
        success: function(result){
            var items = [];
            items.push('<table class="table table-bordered"><thead><tr><th class="text-center">Ref</th><th class="text-center">Brand</th><th class="text-center">Model</th><th class="text-center">Stock</th><th class="text-center">Price</th></tr></thead><tbody>');
            $.each(result, function(key, value){
                items.push('<tr>'); 
                items.push('<td class="text-center">'+value.ref+'</td>');
                items.push('<td class="text-center">'+value.brand+'</td>');
                items.push('<td class="text-center">'+value.model+'</td>');
                items.push('<td class="text-center">'+value.stock+'</td>');
                items.push('<td class="text-center">'+value.price+'</td>');
                items.push('</tr>');
            });
            items.push('</tbody></table>');
            $('#lastProducts').html(items.join(''));
        },
        error: function(){
            var items = [];
            items.push('<h2 class="text-center">There are no products yet or there is an error with the DB right now.</h2>');
            $('#lastProducts').html(items.join(''));
        }
    });
}

// Get 10 last Products
function getProductsWarnStock(){
    $.ajax({
        url: 'https://tfg-sergi-daw-neosmith.c9users.io/dashboard/StockWarning',
        type: 'GET',
        success: function(result){
            var items = [];
            items.push('<table class="table table-bordered"><tr><th class="text-center">Ref</th><th class="text-center">Brand</th><th class="text-center">Model</th><th class="text-center">Stock</th><th class="text-center">Price</th></tr>');
            $.each(result, function(key, value){
                items.push('<tr>'); 
                items.push('<td class="text-center">'+value.ref+'</td>');
                items.push('<td class="text-center">'+value.brand+'</td>');
                items.push('<td class="text-center">'+value.model+'</td>');
                items.push('<td class="text-center">'+value.stock+'</td>');
                items.push('<td class="text-center">'+value.price+'</td>');
                items.push('</tr>');
            });
            items.push('</table>');
            $('#stockWarning').html(items.join(''));
        },
        error: function(){
            var items = [];
            items.push('<h2 class="text-center">There are no Products under 50 units or there is an error with the DB right now.</h2>');
            $('#stockWarning').html(items.join(''));
        }
    });
}