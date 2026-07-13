<div>

    <div class="flex justify-center">
        <input type="month" wire:model="month" class="rounded-lg w-2/3">
    </div>
    <canvas id="chef_sale" class="mt-5 "></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const barChart = document.getElementById('chef_sale');
        var menuData = JSON.parse(`<?php echo $chef_data; ?>`);
        // console.log("menudat" + menu_data);
        // var labels = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'];
        const menu_data = {
            labels: menuData.label,
            datasets: [{
                label: 'Quantity',
                data: menuData.quantity,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    // 'rgba(255, 159, 64, 0.2)',
                    // 'rgba(255, 205, 86, 0.2)',
                    // 'rgba(75, 192, 192, 0.2)',
                    // 'rgba(54, 162, 235, 0.2)',
                    // 'rgba(153, 102, 255, 0.2)',
                    // 'rgba(190, 150, 56, 0.2)',
                    // 'rgba(180, 120, 94, 0.2)',
                    // 'rgba(54, 190, 100, 0.2)',
                    // 'rgba(201, 203, 207, 0.2)',
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    // 'rgb(255, 159, 64)',
                    // 'rgb(255, 205, 86)',
                    // 'rgb(75, 192, 192)',
                    // 'rgb(54, 162, 235)',
                    // 'rgb(153, 102, 255)',
                    // 'rgb(201, 203, 207)',
                    // 'rgb(180, 120, 94)',
                    // 'rgb(54, 190, 100)',
                    // 'rgb(201, 203, 207)',
                ],
                borderWidth: 1
            }]
        };
    </script>
    @push('liveScripts')
        <script>
            const chefMenuBar = new Chart(barChart, {
                type: 'bar',
                barThickness: 4,
                maxBarThickness: 10,
                data: menu_data,

            })
            Livewire.on('chefUpdata', event => {
                console.log("update")
                var updata = JSON.parse(event.chef_data);
                chefMenuBar.data.datasets[0].data = updata.quantity;
                chefMenuBar.data.labels = updata.label;
                chefMenuBar.update();
            })
            Livewire.on('chef-no-data', event => {
                console.log("no-data")
                // chefMenuBar.destory;
                chefMenuBar.data.datasets[0].data = 0;
                chefMenuBar.data.labels = "";
                chefMenuBar.update();
            })
        </script>
    @endpush


</div>
