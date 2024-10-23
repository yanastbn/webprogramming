$(document).ready(function(){

    $('.nav-link').on('click', function(e){
        e.preventDefault()
        $('.nav-link').removeClass('link-active')
        $(this).addClass('link-active')
    })

    $('#dashboard-link').on('click', function(e){
        e.preventDefault()
        viewAnalytics()
    })

    $('#products-link').on('click', function(e){
        e.preventDefault()
        viewProducts()

        // let url = $(this).attr('href')
        // window.history.pushState({path: url}, '', url)
    })

    function viewAnalytics(){
        $.ajax({
            type: 'GET',
            url: 'view-analytics.php',
            dataType: 'html',
            success: function(response){
                $('.content-page').html(response)
                loadChart()
            }
        })
    }

    function loadChart(){
        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
            datasets: [{
            label: 'Sales',
            data: [7000, 5500, 5000, 4000, 4500, 6500, 8200, 8500, 9200, 9600, 10000, 9800],
            backgroundColor: '#EE4C51',
            borderColor: '#EE4C51',
            borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
            y: {
                beginAtZero: true,
                max: 10000,
                ticks: {
                    stepSize: 2000  // Set step size to 2000
                }
            }
            }
        }
        });
    }

    function viewProducts(){
        $.ajax({
            type: 'GET',
            url: '../products/view-products.php',
            dataType: 'html',
            success: function(response){
                $('.content-page').html(response)
                $('#table-products').DataTable()
            }
        })
    }

    $('#dashboard-link').trigger('click')
});