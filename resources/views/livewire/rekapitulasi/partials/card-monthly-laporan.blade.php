<script>
    const data = @json($chartData);

    // Function to check if the screen width is less than a certain value (e.g., 768px for mobile)
    function isMobileView() {
        return window.innerWidth < 768;
    }

    // Define the chart options
    const options = {
        chart: {
            height: "100%",
            maxWidth: "90%",
            type: "line",
            fontFamily: "Inter, sans-serif",
            dropShadow: {
                enabled: false,
            },
            toolbar: {
                show: false,
            },
        },
        tooltip: {
            enabled: true,
            x: {
                show: true,
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            width: 6,
        },
        grid: {
            show: true,
            strokeDashArray: 4,
            padding: {
                left: 2,
                right: 2,
                top: -26
            },
        },
        series: [{
                name: "Pengeluaran",
                data: data.map(item => item.expenditure),
                color: "#F98080",
            },
            {
                name: "Penjualan",
                data: data.map(item => item.transaction),
                color: "#31C48D",
            },
        ],
        legend: {
            show: true
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            categories: data.map(item => item.dateLabel),
            labels: {
                show: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                    cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400 hidden md:block'
                }
            },
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
        },
        yaxis: {
            show: !isMobileView(), // Conditionally show y-axis based on screen size
        },
    };

    // Function to re-render the chart on window resize
    function renderChart() {
        if (document.getElementById("line-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("line-chart"), options);
            chart.render();
        }
    }

    // Render the chart initially
    renderChart();

    // Add event listener for window resize to re-render the chart
    window.addEventListener('resize', function() {
        options.yaxis.show = !isMobileView();
        renderChart();
    });
</script>
