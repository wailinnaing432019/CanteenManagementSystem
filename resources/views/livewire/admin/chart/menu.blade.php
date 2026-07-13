<div>
    {{-- <div class="flex  justify-center">
        <input type="date" name="" class="rounded-lg w-full" id="">
    </div> --}}
    <div class="w-[300px]">
        <canvas id="chart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const pie = document.getElementById('chart');
        var $pieData = JSON.parse(`<?php echo $menus; ?>`);
        console.log($pieData);
        const dataPie = {
            labels: [
                'Pending',
                'Available',
                'Unavailable'
            ],
            datasets: [{
                label: 'Menus',
                data: $pieData,
                backgroundColor: [
                    'rgb(255, 205, 86)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 99, 132)'
                ],
                hoverOffset: 4
            }]
        };
        new Chart(pie, {
            type: 'pie',
            data: dataPie,
        })
    </script>
</div>
