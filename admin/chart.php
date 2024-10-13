<?php
include("../authentication/config.php");
include("header.php");

// Fetch data counts for different booking statuses
$pending_count = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) as count FROM tbl_session WHERE status='0'"))['count'];
$accepted_count = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) as count FROM tbl_session WHERE status='2'"))['count'];
$declined_count = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) as count FROM tbl_session WHERE status='1'"))['count'];
?>

<div class="container mt-5">
    <div class="page-inner">
        <div class="container mt-5">
            <h2 class="text-center mb-4">Bookings Report</h2>
            <div class="chart-container" style="position: relative; height:60vh; width:80vw; margin: 0 auto;">
                <canvas id="bookingChart"></canvas>
            </div>
        </div>

        <!-- Your existing table code for Pending, Accepted, Declined, etc. -->

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Create a gradient for the chart bars
    var ctx = document.getElementById('bookingChart').getContext('2d');
    var gradientPending = ctx.createLinearGradient(0, 0, 0, 400);
    gradientPending.addColorStop(0, 'rgba(255, 206, 86, 1)');
    gradientPending.addColorStop(1, 'rgba(255, 206, 86, 0.2)');

    var gradientAccepted = ctx.createLinearGradient(0, 0, 0, 400);
    gradientAccepted.addColorStop(0, 'rgba(75, 192, 192, 1)');
    gradientAccepted.addColorStop(1, 'rgba(75, 192, 192, 0.2)');

    var gradientDeclined = ctx.createLinearGradient(0, 0, 0, 400);
    gradientDeclined.addColorStop(0, 'rgba(255, 99, 132, 1)');
    gradientDeclined.addColorStop(1, 'rgba(255, 99, 132, 0.2)');

    var bookingChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Pending', 'Accepted', 'Declined'],
            datasets: [{
                label: 'Number of Bookings',
                data: [<?php echo $pending_count; ?>, <?php echo $accepted_count; ?>, <?php echo $declined_count; ?>],
                backgroundColor: [gradientPending, gradientAccepted, gradientDeclined],
                borderColor: [
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        font: {
                            size: 16
                        },
                        color: '#000'
                    }
                },
                tooltip: {
                    enabled: true,
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.dataset.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 14
                        },
                        color: '#000'
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(200, 200, 200, 0.2)'
                    },
                    ticks: {
                        font: {
                            size: 14
                        },
                        color: '#000'
                    }
                }
            }
        }
    });
</script>

<?php include("footer.php"); ?>
