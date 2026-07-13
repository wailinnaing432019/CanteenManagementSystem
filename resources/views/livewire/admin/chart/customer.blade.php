<div>

    <div class="flex justify-center">
        <input type="month" wire:model="month" class="rounded-lg w-2/3">
    </div>
    <canvas id="cuChart" class="mt-5 "></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @push('cu')
        <script>
            // setInterval(() => Livewire.emit('updateData'), 5000);
            Livewire.on('Updata', event => {
                var cu = JSON.parse(event.customers);
                console.log(cu);
                // console.log(customerChart.data);
                customerChart.data.datasets[0].data = cu;
                customerChart.update();
            })
        </script>
    @endpush
    <script>
        const cuChart = document.getElementById('cuChart');
        // var customers = JSON.parse(`<?php echo $customers; ?>`);
        var cu = JSON.parse(`<?php echo $customers; ?>`);
        // console.log(customers);
        // var labels = ['1', '2', '3', '4', '5', '6', '7'];
        const cudata = {
            datasets: [{
                label: 'Customers',
                data: cu,
                fill: false,
                borderColor: 'green',
                tension: 0.1
            }]
        };
        const customerChart = new Chart(cuChart, {
            type: 'line',
            data: cudata,
            options: {
                animations: {
                    tension: {
                        duration: 5000,
                        easing: 'linear',
                        from: 1,
                        to: 0,
                        loop: true
                    }
                },

            }
        })
    </script>
</div>
