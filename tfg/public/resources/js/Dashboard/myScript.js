/* global $*/
/* global google*/


//When window loaded, execute that function
window.onload = getInfoGraphPayed();
window.onload = getInfoGraphReserved();
window.onload = getProductsWarnStock();
window.onload = getReservedOrders();
window.onload = getLastClients();
window.onload = getLastProducts();

function loadAll(){
    window.onload = getInfoGraphPayed();
    window.onload = getInfoGraphReserved();
    window.onload = getProductsWarnStock();
    window.onload = getReservedOrders();
    window.onload = getLastClients();
    window.onload = getLastProducts();
}


//Ask for Payed Orders info
function getInfoGraphPayed(){

    $.ajax({
        url: 'https://tfg-sergi-daw-neosmith.c9users.io/dashboard/payedOrders',
        type: 'GET',
        success: function(result){
            graphicPayed(result);
        },
        error: function(xhr, ajaxOptions, thrownError){
            console.log("getBasicData, error");
        }
    });
}


//Graphic from orders
function graphicPayed($orders){
    
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
        data.addColumn('string', 'Client');
        data.addColumn('number', 'Money Spent €');
        
        var items = [];
        $.each($orders, function(key, value){
            var item = [];
            item.push(value.client.surname);
            item.push(Math.round(value.totalPrice));
            items.push(item);
        });
        
        data.addRows(items);
    
        // Set chart options
        var options = {
            'width':600,
            'height':400
        };
    
        // Instantiate and draw our chart, passing in some options.
        // var chart = new google.visualization.ScatterChart(document.getElementById('earnedMoney'));
        var chart = new google.visualization.PieChart(document.getElementById('earnedMoney'));
        // var chart = new google.visualization.BarChart(document.getElementById('earnedMoney'));
        chart.draw(data, options);
    }
}


//Ask for Payed Orders info
function getInfoGraphReserved(){

    $.ajax({
        url: 'https://tfg-sergi-daw-neosmith.c9users.io/dashboard/reservedOrders',
        type: 'GET',
        success: function(result){
            graphicReserved(result);
        },
        error: function(xhr, ajaxOptions, thrownError){
            console.log("getBasicData, error");
        }
    });
}


//Graphic from orders
function graphicReserved($orders){
    
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
        data.addColumn('string', 'Client');
        data.addColumn('number', 'Pending Money €');
        
        var items = [];
        $.each($orders, function(key, value){
            var item = [];
            item.push(value.client.surname);
            item.push(Math.round(value.totalPrice));
            items.push(item);
        });
        
        data.addRows(items);
    
        // Set chart options
        var options = {
            hAxis: {
              title: 'Euros €'
            },
            vAxis: {
              title: 'Clients'
            },
            'width':550,
            'height':400
        };
    
        // Instantiate and draw our chart, passing in some options.
        // var chart = new google.visualization.PieChart(document.getElementById('pendingMoney'));
        var chart = new google.visualization.BarChart(document.getElementById('pendingMoney'));
        chart.draw(data, options);
    }
}


// Get Stock Warnings
function getProductsWarnStock(){
    $.ajax({
        url: 'https://tfg-sergi-daw-neosmith.c9users.io/dashboard/StockWarning',
        type: 'GET',
        success: function(result){
            var items = [];
            items.push('<table class="table table-bordered"><tr><th class="text-center">Ref</th><th class="text-center">Brand</th><th class="text-center">Model</th><th class="text-center">Stock</th><th class="text-center">Price (€)</th></tr>');
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
            items.push('<table class="table table-bordered"><thead><tr><th class="text-center">Ref</th><th class="text-center">Brand</th><th class="text-center">Model</th><th class="text-center">Stock</th><th class="text-center">Price (€)</th></tr></thead><tbody>');
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
