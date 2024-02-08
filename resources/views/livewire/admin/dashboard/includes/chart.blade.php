<div class=" h-full col-span-2 w-full">
    <canvas id="myChart"></canvas>
</div>

@assets
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endassets

@script
<script>
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels:  Object.keys($wire.data_deliveries),
        datasets: [{
          label: `Deliveries per month`,
          data: Object.values($wire.data_deliveries),
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
</script>
@endscript
