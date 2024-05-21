<script>
    const data = @json($chartData);

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
                show: false,
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
                name: "Expenditure",
                data: data.map(item => item.expenditure),
                color: "#F98080",
            },
            {
                name: "Transaction",
                data: data.map(item => item.transaction),
                color: "#31C48D",
            },
        ],
        legend: {
            show: false
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
            show: false,
        },
    };

    if (document.getElementById("line-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("line-chart"), options);
        chart.render();
    }
</script>
