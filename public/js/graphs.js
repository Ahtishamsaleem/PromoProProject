Highcharts.chart('TargetVsAchievementKPI', {
    chart: {
        type: 'column',
        backgroundColor: 'transparent',
        
        height: 290,
        style:{
            fontFamily: "Inter",
            color: "#000",
            fontWeight: 'bold', fontSize: '12px'
        }
    },
    title: {
        text: '',
    },
    subtitle: {
        text:
            ''
    },
    xAxis: {
        type: 'category',
        gridLineWidth: 0,
        labels: {
            rotation: -90,            
            style: { fontWeight: 'bold', fontSize: '10px' }
        },
        categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'Octuber', 'Novemer', 'December'],
        min: 0,
        max: 5,
        scrollbar: {
            enabled: true,
			barBackgroundColor: '#D9D9D9',
			barBorderRadius: 4,
			barBorderWidth: 4,
            barBorderColor: '#D9D9D9',
			buttonBackgroundColor: 'grey',
			buttonBorderRadius: 6,
			rifleColor: 'white',
			trackBackgroundColor: '#F1F1F1',
			trackBorderWidth: 0,
            height: 6,
			trackBorderRadius: 4
        },
    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: ''
        },        
        gridLineWidth: 0
    },
    credits: {
        enabled: false
    },
    exporting: { 
        enabled: false 
    },
    series: [
        {
            name: 'Achievement',
            data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12,],
            color: '#FFB422',            
        },
        {
            name: 'Target',
            data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
            color: '#024890'

        }
    ]

});

Highcharts.chart('NetsalesByChannel', {
    
    chart: {
        type: 'column',
        backgroundColor: 'transparent',
        height: 290,
        style:{
            fontFamily: "Inter",
            color: "#000",
        }
    },
    title: {
        text: '',
    },
    subtitle: {
        text:
            ''
    },
    legend: {
        enabled: false
    },
    xAxis: {
        type: 'category',
        gridLineWidth: 0,
        labels: {
            rotation: 270,
            style: { fontWeight: 'bold', fontSize: '10px' }
        },
        categories: ['Channel A', 'Channel A', 'Channel A', 'Channel A', 'Channel A', 'Channel A', 'Channel A'],
        min: 0,
        max: 5,
        scrollbar: {
            enabled: true,
            barBackgroundColor: '#D9D9D9',
            barBorderRadius: 4,
            barBorderWidth: 4,
            barBorderColor: '#D9D9D9',
            buttonBackgroundColor: 'grey',
            buttonBorderRadius: 6,
            rifleColor: 'white',
            trackBackgroundColor: '#F1F1F1',
            trackBorderWidth: 0,
            height: 6,
            trackBorderRadius: 4
        },
    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: ''
        }, 
        gridLineWidth: 0
    },
    credits: {
        enabled: false
    },
    exporting: { 
        enabled: false 
    },
    series: [
        {
            name: 'Channels',
            data: [1, 2, 3, 4, 5, 6, 7],
            color: '#024890',
            
        },
    ],

});

Highcharts.chart('NetsalesBrandwiseBreakdownKPI', {
    
    chart: {
        type: 'column',
        backgroundColor: 'transparent',
        
        height: 300,
        style:{
            fontFamily: "Inter",
            color: "#000",
        }
    },
    title: {
        text: '',
    },
    subtitle: {
        text:
            ''
    },
    legend: {
        enabled: false
    },
    xAxis: {
        type: 'category',
        gridLineWidth: 0,
        labels: {
            rotation: 270,
            style: { fontWeight: 'bold', fontSize: '10px' }

        },
        categories: ['Brand A', 'Brand A', 'Brand A', 'Brand A', 'Brand A', 'Brand A', 'Brand A', 'Brand A', 'Brand A', 'Brand A', 'Brand A', 'Brand A', 'Brand A', 'Brand A'],
        min: 0,
        max: 10,
        scrollbar: {
            enabled: true,
            barBackgroundColor: '#D9D9D9',
            barBorderRadius: 4,
            barBorderWidth: 4,
            barBorderColor: '#D9D9D9',
            buttonBackgroundColor: 'grey',
            buttonBorderRadius: 6,
            rifleColor: 'white',
            trackBackgroundColor: '#F1F1F1',
            trackBorderWidth: 0,
            height: 6,
            trackBorderRadius: 4
        },
    },
    yAxis: {
        allowDecimals: false,
        labels: {
            enabled: false
        },
        title: {
            text: ''
        },        
        gridLineWidth: 0
    },
    credits: {
        enabled: false
    },
    exporting: { 
        enabled: false 
    },
    series: [
        {
            name: 'Brands',
            data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14],
            color: '#024890'

        }
    ]

});

Highcharts.chart('NetsalesBreakdownByGeography', {
    
    chart: {
        type: 'column',
        backgroundColor: 'transparent',
        
        height: 360,
        style:{
            fontFamily: "Inter",
            color: "#000",
        }
    },
    title: {
        text: '',
    },
    subtitle: {
        text:
            ''
    },
    legend: {
        enabled: false
    },
    xAxis: {
        type: 'category',
        gridLineWidth: 0,
        labels: {
            rotation: 270,
            style: { fontWeight: 'bold', fontSize: '10px' }
        },
        categories: ['Channel A', 'Channel A', 'Channel A', 'Channel A', 'Channel A', 'Channel A', 'Channel A', 'Channel A', 'Channel A', 'Channel A', 'Channel A', 'Channel A', 'Channel A', 'Channel A'],
        min: 0,
        max: 10,
        scrollbar: {
            enabled: true,
            barBackgroundColor: '#D9D9D9',
            barBorderRadius: 4,
            barBorderWidth: 4,
            barBorderColor: '#D9D9D9',
            buttonBackgroundColor: 'grey',
            buttonBorderRadius: 6,
            rifleColor: 'white',
            trackBackgroundColor: '#F1F1F1',
            trackBorderWidth: 0,
            height: 6,
            trackBorderRadius: 4
        },
    },
    yAxis: {
        labels: {
            enabled: false
        },
        allowDecimals: false,
        title: {
            text: ''
        },        
        gridLineWidth: 0
    },
    credits: {
        enabled: false
    },
    exporting: { 
        enabled: false 
    },
    series: [
        {
            name: 'Channels',
            data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14],
            color: '#024890'

        }
    ]

});


Highcharts.chart('OrderVsExecutionKPI', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie',
        backgroundColor: 'transparent',
        
        height: 280,
        style:{
            fontFamily: "Inter",
            color: "#000",
        }
    },
    title: {
        text: '',
    },
    legend: {
        itemStyle:{
            fontWeight: 600,
            color: "black",
            fontSize: 10,
        }
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            innerSize: "40%",
            borderRadius: 0,
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: '86% Executed',
            y: 74.77,
            sliced: false,
            selected: true,
            color: '#7BC1FA',
        },  {
            name: '73% Pending',
            y: 12.82,
            color: '#006593'
        }]
    }],
    credits: {
        enabled: false
    },    
    exporting: { 
        enabled: false 
    },
});

Highcharts.chart('TotalUniverseOutlets', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie',
        backgroundColor: 'transparent',
        
        height: 280,
        style:{
            fontFamily: "Inter",
            color: "#000",
        }
    },
    title: {
        text: 'Browser market shares in March, 2022',
        text: '',
        align: 'left'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    legend: {
        itemStyle:{
            fontWeight: 600,
            color: "black",
            fontSize: 10,
        }
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            innerSize: "40%",
            borderRadius: 0,
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: '86% Active',
            y: 74.77,
            sliced: false,
            selected: true,
            color: '#7BC1FA'

        },  {
            name: '73% Inactive',
            y: 12.82,
            color: '#006593'

        }]
    }],
    credits: {
        enabled: false
    },    
    exporting: { 
        enabled: false 
    },
});






Highcharts.chart('OrderBookAttendanceKPI', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie',
        backgroundColor: 'transparent',
        
        height: 280,
        style:{
            fontFamily: "Inter",
            color: "#000",
        }
    },
    title: {
        text: '',
        align: 'left'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            innerSize: "40%",
            borderRadius: 0,
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [
        {
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: '86% Active Before 9 AM:',
            y: 74.77,
            sliced: false,
            selected: true,
            color: '#7BC1FA'
        },  {
            name: '73% Inactive after 9 AM:',
            y: 12.82,
            color: '#006593'
        }]
    }],
    credits: {
        enabled: false
    },    
    exporting: { 
        enabled: false 
    },
    legend: {
        align: 'right',
        verticalAlign: 'middle',
        layout: 'vertical',
        itemStyle: {
            color: '#000000',
            fontWeight: 'bold',
            fontSize: "12px"
        }
    },
});