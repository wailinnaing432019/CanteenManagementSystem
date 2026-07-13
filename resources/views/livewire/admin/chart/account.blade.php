<div>

    <div class="flex justify-center">
        <input type="month" wire:model="month" class="rounded-lg w-2/3">
    </div>
    <canvas id="myChart" class="mt-5 "></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @push('liveScripts')
        <script>
            // setInterval(() => Livewire.emit('updateData'), 5000);
            Livewire.on('updated', event => {
                var income = JSON.parse(event.income);
                var expense = JSON.parse(event.expense);
                var profit = JSON.parse(event.profit);
                // console.log(myChart.data);
                myChart.data.datasets[0].data = income;
                myChart.data.datasets[1].data = expense;
                myChart.data.datasets[2].data = profit;
                myChart.update();
            })
        </script>
    @endpush
    <script>
        const ctx = document.getElementById('myChart');
        var income = JSON.parse(`<?php echo $income; ?>`);
        var expense = JSON.parse(`<?php echo $expense; ?>`);
        var profit = JSON.parse(`<?php echo $profit; ?>`);
        console.log(profit);

        // var labels = ['1', '2', '3', '4', '5', '6', '7'];
        const data = {
            datasets: [{
                    label: 'Income',
                    data: income,
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                },
                {
                    label: 'Expense',
                    data: expense,
                    fill: false,
                    borderColor: 'rgb(255, 192, 192)',
                    tension: 0.1
                },
                {
                    label: 'Profit',
                    data: profit,
                    fill: false,
                    borderColor: 'rgb(0, 255, 0)',
                    tension: 0.1
                }
            ]
        };
        const myChart = new Chart(ctx, {
            type: 'line',
            data: data,
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
        // Livewire.on('updated',event=>{
        //     var updata=JSON.parse(event.data);
        // })
    </script>
</div>
